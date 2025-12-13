<?php

namespace App\Controllers;

use App\Models\CPLModel;

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
        return view('cpl/create');
    }

    // PROSES SIMPAN
    public function store()
    {
        $model = new CPLModel();

        $model->save([
            'id_penyusun'  => $this->request->getPost('id_penyusun'),
            'id_matakuliah' => $this->request->getPost('id_matakuliah'),
            'cpl_prodi'    => $this->request->getPost('cpl_prodi'),
        ]);

        return redirect()->to('/table/cpl');
    }
    public function delete($id)
    {
    $model = new CPLModel();
    $model->delete($id);

    return redirect()->to('/table/cpl');
    }

    public function update()
    {
    $model = new CPLModel();

    $id = $this->request->getPost('id');

    $model->update($id, [
        'id_penyusun'  => $this->request->getPost('id_penyusun'),
        'id_matakuliah' => $this->request->getPost('id_matakuliah'),
        'cpl_prodi'    => $this->request->getPost('cpl_prodi'),
    ]);

    return redirect()->to('/table/cpl');
    }

}
