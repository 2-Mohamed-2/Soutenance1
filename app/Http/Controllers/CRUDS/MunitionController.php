<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Munition;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LieuStock;
use RealRashid\SweetAlert\Facades\Alert;

class MunitionController extends Controller
{
  function __construct()
  {
    $this->middleware('permission:muni-list|muni-create|muni-edit|muni-delete', ['only' => ['MuniView', 'store']]);
    $this->middleware('permission:muni-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:muni-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:muni-delete', ['only' => ['destroy']]);
  }

    //

    public function MuniView()
    {
        $munis = Munition::latest()->get();
        $comms = Commissariat::latest()->get();
        // $munition = Munition::all();
        $lieustock = LieuStock::get();

        return view('content.CRUD.muni-crud', compact('munis', 'comms', 'lieustock'));
    }

    public function store(Request $request)
    {
      try
      {
          $this->validate($request, [

            'type' => 'required|max:255|min:3',
             'libelle' => 'required|max:255',
            // 'quantite' => 'required|max:255',
            'lieu_stock_id' => 'required',
          ]);

          $muni = Munition::create([

            'type' => $request->type,
             'libelle' => $request->libelle,
            // 'quantite' => $request->quantite,
            'lieu_stock_id' => $request->lieu_stock_id,

          ]);
          if ($muni) {
            Alert::success( 'Reussite','L\'enregistrement a bien été effectué !');
            return redirect('/Munition');
          } else {
            Alert::error('Erreur', 'L\'enregistrement n\'a pas bien été effectué !');
            return redirect('/Munition');
          }
      }catch(\Throwable $th){
      Alert::error('Erreur','L\'enregistrement n\'a pas bien été effectué !');
      return redirect('/Munition');
      }

    }


    public function update(Request $request, $id)
    {
      try
      {
          $id = decrypt($id);

          $muni = Munition::find($id);
          $muni->type = $request->type;
          // $muni->libelle = $request->libelle;
          // $muni->quantite = $request->quantite;
          $muni->lieu_stock_id = $request->lieu_stock_id;
          $muni->save();

          if ($muni) {
            Alert::success('Reussite','Munition a ete bien modifier !');
            return redirect('/Munition');
          } else {
            Alert::error('Erreur', 'Modifier non effectue !');
            return redirect('/Munition');
          }
      }catch(\Throwable $th){
      Alert::error('Erreur', 'Modifier non effectue !');
      return redirect('/Munition');
      }


    }


    public function destroy($id)
    {
      try
      {
        $id = decrypt($id);

        $muni = Munition::findOrFail($id);

        $muni->delete($id);
        Alert::success('Réussite', 'La munition a bien été supprimé !');
        return redirect('/Munition');
      }catch(\Throwable $th){
      Alert::error( 'Erreur', 'Suppression non effectue !');
      return redirect('/Munition');
      }


    }
}
