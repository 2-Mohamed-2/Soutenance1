<?php

namespace App\Http\Controllers\CRUDS;

use toastr;
use App\Models\Inconnu;
use App\Models\Residence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResidenceController extends Controller
{
    //
    public function ResiView(){

        $resis = Residence::latest()->get();
        $inconnus = Inconnu::latest()->get();
        return view('content.CRUD.resi-crud', compact('resis', 'inconnus'));
    }

    public function index(){
        //
    }

    public function store(Request $request){
     
         $this->validate($request,[
            'inconnu_id' => 'required',
            'numero' => 'required|max:255',
            'certifions' => 'required|max:255',
            'ne' => 'required|max:255',
            'a' => 'required|max:255',
            'fils' => 'required|max:255',
            'et' => 'required|max:255',
            'profession' => 'required|max:255',
            'resulte' => 'required|max:255',
            'domicile' => 'required|max:255',
            'kati' => 'required|max:255',
            'dossier' => 'required|max:255',
            
         ]);

         $resi = Residence::create([

            'inconnu_id' => $request->inconnu_id,
            'numero' => $request->numero,
            'certifions' => $request->certifions,
            'ne' => $request->ne,
            'a' => $request->a,
            'fils' => $request->fils,
            'et' => $request->et,
            'profession' => $request->profession,
            'resulte' => $request->inconnu_id,
            'domicile' => $request->domicile,
            'kati' => $request->kati,
            'dossier' => $request->dossier,

         ]);

         if ($resi) {
            toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Residence');
        } else {
            toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Residence');
        }

    }

    public function update(Request $request, $id){

        $id = decrypt($id);
        $validateData = $this->validate($request,[

            'inconnu_id' => 'required',
            'numero' => 'required|max:255',
            'certifions' => 'required|max:255',
            'ne' => 'required|max:255',
            'a' => 'required|max:255',
            'fils' => 'required|max:255',
            'et' => 'required|max:255',
            'profession' => 'required|max:255',
            'resulte' => 'required|max:255',
            'domicile' => 'required|max:255',
            'kati' => 'required|max:255',
            'dossier' => 'required|max:255',

        ]);

        $resi = Residence::whereId($id)->update($validateData);
        if ($resi) {
            toastr()->success('La residence a bien été modifié !', 'Réussite');
            return redirect('/Residence');
        } else {
            toastr()->error('Modification non effectuée !', 'Erreur');
            return redirect('/Residence');
        }

    }

    public function destroy($id){

        $id = decrypt($id);
        $resi = Residence::findOrFail($id);
        $resi->delete();
        toastr()->success('La residence a bien été supprimé !', 'Réussite');
        return redirect('/Residence');
    }
    
}
