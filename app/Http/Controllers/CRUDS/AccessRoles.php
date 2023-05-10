<?php

namespace App\Http\Controllers\CRUDS;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class AccessRoles extends Controller
{

  function __construct()
  {
    $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
    $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:role-delete', ['only' => ['destroy']]);


    $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
  }

  public function index()
  {
    $roles = Role::all();
    $permissions = Permission::all();


    return view('content.CRUD.role-crud', compact('roles','permissions'));
  }

  public function roleUser(Request $request)
  {
    $this->validate($request, [
      'model_id' => 'required',
      'role_id' => 'required',
    ]);

    $permissions = $request->permission;
    $test=Role::where('name', $request->RoleName)->exists();
    //dd($test);
    if ($test) {
      Alert::error('Ce nom de role existe déjà !', 'Erreur');
      return redirect('/access-roles');
    }else {
      $role = Role::create([
        'name' => $request->RoleName,
      ]);
    }


    if ($test) {
      Alert::success('Réussite', 'Les roles sont bien assignes !');
      return redirect('/Membre');
    }
    else {
      Alert::error('Erreur', 'Erreur lors de l\'assignation !');
      return redirect('/Membre');
    }
  }

  public function store(Request $request)
  {
    $permissions = $request->permission;

    $this->validate($request, [
      'RoleName' => 'required|unique:roles,name',
      'permission' => 'required',
    ]);

    $role = Role::create(['guard_name' => 'web', 'name' => $request->input('RoleName')]);
    $role->syncPermissions($request->input('permission'));

    if ($role) {
      $role->syncPermissions($permissions);
      $permissions->assignRole($role);

      Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
      return redirect('/access-roles');
    } else {
        Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
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
      Alert::error('Ce nom de role existe déjà !', 'Erreur');
      return redirect('/access-roles');
    }else {
      $role->name = $request->input('RoleName');
      $role->save();
    }

    if ($request->has('permission')) {
      if ($role) {
        $role->syncPermissions($request->input('permission'));
          $permissions->assignRole($role);

        Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
        return redirect('/access-roles');
      } else {
          Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
          return redirect('/access-roles');
      }
    } else {
      Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
        return redirect('/access-roles');
    }


  }

  public function destroy($id) {
    $id = decrypt($id);

    $role = Role::findOrFail($id);
    $role->delete();
    Alert::success('Le role a bien été supprimé !', 'Réussite');
    return redirect('/access-roles');
  }


}
