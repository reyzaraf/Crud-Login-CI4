<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PreloveBook extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_prebook'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
            'judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'pengarang'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
            'harga'       => [
				'type'           => 'INTEGER',
				'constraint'     => '255',
			],
            'stok'       => [
				'type'           => 'INTEGER',
				'constraint'     => '255',
			],
            'image'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			]
            ]);
            $this->forge->addPrimaryKey('id_prebook');
		    $this->forge->createTable('prelovebook');
       
    }

    public function down()
    {
        //
        $this->forge->dropTable('prelovebook');
    }
}
