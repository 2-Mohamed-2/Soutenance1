<?php

namespace App\Http\Controllers\CRUDS;


use App\Models\User;
use App\Models\Statut;
use App\Models\Vehicule;
use App\Models\VoitAffecte;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenue;
use RealRashid\SweetAlert\Facades\Alert;

class VoitAffecteController extends Controller
{
  function __construct()
  {
    $this->middleware('permission:voitaffecte-list|voitaffecte-create|voitaffecte-edit|voitaffecte-delete', ['only' => ['index', 'store']]);
    $this->middleware('permission:voitaffecte-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:voitaffecte-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:voitaffecte-delete', ['only' => ['destroy']]);
  }

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
    $vehicules = Vehicule::latest()->get();
    return view('content.CRUD.voit-crud', compact('voitaffectes', 'users', 'comms', 'vehicules'));
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
    try{
      $data = $this->validate($request, [

        // 'user_id' => 'required',
        'commissariat_id' => 'required',
        'vehicule_id' => 'required',
        // 'statut_id' => 'required',
      ]);
      //for ($i = 0; $i < count($request->vehicule_id); $i++) {

        $voitaffecte = new VoitAffecte;
        $voitaffecte->commissariat_id = $request->commissariat_id;
        $voitaffecte->vehicule_id = $request->vehicule_id;//[$i];
        $voitaffecte->date_acqui = now();
        $voitaffecte->save();
      // }

      if ($voitaffecte) {
        Alert::success('Success', 'Affectation reussi avec succes');
        return redirect('/voitaffecte');
      } else {
        Alert::error('Erreur', 'Affectation non effectuer');
        return redirect('/voitaffecte');
      }
      return redirect()->back();
    }catch(\Throwable $th){
      Alert::error('Erreur', 'Affectation non effectuer');
      return redirect('/vehicule');
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
    try{
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
        Alert::success('Reussite', 'Affectation a ete bien modifier !');
        return redirect('/voitaffecte');
      } else {
        Alert::error('Erreur', 'Modifier non effectue !');
        return redirect('/voitaffecte');
      }
    }catch(\Throwable $th){
      Alert::error('Erreur', 'Modifier non effectue !');
      return redirect('/voitaffecte');
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
    try{
      $id = decrypt($id);

      $voitaffecte = VoitAffecte::findOrFail($id);
      $voitaffecte->delete();

      Alert::success('Success', 'Affectation supprimer avec succes');
      return redirect('/voitaffecte');
    }catch(\Throwable $th){
      Alert::error('Erreur', 'Modifier non effectue !');
      return redirect('/voitaffecte');
    }


  }

  public function affecterVoiture(Request $req, $voiture_id)
  {
    // $id = decrypt($voiture_id);
    $voitureInfos = Vehicule::where('id',$voiture_id)->first();
    // return view('content.CRUD.voit-crud',compact('voitureInfos'));
    $validateData = $this->validate($req, [
      'commissariat_id' => 'required',
      'quantite' => 'required',
    ]);
    if($req->quantite > $voitureInfos->quantite || $req->quantite == 0){
      Alert::error('Erreur', 'Quantite insuffisante !');
      return redirect('/vehicule');
    }
    else
    {
      $affecteVoiture = new VoitAffecte;
      $affecteVoiture->commissariat_id = $req->commissariat_id;
      $affecteVoiture->vehicule_id = $voiture_id;
      $affecteVoiture->quantite = $req->quantite;
      $affecteVoiture->date_acqui = now();
      $affecteVoiture->save();
      if($affecteVoiture)
      {
        $updateVoiture = Vehicule::find($voitureInfos->id);
        $updateVoiture->quantite -= $req->quantite;
        $updateVoiture->update();
      }
      Alert::success('Success', 'Affectation réussite');
      return redirect('/vehicule');

    }

  }
}



