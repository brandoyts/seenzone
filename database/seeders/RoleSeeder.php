<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $roles = [
            [
                'id' => 1,
                'role' => 'admin',
            ],

            [
                'id' => 2,
                'role' => 'client',
            ],
        ];


        DB::table('roles')->insert($roles);
    }
}
