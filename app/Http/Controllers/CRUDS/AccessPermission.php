<?php

namespace App\Http\Controllers\CRUDS;

use App\Http\Controllers\Controller;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AccessPermission extends Controller
{
  public function index(){
    $permissions = Permission::all();
    return view('content.CRUD.permission-crud', compact('permissions'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

    /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){

    $this->validate($request,[

        'name' => 'required|max:255',
    ]);

    $permission = Permission::create([

        'name' => $request->name,
        'desc' => $request->desc,
    ]);

    if ($permission) {
        toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
        return redirect('/access-permission');
    } else {
        toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
        return redirect('/access-permission');
    }

  }

  public function update(Request $request, $id)
  {
    $id = decrypt($id);
        $validateData = $this->validate($request, [
            'name' => 'required|max:255',
            'desc' => 'required',
        ]);

        $grade = Permission::whereId($id)->update($validateData);
        if ($grade) {
            toastr()->success('La permission a bien été modifié !', 'Réussite');
            return redirect('/access-permission');
        } else {
            toastr()->error('Modification non effectuée !', 'Erreur');
            return redirect('/access-permission');
        }
  }

  public function destroy($id) {
    $id = decrypt($id);

    $grade = Permission::findOrFail($id);
    $grade->delete();
    toastr()->success('La permission a bien été supprimé !', 'Réussite');
    return redirect('/access-permission');
  }

}
