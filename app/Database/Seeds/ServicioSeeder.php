<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServicioSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['servicio' => 'Encomienda','descripcion'=>'El usuario solicita un mandado','estado'=>1,],
            ['servicio' => 'Base','descripcion'=>'El pasajero llama a la base central','estado'=>1],
            ['servicio' => 'Turismo','descripcion'=>'Fuera de la ciudad','estado'=>1],
        ];
        foreach($data as $dt){
            $this->db->table('servicios')->insert($dt);
        }
    }
}
