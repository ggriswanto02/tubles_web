<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiMhsPertemuanModel extends Model

{
    protected $table = 'nilai_mhs_pertemuan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nim',
        'id_rencana_pembelajaran',
        'nilai_kompetensi',
        'status',
        'keterangan',
        
    ];

    protected $useTimestamps = false;
}
