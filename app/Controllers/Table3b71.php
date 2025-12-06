<?php namespace App\Controllers;

use App\Models\DBtable3b71;
use CodeIgniter\Exceptions\PageNotFoundException;

class Table3b71 extends BaseController
{
	public function index()
	{
		$table3b71 = new DBtable3b71();
        $data['table3b71'] = $table3b71->findAll();
		echo view('table3b71', $data);
	}

	public function create()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(['luaran_penelitian' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            $table3b71 = new DBtable3b71();
            $table3b71->insert([
                "no" => $this->request->getPost('no'),
                "luaran_penelitian" => $this->request->getPost('luaran_penelitian'),
                "tahun" => $this->request->getPost('tahun'),
                "keterangan" => $this->request->getPost('keterangan'),
            ]);
            return redirect()->to('table/table3b71');
        }
		
        // tampilkan form create
        echo view('table3b71');
    }

	public function edit($no)
{
    // Ambil data yang akan diedit
    $table3b71 = new DBtable3b71();
    $data['table3b71'] = $table3b71->where('no', $no)->first();

    // Validasi data yang diubah
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'luaran_penelitian' => 'required',
        // Tambahkan aturan validasi untuk field lainnya jika diperlukan
    ]);
    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid) {
        // Jika data valid, lakukan update
        $table3b71->update($no, [
            "luaran_penelitian" => $this->request->getPost('luaran_penelitian'),
            "tahun" => $this->request->getPost('tahun'),
            "keterangan" => $this->request->getPost('keterangan'),
        ]);

        // Redirect ke halaman table3b71
        return redirect()->to('table/table3b71');
    }

    // Tampilkan form edit
    return view('edittable3b71', $data);
}


	public function delete($no){
        $table3b71 = new DBtable3b71();
        $table3b71->delete($no);
        return redirect('table/table3b71');
    }

    public function cari()
    {
        $table3b71 = new DBtable3b71();
        $cariData = $this->request->getGet('search');

        $data['table3b71'] = $table3b71->cariData($cariData);

        return view('table3b71', $data);
    }


}