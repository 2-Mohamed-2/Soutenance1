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
