<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CapaianLulusanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class CapaianLulusan extends BaseController
{
    public function index()
    {
        return view('capaian_lulusan');
    }

    public function getData()
    {
        $model = new CapaianLulusanModel();

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];

        // Total records
        $totalRecords = $model->countAll();

        // Filtering
        if (!empty($searchValue)) {
            $model->like('id_penyusun', $searchValue)
                ->orLike('id_matakuliah', $searchValue);
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
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('/capaian-lulusan')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new CapaianLulusanModel();

        $data = [
            'id_penyusun'  => $this->request->getPost('id_penyusun'),
            'id_matakuliah' => $this->request->getPost('id_matakuliah'),
            'cpl_prodi'    => $this->request->getPost('cpl_prodi'),
        ];

        if (empty($data['id_penyusun']) || empty($data['id_matakuliah']) || empty($data['cpl_prodi'])) {
            return redirect()->back()->with('error', 'Data wajib belum lengkap.');
        }

        if ($model->insert($data)) {
            return redirect()->to('/capaian-lulusan')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect()->to('/capaian-lulusan')->with('error', 'Gagal menambahkan data.');
        }
    }

    public function updateById()
    {
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('/capaian-lulusan')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new CapaianLulusanModel();

        $id = $this->request->getPost('id');
        if (!$id) {
            return redirect()->back()->with('error', 'ID tidak ditemukan.');
        }

        $data = [
            'id_penyusun'  => $this->request->getPost('id_penyusun'),
            'id_matakuliah' => $this->request->getPost('id_matakuliah'),
            'cpl_prodi'    => $this->request->getPost('cpl_prodi'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/capaian-lulusan')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->to('/capaian-lulusan')->with('error', 'Gagal memperbarui data.');
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

        $model = new CapaianLulusanModel();
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
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('/capaian-lulusan')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $id = $this->request->getPost('id');

        if (!$id) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'ID tidak ditemukan.'
            ]);
        }

        $model = new CapaianLulusanModel();
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
        $model = new CapaianLulusanModel();
        $dataCPL = $model->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'CAPAIAN PEMBELAJARAN LULUSAN (CPL)');
        $sheet->mergeCells('A1:D1');

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
        $sheet->mergeCells('A2:D2');

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
        $sheet->setCellValue('D4', 'CPL Prodi');

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
        $sheet->getStyle('A4:D4')->applyFromArray($headerStyle);


        // Isi data
        $row = 5;
        foreach ($dataCPL as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['id_penyusun']);
            $sheet->setCellValue('C' . $row, $item['id_matakuliah']);
            $sheet->setCellValue('D' . $row, $item['cpl_prodi']);
            $row++;
        }

        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $lastRow = $row - 1;

        $sheet->getStyle("A4:D{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->getStyle("A2:D{$lastRow}")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("D2:D{$lastRow}")
            ->getAlignment()
            ->setWrapText(true);



        $writer = new Xlsx($spreadsheet);
        $filename = 'Data CPL.xlsx';

        // Header download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
