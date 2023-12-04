<?php

namespace Modules\Requests\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Requests\Entities\RequestIncomeMethod;

class RequestIncomeMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incomeMethods = [
            [ 'name' => 'Email' ],
            [ 'name' => 'Mensagem de Texto' ],
            [ 'name' => 'Whatsapp' ],
            [ 'name' => 'Instagram' ],
            [ 'name' => 'Facebook' ],
            [ 'name' => 'Outros' ],
        ];
        
        foreach($incomeMethods as $method){
            RequestIncomeMethod::create($method);
        };
    }
}
