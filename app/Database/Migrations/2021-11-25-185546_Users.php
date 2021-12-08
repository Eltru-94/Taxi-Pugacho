<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'nombre'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'apellido'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'cedula'=>[
                'type'=>'VARCHAR',
                'constraint'=>15
            ],
            'correo'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'telefono'=>[
                'type'=>'VARCHAR',
                'constraint'=>11
            ],
            'clave'=>[
                'type'=>'VARCHAR',
                'constraint'=>60
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>2
            ],
            'fechanacimiento'=>[
                'type'=>'DATE'
            ],
            'genero'=>[
                'type'=>'VARCHAR',
                'constraint'=>10
            ],
            'licencia'=>[
                'type'=>'VARCHAR',
                'constraint'=>20
            ],
            'foto'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'direccion'=>[
                'type'=>'VARCHAR',
                'constraint'=>60
            ],
            'created_at datetime default current_timestamp'
        ]);
        
        $this->forge->addKey('id_user',TRUE);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
