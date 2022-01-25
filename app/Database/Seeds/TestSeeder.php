<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('RolesSeeder');
        $this->call('FuncionalidadesSeeder');
        $this->call('UserrolSeeder');
        $this->call('RolfuncionalidadSeeder');
        $this->call('ServicioSeeder');
        $this->call('TelefonosSeeder');
    }
}
