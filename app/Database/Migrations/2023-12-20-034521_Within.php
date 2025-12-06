<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Within extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'director' => [
                'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
            ],
            'shoulder'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 15,
				'default'        => null,
                'null'           => true,
			],
            'successful'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 15,
				'default'        => null,
                'null'           => true,
			],
            'use'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 15,
				'default'        => null,
                'null'           => true,
			],
            'participant'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 10,
				'default'        => null,
                'null'           => true,
			],
            'strong'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 5,
				'default'        => null,
                'null'           => true,
			],
            'protect'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 15,
				'default'        => null,
                'null'           => true,
			],
            'cause'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 20,
				'default'        => null,
                'null'           => true,
			],
            'record'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 10,
				'default'        => null,
                'null'           => true,
			],
            'policy'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 5,
				'default'        => null,
                'null'           => true,
			],
            'center'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 5,
				'default'        => null,
                'null'           => true,
			],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('director',TRUE);
        $this->forge->createTable('within',TRUE);

    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
