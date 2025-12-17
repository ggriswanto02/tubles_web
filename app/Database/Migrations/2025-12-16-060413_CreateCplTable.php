<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCplTable extends Migration
{
    public function up()
{
    if (!$this->db->tableExists('cpl')) {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'id_penyusun' => [
                'type' => 'INT',
            ],
            'id_matakuliah' => [
                'type' => 'INT',
            ],
            'cpl_prodi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('cpl');
    }
}

public function down()
{
    $this->forge->dropTable('cpl', true);
}

}
