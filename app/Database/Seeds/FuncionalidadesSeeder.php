<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FuncionalidadesSeeder extends Seeder
{
    public function run()
    {
        
        $model = model('funcionalidades');
        $data = [
            ['funcionalidad' => 'Administrador','descripcion'=>'asdsadsad','estado'=>1,],
            ['funcionalidad' => 'Unidades','descripcion'=>'asdsadsad','estado'=>1],
            ['funcionalidad' => 'Caja','descripcion'=>'asdsadsad','estado'=>1],
            ['funcionalidad' => 'Servicios','descripcion'=>'asdsadsad','estado'=>1],
            ['funcionalidad' => 'Geocalizacion','descripcion'=>'asdsadsad','estado'=>1],
        ];
        foreach($data as $dt){
        $this->db->table('funcionalidades')->insert($dt);
        }
    }
}