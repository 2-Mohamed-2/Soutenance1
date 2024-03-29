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
        'role-to-user',   //5
        'grade-list',     //6
        'grade-create',   //7
        'grade-edit',     //8
        'grade-delete',   //9
        'membre-list',    //10
        'membre-create',  //11
        'membre-edit',    //12
        'membre-delete',   //13
        'comm-list',    //14
        'comm-create',  //15
        'comm-edit',    //16
        'comm-delete',   //17
        'arme-list',     //18
        'arme-create',   //19
        'arme-edit',     //20
        'arme-delete',    //21
        'arme-affecte-list',     //22
        'arme-affecte-create',   //23
        'arme-affecte-edit',     //24
        'arme-affecte-delete',    //25
        'muni-list',     //26
        'muni-create',   //27
        'muni-edit',     //28
        'muni-delete',    //29
        'muniaff-list',     //30
        'muniaff-create',   //31
        'muniaff-edit',     //32
        'muniaff-delete',    //33
        'resi-list',     //34
        'resi-create',   //35
        'resi-edit',     //36
        'resi-delete',    //37
        'section-list',     //38
        'section-create',   //39
        'section-edit',     //40
        'section-delete',    //41
        'tenueaff-list',     //42
        'tenueaff-create',   //43
        'tenueaff-edit',     //44
        'tenueaff-delete',    //45
        'tenue-list',     //46
        'tenue-create',   //47
        'tenue-edit',     //48
        'tenue-delete',    //49
        'vehicule-list',     //50
        'vehicule-create',   //51
        'vehicule-edit',     //52
        'vehicule-delete',    //53
        'voitaffecte-list',     //54
        'voitaffecte-create',   //55
        'voitaffecte-edit',     //56
        'voitaffecte-delete',    //57
        'dashboard-view',       //58
        'membre-affect',        //59
        'membre-active',        //60
        'membre-desactive',        //61  
        'citoyen-list',           //62
        'citoyen-delete',         //63  
        'citoyen-rmdp',            //64  Pour reinitialiser le password
        'resi-pdf'                 //65   Pour generer le pdf
     ];

     foreach ($permissions as $permission) {
          Permission::create(['name' => $permission]);
     }
    }
}
