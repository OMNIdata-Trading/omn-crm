<?php

namespace Modules\Colaborators\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Colaborators\Entities\ColaboratorRole;

class ColaboratorRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Director de Negócios e Marketing',
                'id_role_classification' => 1
            ],
            [
                'name' => 'Chefe de Departamento de Vendas Enterprise',
                'id_role_classification' => 1
            ],
            [
                'name' => 'Chefe de Secção de Vendas Enterprise',
                'id_role_classification' => 1
            ],
            [
                'name' => 'Coordenador de Vendas Enterprise',
                'id_role_classification' => 1
            ],
            [
                'name' => 'Técnico de Vendas Enterprise',
                'id_role_classification' => 2
            ],
            [
                'name' => 'Técnico de Pré-Vendas Enterprise',
                'id_role_classification' => 2
            ],
        ];

        foreach($roles as $role){
            ColaboratorRole::create($role);
        }
        
    }
}
