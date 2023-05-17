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
        $munition = Munition::all();
        $lieustock = LieuStock::get();

        return view('content.CRUD.muni-crud', compact('munis', 'comms', 'munition', 'lieustock'));
    }

    public function store(Request $request){

        $this->validate($request,[

            'type' => 'required|max:255',
            'libelle' => 'required|max:255',
            'stock' => 'required|max:255',
            'lieu_stock_id' => 'required',
        ]);

        $muni = Munition::create([

            'type' => $request->type,
            'libelle' => $request->libelle,
            'stock' => $request->stock,
            'lieu_stock_id' => $request->lieu_stock_id,

        ]);
        if ($muni) {
            Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Munition');
        } else {
            Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Munition');
        }
    }


    public function update(Request $request, $id){

        $id = decrypt($id);

        $muni = Munition::find($id);
        $muni->type = $request->type;
        $muni->libelle = $request->libelle;
        $muni->stock = $request->stock;
        $muni->lieu_stock_id = $request->lieu_stock_id;
        $muni->save();

        if($muni){
            Alert::success('Munition a ete bien modifier !', 'Reussite');
            return redirect('/Munition');
        }else{
            Alert::error('Modifier non effectue !', 'Erreur');
        }

    }


    public function destroy($id){

        $id = decrypt($id);

        $muni = Munition::findOrFail($id);

        $muni->delete($id);
        Alert::success('La munition a bien été supprimé !', 'Réussite');
        return redirect('/Munition');

    }
}
