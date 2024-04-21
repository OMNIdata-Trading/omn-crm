<?php

namespace Modules\Leads\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Leads\Entities\IndividualClient;

class IndividualClientSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $individualClients = [
            [
                'fullname' => 'Isaquias Marques',
                'email' => 'patisaquias2000@gmail.com',
                'first_purchase_year' => 2022,
                'status' => 2,
            ],
            [
                'fullname' => 'Alexandre da Silva',
                'email' => 'alexandre.dasilva20@test-gmail.com',
                'first_purchase_year' => date('Y'),
                'status' => 2,
            ],
            [
                'fullname' => 'Alexandre António',
                'email' => 'alexandre.antonio@test-gmail.com',
                'first_purchase_year' => null,
                'status' => 1,
            ]
        ];

        foreach($individualClients as $individualClient){
            IndividualClient::create($individualClient);
        }
    }
}
