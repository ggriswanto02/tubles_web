<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RencanaPembelajaranModel;

class Rpl extends BaseController
{
    public function index()
    {
        $rplTable = new RencanaPembelajaranModel();
        $data['dataTable'] = $rplTable->findAll(10);
        return view('rpembelajaran', $data);
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

    public function newData()
    {
        $rplModel = new RencanaPembelajaranModel();

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

        if ($rplModel->insert($data)) {
            return redirect()->to('/rpl')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect()->to('/rpl')->with('error', 'Gagal menambahkan data.');
        }
    }

    public function updateData()
    {
        $rplModel = new RencanaPembelajaranModel();

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

        if ($rplModel->update($id, $data)) {
            return redirect()->to('/rpl')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->to('/rpl')->with('error', 'Gagal memperbarui data.');
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


}
