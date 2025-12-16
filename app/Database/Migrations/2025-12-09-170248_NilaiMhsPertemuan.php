<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiMhsPertemuan extends Migration
{
    public function up()
   {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_rencana_pembelajaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            
            'nilai_kompetensi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]
            
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('nilai_mhs_pertemuan');
    }

    public function down()
   {
        $this->forge->dropTable('nilai_mhs_pertemuan');
    }
}
