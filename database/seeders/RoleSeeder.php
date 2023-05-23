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
        $role3 = [
          'guard_name' => 'web',
          'name' => 'Commissaire',
        ],
        $role4 = [
          'guard_name' => 'web',
          'name' => 'Commissaire Adjoint',
        ]

      ]);
      
      $role2 = Role::create([
        'guard_name' => 'web',
        'name' => 'Administrateur',        
      ]);
      $permissions2 = Permission::find([5,6,7,8,9,10,11,12,13,14,15,16,17,58,38,39,40,41,42,43,44,45,46,47,48,49,50,50,51,42,53,54,55,56,57,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33]);      
      $role2->syncPermissions($permissions2);

      
    }
}
