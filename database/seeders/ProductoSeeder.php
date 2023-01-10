<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            ['titulo'=> 'Camiseta',
            'foto' => 'ghh',
            'descripcion' => 'Camiseta de Algodón 100% Blanca',
            'precio' => 9.99
            ],

            ['titulo'=> 'Camiseta',
            'foto' => 'gh',
            'descripcion' => 'Camiseta de Algodón 100% Negra',
            'precio' => 9.99        ],

            ['titulo'=> 'Pantalón',
            'foto' => 'grh',
            'descripcion' => 'Mon Jeans',
            'precio' => 29.99
            ],

            ['titulo'=> 'Gorro',
            'foto' => 'gh',
            'descripcion' => 'Gorro de Lana Verde',
            'precio' => 5.99
            ],

            ['titulo'=> 'Gorro',
            'foto' => 'gh',
            'descripcion' => 'Gorro de Lana Rojo',
            'precio' => 5.99
            ],

            ['titulo'=> 'Gorro',
            'foto' => 'gh',
            'descripcion' => 'Gorro de Lana Negro',
            'precio' => 5.99
            ],

        ]);
    }
}
