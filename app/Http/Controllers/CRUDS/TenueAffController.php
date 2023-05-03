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
    $tenues = Tenue::latest()->get();
    return view('content.CRUD.tenueaff-crud', compact('tenueaffs', 'comms', 'tenues'));
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
      'commissariat_id' => 'required',
      'tenue_id' => 'required',

    ]);
    for ($i = 0; $i < count($request->tenue_id); $i++) {

      $tenueaff = new TenueAff();
      $tenueaff->commissariat_id = $request->commissariat_id;
      $tenueaff->tenue_id = $request->tenue_id[$i];
      $tenueaff->date_acqui = now();
      $tenueaff->save();
    }
    if ($tenueaff) {
      Alert::success('Affectation reussi avec succes');
      return redirect('/tenueaff');
    } else {
      Alert::info('Affectation non effectuer');
      return redirect('/tenueaff');
    }
    return redirect()->back();
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
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\TenueAff  $tenueAff
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $id = decrypt($id);

    $tenueaff = TenueAff::findOrFail($id);
    $tenueaff->delete();
      Alert::success('Affectation supprimer avec succes');
      return redirect('/tenueaff');

  }
}
