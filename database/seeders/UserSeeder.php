<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'firstname' => 'seenzone',
                'lastname' => 'admin',
                'email' => 'seenzoneadmin@mail.com',
                'password' => Hash::make('d5em320'),
                'role_id' => 1,
                'contact_number' => ''
            ],

            [   
                'firstname' => 'brando',
                'lastname' => 'admin',
                'email' => 'brando@mail.com',
                'password' => Hash::make('1234'),
                'role_id' => 1,
                'contact_number' => ''
            ],

           
        ];
        DB::table('users')->insert($users);
    }
}
