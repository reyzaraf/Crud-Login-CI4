<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaurUlang extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_daur_ulang'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
            'batch'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
            'keterangan'       => [
				'type'           => 'VARCHAR',
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
            $this->forge->addPrimaryKey('id_daur_ulang');
		    $this->forge->createTable('daur_ulang');
       
    }

    public function down()
    {
        //
        $this->forge->dropTable('daur_ulang');
    }
}
