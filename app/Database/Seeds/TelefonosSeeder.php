<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TelefonosSeeder extends Seeder
{
    public function run()
    {

        $data = [
            ['nombre' => 'Telefono Oficina','telefono'=>'0266872541','estado'=>1],
            ['nombre' => 'Telefono 1','telefono'=>'0987321456','estado'=>1],
            ['nombre' => 'Telefono 2','telefono'=>'0987654321','estado'=>1],
        ];
        foreach($data as $dt){
            $this->db->table('telefonos')->insert($dt);
        }   //
    }
}
