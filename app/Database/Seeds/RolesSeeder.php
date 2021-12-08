<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $model = model('roles');
        $data = [
            ['rol' => 'Administrador','descripcion'=>'asdsadsad','estado'=>1,],
            ['rol' => 'Operador','descripcion'=>'asdsadsad','estado'=>1],
            ['rol' => 'Chofer','descripcion'=>'asdsadsad','estado'=>1],
        ];
        foreach($data as $dt){
        $this->db->table('roles')->insert($dt);
        }
    }
}
