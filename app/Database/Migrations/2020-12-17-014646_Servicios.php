<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Servicios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_servicio'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'servicio'=>[
                'type'=>'VARCHAR',
                'constraint'=>15
            ],
            'descripcion'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=>true,
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>3
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addKey('id_servicio',TRUE);
        $this->forge->createTable('servicios');
    }

    public function down()
    {
        $this->forge->dropTable('servicios');
    }
}
