<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RencanaPembelajaranModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class RencanaPembelajaran extends BaseController
{
    public function index()
    {
        return view('rencana_pembelajaran');
    }

    public function getData()
    {
        $model = new RencanaPembelajaranModel();

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];

        // Total records
        $totalRecords = $model->countAll();

        // Filtering
        if (!empty($searchValue)) {
            $model->like('sub_cpmk', $searchValue)
                ->orLike('penilaian_indikator', $searchValue)
                ->orLike('materi', $searchValue);
        }

        $totalFiltered = $model->countAllResults(false);

        // Pagination
        $records = $model->findAll($length, $start);

        return $this->response->setJSON([
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            "data" => $records
        ]);
    }

    public function createData()
    {
        $model = new RencanaPembelajaranModel();

        $data = [
            'id_penyusun' => $this->request->getPost('id_penyusun'),
            'id_matakuliah' => $this->request->getPost('id_matakuliah'),
            'minggu_ke' => $this->request->getPost('minggu_ke'),
            'sub_cpmk' => $this->request->getPost('sub_cpmk'),
            'penilaian_indikator' => $this->request->getPost('penilaian_indikator'),
            'penilaian_teknik' => $this->request->getPost('penilaian_teknik'),
            'bentuk_pembelajaran' => $this->request->getPost('bentuk_pembelajaran'),
            'materi' => $this->request->getPost('materi'),
            'bobot_penilaian' => $this->request->getPost('bobot_penilaian'),
            'catatan' => $this->request->getPost('catatan'),
        ];

        if (empty($data['id_penyusun']) || empty($data['id_matakuliah']) || empty($data['minggu_ke'])) {
            return redirect()->back()->with('error', 'Data wajib belum lengkap.');
        }

        if ($model->insert($data)) {
            return redirect()->to('/rencana-pembelajaran')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect()->to('/rencana-pembelajaran')->with('error', 'Gagal menambahkan data.');
        }
    }

    public function updateById()
    {
        $model = new RencanaPembelajaranModel();

        $id = $this->request->getPost('id');
        if (!$id) {
            return redirect()->back()->with('error', 'ID tidak ditemukan.');
        }

        $data = [
            'id_penyusun' => $this->request->getPost('id_penyusun'),
            'id_matakuliah' => $this->request->getPost('id_matakuliah'),
            'minggu_ke' => $this->request->getPost('minggu_ke'),
            'sub_cpmk' => $this->request->getPost('sub_cpmk'),
            'penilaian_indikator' => $this->request->getPost('penilaian_indikator'),
            'penilaian_teknik' => $this->request->getPost('penilaian_teknik'),
            'bentuk_pembelajaran' => $this->request->getPost('bentuk_pembelajaran'),
            'materi' => $this->request->getPost('materi'),
            'bobot_penilaian' => $this->request->getPost('bobot_penilaian'),
            'catatan' => $this->request->getPost('catatan'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/rencana-pembelajaran')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->to('/rencana-pembelajaran')->with('error', 'Gagal memperbarui data.');
        }
    }

    public function getById()
    {
        $id = $this->request->getGet('id');

        if (!$id) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Parameter id wajib ada'
            ]);
        }

        $model = new RencanaPembelajaranModel();
        $data = $model->find($id);

        if (!$data) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'data' => $data
        ]);
    }

    public function deleteById()
    {
        $id = $this->request->getPost('id');

        if (!$id) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'ID tidak ditemukan.'
            ]);
        }

        $model = new RencanaPembelajaranModel();
        $data = $model->find($id);
        if (!$data) {
            return $this->response->setJSON([
                'status' => false,
                'message' => "Data dengan ID $id tidak ditemukan."
            ]);
        }

        if ($model->delete($id)) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Data berhasil dihapus.'
            ]);
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Gagal menghapus data.'
        ]);
    }

    public function exportExcel()
    {
        $model = new RencanaPembelajaranModel();
        $data = $model->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'RENCANA PEMBELAJARAN');
        $sheet->mergeCells('A1:K1');

        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 16,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->setCellValue('A2', 'Program Studi Teknik Informatika');
        $sheet->mergeCells('A2:K2');

        $sheet->getStyle('A2')->applyFromArray([
            'font' => [
                'italic' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);


        // Header kolom
        $sheet->setCellValue('A4', 'ID');
        $sheet->setCellValue('B4', 'ID Penyusun');
        $sheet->setCellValue('C4', 'ID Mata Kuliah');
        $sheet->setCellValue('D4', 'Minggu Ke');
        $sheet->setCellValue('E4', 'Sub CPMK');
        $sheet->setCellValue('F4', 'Indikator');
        $sheet->setCellValue('G4', 'Teknik');
        $sheet->setCellValue('H4', 'Bentuk Pembelajaran');
        $sheet->setCellValue('I4', 'Materi');
        $sheet->setCellValue('J4', 'Bobot');
        $sheet->setCellValue('K4', 'Catatan');

        $headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'D9E1F2', // warna biru muda (aman & akademik)
                ],
            ],
        ];

        // Terapkan ke header (A1 sampai D1)
        $sheet->getStyle('A4:K4')->applyFromArray($headerStyle);


        // Isi data
        $row = 5;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['id_penyusun']);
            $sheet->setCellValue('C' . $row, $item['id_matakuliah']);
            $sheet->setCellValue('D' . $row, $item['minggu_ke']);
            $sheet->setCellValue('E' . $row, $item['sub_cpmk']);
            $sheet->setCellValue('F' . $row, $item['penilaian_indikator']);
            $sheet->setCellValue('G' . $row, $item['penilaian_teknik']);
            $sheet->setCellValue('H' . $row, $item['bentuk_pembelajaran']);
            $sheet->setCellValue('I' . $row, $item['materi']);
            $sheet->setCellValue('J' . $row, $item['bobot_penilaian']);
            $sheet->setCellValue('K' . $row, $item['catatan']);
            $row++;
        }

        foreach (range('A', 'K') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $lastRow = $row - 1;

        $sheet->getStyle("A4:K{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->getStyle("A2:K{$lastRow}")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("K2:K{$lastRow}")
            ->getAlignment()
            ->setWrapText(true);


        $filename = 'Rencana Pembelajaran.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
