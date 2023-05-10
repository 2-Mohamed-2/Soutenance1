<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

      // $role1 = Role::create(['name' => 'Admin']);      
      // $permissions = Permission::where('id', [1]);    
      // $role->syncPermissions($permissions);

      
    }
}
