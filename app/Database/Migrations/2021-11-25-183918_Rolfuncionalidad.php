<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rolfuncionalidad extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rolfuncional'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'id_rol'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'id_funcionalidad'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>3
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addForeignKey('id_funcionalidad','funcionalidades','id_funcionalidad');
        $this->forge->addForeignKey('id_rol','roles','id_rol');
        $this->forge->addKey('id_rolfuncional',TRUE);
        $this->forge->createTable('rolfuncionalidad');
    }

    public function down()
    {
        $this->forge->dropTable('rolfuncionalidad');
    }
}