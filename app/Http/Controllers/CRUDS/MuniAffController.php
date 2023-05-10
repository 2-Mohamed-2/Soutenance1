<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\MuniAff;
use App\Models\Munition;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MuniAffController extends Controller
{
  function __construct()
  {
    $this->middleware('permission:muniaff-list|muniaff-create|muniaff-edit|muniaff-delete', ['only' => ['index', 'store']]);
    $this->middleware('permission:muniaff-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:muniaff-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:muniaff-delete', ['only' => ['destroy']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $muniaff = MuniAff::paginate(5);
        $comms = Commissariat::all();
        $munition = Munition::get();
        return view('content.CRUD.muniaff-crud', compact('muniaff', 'comms', 'munition'));
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
        $data =  $this->validate($request,[
          'commissariat_id' => 'required',
          'munition_id' => 'required'
        ]);
        for($i= 0; $i < count($request->munition_id); $i++)
        {
          $muniaff = new MuniAff();
          $muniaff->commissariat_id = $request->commissariat_id;
          $muniaff->munition_id = $request->commissariat_id[$i];
          $muniaff->date_acqui = now();
          $muniaff->save();
        }
         if ($muniaff)
         {
          Alert::success('Affectation reussi avec succes');
          return redirect('/muniaff');
         } else
         {
          Alert::info('Affectation non effectuer');
          return redirect('/muniaff');
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
      $id = decrypt($id);
      $muniaff = MuniAff::find($id);
      $muniaff->commissariat_id = $request->commissariat_id;
      $muniaff->munition_id = $request->munition_id;
      $muniaff->save();
      if ($muniaff)
      {
      Alert::success('Affectation a ete bien modifier !', 'Reussite');
        return redirect('/muniaff');
      } else
      {
       Alert::info('Modifier non effectue !', 'Erreur');
        return redirect('/muniaff');
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
        $id = decrypt($id);
        $muniaff = MuniAff::findOrFail($id);
        $muniaff->delete();
        Alert::success('Affectation supprimer avec succes');
        return redirect('/muniaff');

    }
}
