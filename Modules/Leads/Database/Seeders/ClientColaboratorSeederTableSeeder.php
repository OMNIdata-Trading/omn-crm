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
                'fullname' => 'Isaquias Marques',
                'email' => 'patisaquias2000@gmail.com',
                'id_client_company' => null,
                'first_purchase_year' => 2022,
                'status' => 2,
            ],
            [
                'fullname' => 'Alexandre da Silva',
                'email' => 'alexandre.dasilva20@test-gmail.com',
                'id_client_company' => null,
                'first_purchase_year' => date('Y'),
                'status' => 2,
            ],
            [
                'fullname' => 'Alexandre António',
                'email' => 'alexandre.antonio@test-gmail.com',
                'id_client_company' => null,
                'status' => 1,
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
