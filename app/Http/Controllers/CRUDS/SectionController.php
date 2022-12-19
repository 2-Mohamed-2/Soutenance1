<?php

namespace App\Http\Controllers\CRUDS;

use toastr;
use App\Models\Section;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    public function SectView(){

        $sects = Section::latest()->get();
        $coms = Commissariat::latest()->get();

        return view('content.CRUD.sect-crud', compact('sects', 'coms'));

    }

    public function index(){
        //
    }



    public function store(Request $request)
    {

        $this->validate($request,[
            'commissariat_id' => 'required',
            'libelle' => 'required|max:255',
            'sigle' => 'required|max:255',
            'fonction' => 'required|max:255',            
        ]);

        $sect = Section::create([
            'commissariat_id' => $request->commissariat_id,
            'libelle' => $request->libelle,
            'sigle' => $request->sigle,
            'fonction' => $request->fonction,
        ]);
        
        if ($sect) {
            toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Section');
        } else {
            toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Section');
        }

    }

  
    public function update(Request $request, $id) {

        $id = decrypt($id);
        $validateData = $this->validate($request, [
            'commissariat_id' => 'required',
            'libelle' => 'required|max:255',
            'sigle' => 'required|max:255',
            'fonction' => 'required|max:255',
        ]);

        $sect = Section::whereId($id)->update($validateData);
        if ($sect) {
            toastr()->success('La section a bien été modifié !', 'Réussite');
            return redirect('/Section');
        } else {
            toastr()->error('Modification non effectuée !', 'Erreur');
            return redirect('/Section');
        }
    }



    public function destroy($id){

        $id = decrypt($id);

        $sect = Section::findOrFail($id);
        $sect->delete();
        toastr()->success('La section a bien été supprimé !', 'Réussite');
        return redirect('/Section');
    }
}
