<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\User;
use App\Models\Avoir;
use App\Models\Statut;
use App\Models\Armement;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AvoirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $avoirs = Avoir::latest()->get();
        // $users = User::latest()->get();
        $comms = Commissariat::latest()->get();
        $armements = Armement::latest()->get();
        // $statuts = Statut::latest()->get();

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

        $this->validate($request,[

        // 'user_id' => 'required',
        'commissariat_id' => 'required',
        'armement_id' => 'required',
        // 'statut_id' => 'required',
        'date_acqui' => 'required|max:255',

        ]);

        $avoir = Avoir::create([

        // 'user_id' => $request->user_id,
        'commissariat_id' => $request->commissariat_id,
        'armement_id' => $request->armement_id,
        // 'statut_id' => $request->statut_id,
        'date_acqui' => $request->date_acqui,

        ]);

        if ($avoir) {
            toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Avoir');
        } else {
            toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
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
        //
        $id = decrypt($id);
        $validateData = $this->validate($request,[

        // 'user_id' => 'required',
        'commissariat_id' => 'required',
        'armement_id' => 'required',
        // 'statut_id' => 'required',
        'date_acqui' => 'required|max:255',

        ]);

        $avoir = Avoir::whereId($id)->update($validateData);
        if($avoir)
        {
            toastr()->success('avoir a ete bien modifier !', 'Reussite');
            return redirect('/Avoir');
        }else{
            toastr()->error('Modifier non effectue !', 'Erreur');
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
        //
        $id = decrypt($id);

        $avoir = Avoir::findOrFail($id);
        $avoir->delete($id);
        toastr()->success('L\' avoir a ete bien ete supprimer', 'Reussite');
        return redirect('/Avoir');
    }
}
