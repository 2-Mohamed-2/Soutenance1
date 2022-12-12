<?php

namespace App\Http\Controllers\laravel_example;

use toastr;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComController extends Controller
{
    public function ComView(){
        $coms = Commissariat::latest()->get();

        return view('content.laravel-example.commiss-crud', compact('coms'));
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

        $com = Commissariat::create([
            'libelle' => $request->libelle,
            'sigle' => $request->sigle,
            'localite' => $request->localite,
            'telephone' => $request->telephone,
        ]);

        if ($com) {
            toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Commissariat');
        } else {
            toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
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
        toastr()->success('Le commissariat a bien été supprimé !', 'Réussite');
        return redirect('/Commissariat');
    }
}
