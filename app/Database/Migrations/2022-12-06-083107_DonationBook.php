<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DonationBook extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_donasi'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
            'nama_donasi'       => [
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
            $this->forge->addPrimaryKey('id_donasi');
		    $this->forge->createTable('donasi');
       
    }

    public function down()
    {
        //
        $this->forge->dropTable('donasi');
    }
}
