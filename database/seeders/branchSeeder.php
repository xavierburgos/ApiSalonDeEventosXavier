<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\branches;

class branchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        branches::firstOrCreate([
            'name'=>'Salon Morado',
            'address'=>'C. 26, Col 2000'
        ]);
        branches::firstOrCreate([
            'name'=>'Salon Azul',
            'address'=>'C. 25, Col 2030'
        ]);
        branches::firstOrCreate([
            'name'=>'Salon Amarillo',
            'address'=>'C. 30, Col 2023'
        ]);
        branches::firstOrCreate([
            'name'=>'Salon Verde',
            'address'=>'C. 85, Col 2019'
        ]);
        branches::firstOrCreate([
            'name'=>'Salon Rojo',
            'address'=>'C. 44, Col 2002'
        ]);
        branches::firstOrCreate([
            'name'=>'Salon Naranja',
            'address'=>'C. 122, Col 2005'
        ]);
    }
}
