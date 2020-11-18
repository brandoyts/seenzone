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
                'cost' => 6700
            ],

            [
                'service' => 'Change Oil',
                'cost' => 12300
            ],

            [
                'service' => 'Brakes',
                'cost' => 1600
            ],

            [
                'service' => 'Throttle Body Cleaning',
                'cost' => 4000
            ],

            [
                'service' => 'Tune Up',
                'cost' => 700
            ],

            [
                'service' => 'Diagnostic Scanning',
                'cost' => 700
            ],

            [
                'service' => 'Parts',
                'cost' => 700
            ],
        ];
       

        DB::table('services')->insert($services);
    }

   
}
