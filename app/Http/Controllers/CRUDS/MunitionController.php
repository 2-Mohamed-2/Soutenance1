<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Munition;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MunitionController extends Controller
{
    //

    public function MuniView()
    {
        $munis = Munition::latest()->get();
        $comms = Commissariat::latest()->get();

        return view('content.CRUD.muni-crud', compact('munis', 'comms'));
    }

    public function store(Request $request){

        $this->validate($request,[

            'type' => 'required|max:255',
            'libelle' => 'required|max:255',
            'stock' => 'required|max:255',
            'commissariats_id' => 'required|',
        ]);

        $muni = Munition::create([

            'type' => $request->type,
            'libelle' => $request->libelle,
            'stock' => $request->stock,
            'commissariats_id' => $request->commissariats_id,

        ]);
        if ($muni) {
            toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Munition');
        } else {
            toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Munition');
        }
    }


    public function update(Request $request, $id){

        $id = decrypt($id);

        $validateData = $this->validate($request,[

            'type' => 'required|max:255',
            'libelle' => 'required|max:255',
            'stock' => 'required|max:255',
            'commissariats_id' => 'required|',

        ]);

        $muni = Munition::whereId($id)->update($validateData);

        if($muni){
            toastr()->success('Munition a ete bien modifier !', 'Reussite');
            return redirect('/Munition');
        }else{
            toastr()->error('Modifier non effectue !', 'Erreur');
        }

    }


    public function destroy($id){

        $id = decrypt($id);

        $muni = Munition::findOrFail($id);

        $muni->delete($id);
        toastr()->success('La munition a bien été supprimé !', 'Réussite');
        return redirect('/Munition');

    }
}
