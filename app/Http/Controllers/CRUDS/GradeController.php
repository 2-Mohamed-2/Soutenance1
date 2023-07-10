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
                Alert::success('Réussite', 'L\'enregistrement du grade a bien été effectué !');
                return redirect()->back();
            } else {
                Alert::error('Echec', 'L\'enregistrement du grade n\'a pas bien été effectué !');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Erreur', 'L\'opération d\'insertion du grade a rencontré un problème !');
            return redirect()->back();
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
                Alert::success('Réussite', 'Le grade a bien été modifié !');
                return redirect()->back();
            } else {
                Alert::error('Erreur', 'Modification non effectuée !');
                return redirect()->back();
            }
        } 
        catch (\Throwable $th) {
            Alert::error('Erreur', 'L\'opération de modification a rencontré un problème !');
            return redirect()->back();
        }
        
    }

    public function destroy($id) {
        try 
        {
            $id = decrypt($id);

            $grade = Grade::findOrFail($id);
            $grade->delete();
            Alert::success('Réussite', 'Le Grade a bien été supprimé !');
            return redirect()->back();

        } 
        catch (\Throwable $th) {
            Alert::error('Erreur', 'L\'opération de suppression du grade a rencontré un problème !');
            return redirect()->back();
        }
        
    }

}
