<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KorelasiCplCpmk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'id_penyusun' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_matakuliah' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
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
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
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
