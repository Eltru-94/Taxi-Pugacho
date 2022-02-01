<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FuncionalidadesSeeder extends Seeder
{
    public function run()
    {
        

        $data = [
            ['funcionalidad' => 'Administrador','descripcion'=>'Administración de usuarios del sistema','estado'=>1,],
            ['funcionalidad' => 'Unidades','descripcion'=>'Administración de vehiculos del sistema','estado'=>1],
            ['funcionalidad' => 'Servicios','descripcion'=>'Gestión de los servicios de la cooperativa','estado'=>1],
            ['funcionalidad' => 'Geolocalización ','descripcion'=>'Ubicación de la unidad','estado'=>1],
            ['funcionalidad' => 'Caja','descripcion'=>'Cobro y detalles de frecuencia','estado'=>1],
            ['funcionalidad' => 'Perfil','descripcion'=>'Administrador del perfil','estado'=>1],
            ['funcionalidad' => 'Reportes','descripcion'=>'Reportes de frecuencia y asistenecia de horario','estado'=>1],
        ];
        foreach($data as $dt){
        $this->db->table('funcionalidades')->insert($dt);
        }
    }
}