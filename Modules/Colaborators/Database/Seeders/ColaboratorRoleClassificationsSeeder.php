<?php

namespace Modules\Colaborators\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Colaborators\Entities\ColaboratorRoleClassification;

class ColaboratorRoleClassificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classifications = [
            ['name' => 'Chefia'],
            ['name' => 'Técnico']
        ];

        foreach($classifications as $classification){
            ColaboratorRoleClassification::create($classification);
        }
    }
}
