<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carreras extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_carrera' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => false,
                'auto_increment' => true
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'direccion_origen' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'direccion_destino' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'telefono_persona' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'id_servicio' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'id_unitActiva' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'estado' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'carrera' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'dateInicio' => [
                'type' => 'DATETIME',
                'null'=>true
            ],
            'dateFin' => [
                'type' => 'DATETIME',
                'null'=>true
            ],
        ]);
        $this->forge->addForeignKey('id_servicio','servicios','id_servicio');
        $this->forge->addForeignKey('id_unitActiva','UnidadesActivas','id_unitActiva');
        $this->forge->addKey('id_carrera', TRUE);
        $this->forge->createTable('carreras');
    }

    public function down()
    {
        $this->forge->dropTable('carreras');
    }
}
