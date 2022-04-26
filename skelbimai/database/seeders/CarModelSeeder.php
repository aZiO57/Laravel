<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carModels = ['80', '90', '100', '200', 'A3', 'A4', 'A6', 'Q5', 'Q7', 'Q8', 'TT',];
        foreach ($carModels as $carModel) {
            DB::table('car_models')->insert([
                'name' => $carModel
            ]);
        }
    }
}
