<?php

namespace Modules\Leads\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Leads\Entities\ClientColaboratorRequester;

class ClientColaboratorSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientCompanyColaborators = [
            [
                'fullname' => 'Priscila Oliveira',
                'email' => 'priscila.oliveira@unitel.co.ao',
                'id_client_company' => 1
            ],
            [
                'fullname' => 'Glória Sanchez',
                'email' => 'gloria.sanchez@unitel.co.ao',
                'id_client_company' => 1
            ],
            [
                'fullname' => 'Sebastião José',
                'email' => 'sebastiao.jose@multitel.co.ao',
                'id_client_company' => 2
            ],
            [
                'fullname' => 'Carlos Ribeiro',
                'email' => 'carlos.ribeiro@sonangol.ao',
                'id_client_company' => 3
            ]
        ];

        foreach($clientCompanyColaborators as $clientCompanyColab){
            ClientColaboratorRequester::create($clientCompanyColab);
        }
    }
}
