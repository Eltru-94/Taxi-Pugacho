<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {

        $data = [
            ['rol' => 'Administrador','descripcion'=>'Admin, Unidades, Caja, Servicios, Geolocalización','estado'=>1,],
            ['rol' => 'Operador','descripcion'=>'Unidades, Caja, Servicios','estado'=>1],
            ['rol' => 'Chofer','descripcion'=>'Propietietario unidad','estado'=>1],
        ];
        foreach($data as $dt){
        $this->db->table('roles')->insert($dt);
        }
    }
}
