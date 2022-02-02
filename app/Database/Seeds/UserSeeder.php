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
            'nombre' =>'Edwin Geovanny',
            'apellido'=>'Valenzuela Miño',
            'cedula'=>'1004190136',
            'correo'=>'edwin@gmail.com',
            'telefono'=>'0961477086',
            'clave'=>Hash::make('12345'),
            'fechanacimiento'=>'27-11-1993',
            'estado'=>1,
            'genero'=>'Masculino',
            'licencia'=>'Tipo C',
            'foto'=>'aaaaaaa',
            'direccion'=>'Ibarra y Calderon',
        ], [
            'nombre' =>'Pamela Cinthia',
            'apellido'=>'Mendez Suarez',
            'cedula'=>'1003634134',
            'correo'=>'cinthia140926@hotmail.com',
            'telefono'=>'0987654321',
            'clave'=>Hash::make('12345'),
            'fechanacimiento'=>'08/05/1992 2:03:58',
            'estado'=>1,
            'genero'=>'Femenino',
            'licencia'=>'Tipo C',
            'foto'=>'aaaaaaa',
            'direccion'=>'Pugacgo Bajo 10 de Agosto',

        ],
            [
                'nombre' =>'Richard Edwin',
                'apellido'=>'Ibadango Galeano',
                'cedula'=>'1003500103',
                'correo'=>'richardibadango1987@gmail.com',
                'telefono'=>'0979757671',
                'clave'=>Hash::make('12345'),
                'fechanacimiento'=>'08/06/1995 2:03:58',
                'estado'=>1,
                'genero'=>'Masculino',
                'licencia'=>'Tipo C',
                'foto'=>'aaaaaaa',
                'direccion'=>'Otavalo Calle Bolivar',

            ]
        ];
        foreach($data as $dt){
            $this->db->table('users')->insert($dt);
        }

        
    }
}