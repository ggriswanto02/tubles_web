<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RencanaPembelajaranSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_penyusun'          => 1,
                'id_matakuliah'        => 12,
                'minggu_ke'            => 1,
                'sub_cpmk'             => 'memahami tentang',
                'penilaian_indikator'  => 'mampu menjawab pertanyaan',
                'penilaian_teknik'     => 'pengamatan',
                'bentuk_pembelajaran'  => 'luring',
                'materi'               => null,
                'bobot_penilaian'      => null,
                'catatan'              => null,
            ],
            [
                'id_penyusun'          => 1,
                'id_matakuliah'        => 12,
                'minggu_ke'            => 2,
                'sub_cpmk'             => 'memahami tentang',
                'penilaian_indikator'  => 'mampu menjawab pertanyaan',
                'penilaian_teknik'     => 'pengamatan',
                'bentuk_pembelajaran'  => 'daring',
                'materi'               => null,
                'bobot_penilaian'      => null,
                'catatan'              => null,
            ],
            [
                'id_penyusun'          => 1,
                'id_matakuliah'        => 12,
                'minggu_ke'            => 3,
                'sub_cpmk'             => 'memahami tentang',
                'penilaian_indikator'  => 'mampu menjawab pertanyaan',
                'penilaian_teknik'     => 'pengamatan',
                'bentuk_pembelajaran'  => 'daring',
                'materi'               => null,
                'bobot_penilaian'      => null,
                'catatan'              => null,
            ],
        ];

        $this->db->table('rencana_pembelajaran')->insertBatch($data);
    }
}
