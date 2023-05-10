<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
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
      $permissions = [
        'role-list',      //1
        'role-create',    //2
        'role-edit',      //3
        'role-delete',    //4
        'grade-list',     //5
        'grade-create',   //6
        'grade-edit',     //7
        'grade-delete',   //8
        'role-to-user',   //9
        'membre-list',    //10
        'membre-create',  //11
        'membre-edit',    //12
        'membre-delete',   //13
        'comm-list',    //14
        'comm-create',  //15
        'comm-edit',    //16
        'comm-delete',   //17
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'grade-list',
        'grade-create',
        'grade-edit',
        'grade-delete',
        'arme-list',
        'arme-create',
        'arme-edit',
        'arme-delete'
     ];

     foreach ($permissions as $permission) {
          Permission::create(['name' => $permission]);
     }
    }
}
