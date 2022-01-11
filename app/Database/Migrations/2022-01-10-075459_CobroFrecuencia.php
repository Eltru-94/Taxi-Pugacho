<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CobroFrecuencia extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_frecuencia'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'id_user'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'id_cobrador'=>[
                'type'=>'INT',
                'constraint'=>3
            ],
            'valor'=>[
                'type'=>'VARCHAR',
                'constraint'=>6
            ],
            'fecha_emision'=>[
                'type'=>'DATETIME',
                'null'=>true
            ],
            'fecha_pago'=>[
                'type'=>'DATETIME',
                'null'=>true
            ],
            'estado_cobro'=>[
                'type'=>'INT',
                'constraint'=>3,
                'null'=>true
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>3
            ],
            ]);
        $this->forge->addForeignKey('id_user','users','id_user');
        $this->forge->addKey('id_frecuencia',TRUE);
        $this->forge->createTable('cobro_frecuencia');
    }

    public function down()
    {
        $this->forge->dropTable('cobro_frecuencia');
    }
}
