<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Libraries\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
       

        $data = [
            [
            'nombre' =>'Edwin',
            'apellido'=>'Valenzuela',
            'cedula'=>'1003648936',
            'correo'=>'edwin@gmail.com',
            'telefono'=>'0987654321',
            'clave'=>Hash::make('12345'),
            'fechanacimiento'=>'27-11-1993',
            'estado'=>1,
            'genero'=>'MASCULINO',
            'licencia'=>'TIPO C',
            'foto'=>'aaaaaaa',
            'direccion'=>'Ibarra y Calderon',
        ], [
            'nombre' =>'Leonel Alexander',
            'apellido'=>'Alba Valenzuela',
            'cedula'=>'1003332101',
            'correo'=>'leonel@gmail.com',
            'telefono'=>'0987654321',
            'clave'=>Hash::make('12345'),
            'fechanacimiento'=>'08/05/1992 2:03:58',
            'estado'=>1,
            'genero'=>'MASCULINO',
            'licencia'=>'TIPO C',
            'foto'=>'aaaaaaa',
            'direccion'=>'Otavalo Calle Bolivar',

        ],
            [
                'nombre' =>'Edison Fabricio',
                'apellido'=>'Cañarejo',
                'cedula'=>'1003994512',
                'correo'=>'edison@gmail.com',
                'telefono'=>'0987654321',
                'clave'=>Hash::make('12345'),
                'fechanacimiento'=>'08/06/1995 2:03:58',
                'estado'=>1,
                'genero'=>'MASCULINO',
                'licencia'=>'TIPO C',
                'foto'=>'aaaaaaa',
                'direccion'=>'Otavalo Calle Bolivar',

            ]
        ];
        foreach($data as $dt){
            $this->db->table('users')->insert($dt);
        }

        
    }
}