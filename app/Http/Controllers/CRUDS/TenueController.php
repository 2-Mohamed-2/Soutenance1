<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\User;
use App\Models\Tenue;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LieuStock;
use RealRashid\SweetAlert\Facades\Alert;

class TenueController extends Controller
{
  //
  function __construct()
  {
    $this->middleware('permission:tenue-list|tenue-create|tenue-edit|tenue-delete', ['only' => ['index', 'store']]);
    $this->middleware('permission:tenue-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:tenue-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:tenue-delete', ['only' => ['destroy']]);
  }


    public function TenueView()
    {
    $tenues = Tenue::paginate(5);
    $comms = Commissariat::latest()->get();
    // $users = User::latest()->get();
    $lieustock = LieuStock::get();

    return view('content.CRUD.tenue-crud', compact('tenues', 'comms', 'lieustock'));

    }

    public function index()
    {
        //


    }

    public function store(Request $request)
    {
       try{
          $this->validate($request, [

            'type' => 'required|max:255|min:3',
            'modele' => 'required|max:255|min:3',
            'taille' => 'required|max:255',
            'quantite' => 'required|max:255',
            'lieu_stock_id' => 'required',
          ]);

          $tenue = new Tenue;

          $tenue->type = $request->type;
          $tenue->modele = $request->modele;
          $tenue->taille = $request->taille;
          $tenue->quantite = $request->quantite;
          $tenue->lieu_stock_id = $request->lieu_stock_id;
           $tenue->save();

          if ($tenue) {
            Alert::success('Réussite', 'L\'enregistrement a bien été effectué !');
            return redirect('/Tenue');
          } else {
            Alert::error('Erreur', 'L\'enregistrement n\'a pas bien été effectué !');
            return redirect('/Tenue');
          }
       }catch(\Throwable $th){
         Alert::error('Erreur', 'L\'enregistrement n\'a pas bien été effectué !');
             return redirect('/Tenue');
       }

    }

    public function update(Request $request, $id)
    {
      try{
        $id = decrypt($id);
        $tenue = Tenue::find($id);
        $tenue->type = $request->type;
        $tenue->modele = $request->modele;
        $tenue->taille = $request->taille;
        $tenue->quantite = $request->quantite;
        $tenue->lieu_stock_id = $request->lieu_stock_id;
        $tenue->save();
        if ($tenue) {
          Alert::success('Reussite', 'tenue a ete bien modifier !');
          return redirect('/Tenue');
        } else {
          Alert::error('Erreur', 'Modifier non effectue !');
          return redirect('/Tenue');
        }
      }catch(\Throwable $th){
         Alert::error( 'Erreur', 'Modifier non effectue !');
          return redirect('/Tenue');
      }

    }

    public function destroy($id)
    {
      try{
        $id = decrypt($id);

        $tenue = Tenue::findOrFail($id);
        $tenue->delete();
        Alert::success('Reussite', 'Le tenue a ete bien ete supprimer');
        return redirect('/Tenue');

      }catch(\Throwable $th){
      Alert::error('Erreur', 'Suppression non effectue !');
      return redirect('/Tenue');
      }

    }
}
