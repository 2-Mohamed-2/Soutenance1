<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{

    public function index() {
        //
        $grades = Grade::latest()->get();

        return view('content.CRUD.grade-crud', compact('grades'));
    }

    public function store(Request $request){

        $this->validate($request,[

            'libelle' => 'required|max:255',
        ]);

        $grade = Grade::create([

            'libelle' => $request->libelle,
        ]);

        if ($grade) {
            toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Grade');
        } else {
            toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Grade');
        }

    }

    public function update(Request $request, $id) {

        $id = decrypt($id);
        $validateData = $this->validate($request, [
            'libelle' => 'required|max:255',
        ]);

        $grade = Grade::whereId($id)->update($validateData);
        if ($grade) {
            toastr()->success('Le grade a bien été modifié !', 'Réussite');
            return redirect('/Grade');
        } else {
            toastr()->error('Modification non effectuée !', 'Erreur');
            return redirect('/Grade');
        }
    }

    public function destroy($id) {
        $id = decrypt($id);

        $grade = Grade::findOrFail($id);
        $grade->delete();
        toastr()->success('Le Grade a bien été supprimé !', 'Réussite');
        return redirect('/Grade');
    }

}
