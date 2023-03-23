<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Inconnu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class InconnuController extends Controller
{

    public function IncoView()
    {
        //
        $incos = Inconnu::latest()->get();

        return view('content.CRUD.inco-crud', compact('incos'));
    }

    public function index(){
        //
    }



    public function store(Request $request)
    {
        //
        $this->validate($request, [
           'nomcomplet' => 'required|max:255',
           'adresse' => 'required|max:255',
           'telephone' => 'required|max:255',
           'genre' => 'required|max:255',
           'motif' => 'required|max:255',
        ]);

        $inco = Inconnu::create([
            'nomcomplet' => $request->nomcomplet,
            'adresse' => $request->adresse,
            'telephone' =>  $request->telephone,
            'genre' =>  $request->genre,
            'motif' =>  $request->motif,
        ]);

        if($inco){
            Alert::info('L\'enregistrement a bien ete effectue !', 'Reussite');
            return redirect('/Inconnu');
        }else{
            Alert::info('L\'enregistrement a bien ete effectue !', 'Erreur');
        }
    }



    public function update(Request $request, $id)
    {
        //
        $id = decrypt($id);
        $validateData = $this->validate($request,[
            'nomcomplet' => 'required|max:255',
            'adresse' => 'required|max:255',
            'telephone' => 'required|max:255',
            'genre' => 'required|max:255',
            'motif' => 'required|max:255',
        ]);

        $inco = Inconnu::whereId($id)->update($validateData);
        if($inco){
            Alert::info('L\'inconnu a ete bien modifier !', 'Reussite');
            return redirect('/Inconnu');
        }else{
            Alert::info('Modifier non effectue !', 'Erreur');
        }
    }


    public function destroy($id)
    {
        //

        $id = decrypt($id);

        $inco = Inconnu::findOrFail($id);
        $inco->delete();
         Alert::info('L\'inconnu a ete bien ete supprimer', 'Reussite');
        return redirect('/Inconnu');
    }
}
  