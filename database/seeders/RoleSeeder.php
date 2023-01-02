<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Contracts\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        $role1 = [
          'name' => 'Supreme',
        ],
        $role2 = [
          'name' => 'Administrateur',
        ],
        $role3 = [
          'name' => 'Administrateur_2',
        ],
        $role4 = [
          'name' => 'Utilisateur',
        ]

      ]);
      $role1->syncPermissions([1,2,3,4,5]);
    }
}
