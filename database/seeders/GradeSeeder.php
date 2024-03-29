<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('grades')->insert([
        [
          'libelle' => '2ème Classe',
          'created_at' =>now(),
          'updated_at' =>now(),
        ],
        [
          'libelle' => '1ère Classe',
          'created_at' =>now(),
          'updated_at' =>now(),
        ]
      ]);
    }
}
