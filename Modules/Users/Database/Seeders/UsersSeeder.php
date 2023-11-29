<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Users\Entities\Users;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'alvaro.adolfo',
                'password' => Hash::make('alvaro'),
                'status' => 2,
                'id_colaborator' => 2
            ]
        ];

        foreach($users as $user){
            Users::create($user);
        }
    }
}
