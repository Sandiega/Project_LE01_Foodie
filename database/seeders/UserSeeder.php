<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'id' => 1,
            'name' => 'Admin',
            'age' => 22,
            'alamat' => 'jln.company123',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'level' =>1,
        ]);
    }
}
