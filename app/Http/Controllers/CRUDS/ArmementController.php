<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Armement;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LieuStock;
use RealRashid\SweetAlert\Facades\Alert;

class ArmementController extends Controller
{
  function __construct()
  {
    $this->middleware('permission:arme-list|arme-create|arme-edit|arme-delete', ['only' => ['ArmeView', 'store']]);
    $this->middleware('permission:arme-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:arme-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:arme-delete', ['only' => ['destroy']]);
  }

    public function ArmeView(Request $request)
    {
      $search = $request['search'] ?? "";
      if($search != ""){
        $armes = Armement::where('modele', 'LIKE', "%$search%")
        ->orWhere('n_serie', 'LIKE', "%$search%")
        ->get();

      }else{
      $armes = Armement::paginate(5);
      }


        $comms = Commissariat::latest()->get();
        $armements = Armement::latest()->get();
        $lieustock = LieuStock::get();
        return view('content.CRUD.arme-crud', compact('armes', 'comms', 'armements', 'search','lieustock'));
    }

    public function store(Request $request)
    {
      try
      {
          $this->validate($request, [

            // 'commissariats_id' => 'required',
            'modele' => 'required|max:255|min:4',
            'n_serie' => 'required|max:255',
            // 'revision' => 'required|max:255',
            // 'statut' => 'required|max:255',
            // 'lieu' => 'required|max:255',
            'quantite' => 'required|max:255',
            'lieu_stock_id' => 'required'

          ]);

          $arme = Armement::create([

            // 'commissariats_id' => $request->commissariats_id,
            'modele' => $request->modele,
            'n_serie' => $request->n_serie,
            // 'revision' => $request->revision,
            // 'statut' => $request->statut,
            // 'lieu' => $request->lieu,
            'quantite' => $request->stock,
            'lieu_stock_id' => $request->lieu_stock_id,

          ]);
          if ($arme) {
            Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Armement');
          } else {
            Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Armement');
            }
      }catch (\Throwable $th){
        Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Armement');

      }

    }

    public function update(Request $request, $id){
      try{

          $id = decrypt($id);

          $arme = Armement::find($id);
          $arme->modele = $request->modele;
          $arme->n_serie = $request->n_serie;
          $arme->quantite = $request->quantite;
          $arme->lieu_stock_id = $request->lieu_stock_id;
          $arme->save();

          if ($arme) {
            Alert::success('Arme a bien été modifié !', 'Réussite');
            return redirect('/Armement');
          } else {
            Alert::error('Modification non effectuée !', 'Erreur');
            return redirect('/Armement');
          }
      } catch (\Throwable $th){
        Alert::error('Modification non effectuée !', 'Erreur');
        return redirect('/Armement');
      }

    }

    public function destroy($id)
    {
      try{
        $id = decrypt($id);

        $arme = Armement::findOrFail($id);
        $arme->delete();
        Alert::success('Arme a bien été supprimé !', 'Réussite');
        return redirect('/Armement');
      }catch (\Throwable $th){
      Alert::error('Suppression non effectuée !', 'Erreur');
      return redirect('/Armement');
      }


    }
}
