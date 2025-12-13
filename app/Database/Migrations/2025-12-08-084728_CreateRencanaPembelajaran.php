<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRencanaPembelajaran extends Migration
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
            'minggu_ke' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'sub_cpmk' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'penilaian_indikator' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'penilaian_teknik' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'bentuk_pembelajaran' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'materi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'bobot_penilaian' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
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
        $this->forge->createTable('rencana_pembelajaran');
    }

    public function down()
    {
        $this->forge->dropTable('rencana_pembelajaran');
    }
}
