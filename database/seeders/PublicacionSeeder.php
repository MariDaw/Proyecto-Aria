<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publicacions')->insert([
            ['nombre'=> 'Kendall',
            'descripcion' => 'Milan Runaway',
            'foto' => 'fg',
            'famoso_id' => 1
            ],

            ['nombre'=> 'Bella',
            'descripcion' => 'Fashion Week',
            'foto' => 'fgg',
            'famoso_id' => 2        ],

            ['nombre'=> 'Gigi',
            'descripcion' => 'Paris Runaway',
            'foto' => 'gg',
            'famoso_id' => 3
            ],

            ['nombre'=> 'Rosalía',
            'descripcion' => 'Music Awards',
            'foto' => 'ggh',
            'famoso_id' => 4
            ],

        ]);
    }
}
