<?php

namespace Modules\Leads\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Leads\Entities\ClientCompany;

class ClientCompanySeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientCompanies = [
            [
                'name' => 'Unitel',
                'logo_path' => 'dist/img/clients/unitel.png',
                'first_purchase_year' => '2015',
                'status' => 2
            ],
            [
                'name' => 'Multitel',
                'logo_path' => 'dist/img/clients/multitel.jpeg',
                'first_purchase_year' => '2020',
                'status' => 2
            ],
            [
                'name' => 'MSTelcom',
                'first_purchase_year' => date('Y'),
                'status' => 2
            ],
            [
                'name' => 'Angola Telecom',
                'first_purchase_year' => null,
                'status' => 1
            ],
        ];

        foreach($clientCompanies as $clientCompany){
            ClientCompany::create($clientCompany);
        }
    }
}
