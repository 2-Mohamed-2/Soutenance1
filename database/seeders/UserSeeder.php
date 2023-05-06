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
        'matricule' => '1478',
        'name' => 'user1',
        'email' => 'user1@user1.com',
        'password' => Hash::make('123456'),
        'created_at' => now(),
        'updated_at' => now()
      ]);
      
      $role = Role::create(['name' => 'Admin']);
      
      $permissions = Permission::pluck('id','id')->all();
    
      $role->syncPermissions($permissions);
      
      $user->assignRole([$role->id]);

      // DB::table('users')->insert([
      //   [
      //     'commissariat_id' => 0,
      //     'grade_id' => 0,
      //     'section_id' => 0,
      //     'matricule' => '1478',
      //     'name' => 'user1',
      //     'email' => 'user1@user1.com',
      //     'password' => Hash::make('123456'),
      //     'created_at' =>now(),
      //     'updated_at' =>now(),
      //   ],
      //   [
      //     'commissariat_id' => 1,
      //     'grade_id' => 2,
      //     'section_id' => 3,
      //     'matricule' => '1477',
      //     'name' => 'user2',
      //     'email' => 'user2@user2.com',
      //     'password' => Hash::make('123456'),
      //     'created_at' =>now(),
      //     'updated_at' =>now(),
      //   ],
      //   [
      //     'commissariat_id' => 1,
      //     'grade_id' => 3,
      //     'section_id' => 3,
      //     'matricule' => '1476',
      //     'name' => 'user3',
      //     'email' => 'user3@user3.com',
      //     'password' => Hash::make('123456'),
      //     'created_at' =>now(),
      //     'updated_at' =>now(),
      //   ],
      //   [
      //     'commissariat_id' => 2,
      //     'grade_id' => 1,
      //     'section_id' => 1,
      //     'matricule' => '1475',
      //     'name' => 'user4',
      //     'email' => 'user4@user4.com',
      //     'password' => Hash::make('123456'),
      //     'created_at' =>now(),
      //     'updated_at' =>now(),
      //   ],
      //   [
      //     'commissariat_id' => 2,
      //     'grade_id' => 1,
      //     'section_id' => 4,
      //     'matricule' => '1474',
      //     'name' => 'user5',
      //     'email' => 'user5@user5.com',
      //     'password' => Hash::make('123456'),
      //     'created_at' =>now(),
      //     'updated_at' =>now(),
      //   ]

      // ]);
    }
}
