<?php

namespace App\Http\Controllers\CRUDS;


use App\Models\Section;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SectionController extends Controller
{
  function __construct()
  {
    $this->middleware('permission:sect-list|sect-create|sect-edit|sect-delete', ['only' => ['SectView', 'store']]);
    $this->middleware('permission:sect-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:sect-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:sect-delete', ['only' => ['destroy']]);
  }

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
            Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Section');
        } else {
            Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Section');
        }

    }


    public function update(Request $request, $id) {

        $id = decrypt($id);
        // dd($id);

        $validateData = $this->validate($request, [
            'commissariat_id' => 'required',
            'libelle' => 'required|max:255',
            'sigle' => 'required|max:255',
            'fonction' => 'required|max:255',
        ]);

        $sect = Section::whereId($id)->update($validateData);
        if ($sect) {
            Alert::success('La section a bien été modifié !', 'Réussite');
            return redirect('/Section');
        } else {
            Alert::error('Modification non effectuée !', 'Erreur');
            return redirect('/Section');
        }
    }



    public function destroy($id){

        $id = decrypt($id);

        $sect = Section::findOrFail($id);
        $sect->delete();
        Alert::success('La section a bien été supprimé !', 'Réussite');
        return redirect('/Section');
    }
}
