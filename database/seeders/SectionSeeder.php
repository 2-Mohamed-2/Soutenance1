<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sections')->insert([
        [
          'libelle' => 'section_1',
          'sigle' => 'sect_1',
          'fonction' => 'sect_1_fonction',
          'created_at' =>now(),
          'updated_at' =>now(),
        ],
        [
          'libelle' => 'section_2',
          'sigle' => 'sect_2',
          'fonction' => 'sect_2_fonction',
          'created_at' =>now(),
          'updated_at' =>now(),
        ],
        [
          'libelle' => 'section_2',
          'sigle' => 'sect_2',
          'fonction' => 'sect_2_fonction',
          'created_at' =>now(),
          'updated_at' =>now(),
        ],
        [
          'libelle' => 'section_3',
          'sigle' => 'sect_3',
          'fonction' => 'sect_3_fonction',
          'created_at' =>now(),
          'updated_at' =>now(),
        ],
        [
          'libelle' => 'section_4',
          'sigle' => 'sect_4',
          'fonction' => 'sect_4_fonction',
          'created_at' =>now(),
          'updated_at' =>now(),
        ]
      ]);
    }
}
