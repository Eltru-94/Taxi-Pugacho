<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Libraries\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
       
        $model = model('users');
        $data = [
            'nombre' =>'Llacta',
            'apellido'=>'Torres',
            'cedula'=>'1003648936',
            'correo'=>'llactainn@gmail.com',
            'telefono'=>'0987654321',
            'clave'=>Hash::make('12345'),
            'fechanacimiento'=>'27/11/2021',
            'estado'=>1,
            'genero'=>'MASCULINO',
            'licencia'=>'TIPO C',
            'foto'=>'aaaaaaa',
            'direccion'=>'Ibarra y Calderon',
            
        ];
       
        $this->db->table('users')->insert($data);
        
    }
}