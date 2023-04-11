<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\User;
use App\Models\Tenue;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TenueController extends Controller
{
    //

    public function TenueView()
    {

    }

    public function index()
    {
        //

        $tenues = Tenue::paginate(5);
        $comms = Commissariat::latest()->get();
        // $users = User::latest()->get();

        return view('content.CRUD.tenue-crud', compact('tenues', 'comms'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'type' => 'required|max:255',
            'modele' => 'required|max:255',
            'taille' => 'required|max:255',
            'annee' => 'required|max:255',
            // 'statut' => 'required|max:255',
            'stock' => 'required|max:255',
            // 'commissariats_id' => 'required|max:255',
            // 'users_id' => 'required|max:255',


        ]);

        $tenue = Tenue::create([

            'type' => $request->type,
            'modele' => $request->modele,
            'taille' => $request->taille,
            'annee' => $request->annee,
            // 'statut' => $request->statut,
            'stock' => $request->stock,
            // 'commissariats_id' => $request->commissariats_id,
            // 'users_id' => $request->users_id,

        ]);

        if ($tenue) {
            Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Tenue');
        } else {
            Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Tenue');
        }
    }

    public function update(Request $request, $id)
    {

        $id = decrypt($id);

        $validateData = $this->validate($request, [

            'type' => 'required|max:255',
            'modele' => 'required|max:255',
            'taille' => 'required|max:255',
            'annee' => 'required|max:255',
            // 'statut' => 'required|max:255',
            'stock' => 'required|max:255',
            // 'commissariats_id' => 'required|max:255',
            // 'users_id' => 'required|max:255',

        ]);

        $tenue = Tenue::whereId($id)->update($validateData);
        if($tenue){
            Alert::success('tenue a ete bien modifier !', 'Reussite');
            return redirect('/Tenue');
        }else{
            Alert::error('Modifier non effectue !', 'Erreur');
        }
    }

    public function destroy($id)
    {
        $id = decrypt($id);

        $tenue = Tenue::findOrFail($id);
        $tenue->delete();
        Alert::success('Le tenue a ete bien ete supprimer', 'Reussite');
        return redirect('/Tenue');

    }
}
