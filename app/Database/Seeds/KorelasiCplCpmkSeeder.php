<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KorelasiCplCpmkSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_penyusun'     => '123',
                'id_matakuliah'   => 'MK001',
                'sub_cpmk'        => 'Sub CPMK 1',
                'cpmk'            => 'CPMK 1',
                'persentase'      => 20,
                'bobot_penilaian' => 10,
            ],
            [
                'id_penyusun'     => '124',
                'id_matakuliah'   => 'MK002',
                'sub_cpmk'        => 'Sub CPMK 2',
                'cpmk'            => 'CPMK 2',
                'persentase'      => 30,
                'bobot_penilaian' => 20,
            ],
        ];

        // insert batch
        $this->db->table('korelasi_cpl_cpmk')->insertBatch($data);
    }
}
