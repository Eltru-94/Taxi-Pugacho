<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vehiculo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_vehiculo'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'placa'=>[
                'type'=>'VARCHAR',
                'constraint'=>15
            ],
            'fechafabricacion'=>[
                'type'=>'YEAR'
            ],
            'marca'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'modelo'=>[
                'type'=>'VARCHAR',
                'constraint'=>30
            ],
            'imagen1'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'imagen2'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'imagen3'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'id_user'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'estado'=>[
                'type'=>'VARCHAR',
                'constraint'=>11
            ],
            'unidad'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'color'=>[
                'type'=>'VARCHAR',
                'constraint'=>15
            ],
            'pago'=>[
                'type'=>'INT',
                'constraint'=>3,
                'null'=>true
            ],
            'created_at datetime default current_timestamp'

        ]);
        $this->forge->addForeignKey('id_user','users','id_user');
        $this->forge->addKey('id_vehiculo',TRUE);
        $this->forge->createTable('vehiculo');
    }

    public function down()
    {
        $this->forge->dropTable('vehiculo');
    }
}
