<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Colaborators\Database\Seeders\ColaboratorsDatabaseSeeder;
use Modules\Leads\Database\Seeders\LeadsDatabaseSeeder;
use Modules\Requests\Database\Seeders\RequestsDatabaseSeeder;
use Modules\Users\Database\Seeders\UsersDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ColaboratorsDatabaseSeeder::class,
            UsersDatabaseSeeder::class,
            RequestsDatabaseSeeder::class,
            // LeadsDatabaseSeeder::class,
        ]);
    }
}
