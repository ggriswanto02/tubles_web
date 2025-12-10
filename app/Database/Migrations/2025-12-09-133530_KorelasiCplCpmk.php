<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KorelasiCplCpmk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_penyusun' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_matakuliah' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'sub_cpmk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'cpmk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'persentase' => [
                'type' => 'FLOAT',
            ],
            'bobot_penilaian' => [
                'type' => 'FLOAT',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('korelasi_cpl_cpmk');
    }

    public function down()
    {
        $this->forge->dropTable('korelasi_cpl_cpmk');
    }
}
