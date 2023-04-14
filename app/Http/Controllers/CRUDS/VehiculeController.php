<?php

namespace App\Http\Controllers\CRUDS;


use App\Models\User;
use App\Models\Statut;
use App\Models\Vehicule;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class VehiculeController extends Controller
{

    public function VehiView(Request $request){
        $vehicules = Vehicule::paginate(5);
        $comms = Commissariat::latest()->get();
        $users = User::latest()->get();
            return view('content.CRUD.vehi-crud', compact('vehicules', 'comms', 'users'));

    }


    public function search(Request $request){
      $query = $request->get('query');
      $filterResult = Vehicule::where('type', 'LIKE', '%' . $query . '%')->get();
      return response()->json($filterResult);
    }



    public function index(Request $request)
    {
    //

    }


    public function store(Request $request)
    {
       $data = $this->validate($request, [

            'type' => 'required|max:255',
            // 'identifiant' => 'required',
            'modele' => 'required|max:255',
            'plaque' => 'required|max:255',
            // 'revision' => 'required|max:255',
            // 'commissariat_id' => 'max:255',

        ]);
        //  $vehi = Vehicule::create($data);
        //  $vehi->commissariat_id = 0;
        //  $vehi->save();

        $vehi = Vehicule::create($data);

        if ($vehi) {
            alert()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            // return route('Vehi.index');
            return redirect('/Vehicule');
        } else {
         Alert::info('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
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

            'type' => 'required',
            // 'identifiant' => 'required',
            'modele' => 'required',
            // 'plaque' => 'max:255',
            // 'revision' => 'required|max:255',
            // 'commissariat_id' => 'max:255',

        ]);

        $vehi = Vehicule::whereId($id)->update($validateData);

        if ($vehi) {
       Alert::info('Le vehicule a bien été modifié !', 'Réussite');
            return redirect('/Vehicule');
        } else {
      Alert::info('Modification non effectuée !', 'Erreur');
            return redirect('/Vehicule');
        }
    }

    public function destroy($id)
    {
        $id = decrypt($id);

        $vehi = Vehicule::findOrFail($id);
        $vehi->delete();

       Alert::info('Le Vehicule a bien été supprimé !', 'Réussite');
        return redirect('/Vehicule');
    }
}
