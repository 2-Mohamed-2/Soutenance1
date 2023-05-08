<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

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
            Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Grade');
        } else {
            Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
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
            Alert::success('Le grade a bien été modifié !', 'Réussite');
            return redirect('/Grade');
        } else {
            Alert::error('Modification non effectuée !', 'Erreur');
            return redirect('/Grade');
        }
    }

    public function destroy($id) {
        $id = decrypt($id);

        $grade = Grade::findOrFail($id);
        $grade->delete();
        Alert::success('Le Grade a bien été supprimé !', 'Réussite');
        return redirect('/Grade');
    }

}
