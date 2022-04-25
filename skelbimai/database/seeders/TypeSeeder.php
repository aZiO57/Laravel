<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Coupe', 'Sedan', 'Cabriolete', 'Minivan', 'Hatchback', 'Vagon', 'SUV',];
        foreach ($types as $type) {
            DB::table('types')->insert([
                'name' => $type
            ]);
        }
    }
}
