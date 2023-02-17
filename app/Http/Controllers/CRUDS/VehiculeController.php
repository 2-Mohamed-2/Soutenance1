<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Vehicule;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehiculeController extends Controller
{

    public function VehiView(){
        $vehis = Vehicule::latest()->get();
        $comms = Commissariat::latest()->get();
            return view('content.CRUD.vehi-crud', compact('vehis', 'comms'));
    }

        public function index()
        {

        }

    public function store(Request $request)
    {
       $data = $this->validate($request, [

            'type' => 'required|max:255',
            'identifiant' => 'required',
            'modele' => 'required|max:255',
            'plaque' => 'required|max:255',
            'revision' => 'required|max:255',
            'commissariat_id' => 'required|max:255',

        ]);

        $vehi = Vehicule::create($data);

        if ($vehi) {
            toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Vehicule');
        } else {
            toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Vehicule');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $validateData = $this->validate($request, [

            'type' => 'required|max:255',
            'identifiant' => 'required',
            'modele' => 'required|max:255',
            'plaque' => 'required|max:255',
            'revision' => 'required|max:255',
            'commissariat_id' => 'required|max:255',

        ]);

        $vehi = Vehicule::whereId($id)->update($validateData);

        if ($vehi) {
            toastr()->success('Le vehicule a bien été modifié !', 'Réussite');
            return redirect('/Vehicule');
        } else {
            toastr()->error('Modification non effectuée !', 'Erreur');
            return redirect('/Vehicule');
        }
    }

    public function destroy($id)
    {
        $id = decrypt($id);

        $vehi = Vehicule::findOrFail($id);
        $vehi->delete();

        toastr()->success('Le Vehicule a bien été supprimé !', 'Réussite');
        return redirect('/Vehicule');
    }
}
