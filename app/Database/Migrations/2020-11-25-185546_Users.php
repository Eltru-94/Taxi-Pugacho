<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => false,
                'auto_increment' => true
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'apellido' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'cedula' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null'=>true
            ],
            'correo' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'null'=>true
            ],
            'clave' => [
                'type' => 'VARCHAR',
                'constraint' => 60
            ],
            'estado' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'fechanacimiento' => [
                'type' => 'DATE',
                'null'=>true
            ],
            'genero' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null'=>true
            ],
            'licencia' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null'=>true
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null'=>true
            ],
            'direccion' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
                'null'=>true
            ],
            'created_at datetime default current_timestamp'
        ]);

        $this->forge->addKey('id_user', TRUE);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
