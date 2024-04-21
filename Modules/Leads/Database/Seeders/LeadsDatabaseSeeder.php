<?php

namespace Modules\Leads\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Leads\Entities\ClientColaboratorRequester;

class LeadsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClientCompanySeederTableSeeder::class,
            ClientColaboratorSeederTableSeeder::class,
            IndividualClientSeederTableSeeder::class
        ]);
    }
}
