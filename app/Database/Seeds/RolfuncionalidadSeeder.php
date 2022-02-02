<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolfuncionalidadSeeder extends Seeder
{
    public function run()
    {

        $data = [
            ['id_rol' => 1,'id_funcionalidad'=>1,'estado'=>1,],
            ['id_rol' => 1,'id_funcionalidad'=>2,'estado'=>1,],
            ['id_rol' => 1,'id_funcionalidad'=>3,'estado'=>1,],
            ['id_rol' => 1,'id_funcionalidad'=>4,'estado'=>1,],
            ['id_rol' => 1,'id_funcionalidad'=>5,'estado'=>1,],
            ['id_rol' => 1,'id_funcionalidad'=>7,'estado'=>1,],
            ['id_rol' => 2,'id_funcionalidad'=>2,'estado'=>1,],
            ['id_rol' => 2,'id_funcionalidad'=>3,'estado'=>1,],
            ['id_rol' => 2,'id_funcionalidad'=>4,'estado'=>1,],
            ['id_rol' => 2,'id_funcionalidad'=>5,'estado'=>1,],
            ['id_rol' => 2,'id_funcionalidad'=>7,'estado'=>1,],
            ['id_rol' => 3,'id_funcionalidad'=>6,'estado'=>1,],
        ];
        foreach($data as $dt){
        $this->db->table('rolfuncionalidad')->insert($dt);
        }
    }
}
