<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
        'commissariat_id' => 0,
        'grade_id' => 0,
        'section_id' => 0,
        'matricule' => '0',
        'name' => 'Informaticien',
        'email' => 'user1@user1.com',
        'password' => Hash::make('password'),
        'created_at' => now(),
        'updated_at' => now()
      ]);
      
      $role = Role::create(['name' => 'Informaticien']);
      
      $permissions = Permission::pluck('id','id')->all();
    
      $role->syncPermissions($permissions);
      
      $user->assignRole([$role->id]);

      
    }
}
