<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{

    

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'service' => 'Periodic Maintenance',
                'cost' => 0
            ],

            [
                'service' => 'Change Oil',
                'cost' => 0
            ],

            [
                'service' => 'Brakes',
                'cost' => 0
            ],

            [
                'service' => 'Throttle Body Cleaning',
                'cost' => 0
            ],

            [
                'service' => 'Tune Up',
                'cost' => 0
            ],

            [
                'service' => 'Diagnostic Scanning',
                'cost' => 0
            ],

            [
                'service' => 'Parts',
                'cost' => 0
            ],
        ];
       

        DB::table('services')->insert($services);
    }

   
}
