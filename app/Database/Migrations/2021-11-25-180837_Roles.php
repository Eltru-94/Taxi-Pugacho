<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rol'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'rol'=>[
                'type'=>'VARCHAR',
                'constraint'=>'20'
            ],
            'descripcion'=>[
                'type'=>'VARCHAR',
                'constraint'=>'50'
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>2
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addKey('id_rol',TRUE);
        $this->forge->createTable('roles');
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
