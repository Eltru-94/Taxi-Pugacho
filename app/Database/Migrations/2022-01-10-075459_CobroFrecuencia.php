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
            'id_unitActiva'=>[
                'type'=>'INT',
                'constraint'=>3
            ],
            'valor'=>[
                'type'=>'VARCHAR',
                'constraint'=>6
            ],
            'mes'=>[
                'type'=>'INT',
                'constraint'=>11,
                'null'=>true
            ],
            'anio'=>[
                'type'=>'INT',
                'constraint'=>11,
                'null'=>true
            ],
            'dia'=>[
                'type'=>'INT',
                'constraint'=>11,
                'null'=>true
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>3
            ],
            ]);
        $this->forge->addForeignKey('id_user','users','id_user');
        $this->forge->addForeignKey('id_unitActiva','unidadesactivas','id_unitActiva');
        $this->forge->addKey('id_frecuencia',TRUE);
        $this->forge->createTable('frecuencia');
    }

    public function down()
    {
        $this->forge->dropTable('frecuencia');
    }
}
