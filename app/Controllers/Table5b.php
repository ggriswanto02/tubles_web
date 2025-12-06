<?php namespace App\Controllers;

use App\Models\DBtable5b;
use CodeIgniter\Exceptions\PageNotFoundException;

class Table5b extends BaseController
{
	public function index()
	{
		$table5b = new DBtable5b();
        $data['table5b'] = $table5b->findAll();
		echo view('table5b', $data);
	}

	public function create()
    {
       // lakukan validasi
       $validation =  \Config\Services::validation();
       $validation->setRules(['judul_penelitian' => 'required']);
       $isDataValid = $validation->withRequest($this->request)->run();

         // jika data valid, simpan ke database
         if($isDataValid){
            $table5b = new DBtable5b();
            $table5b->insert([
                "no" => $this->request->getPost('no'),
                "judul_penelitian" => $this->request->getPost('judul_penelitian'),
                "nama_dosen" => $this->request->getPost('nama_dosen'),
                "mata_kuliah" => $this->request->getPost('mata_kuliah'),
                "bentuk_integrasi" => $this->request->getPost('bentuk_integrasi'),
                "tahun" => $this->request->getPost('tahun'),
            ]);
            return redirect()->to('table/table5b');
        }
		
        // tampilkan form create
        echo view('table5b');
    }

	public function edit($no)
{
    // Ambil data yang akan diedit
    $table5b = new DBtable5b();
    $data['table5b'] = $table5b->where('no', $no)->first();

    // Validasi data yang diubah
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'judul_penelitian' => 'required',
        // Tambahkan aturan validasi untuk field lainnya jika diperlukan
    ]);
    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid) {
        // Jika data valid, lakukan update
        $table5b->update($no, [
            "no" => $this->request->getPost('no'),
            "judul_penelitian" => $this->request->getPost('judul_penelitian'),
            "nama_dosen" => $this->request->getPost('nama_dosen'),
            "mata_kuliah" => $this->request->getPost('mata_kuliah'),
            "bentuk_integrasi" => $this->request->getPost('bentuk_integrasi'),
            "tahun" => $this->request->getPost('tahun'),
        ]);

        // Redirect ke halaman table5b
        return redirect()->to('table/table5b');
    }

    // Tampilkan form edit
    return view('edittable5b', $data);
}


		public function delete($no){
        $table5b = new DBtable5b();
        $table5b->delete($no);
        return redirect('table/table5b');
    }

    public function cari()
    {
        $table5b = new DBtable5b();
        $cariData = $this->request->getGet('search');

        $data['table5b'] = $table5b->cariData($cariData);

        return view('table5b', $data);
    }


}