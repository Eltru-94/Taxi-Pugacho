<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Funcionalidades extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_funcionalidad'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'funcionalidad'=>[
                'type'=>'VARCHAR',
                'constraint'=>'20'
            ],
            'descripcion'=>[
                'type'=>'VARCHAR',
                'constraint'=>'100'
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>2
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addKey('id_funcionalidad',TRUE);
        $this->forge->createTable('funcionalidades');
    }

    public function down()
    {
        $this->forge->dropTable('funcionalidades');
    }
}
