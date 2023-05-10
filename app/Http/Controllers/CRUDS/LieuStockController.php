<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\LieuStock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LieuStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lieustock = LieuStock::get();
        return view('content.CRUD.lieustock-crud', compact('lieustock'));
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
        $data = $this->validate($request,[
            'entrepot' => 'required',
            'ville' => 'required'
        ]);

        $lieustock = new LieuStock();
        $lieustock->entrepot = $request->entrepot;
        $lieustock->ville = $request->ville;
        $lieustock->save();
        if ($lieustock) {
            Alert::success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/lieustock');
        } else {
            Alert::error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/lieustock');
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
        $id = decrypt($id);
        $lieustock = LieuStock::find($id);
        $lieustock->entrepot = $request->entrepot;
        $lieustock->ville = $request->ville;
        $lieustock->save();
    if ($lieustock) {
      Alert::success('Lieu a ete bien modifier !', 'Reussite');
      return redirect('/lieustock');
    } else {
      Alert::info('Modifier non effectue !', 'Erreur');
      return redirect('/lieustock');
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
        $lieustock = LieuStock::findOrFail($id);
        $lieustock->delete();
        Alert::success('Affectation supprimer avec succes');
        return redirect('/lieustock');
    }
}
