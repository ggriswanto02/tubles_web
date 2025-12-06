<?php namespace App\Controllers;

use App\Models\DBtable5a;
use CodeIgniter\Exceptions\PageNotFoundException;

class Table5a extends BaseController
{
	public function index()
	{
		$table5a = new DBtable5a();
        $data['table5a'] = $table5a->findAll();
		echo view('table5a', $data);
	}

	public function create()
    {
       // lakukan validasi
       $validation =  \Config\Services::validation();
       $validation->setRules(['semester' => 'required']);
       $isDataValid = $validation->withRequest($this->request)->run();

         // jika data valid, simpan ke database
         if($isDataValid){
            $table5a = new DBtable5a();
            $table5a->insert([
                "no" => $this->request->getPost('no'),
                "semester" => $this->request->getPost('semester'),
                "kode_matkul" => $this->request->getPost('kode_matkul'),
                "nama_matkul" => $this->request->getPost('nama_matkul'),
                "matkul" => $this->request->getPost('bobot'),
                "bk_responsi" => $this->request->getPost('bk_responsi'),
                "bk_seminar" => $this->request->getPost('bk_seminar'),
                "bk_praktikum" => $this->request->getPost('bk_praktikum'),
                "kredit_ke_jam" => $this->request->getPost('kredit_ke_jam'),
                "cp_pembelajaran" => $this->request->getPost('cp_pembelajaran'),
                "cp_sikap" => $this->request->getPost('cp_sikap'),
                "cp_pengetahuan" => $this->request->getPost('cp_pengetahuan'),
                "cp_keterampilan_umum" => $this->request->getPost('cp_keterampilan_umum'),
                "cp_keterampilan_khusus" => $this->request->getPost('cp_keterampilan_khusus'),
                "dokumen_pembelajaran" => $this->request->getPost('dokumen_pembelajaran'),
                "unit_penyelenggara" => $this->request->getPost('unit_penyelenggara'),
                
            ]);
            return redirect()->to('table/table5a');
        }
		
        // tampilkan form create
        echo view('table5a');
    }

	public function edit($no)
{
    // Ambil data yang akan diedit
    $table5a = new DBtable5a();
    $data['table5a'] = $table5a->where('no', $no)->first();

    // Validasi data yang diubah
    $validation =  \Config\Services::validation();
    $validation->setRules([
        'no' => 'required',
        // Tambahkan aturan validasi untuk field lainnya jika diperlukan
    ]);
    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid) {
        // Jika data valid, lakukan update
        $table5a->update($no, [
            "no" => $this->request->getPost('no'),
            "semester" => $this->request->getPost('semester'),
            "kode_matkul" => $this->request->getPost('kode_matkul'),
            "nama_matkul" => $this->request->getPost('nama_matkul'),
            "matkul" => $this->request->getPost('bobot'),
            "bk_responsi" => $this->request->getPost('bk_responsi'),
            "bk_seminar" => $this->request->getPost('bk_seminar'),
            "bk_praktikum" => $this->request->getPost('bk_praktikum'),
            "kredit_ke_jam" => $this->request->getPost('kredit_ke_jam'),
            "cp_pembelajaran" => $this->request->getPost('cp_pembelajaran'),
            "cp_sikap" => $this->request->getPost('cp_sikap'),
            "cp_pengetahuan" => $this->request->getPost('cp_pengetahuan'),
            "cp_keterampilan_umum" => $this->request->getPost('cp_keterampilan_umum'),
            "cp_keterampilan_khusus" => $this->request->getPost('cp_keterampilan_khusus'),
            "dokumen_pembelajaran" => $this->request->getPost('dokumen_pembelajaran'),
            "unit_penyelenggara" => $this->request->getPost('unit_penyelenggara'),
            
        ]);

        // Redirect ke halaman table5a
        return redirect()->to('table/table5a');
    }

    // Tampilkan form edit
    return view('edittable5a', $data);
}


		public function delete($no){
        $table5a = new DBtable5a();
        $table5a->delete($no);
        return redirect('table/table5a');
    }

    public function cari()
    {
        $table5a = new DBtable5a();
        $cariData = $this->request->getGet('search');

        $data['table5a'] = $table5a->cariData($cariData);

        return view('table5a', $data);
    }


}