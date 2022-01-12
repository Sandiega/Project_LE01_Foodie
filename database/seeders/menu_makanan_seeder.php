<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class menu_makanan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_makanan')->insert([

            'id' => 1,
            'nama_makanan' => 'ayam goreng',
            'harga' => '15000',
            'image' => 'images/ayamgoreng.jpg',

        ]);

        DB::table('menu_makanan')->insert([

            'id' => 2,
            'nama_makanan' => 'indomie goreng',
            'harga' => '5000',
            'image' => 'images/indomiegoreng.jpeg',
        ]);

        DB::table('menu_makanan')->insert([

            'id' => 3,
            'nama_makanan' => 'indomie kuah',
            'harga' => '6000',
            'image' => 'images/indomiekuah.jpg',
        ]);

        DB::table('menu_makanan')->insert([

            'id' => 4,
            'nama_makanan' => 'soto betawi',
            'harga' => '17000',
            'image' => 'images/sotobetawi.jpeg',
        ]);
    }
}
