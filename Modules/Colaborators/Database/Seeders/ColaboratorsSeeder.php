<?php

namespace Modules\Colaborators\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Colaborators\Entities\Colaborator;

class ColaboratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colaborators = [
            [
                'fullname' => 'Nilton Teixeira',
                'email' => 'nilton.teixeira@omnidata.co.ao',
                'colaborator_number' => 71,
                'phone_number1' => null,
                'phone_number2' => null,
                'id_colaborator_role' => 1
            ],
            [
                'fullname' => 'Álvaro Adolfo',
                'email' => 'alvaro.adolfo@omnidata.co.ao',
                'colaborator_number' => 132,
                'phone_number1' => null,
                'phone_number2' => null,
                'id_colaborator_role' => 4
            ],
            [
                'fullname' => 'Miguel Barros',
                'email' => 'miguel.barros@omnidata.co.ao',
                'colaborator_number' => 82,
                'phone_number1' => null,
                'phone_number2' => null,
                'id_colaborator_role' => 5
            ],
            [
                'fullname' => 'Sebastião Pedro',
                'email' => 'sebastiao.pedro@omnidata.co.ao',
                'colaborator_number' => 49,
                'phone_number1' => null,
                'phone_number2' => null,
                'id_colaborator_role' => 5
            ]
        ];

        foreach($colaborators as $colaborator){
            Colaborator::create($colaborator);
        }
    }
}
