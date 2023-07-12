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

      $role2 = Role::create([
        'guard_name' => 'web',
        'name' => 'Administrateur', 
        'created_at' => now(),
        'updated_at' => now(),       
      ]);
      $permissions2 = Permission::find([5,6,7,8,9,10,11,12,13,14,15,16,17,58,38,39,40,41,42,43,44,45,46,47,48,49,50,50,51,42,53,54,55,56,57,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,59,60,61,62,63,64,65]);      
      $role2->syncPermissions($permissions2);


      $role3 = Role::create([
        'guard_name' => 'web',
        'name' => 'Commissaire',
        'created_at' => now(),
        'updated_at' => now(),      
      ]);
      $permissions3 = Permission::find([10,34,37,58,60,61,65]);      
      $role3->syncPermissions($permissions3);


      $role3 = Role::create([
        'guard_name' => 'web',
        'name' => 'Membre',
        'created_at' => now(),
        'updated_at' => now(),      
      ]);
      $permissions3 = Permission::find([34,58,65]);      
      $role3->syncPermissions($permissions3);

      
    }
}
