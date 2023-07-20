<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pasien extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pasien' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pasien' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',

            ],
            'no_identitas' => [
                'type' => 'VARCHAR',
                'constraint'     => '255',


            ],
            'jenkel' => [
                'type' => 'VARCHAR',
                'constraint'     => '255',


            ],
            'tgl_lahir' => [
                'type' => 'DATE',
                'constraint'     => '255',


            ],
            'umur' => [
                'type' => 'VARCHAR',
                'constraint'     => '255',


            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('id_pasien', true);
        $this->forge->createTable('pasien');
    }

    public function down()
    {
        $this->forge->dropTable('pasien');
    }
}
