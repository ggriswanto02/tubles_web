<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterRoleUser extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('users')) {

            $fields = [
                'role' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                    'default'    => 'staff',
                ],
            ];

            $this->forge->addColumn('users', $fields);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('role', 'users')) {
            $this->forge->dropColumn('users', 'role');
        }
    }
}
