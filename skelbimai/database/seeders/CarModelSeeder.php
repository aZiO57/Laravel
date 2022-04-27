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
        $carModels = ['A4', 'TT', 'Q7', '320', '530', 'X1',];
        foreach ($carModels as $carModel) {
            DB::table('car_models')->insert([
                'name' => $carModel,
                'manufacturer_id' => 1
            ]);
        }
    }
}
