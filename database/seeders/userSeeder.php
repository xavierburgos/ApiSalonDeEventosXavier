<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate([
            'name'=>'Xavier Burgos',
            'email'=>'xaviadmin@gmail.com',
            'password'=> Hash::make('123') 
        ])->assignRole('admin');
        User::firstOrCreate([
            'name'=>'Edgar Galvan',
            'email'=>'edgaradmin@gmail.com',
            'password'=>Hash::make('321') 
        ])->assignRole('admin');
        User::firstOrCreate([
            'name'=>'Luis Josue Uscanga',
            'email'=>'ProfeNoNosRepruebe@gmail.com',
            'password'=> Hash::make('abc')
        ])->assignRole('admin');
    }   
}
