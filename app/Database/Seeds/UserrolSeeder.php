<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserrolSeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'id_user' => 1,
                'id_rol'=>1,
                'estado'=>1,
             ],
            [
                'id_user' => 2,
                'id_rol'=>2,
                'estado'=>1,
            ],
            [
                'id_user' => 3,
                'id_rol'=>3,
                'estado'=>1,
            ]
        ];
        foreach($data as $dt){

            $this->db->table('userrol')->insert($dt);
        }


        
    }
}
