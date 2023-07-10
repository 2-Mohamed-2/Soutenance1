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
    $this->middleware('permission:section-list|section-create|section-edit|section-delete', ['only' => ['SectView', 'store']]);
    $this->middleware('permission:section-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:section-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:section-delete', ['only' => ['destroy']]);
  }

    public function SectView(){

        $sects = Section::latest()->get();
        $coms = Commissariat::latest()->get();

        return view('content.CRUD.sect-crud', compact('sects', 'coms'));

    }
    

    public function store(Request $request)
    {
        try 
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
                Alert::success('Réussite', 'L\'enregistrement a bien été effectué !');
                return redirect()->back();
            } else {
                Alert::error('Echec', 'L\'enregistrement n\'a pas bien été effectué !');
                return redirect()->back();
            }

        } 
        catch (\Throwable $th) {
            Alert::error('Erreur', 'L\'opération a rencontré un problème !');
            return redirect()->back();
        }

        

    }


    public function update(Request $request, $id) 
    {

        try 
        {
            
            $id = decrypt($id);

            $validateData = $this->validate($request, [
                'commissariat_id' => 'required',
                'libelle' => 'required|max:255',
                'sigle' => 'required|max:255',
                'fonction' => 'required|max:255',
            ]);

            $sect = Section::whereId($id)->update($validateData);
            if ($sect) {
                Alert::success('Réussite', 'La section a bien été modifié !');
                return redirect()->back();
            } else {
                Alert::error('Echec', 'Modification non effectuée !');
                return redirect()->back();
            }

        } 
        catch (\Throwable $th) {
            Alert::error('Erreur', 'L\'opération a rencontré un problème !');
            return redirect()->back();
        }
        
    }



    public function destroy($id)
    {

        try {
            
            $id = decrypt($id);

            $sect = Section::findOrFail($id);
            $sect->delete();
            Alert::success('Réussite', 'La section a bien été supprimé !');
            return redirect()->back();

        } catch (\Throwable $th) {
            Alert::error('Erreur', 'L\'opération a rencontré un problème !');
            return redirect()->back();
        }
        
    }
}
