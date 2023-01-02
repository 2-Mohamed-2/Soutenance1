<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('permissions')->insert([
        [
          'name' => 'role-store',
          'desc' => 'Ajoute d\'un role',
        ],
        [
          'name' => 'role-update',
          'desc' => 'Modification d\'un role',
        ],
        [
          'name' => 'role-delete',
          'desc' => 'Suppression d\'un role',
        ],
        [
          'name' => 'role-view',
          'desc' => 'Voir les roles',
        ],
        [
          'name' => 'permission-store',
          'desc' => 'Ajout d\'une permission',
        ],
        [
          'name' => 'permission-update',
          'desc' => 'Modification d\'une permission',
        ],
        [
          'name' => 'permission-delete',
          'desc' => 'Suppression d\'une permission',
        ],
        [
          'name' => 'permission-view',
          'desc' => 'Voir une permission',
        ],

      ]);
    }
}
