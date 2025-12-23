<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UserManagement extends BaseController
{
    public function index()
    {
        return view('user-management');
    }

    public function getData()
    {
        $model = new UsersModel();

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];

        // Total records
        $totalRecords = $model->countAll();

        // Filtering
        if (!empty($searchValue)) {
            $model->like('username', $searchValue)
                ->orLike('name', $searchValue);
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
        if (
            !$this->validate([
                'username' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'password' => 'required|min_length[4]|max_length[50]',
                'password_conf' => 'matches[password]',
                'name' => 'required|min_length[4]|max_length[100]',
                'role' => 'required|in_list[admin,manajer,staff]'
            ])
        ) {
            return redirect()->back()
                ->with('error', $this->validator->listErrors())
                ->withInput();
        }

        $model = new UsersModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role' => $this->request->getPost('role'),
        ];

        $model->insert($data);

        if ($model->db->affectedRows() > 0) {
            return redirect()->to('user-management')->with('success', 'User berhasil ditambahkan.');
        }

        return redirect()->back()->with('error', 'Gagal menambahkan user.');
    }

    public function getByUsername()
    {
        $username = $this->request->getGet('username');

        if (!$username) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Parameter username wajib ada'
            ]);
        }

        $model = new UsersModel();
        $data = $model->find($username);

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

    public function updateData()
    {

        $username = $this->request->getPost('username');
        if (!$username) {
            return redirect()->back()->with('error', 'Username tidak valid.');
        }

        $rules = [
            'name' => 'required|min_length[4]',
            'role' => 'required|in_list[admin,manajer,staff]',
        ];

        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[4]';
            $rules['password_conf'] = 'matches[password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', $this->validator->listErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'role' => $this->request->getPost('role'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash(
                $this->request->getPost('password'),
                PASSWORD_BCRYPT
            );
        }

        $model = new UsersModel();
        $model->where('username', $username)->update(null, $data);

        if ($model->db->affectedRows() > 0) {
            return redirect()->to('user-management')->with('success', 'User berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Tidak ada perubahan data.');
    }

    public function deleteData()
    {
        $username = $this->request->getPost('username');

        if (!$username) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Username tidak valid'
            ]);
        }

        $model = new UsersModel();
        $model->where('username', $username)->delete();

        if ($model->db->affectedRows() > 0) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Data User berhasil dihapus'
            ]);
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Gagal menghapus data User'
        ]);
    }



}
