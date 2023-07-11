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
      // DB::table('sections')->insert([
      //   [
      //     'libelle' => 'Section de la voie publique',
      //     'sigle' => 'S.V.P',
      //     'fonction' => 'Assure l\'ordre et le maintien de la population sur la voie publique.',
      //     'created_at' =>now(),
      //     'updated_at' =>now(),
      //   ],
      //   [
      //     'libelle' => 'Section administrative',
      //     'sigle' => 'S.A',
      //     'fonction' => 'Assure la gestion de l\'ensemble des documents administratifs.',
      //     'created_at' =>now(),
      //     'updated_at' =>now(),
      //   ],
      //   [
      //     'libelle' => 'Section de la police judiciaire',
      //     'sigle' => 'S.P.J',
      //     'fonction' => 'Assure les enquêtes, les recherches et toutes les questions du droit.',
      //     'created_at' =>now(),
      //     'updated_at' =>now(),
      //   ]
      // ]);
    }
}
