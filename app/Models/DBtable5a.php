<?php

namespace App\Models;

use CodeIgniter\Model;

class DBtable5a extends Model
{
    protected $table      = '5a';
    protected $primaryKey = 'no';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['no',
    'semester', 
    'kode_matkul',
     'nama_matkul', 
      'bk_responsi',
      'bk_seminar',
      'bk_praktikum', 
      'kredit_ke_jam',
       'cp_sikap', 
      'cp_pengetahuan',
       'cp_keterampilan_umum',
       'cp_keterampilan_khusus',
       'dokumen_pembelajaran',
        'unit_penyelenggara'];

    public function cariData($cariData = null)
    {
        $builder = $this->db->table($this->table);

        if (!empty($cariData)) {

            $builder->like('search', $cariData);
        }

        return $builder->get()->getResultArray();
    }
}