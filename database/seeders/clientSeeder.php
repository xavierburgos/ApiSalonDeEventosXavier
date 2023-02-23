<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\clients;

class clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        clients::firstOrCreate([
            'name'=>'Juan',
            'lastname'=>'Lopez',
            'age'=>'26',
            'email'=>'Jlopez@gmail.com',
            'tel'=>'664152'
        ]);
        clients::firstOrCreate([
            'name'=>'Ana',
            'lastname'=>'Montero',
            'age'=>'33',
            'email'=>'AMont@gmail.com',
            'tel'=>'664448'
        ]);
        clients::firstOrCreate([
            'name'=>'Maria',
            'lastname'=>'Gonzalez',
            'age'=>'36',
            'email'=>'MaGlz@gmail.com',
            'tel'=>'664111'
        ]);
        clients::firstOrCreate([
            'name'=>'Mario',
            'lastname'=>'Gutierrez',
            'age'=>'45',
            'email'=>'GutM@gmail.com',
            'tel'=>'664956'
        ]);
        clients::firstOrCreate([
            'name'=>'Francisco',
            'lastname'=>'Sanchez',
            'age'=>'20',
            'email'=>'FcoS@gmail.com',
            'tel'=>'664856'
        ]);
    }


}
