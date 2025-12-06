<?php

namespace App\Controllers;

use App\Models\DBtable5c;
use CodeIgniter\Exceptions\PageNotFoundException;

class Table5c extends BaseController
{

    public function index()
    {
        $table5c = new DBtable5c();
        $data['table5c'] = $table5c->findAll();

        return view('table5c', $data);
    }

    public function create()
    {
        // lakukan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tk_sangat_baik' => 'required',
            'tk_baik' => 'required',
            'tk_cukup' => 'required',
            'tk_kurang' => 'required',
            'tindak_lanjut_upps' => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $table5c = new DBtable5c();
			
            foreach ($this->request->getPost('tk_sangat_baik') as $no => $tkSangatBaik) {
                $table5c->insert([
                    "no" => $no + 1, // Assuming 'no' should start from 1
                    "tk_sangat_baik" => $tkSangatBaik,
                    "tk_baik" => $this->request->getPost("tk_baik")[$no],
                    "tk_cukup" => $this->request->getPost("tk_cukup")[$no],
                    "tk_kurang" => $this->request->getPost("tk_kurang")[$no],
                    "tindak_lanjut_upps" => $this->request->getPost("tindak_lanjut_upps")[$no],
                ]);
            }

            return redirect()->to('table/table5c');
        }
		$table5c = new DBtable5c();
		$data['table5c'] = $table5c->findAll();
        // tampilkan form create
        echo view('table5c',$data);
    }

    public function edit($no)
    {
        // Ambil data yang akan diedit
        $table5c = new DBtable5c();
        $data['table5c'] = $table5c->where('no', $no)->first();

        // Validasi data yang diubah
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'judul_penelitian' => 'required',
            // Tambahkan aturan validasi untuk field lainnya jika diperlukan
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            // Jika data valid, lakukan update
            $table5c->update($no, [
                "no" => $this->request->getPost('no'),
                "judul_penelitian" => $this->request->getPost('judul_penelitian'),
                "nama_dosen" => $this->request->getPost('nama_dosen'),
                "mata_kuliah" => $this->request->getPost('mata_kuliah'),
                "bentuk_integrasi" => $this->request->getPost('bentuk_integrasi'),
                "tahun" => $this->request->getPost('tahun'),
            ]);

            // Redirect ke halaman table5c
            return redirect()->to('table/table5c');
        }

        // Tampilkan form edit
        return view('edittable5c', $data);
    }


    public function delete($no){
        $table5c = new DBtable5c();
        $table5c->delete($no);
        return redirect('table/table5c');
    }

    public function cari()
    {
        $table5c = new DBtable5c();
        $cariData = $this->request->getGet('search');

        $data['table5c'] = $table5c->cariData($cariData);

        return view('table5c', $data);
    }

}