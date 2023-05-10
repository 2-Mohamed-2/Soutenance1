<?php

namespace App\Http\Controllers\CRUDS;

use toastr;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ComController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:comm-list|comm-create|comm-edit|comm-delete', ['only' => ['ComView', 'store']]);
        $this->middleware('permission:comm-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:comm-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:comm-delete', ['only' => ['destroy']]);
    }

    public function ComView(){
        $coms = Commissariat::latest()->get();        
        
        return view('content.CRUD.commiss-crud', compact('coms'));
    }


    public function index() {
        //
    }

    public function store(Request $request) {
        // dd("Bjr");
        $this->validate($request, [
            'libelle' => 'required|max:255',
            'sigle' => 'required|max:255',
            'localite' => 'required|max:255',
            'telephone' => 'required|max:255',
        ]);

        // dd(url()->current());

        $com = Commissariat::create([
            'libelle' => $request->libelle,
            'sigle' => $request->sigle,
            'localite' => $request->localite,
            'telephone' => $request->telephone,
        ]);

        if ($com) {
            
            Alert::success('Réussite', 'L\'enregistrement a bien été effectué !');
            return redirect('/Commissariat');
        } else {
            Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Commissariat');
        }


    }

    public function update(Request $request, $id) {

        $id = decrypt($id);
        $validateData = $this->validate($request, [
            'libelle' => 'required|max:255',
            'sigle' => 'required|max:255',
            'localite' => 'required|max:255',
            'telephone' => 'required|max:255',
        ]);

        $com = Commissariat::whereId($id)->update($validateData);
        if ($com) {
            toastr()->success('Le commissariat a bien été modifié !', 'Réussite');
            return redirect('/Commissariat');
        } else {
            toastr()->error('Modification non effectuée !', 'Erreur');
            return redirect('/Commissariat');
        }
    }

    public function destroy($id) {
        $id = decrypt($id);
        
        $com = Commissariat::findOrFail($id);
        $com->delete();
        Alert::success('Réussite' ,'Le commissariat a bien été supprimé !');
        return redirect('/Commissariat');
    }
}
