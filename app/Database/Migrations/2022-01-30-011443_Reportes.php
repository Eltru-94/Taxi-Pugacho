<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reportes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_reporte' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => false,
                'auto_increment' => true
            ],
            'id_unitActiva' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'id_operador' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null'=>true
            ],
            'reporte' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null'=>true
            ],
            'estado' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addForeignKey('id_unitActiva','unidadesactivas','id_unitActiva');
        $this->forge->addKey('id_reporte', TRUE);
        $this->forge->createTable('reportes');
    }

    public function down()
    {
        $this->forge->dropTable('reportes');
    }
}
