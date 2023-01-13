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
            ['titulo'=> 'Kendall',
            'descripcion' => 'Milan Runaway',
            'foto' => 'fg',
            'famoso_id' => 1
            ],

            ['titulo'=> 'Bella',
            'descripcion' => 'Fashion Week',
            'foto' => 'fgg',
            'famoso_id' => 2        ],

            ['titulo'=> 'Gigi',
            'descripcion' => 'Paris Runaway',
            'foto' => 'gg',
            'famoso_id' => 3
            ],

            ['titulo'=> 'Rosalía',
            'descripcion' => 'Music Awards',
            'foto' => 'ggh',
            'famoso_id' => 4
            ],

        ]);
    }
}
