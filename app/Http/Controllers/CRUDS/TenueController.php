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

            'type' => 'required|max:255',
            'modele' => 'required|max:255',
            'taille' => 'required|max:255',
            // 'annee' => 'required|max:255',
            // 'statut' => 'required|max:255',
            'stock' => 'required|max:255',
            'lieu_stock_id' => 'required',
            // 'users_id' => 'required|max:255',


          ]);

          $tenue = Tenue::create([

            'type' => $request->type,
            'modele' => $request->modele,
            'taille' => $request->taille,
            // 'annee' => $request->annee,
            // 'statut' => $request->statut,
            'stock' => $request->stock,
            'lieu_stock_id' => $request->lieu_stock_id,
            // 'users_id' => $request->users_id,

          ]);

          if ($tenue) {
            Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Tenue');
          } else {
            Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Tenue');
          }
      }catch(\Throwable $th){
        Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
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
        // $tenue->annee = $request->annee;
        $tenue->stock = $request->stock;
        $tenue->lieu_stock_id = $request->lieu_stock_id;
        $tenue->save();
        if ($tenue) {
          Alert::success('tenue a ete bien modifier !', 'Reussite');
          return redirect('/Tenue');
        } else {
          Alert::error('Modifier non effectue !', 'Erreur');
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
        Alert::success('Le tenue a ete bien ete supprimer', 'Reussite');
        return redirect('/Tenue');

      }catch(\Throwable $th){
      Alert::error('Erreur', 'Suppression non effectue !');
      return redirect('/Tenue');
      }

    }
}
