<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Task extends Migration
{
    public function up()
    {
       /* $this->forge->addField([
            'id_task'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'task'=>[
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
            'id_user'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addForeignKey('id_user','users','id_user');
        $this->forge->addKey('id_task',TRUE);
        $this->forge->createTable('tasks');*/
    }

    public function down()
    {
        //$this->forge->dropTable('tasks');
    }
}
