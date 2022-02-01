<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Telefonos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_telefono'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'nombre'=>[
                'type'=>'VARCHAR',
                'constraint'=>'30'
            ],
            'telefono'=>[
                'type'=>'VARCHAR',
                'constraint'=>'15'
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>2
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addKey('id_telefono',TRUE);
        $this->forge->createTable('telefonos');
    }

    public function down()
    {
        $this->forge->dropTable('telefonos');
    }
}
