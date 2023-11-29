<?php

namespace Modules\Colaborators\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Colaborators\Entities\ColaboratorRoleHability;

class ColaboratorRoleHabilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $habilities = [
            [
                'name' => 'all_habilities',
                'can_see_business' => 1,
                'can_create_business' => 1,
                'can_edit_business' => 1,
                'can_delete_business' => 1,
                'can_see_leads' => 1,
                'can_create_leads' => 1,
                'can_edit_leads' => 1,
                'can_delete_leads' => 1,
                'can_see_users' => 1,
                'can_create_users' => 1,
                'can_edit_users' => 1,
                'can_delete_users' => 1,
                'can_see_colaborators' => 1,
                'can_create_colaborators' => 1,
                'can_edit_colaborators' => 1,
                'can_delete_colaborators' => 1,
                'can_see_files' => 1,
                'can_create_files' => 1,
                'can_edit_files' => 1,
                'can_delete_files' => 1
            ],
            [
                'name' => 'dve',
                'can_see_business' => 1,
                'can_create_business' => 1,
                'can_edit_business' => 1,
                'can_delete_business' => 1,
                'can_see_leads' => 1,
                'can_create_leads' => 1,
                'can_edit_leads' => 1,
                'can_delete_leads' => 1,
                'can_see_users' => 0,
                'can_create_users' => 0,
                'can_edit_users' => 0,
                'can_delete_users' => 0,
                'can_see_colaborators' => 0,
                'can_create_colaborators' => 0,
                'can_edit_colaborators' => 0,
                'can_delete_colaborators' => 0,
                'can_see_files' => 1,
                'can_create_files' => 1,
                'can_edit_files' => 1,
                'can_delete_files' => 1
            ],
            [
                'name' => 'marketing',
                'can_see_business' => 0,
                'can_create_business' => 0,
                'can_edit_business' => 0,
                'can_delete_business' => 0,
                'can_see_leads' => 1,
                'can_create_leads' => 1,
                'can_edit_leads' => 1,
                'can_delete_leads' => 1,
                'can_see_users' => 0,
                'can_create_users' => 0,
                'can_edit_users' => 0,
                'can_delete_users' => 0,
                'can_see_colaborators' => 0,
                'can_create_colaborators' => 0,
                'can_edit_colaborators' => 0,
                'can_delete_colaborators' => 0,
                'can_see_files' => 0,
                'can_create_files' => 0,
                'can_edit_files' => 0,
                'can_delete_files' => 0
            ],
            [
                'name' => 'management',
                'can_see_business' => 0,
                'can_create_business' => 0,
                'can_edit_business' => 0,
                'can_delete_business' => 0,
                'can_see_leads' => 0,
                'can_create_leads' => 0,
                'can_edit_leads' => 0,
                'can_delete_leads' => 0,
                'can_see_users' => 1,
                'can_create_users' => 1,
                'can_edit_users' => 1,
                'can_delete_users' => 1,
                'can_see_colaborators' => 1,
                'can_create_colaborators' => 1,
                'can_edit_colaborators' => 1,
                'can_delete_colaborators' => 1,
                'can_see_files' => 0,
                'can_create_files' => 0,
                'can_edit_files' => 0,
                'can_delete_files' => 0
            ],
        ];

        foreach($habilities as $hability){
            ColaboratorRoleHability::create($hability);
        }
    }
}
