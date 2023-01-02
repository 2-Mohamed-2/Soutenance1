<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Statut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $statuts = Statut::latest()->get();

        return view('content.CRUD.statut-crud', compact('statuts'));
    }

    public function StatutView(){
        //
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

            'libelle' => 'required|max:255',

        ]);

        $statut = Statut::create([

            'libelle' => $request->libelle,

        ]);
        if ($statut) {
            toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Statut');
        } else {
            toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Statut');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function show(Statut $statut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function edit(Statut $statut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $id = decrypt($id);
        // dd($id);

        $validateData = $this->validate($request, [
            'libelle' => 'required|max:255',
        ]);

        $statut = Statut::whereId($id)->update($validateData);
        if ($statut) {
            toastr()->success('Le statut a bien été modifié !', 'Réussite');
            return redirect('/Statut');
        } else {
            toastr()->error('Modification non effectuée !', 'Erreur');
            return redirect('/Statut');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $id = decrypt($id);
        $statut = Statut::findOrFail($id);
        $statut->delete();
        toastr()->success('Ls statut a bien été supprimé !', 'Réussite');
        return redirect('/Statut');

    }
}
