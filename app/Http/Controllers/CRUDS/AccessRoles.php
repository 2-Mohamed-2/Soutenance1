<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
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


    $this->middleware('permission:role-to-user', ['only' => ['roleUser']]);
  }

  public function index()
  {
    $roles = Role::all();
    $permissions = Permission::get();
    return view('content.CRUD.role-crud', compact('roles','permissions'));
  }

  public function roleUser(Request $request)
  {
    $this->validate($request, [
      'model_id' => 'required',
      'role_id' => 'required',
    ]);

    $user = User::find($request->input('model_id'));
    // dd($user);

    $rols = DB::table('model_has_roles')->where('model_id', $user->id)->exists();

    if ($rols) {
      DB::table('model_has_roles')->where('model_id',$user->id)->delete();
      $test = $user->assignRole($request->input('role_id'));
    }
    else {
      $test = $user->assignRole($request->input('role_id'));
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

    $this->validate($request, [
      'RoleName' => 'required|unique:roles,name',
      'permission' => 'required',
    ]);

    $role = Role::create(['guard_name' => 'web', 'name' => $request->input('RoleName')]);
    $role->syncPermissions($request->input('permission'));

    if ($role) {
      Alert::success('Réussite', 'L\'enregistrement a bien été effectué !');
      return redirect('/access-roles');
    } else {
        Alert::error('Erreur', 'L\'enregistrement n\'a pas bien été effectué !');
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
      Alert::error('Erreur', 'Ce nom de role existe déjà !');
      return redirect('/access-roles');
    }else {
      $role->name = $request->input('RoleName');
      $role->save();
    }

    if ($request->has('permission')) {
      if ($role) {
        $role->syncPermissions($request->input('permission'));
          //$permissions->assignRole($role);

        Alert::success('Succès', 'L\'enregistrement a bien été effectué !');
        return redirect('/access-roles');
      } else {
          Alert::error('Erreur', 'L\'enregistrement n\'a pas bien été effectué !');
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
    Alert::success('Réussite', 'Le role a bien été supprimé !');
    return redirect('/access-roles');
  }


}
