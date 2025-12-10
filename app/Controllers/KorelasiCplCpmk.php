<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KorelasiCplCpmkModel;

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
}
