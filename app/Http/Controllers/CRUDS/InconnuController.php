<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Inconnu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class InconnuController extends Controller
{

  function __construct()
  {
    $this->middleware('permission:citoyen-list|citoyen-delete|citoyen-rmdp', ['only' => ['IncoView']]);
    $this->middleware('permission:citoyen-delete', ['only' => ['destroy']]);
    $this->middleware('permission:citoyen-rmdp', ['only' => ['ReinitialisePassword']]);
  }

    public function IncoView()
    {
        //
        $incos = Inconnu::latest()->get();

        return view('content.CRUD.inco-crud', compact('incos'));
    }

    public function destroy($id)
    {
      try
      {
        $id = decrypt($id);

        $inco = Inconnu::findOrFail($id);
        $inco->delete();
        Alert::info('Le compte citoyen a ete bien ete supprimé', 'Reussite');
        return redirect()->back();
      }
      catch(\Throwable $th){
      Alert::error('Suppression non effectue !', 'Erreur');
      return redirect()->back();
      }

    }

    // Fonction de desactivation
    public function ReinitialisePassword($id)
    {
      try 
      {

        $id = decrypt($id);

        $mdp = Hash::make('comsml.123');

        $inco = Inconnu::whereId($id)->update(
          ['password' => $mdp]
        );          
        if ($inco) {
          Alert::info('Réussite', 'Le mot de passe a bien été reinitialisé. Le nouveau est :   comsml.123 !');
          return redirect()->back();
        }
          
      } 
      catch (\Throwable $th) {
        Alert::error('Erreur', 'L\'opération de reinitialisation du mot de passe a rencontré un problème !');
        return redirect()->back();
      }

      
    }


}
