<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserrolSeeder extends Seeder
{
    public function run()
    {

        $data = [
            'id_user' => 1,
            'id_rol'=>1,
            'estado'=>1,
           
        ];
        
        $this->db->table('userrol')->insert($data);
        
    }
}
