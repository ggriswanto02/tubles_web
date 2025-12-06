<?php

namespace App\Models;

use CodeIgniter\Model;

class DBtable5b extends Model
{
    protected $table      = '5b';
    protected $primaryKey = 'no';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['no','judul_penelitian', 'nama_dosen', 'mata_kuliah', 'bentuk_integrasi', 'tahun',];

    public function cariData($cariData = null)
    {
        $builder = $this->db->table($this->table);

        if (!empty($cariData)) {

            $builder->like('search', $cariData);
        }

        return $builder->get()->getResultArray();
    }
}