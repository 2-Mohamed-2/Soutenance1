<?php

namespace App\Http\Controllers\CRUDS;


use App\Models\User;
use App\Models\Statut;
use App\Models\Vehicule;
use App\Models\VoitAffecte;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class VoitAffecteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $voitaffectes = VoitAffecte::paginate(5);
    $users = User::latest()->get();
    $comms = Commissariat::latest()->get();
    $statuts = Statut::latest()->get();
    $vehicules = Vehicule::latest()->get();
    return view('content.CRUD.voit-crud', compact('voitaffectes', 'users', 'comms', 'statuts', 'vehicules'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //


    $data = $this->validate($request, [

        // 'user_id' => 'required',
        'commissariat_id' => 'required',
        'vehicule_id' => 'required',
        // 'statut_id' => 'required',
    ]);
    for($i = 0; $i < count($request->vehicule_id); $i++ )
    {

      $voitaffecte = new VoitAffecte;
      $voitaffecte->commissariat_id = $request->commissariat_id;
      $voitaffecte->vehicule_id = $request->vehicule_id[$i];
      $voitaffecte->date_acqui = now();
      $voitaffecte->save();
    }

    if($voitaffecte){
      Alert::success('Affectation reussi avec succes');
      return redirect('/voitaffecte');
    }else{
      Alert::info('Affectation non effectuer');
      return redirect('/voitaffecte');
    }
    return redirect()->back();
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

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
    $id = decrypt($id);
    $validateData = $this->validate($request, [

      // 'user_id' => 'required',
      'commissariat_id' => 'required',
      'vehicule_id' => 'required',
      // 'statut_id' => 'required',
      // 'date_acqui' => 'required|max:255',

    ]);

    $voitaffecte = VoitAffecte::whereId($id)->update($validateData);
    if ($voitaffecte) {
      Alert::success('Affectation a ete bien modifier !', 'Reussite');
      return redirect('/voitaffecte');
    } else {
      Alert::info('Modifier non effectue !', 'Erreur');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
    $voitaffecte = VoitAffecte::findOrFail($id);
    $voitaffecte->delete();
    if ($voitaffecte) {
      Alert::success('Affectation supprimer avec succes');
    } else {
      Alert::error('Affectation non supprimer');
    }
    return redirect()->back();
  }
}
