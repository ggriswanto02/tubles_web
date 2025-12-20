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
        return view('nilai_mhs_pertemuan');
    }

    public function getData()
    {
        $model = new NilaiMhsPertemuanModel();

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];

        // Total records
        $totalRecords = $model->countAll();

        // Filtering
        if (!empty($searchValue)) {
            $model->like('nim', $searchValue);
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
            return redirect()->to('/nilai-pertemuan-mahasiswa')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new NilaiMhsPertemuanModel();

        $data = [
            'nim' => $this->request->getPost('nim'),
            'id_rencana_pembelajaran' => $this->request->getPost('id_rencana_pembelajaran'),
            'nilai_kompetensi' => $this->request->getPost('nilai_kompetensi'),
            'status' => $this->request->getPost('status'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        if (empty($data['nim']) || empty($data['id_rencana_pembelajaran']) || empty($data['nilai_kompetensi'])) {
            return redirect()->back()->with('error', 'Data wajib belum lengkap.');
        }

        if ($model->insert($data)) {
            return redirect()->to('/nilai-pertemuan-mahasiswa')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect()->to('/nilai-pertemuan-mahasiswa')->with('error', 'Gagal menambahkan data.');
        }
    }

    public function updateById()
    {
        if (!in_array(session('role'), ['admin', 'manajer'])) {
            return redirect()->to('nilai-pertemuan-mahasiswa')->with('error', 'Tidak memiliki akses untuk aksi ini.');
        }
        $model = new NilaiMhsPertemuanModel();

        $id = $this->request->getPost('id');
        if (!$id) {
            return redirect()->back()->with('error', 'ID tidak ditemukan.');
        }

        $data = [
            'nim' => $this->request->getPost('nim'),
            'id_rencana_pembelajaran' => $this->request->getPost('id_rencana_pembelajaran'),
            'nilai_kompetensi' => $this->request->getPost('nilai_kompetensi'),
            'status' => $this->request->getPost('status'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/nilai-pertemuan-mahasiswa')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->to('/nilai-pertemuan-mahasiswa')->with('error', 'Gagal memperbarui data.');
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

        $model = new NilaiMhsPertemuanModel();
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

        $model = new NilaiMhsPertemuanModel();
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
        $model = new NilaiMhsPertemuanModel();
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
            $sheet->setCellValue('A' . $row, $item['nim']);
            $sheet->setCellValue('B' . $row, $item['id_rencana_pembelajaran']);
            $sheet->setCellValue('C' . $row, $item['nilai_kompetensi']);
            $sheet->setCellValue('D' . $row, $item['status']);
            $sheet->setCellValue('E' . $row, $item['keterangan']);
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
