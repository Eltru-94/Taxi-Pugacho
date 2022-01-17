<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agenda extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_agenda'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'nombre'=>[
                'type'=>'VARCHAR',
                'constraint'=>'20'
            ],
            'telefono'=>[
                'type'=>'VARCHAR',
                'constraint'=>'12'
            ],
            'direccion'=>[
                'type'=>'VARCHAR',
                'constraint'=>'50'
            ],
            'id_user'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>2
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addForeignKey('id_user','users','id_user');
        $this->forge->addKey('id_agenda',TRUE);
        $this->forge->createTable('agenda');
    }

    public function down()
    {
        $this->forge->dropTable('agenda');
    }
}
