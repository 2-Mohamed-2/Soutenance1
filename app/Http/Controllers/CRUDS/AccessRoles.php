<?php

namespace App\Http\Controllers\CRUDS;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class AccessRoles extends Controller
{

  // function __construct()
  // {
  //   $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
  //   $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
  //   $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
  //   $this->middleware('permission:role-delete', ['only' => ['destroy']]);
  // }

  public function index()
  {
    $roles = Role::all();
    $permissions = Permission::all();

    return view('content.CRUD.role-crud', compact('roles','permissions'));
  }

  public function store(Request $request){

    $this->validate($request,[
        'RoleName' => 'required|max:255',
        'permission',
    ]);

    $permissions = $request->permission;
    $test=Role::where('name', $request->RoleName)->exists();
    //dd($test);
    if ($test) {
      toastr()->error('Ce nom de role existe déjà !', 'Erreur');
      return redirect('/access-roles');
    }else {
      $role = Role::create([
        'name' => $request->RoleName,
      ]);
    }


    if ($role) {
      $role->syncPermissions($permissions);
        //$permissions->assignRole($role);

      toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
      return redirect('/access-roles');
    } else {
        toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
        return redirect('/access-roles');
    }

  }

  public function update(Request $request, $id)
  {
    $id = decrypt($id);

    $te = $this->validate($request,[
      'RoleName' => 'required|max:255',

    ]);
    // dd($te);

    $role = Role::find($id);


    $permissions = $request->permission;

    $test = Role::select('*')
                  ->where([
                    ['id', '!=', $id],
                    ['name', '=', $request->RoleName]
                  ])->exists();
    //dd($test);
    if ($test) {
      toastr()->error('Ce nom de role existe déjà !', 'Erreur');
      return redirect('/access-roles');
    }else {
      $role->name = $request->input('RoleName');
      $role->save();
    }

    if ($request->has('permission')) {
      if ($role) {
        $role->syncPermissions($permissions);
          //$permissions->assignRole($role);

        toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
        return redirect('/access-roles');
      } else {
          toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
          return redirect('/access-roles');
      }
    } else {
      toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
        return redirect('/access-roles');
    }


  }

  public function destroy($id) {
    $id = decrypt($id);

    $role = Role::findOrFail($id);
    $role->delete();
    toastr()->success('Le role a bien été supprimé !', 'Réussite');
    return redirect('/access-roles');
  }


}
