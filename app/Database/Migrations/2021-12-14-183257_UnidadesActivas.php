<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UnidadesActivas extends Migration
{
    public function up()
    {
        /*$this->forge->addField([
            'id_unitActiva'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'id_vehiculo'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'horario'=>[
                'type'=>'INT',
                'constraint'=>3,
                'null'=>true
            ],
            'reporte'=>[
                'type'=>'INT',
                'constraint'=>3,
                'null'=>true
            ],
            'estado'=>[
                'type'=>'INT',
                'constraint'=>3
            ],
            'descripcion'=>[
                'type'=>'VARCHAR',
                'constraint'=>60,
                'null'=>true
            ],
            'carrera'=>[
                'type'=>'INT',
                'constraint'=>3,
                'null'=>true
            ],
            'created_at datetime default current_timestamp'

        ]);
        $this->forge->addForeignKey('id_vehiculo','vehiculo','id_vehiculo');
        $this->forge->addKey('id_unitActiva',TRUE);
        $this->forge->createTable('unidadesactivas');*/
    }

    public function down()
    {
        //$this->forge->dropTable('unidadesactivas');
    }
}
