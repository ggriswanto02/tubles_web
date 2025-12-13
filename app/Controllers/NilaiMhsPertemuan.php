<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NilaiMhsPertemuanModel;

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
        $model = new NilaiMhsPertemuanModel();
        $data['item'] = $model->find($id);

        if (!$data['item']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan");
        }

        return view('nilai_mhs_pertemuan_edit', $data);
    }

    public function update($id)
    {
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
        $model = new NilaiMhsPertemuanModel();
        $model->delete($id);

        return redirect()->to(base_url('table/nilai-mhs-pertemuan'))
            ->with('success', 'Data berhasil dihapus!');
    }
}
