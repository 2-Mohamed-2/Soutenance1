<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class GradeController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:grade-list|grade-create|grade-edit|grade-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:grade-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:grade-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:grade-delete', ['only' => ['destroy']]);
    }

    public function index() {
        //
        $grades = Grade::latest()->get();

        return view('content.CRUD.grade-crud', compact('grades'));
    }

    public function store(Request $request){

        try {
            $this->validate($request,[

                'libelle' => 'required|max:255',
            ]);
    
            $grade = Grade::create([
    
                'libelle' => $request->libelle,
            ]);
    
            if ($grade) {
                Alert::success('Réussite', 'L\'enregistrement a bien été effectué !');
                return redirect('/Grade');
            } else {
                Alert::error('Echec', 'L\'enregistrement n\'a pas bien été effectué !');
                return redirect('/Grade');
            }
        } catch (\Throwable $th) {
            Alert::error('Erreur', 'L\'opération a rencontré un problème !');
            return redirect('/Grade');
        }
        

    }

    public function update(Request $request, $id) {

        try 
        {
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
        catch (\Throwable $th) {
            Alert::error('Erreur', 'L\'opération a rencontré un problème !');
            return redirect('/Grade');
        }
        
    }

    public function destroy($id) {
        try 
        {
            $id = decrypt($id);

            $grade = Grade::findOrFail($id);
            $grade->delete();
            Alert::success('Le Grade a bien été supprimé !', 'Réussite');
            return redirect('/Grade');

        } 
        catch (\Throwable $th) {
            Alert::error('Erreur', 'L\'opération a rencontré un problème !');
            return redirect('/Grade');
        }
        
    }

}
