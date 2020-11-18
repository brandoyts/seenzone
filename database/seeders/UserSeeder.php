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
                'firstname' => 'brando',
                'lastname' => 'endona',
                'email' => 'brando@mail.com',
                'password' => Hash::make('1234'),
                'role_id' => 1,
                'contact_number' => '123456789012'
            ],

            [
                'firstname' => 'jdc',
                'lastname' => 'test',
                'email' => 'jdc@mail.com',
                'password' => Hash::make('1234'),
                'role_id' => 2,
                'contact_number' => '555666123412'
            ],
        ];
        DB::table('users')->insert($users);
    }
}
