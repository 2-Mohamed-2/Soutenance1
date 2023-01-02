<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Armement;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArmementController extends Controller
{
    //

    public function ArmeView()
    {

        $armes = Armement::latest()->get();
        return view('content.CRUD.arme-crud', compact('armes'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            // 'commissariats_id' => 'required',
            'modele' => 'required|max:255',
            'n_serie' => 'required|max:255',
            'revision' => 'required|max:255',
            // 'statut' => 'required|max:255',
            'lieu' => 'required|max:255',
            'stock' => 'required|max:255',

        ]);

        $arme = Armement::create([

            // 'commissariats_id' => $request->commissariats_id,
            'modele' => $request->modele,
            'n_serie' => $request->n_serie,
            'revision' => $request->revision,
            // 'statut' => $request->statut,
            'lieu' => $request->lieu,
            'stock' => $request->stock,

        ]);
        if ($arme) {
            toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Armement');
        } else {
            toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Armement');
        }
    }

    public function update(Request $request, $id){
        $id = decrypt($id);
        $validateData = $this->validate($request,[

            // 'commissariats_id' => 'required',
            'modele' => 'required|max:255',
            'n_serie' => 'required|max:255',
            'revision' => 'required|max:255',
            // 'statut' => 'required|max:255',
            'lieu' => 'required|max:255',
            'stock' => 'required|max:255',

        ]);

        $arme = Armement::whereId($id)->update($validateData);
        if ($arme) {
            toastr()->success('Arme a bien été modifié !', 'Réussite');
            return redirect('/Armement');
        } else {
            toastr()->error('Modification non effectuée !', 'Erreur');
            return redirect('/Armement');
        }
    }

    public function destroy($id)
    {
        $id = decrypt($id);

        $arme = Armement::findOrFail($id);
        $arme->delete();
        toastr()->success('Arme a bien été supprimé !', 'Réussite');
        return redirect('/Armement');

    }
}
