<?php

namespace App\Models;

use CodeIgniter\Model;

class DBtable3b73 extends Model
{
    protected $table      = '3b73';
    protected $primaryKey = 'no';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['no','luaran_penelitian', 'tahun', 'keterangan'];


    public function cariData($cariData = null)
    {
        $builder = $this->db->table($this->table);

        if (!empty($cariData)) {

            $builder->like('search', $cariData);
        }

        return $builder->get()->getResultArray();
    }

}