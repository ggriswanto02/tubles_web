<?php

namespace App\Controllers;

use App\Models\CPLModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;


class CPL extends BaseController
{
    public function index()
    {
        $model = new CPLModel();
        $data['cpl'] = $model->findAll();
        return view('cpl/index', $data);
    }

    // FORM TAMBAH
    public function create()
    {
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('/table/cpl')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        return view('cpl/create');
    }

    // PROSES SIMPAN
    public function store()
    {
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('/table/cpl')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new CPLModel();

        $model->save([
            'id_penyusun' => $this->request->getPost('id_penyusun'),
            'id_matakuliah' => $this->request->getPost('id_matakuliah'),
            'cpl_prodi' => $this->request->getPost('cpl_prodi'),
        ]);

        return redirect()->to('/table/cpl');
    }
    public function delete($id)
    {
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('/table/cpl')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new CPLModel();
        $model->delete($id);

        return redirect()->to('/table/cpl');
    }

    public function update()
    {
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('/table/cpl')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new CPLModel();

        $id = $this->request->getPost('id');

        $model->update($id, [
            'id_penyusun' => $this->request->getPost('id_penyusun'),
            'id_matakuliah' => $this->request->getPost('id_matakuliah'),
            'cpl_prodi' => $this->request->getPost('cpl_prodi'),
        ]);

        return redirect()->to('/table/cpl');
    }

    public function exportExcel()
    {
        $model = new CPLModel();
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
                'vertical' => Alignment::VERTICAL_CENTER,
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
