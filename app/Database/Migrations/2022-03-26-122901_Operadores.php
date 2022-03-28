<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Operadores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_operador' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => false,
                'auto_increment' => true
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'horario' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'estado' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'horafin' => [
                'type' => 'DATETIME',
            ],
            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->addKey('id_operador', TRUE);
        $this->forge->createTable('operadores');
    }

    public function down()
    {
        $this->forge->dropTable('operadores');
    }
}
