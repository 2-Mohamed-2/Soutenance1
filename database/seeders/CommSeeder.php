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
          'libelle' => 'commissariat_1',
          'sigle' => 'comm_1',
          'telephone' => '01 01 01 01',
          'localite' => 'lieu_1',
          'created_at' =>now(),
          'updated_at' =>now(),
        ],
        [
          'libelle' => 'commissariat_2',
          'sigle' => 'comm_2',
          'telephone' => '01 01 01 01',
          'localite' => 'lieu_2',
          'created_at' =>now(),
          'updated_at' =>now(),
        ],
        [
          'libelle' => 'commissariat_3',
          'sigle' => 'comm_3',
          'telephone' => '01 01 01 01',
          'localite' => 'lieu_3',
          'created_at' =>now(),
          'updated_at' =>now(),
        ]
      ]);
    }
}
