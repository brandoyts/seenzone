<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['name' => 'pending'],
            ['name' => 'ongoing'],
            ['name' => 'served'],
        ];

        DB::table('status')->insert($status);
    }
}
