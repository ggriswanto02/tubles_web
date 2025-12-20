<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiMhsPertemuan extends Migration
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
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_rencana_pembelajaran' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'nilai_kompetensi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->createTable('nilai_mhs_pertemuan');
    }

    public function down()
    {
        $this->forge->dropTable('nilai_mhs_pertemuan');
    }
}
