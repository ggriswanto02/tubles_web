<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KorelasiCplCpmkModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;


class KorelasiCplCpmk extends BaseController
{
    public function index()
    {
        return view('korelasi_cpl_cpmk');
    }

    public function getData()
    {
        $model = new KorelasiCplCpmkModel();

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];

        // Total records
        $totalRecords = $model->countAll();

        // Filtering
        if (!empty($searchValue)) {
            $model->like('sub_cpmk', $searchValue)
                ->orLike('cpmk', $searchValue);
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
        $model = new KorelasiCplCpmkModel();

        $data = [
            'id_penyusun'     => $this->request->getPost('id_penyusun'),
            'id_matakuliah'   => $this->request->getPost('id_matakuliah'),
            'sub_cpmk'        => $this->request->getPost('sub_cpmk'),
            'cpmk'            => $this->request->getPost('cpmk'),
            'persentase'      => $this->request->getPost('persentase'),
            'bobot_penilaian' => $this->request->getPost('bobot_penilaian'),
        ];

        if (empty($data['id_penyusun']) || empty($data['id_matakuliah'])) {
            return redirect()->back()->with('error', 'Data wajib belum lengkap.');
        }

        if ($model->insert($data)) {
            return redirect()->to('/korelasi-cpl-cpmk')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect()->to('/korelasi-cpl-cpmk')->with('error', 'Gagal menambahkan data.');
        }
    }

    public function updateById()
    {
        $model = new KorelasiCplCpmkModel();

        $id = $this->request->getPost('id');
        if (!$id) {
            return redirect()->back()->with('error', 'ID tidak ditemukan.');
        }

        $data = [
            'id_penyusun'     => $this->request->getPost('id_penyusun'),
            'id_matakuliah'   => $this->request->getPost('id_matakuliah'),
            'sub_cpmk'        => $this->request->getPost('sub_cpmk'),
            'cpmk'            => $this->request->getPost('cpmk'),
            'persentase'      => $this->request->getPost('persentase'),
            'bobot_penilaian' => $this->request->getPost('bobot_penilaian'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/korelasi-cpl-cpmk')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->to('/korelasi-cpl-cpmk')->with('error', 'Gagal memperbarui data.');
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

        $model = new KorelasiCplCpmkModel();
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

        $model = new KorelasiCplCpmkModel();
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
        $model = new KorelasiCplCpmkModel();
        $data = $model->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'KORELASI CPL DENGAN CPMK');
        $sheet->mergeCells('A1:F1');

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
        $sheet->mergeCells('A2:F2');

        $sheet->getStyle('A2')->applyFromArray([
            'font' => [
                'italic' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);


        // Header
        $sheet->setCellValue('A4', 'ID Penyusun');
        $sheet->setCellValue('B4', 'ID Mata Kuliah');
        $sheet->setCellValue('C4', 'Sub CPMK');
        $sheet->setCellValue('D4', 'CPMK');
        $sheet->setCellValue('E4', 'Persentase');
        $sheet->setCellValue('F4', 'Bobot Penilaian');

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
        $sheet->getStyle('A4:F4')->applyFromArray($headerStyle);


        // Data
        $row = 5;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['id_penyusun']);
            $sheet->setCellValue('B' . $row, $item['id_matakuliah']);
            $sheet->setCellValue('C' . $row, $item['sub_cpmk']);
            $sheet->setCellValue('D' . $row, $item['cpmk']);
            $sheet->setCellValue('E' . $row, $item['persentase']);
            $sheet->setCellValue('F' . $row, $item['bobot_penilaian']);
            $row++;
        }

        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $lastRow = $row - 1;

        $sheet->getStyle("A4:F{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->getStyle("A2:F{$lastRow}")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("F2:F{$lastRow}")
            ->getAlignment()
            ->setWrapText(true);


        $filename = 'Korelasi CPL dan CPMK.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
