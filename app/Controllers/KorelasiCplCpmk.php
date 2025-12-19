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
        $model = new KorelasiCplCpmkModel();
        $data['items'] = $model->findAll();
        return view('korelasi_cpl_cpmk', $data);
    }

    public function create()
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

        $model->insert($data);

        return redirect()->to(base_url('korelasi-cpl-cpmk'))
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $model = new KorelasiCplCpmkModel();
        $data['item'] = $model->find($id);

        if (!$data['item']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan");
        }

        return view('korelasi_cpl_cpmk_edit', $data);
    }

    public function update($id)
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

        $model->update($id, $data);

        return redirect()->to(base_url('korelasi-cpl-cpmk'))
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $model = new KorelasiCplCpmkModel();
        $model->delete($id);

        return redirect()->to(base_url('korelasi-cpl-cpmk'))
            ->with('success', 'Data berhasil dihapus!');
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
        $sheet->setCellValue('A'.$row, $item['id_penyusun']);
        $sheet->setCellValue('B'.$row, $item['id_matakuliah']);
        $sheet->setCellValue('C'.$row, $item['sub_cpmk']);
        $sheet->setCellValue('D'.$row, $item['cpmk']);
        $sheet->setCellValue('E'.$row, $item['persentase']);
        $sheet->setCellValue('F'.$row, $item['bobot_penilaian']);
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
