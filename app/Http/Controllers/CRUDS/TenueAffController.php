<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Tenue;
use App\Models\TenueAff;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TenueAffController extends Controller
{

  function __construct()
  {
    $this->middleware('permission:tenueaff-list|tenueaff-create|tenueaff-edit|tenueaff-delete', ['only' => ['index', 'store']]);
    $this->middleware('permission:tenueaff-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:tenueaff-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:tenueaff-delete', ['only' => ['destroy']]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $tenueaffs = TenueAff::paginate(5);
    $comms = Commissariat::all();
    $tenue = Tenue::all();
    return view('content.CRUD.tenueaff-crud', compact('tenueaffs', 'comms', 'tenue'));
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
          'commissariat_id' => 'required',
          'tenue_id' => 'required',
          'quantite' => 'required',

        ]);
        // for ($i = 0; $i < count($request->tenue_id); $i++) {

          $tenueaff = new TenueAff();
          $tenueaff->commissariat_id = $request->commissariat_id;
          $tenueaff->tenue_id = $request->tenue_id;
          $tenueaff->date_acqui = now();
          $tenueaff->quantite = $request->quantite;
          $tenueaff->save();
        // }
        if ($tenueaff) {
          Alert::success('Affectation reussi avec succes');
          return redirect('/tenueaff');
        } else {
          Alert::info('Affectation non effectuer');
          return redirect('/tenueaff');
        }
        return redirect()->back();
    }catch(\Throwable $th){
      Alert::info('Affectation non effectuer');
      return redirect('/tenueaff');
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\TenueAff  $tenueAff
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\TenueAff  $tenueAff
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
   * @param  \App\Models\TenueAff  $tenueAff
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request,$id)
  {
    try{
      $id = decrypt($id);

      $tenueaff = TenueAff::find($id);
      $tenueaff->commissariat_id = $request->commissariat_id;
      $tenueaff->tenue_id = $request->tenue_id;
      $tenueaff->save();
      if ($tenueaff) {
        Alert::success('Affectation a ete bien modifier !', 'Reussite');
        return redirect('/tenueaff');
      } else {
        Alert::info('Modifier non effectue !', 'Erreur');
        return redirect('/tenueaff');
      }
    }catch(\Throwable $th){
      Alert::info( 'Erreur', 'Modifier non effectue !');
      return redirect('/tenueaff');
    }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\TenueAff  $tenueAff
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try{
      $id = decrypt($id);

      $tenueaff = TenueAff::findOrFail($id);
      $tenueaff->delete();
      Alert::success('Affectation supprimer avec succes');
      return redirect('/tenueaff');
    }catch(\Throwable $th){
      Alert::info('Erreur', 'Suppression non effectue !');
      return redirect('/tenueaff');
    }


  }

  public function affecterTenue(Request $req, $tenueaff_id)
  {
    // $id = decrypt($tenueaff_id);
     $tenueaffInfos = Tenue::where('id',$tenueaff_id)->first();

     $data = $this->validate($req, [
       'commissariat_id' => 'required',
       'quantite' => 'required',

     ]);

     if($req->quantite > $tenueaffInfos->quantite || $req->quantite == 0) {
       Alert::error('Erreur', 'Quantite insuffisante !');
       return redirect('/Tenue');
     }
     else
     {
       $affecteTenue = new TenueAff;
       $affecteTenue->commissariat_id = $req->commissariat_id;
       $affecteTenue->tenue_id = $tenueaff_id;
       $affecteTenue->quantite = $req->quantite;
       $affecteTenue->date_acqui = now();
       $affecteTenue->save();
       if($affecteTenue)
       {
         $updateaffTenue = Tenue::find($tenueaffInfos->id);
         $updateaffTenue->quantite -= $req->quantite;
         $updateaffTenue->update();
       }
      Alert::success('Success', 'Affectation réussite');
       return redirect('/tenueaff');
     }

  }

}
