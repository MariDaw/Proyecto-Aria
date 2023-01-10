<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert([
            ['publicacion_id'=> 1,
            'prenda' => 'Camiseta',
            'url' => 'https://www.zara.com/es/'
            ],

            ['publicacion_id'=> 1,
            'prenda' => 'Pantalón',
            'url' => 'https://www.pullandbear.com/es/'
            ],

            ['publicacion_id'=> 1,
            'prenda' => 'Gorro',
            'url' => 'https://www.zara.com/es/'
            ],

            ['publicacion_id'=> 1,
            'prenda' => 'Zapatos',
            'url' => 'https://www.zara.com/es/'
            ],

        ]);
    }
}
