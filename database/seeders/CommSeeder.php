<?php

namespace Database\Seeders;

use App\Models\Commissariat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('commissariats')->insert([
        [
          'libelle' => 'Commissariat de Bamako-Coura',
          'sigle' => '1er_Arrd',
          'telephone' => '01 01 01 01',
          'localite' => 'Bamako-Coura',
          'created_at' =>now(),
          'updated_at' =>now(),
        ],
        [
          'libelle' => 'Commissariat de lafiabougou',
          'sigle' => '2e_Arrd',
          'telephone' => '01 02 01 01',
          'localite' => 'Lafiabougou',
          'created_at' =>now(),
          'updated_at' =>now(),
        ],
        [
          'libelle' => 'Commissariat de Sebenicoro',
          'sigle' => '3e_Arrd',
          'telephone' => '01 03 01 01',
          'localite' => 'Sebenikoro',
          'created_at' =>now(),
          'updated_at' =>now(),
        ]
      ]);
    }
}
