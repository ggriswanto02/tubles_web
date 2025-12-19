<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NilaiMhsPertemuanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class NilaiMhsPertemuan extends BaseController
{
    public function index()
    {
        $model = new NilaiMhsPertemuanModel();
        $data['items'] = $model->findAll();
        return view('nilai_mhs_pertemuan', $data);
    }

    public function create()
    {
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('table/nilai-mhs-pertemuan')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new NilaiMhsPertemuanModel();

        $data = [
            'nim'     => $this->request->getPost('nim'),
            'id_rencana_pembelajaran'   => $this->request->getPost('id_rencana_pembelajaran'),
            'nilai_kompetensi'        => $this->request->getPost('nilai_kompetensi'),
            'status'            => $this->request->getPost('status'),
            'keterangan'      => $this->request->getPost('keterangan')

        ];

        $model->insert($data);

        return redirect()->to(base_url('table/nilai-mhs-pertemuan'))
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('table/nilai-mhs-pertemuan')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new NilaiMhsPertemuanModel();
        $data['item'] = $model->find($id);

        if (!$data['item']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan");
        }

        return view('nilai_mhs_pertemuan_edit', $data);
    }

    public function update($id)
    {
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('table/nilai-mhs-pertemuan')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new NilaiMhsPertemuanModel();

        $data = [
            'nim'     => $this->request->getPost('nim'),
            'id_rencana_pembelajaran'   => $this->request->getPost('id_rencana_pembelajaran'),
            'nilai_kompetensi'        => $this->request->getPost('nilai_kompetensi'),
            'status'            => $this->request->getPost('status'),
            'keterangan'      => $this->request->getPost('keterangan')

        ];


        $model->update($id, $data);

        return redirect()->to(base_url('table/nilai-mhs-pertemuan'))
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('table/nilai-mhs-pertemuan')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new NilaiMhsPertemuanModel();
        $model->delete($id);

        return redirect()->to(base_url('table/nilai-mhs-pertemuan'))
            ->with('success', 'Data berhasil dihapus!');
    }

    public function exportExcel()
    {
    $model = new \App\Models\NilaiMhsPertemuanModel();
    $data = $model->findAll();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'NILAI MAHASISWA');
    $sheet->mergeCells('A1:E1');

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
    $sheet->mergeCells('A2:E2');

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
    $sheet->setCellValue('A4', 'nim');
    $sheet->setCellValue('B4', 'id_rencana_pembelajaran');
    $sheet->setCellValue('C4', 'nilai_kompetensi');
    $sheet->setCellValue('D4', 'status');
    $sheet->setCellValue('E4', 'keterangan');

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
    $sheet->getStyle('A4:E4')->applyFromArray($headerStyle);


    // Data
    $row = 5;
    foreach ($data as $item) {
        $sheet->setCellValue('A'.$row, $item['nim']);
        $sheet->setCellValue('B'.$row, $item['id_rencana_pembelajaran']);
        $sheet->setCellValue('C'.$row, $item['nilai_kompetensi']);
        $sheet->setCellValue('D'.$row, $item['status']);
        $sheet->setCellValue('E'.$row, $item['keterangan']);
        $row++;
    }

    foreach (range('A', 'E') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    $lastRow = $row - 1;

    $sheet->getStyle("A4:E{$lastRow}")->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
            ],
        ],
    ]);

    $sheet->getStyle("A2:E{$lastRow}")
      ->getAlignment()
      ->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $sheet->getStyle("E2:E{$lastRow}")
      ->getAlignment()
      ->setWrapText(true);

    $filename = 'Nilai Mahasiswa.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
    }

}
