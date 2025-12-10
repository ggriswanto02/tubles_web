<?php

namespace App\Models;

use CodeIgniter\Model;

class KorelasiCplCpmkModel extends Model
{
    protected $table = 'korelasi_cpl_cpmk';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_penyusun',
        'id_matakuliah',
        'sub_cpmk',
        'cpmk',
        'persentase',
        'bobot_penilaian'
    ];

    protected $useTimestamps = false;
}
