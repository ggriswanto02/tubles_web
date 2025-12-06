<?php

namespace App\Models;

use CodeIgniter\Model;

class DBtable5c extends Model
{
    protected $table      = '5c';
    protected $primaryKey = 'no';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['aspek','tk_sangat_baik', 'tk_baik','tk_cukup', 'tk_kurang','tindak_lanjut_upps'];

    public function cariData($cariData = null)
    {
        $builder = $this->db->table($this->table);

        if (!empty($cariData)) {

            $builder->like('search', $cariData);
        }

        return $builder->get()->getResultArray();
    }
}