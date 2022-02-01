<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Userrol extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_userRol'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'id_user'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'id_rol'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addForeignKey('id_user','users','id_user');

        $this->forge->addForeignKey('id_rol','roles','id_rol');

        $this->forge->addKey('id_userRol',TRUE);
        $this->forge->createTable('userrol');
       
    }

    public function down()
    {
        $this->forge->dropTable('userrol');
    }
}