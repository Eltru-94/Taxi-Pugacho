<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carreras extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_carrera' => [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>false,
                'auto_increment'=>true
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'=>true
            ],
            'direccion_origen' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null'=>true
            ],
            'direccion_destino' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null'=>true
            ],
            'telefono_cliente' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null'=>true
            ],
            'id_servicio' => [
                'type' => 'INT',
                'constraint' => 11,
                'null'=>true
            ],'id_telefono' => [
                'type' => 'INT',
                'constraint' => 11,
                'null'=>true
            ],
            'id_unitActiva' => [
                'type' => 'INT',
                'constraint' => 11,
                'null'=>true
            ],
            'estado' => [
                'type' => 'INT',
                'constraint' => 3,
                'null'=>true
            ],
            'carrera' => [
                'type' => 'INT',
                'constraint' => 3,
                'null'=>true
            ],
            'qualify' => [
                'type' => 'INT',
                'constraint' => 3,
                'null'=>true
            ],
            'dateInicio' => [
                'type' => 'DATETIME',
                'null'=>true
            ],
            'dateFin' => [
                'type' => 'DATETIME',
                'null'=>true
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addForeignKey('id_servicio','servicios','id_servicio');
        $this->forge->addForeignKey('id_telefono','telefonos','id_telefono');
        $this->forge->addForeignKey('id_unitActiva','unidadesactivas','id_unitActiva');
        $this->forge->addKey('id_carrera', TRUE);
        $this->forge->createTable('carreras');
    }

    public function down()
    {
        $this->forge->dropTable('carreras');
    }
}
