<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        
        DB::table('users')->insert([
            [
                'name' => 'landlord',
                'email' => 'landlord@gmail.com',
                'password' => Hash::make('111'),
            ],
            [
                'name' => 'tenant',
                'email' => 'tenant@gmail.com',
                'password' => Hash::make('111'),
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('111'),
            ],

        ]);
        //
    }
}
