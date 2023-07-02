<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\User;
use App\Models\Avoir;
use App\Models\Statut;
use App\Models\Armement;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AvoirController extends Controller
{

  function __construct()
  {
    $this->middleware('permission:arme-affecte-list|arme-affecte-create|arme-affecte-edit|arme-affecte-delete', ['only' => ['index', 'store']]);
    $this->middleware('permission:arme-affecte-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:arme-affecte-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:arme-affecte-delete', ['only' => ['destroy']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $avoirs = Avoir::paginate(5);
        $comms = Commissariat::latest()->get();
        $armements = Armement::latest()->get();

        return view('content.CRUD.avoir-crud', compact('avoirs', 'comms', 'armements'));

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
        try{
            $data = $this->validate($request, [

              // 'user_id' => 'required',
              'commissariat_id' => 'required',
              'armement_id' => 'required',
              'quantite' => 'required',
              // 'statut_id' => 'required',
              // 'date_acqui' => 'required|max:255',

            ]);

            // for ($i = 0; $i < count($request->armement_id); $i++) {
              $avoir = new Avoir;
              $avoir->commissariat_id = $request->commissariat_id;
              $avoir->armement_id = $request->armement_id; //[$i];
              $avoir->quantite = $request->quantite;//[$i];
              $avoir->date_acqui = now();
              $avoir->save();
            // }


            if ($avoir) {
              Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
              return redirect('/Avoir');
            } else {
              Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
              return redirect('/Avoir');
            }
        }catch (\Throwable $th){
          Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
          return redirect('/Avoir');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avoir  $avoir
     * @return \Illuminate\Http\Response
     */
    public function show(Avoir $avoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avoir  $avoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Avoir $avoir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avoir  $avoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try{

          $id = decrypt($id);
          $validateData = $this->validate($request, [

            // 'user_id' => 'required',
            'commissariat_id' => 'required',
            'armement_id' => 'required',
            'quantite' => 'required',
            // 'statut_id' => 'required',
            'date_acqui' => 'required|max:255',

          ]);

          $avoir = Avoir::whereId($id)->update($validateData);
          if ($avoir) {
            Alert::success('avoir a ete bien modifier !', 'Reussite');
            return redirect('/Avoir');
          } else {
            Alert::error('Modifier non effectue !', 'Erreur');
            return redirect('/Avoir');
          }

      }catch (\Throwable $th){
      Alert::error('Suppression non effectue !', 'Erreur');
      return redirect('/Avoir');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avoir  $avoir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try{
          $id = decrypt($id);

          $avoir = Avoir::findOrFail($id);
          $avoir->delete($id);
          Alert::success('L\'avoir a ete bien ete supprimer', 'Reussite');
          return redirect('/Avoir');
      }catch (\Throwable $th){
      Alert::error('Suppression non effectue !', 'Erreur');
      return redirect('/Avoir');
      }

    }

    public function affecterArme(Request $req,$id)
    {
      try{

        $id = decrypt($id);
      $armeaffInfos = Armement::where('id', $id)->first();
      $data = $this->validate($req, [
        'commissariat_id' => 'required',
        'quantite' => 'required',
      ]);
      if($req->quantite > $armeaffInfos->quantite || $req->quantite == 0)
      {
        Alert::error('Erreur', 'Quantite insuffisante !');
        return redirect('/Armement');
      }
      else
      {
        $armeAff = new Avoir;
        $armeAff->commissariat_id = $req->commissariat_id;
        $armeAff->armement_id = $id;
        $armeAff->quantite = $req->quantite;
        $armeAff->date_acqui = now();
        $armeAff->save();
      }
      if($armeAff)
      {
        $updatearmeAff = Armement::find($armeaffInfos->id);
        $updatearmeAff->quantite -= $req->quantite;
        $updatearmeAff->update();
      }
        Alert::success('Success', 'Affectation réussite');
        return redirect('/Avoir');
    }catch(\Throwable $th){
      Alert::error('Erreur', 'Affectation non réussite');
      return redirect('/Armement');
    }

    }

}
