<?php

namespace App\Http\Controllers\CRUDS;

use PDF;
use Str;
use App\Models\Inconnu;
use App\Models\Residence;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ResidenceController extends Controller
{
  //
  function __construct()
  {
    $this->middleware('permission:resi-list|resi-create|resi-edit|resi-delete', ['only' => ['ResiView', 'store']]);
    $this->middleware('permission:resi-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:resi-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:resi-delete', ['only' => ['destroy']]);
  }

    public function ResiView(){

        $resis = Residence::latest()->get();
        $inconnus = Inconnu::latest()->get();
        $comms = Commissariat::latest()->get();
        return view('content.CRUD.resi-crud', compact('resis', 'inconnus','comms'));
    }

    public function index(){
        //
    }

    public function store(Request $request)
    {
       try{
          $this->validate($request, [
            // 'inconnu_id' => 'required',
            // 'numero' => 'required|max:255',
            'certifions' => 'required|max:255',
            'ne' => 'required|max:255',
            'a' => 'required|max:255',
            'fils' => 'required|max:255',
            'et' => 'required|max:255',
            'profession' => 'required|max:255',
            'resulte' => 'required|max:255',
            'domicile' => 'required|max:255',
            // 'kati' => 'required|max:255',
            'commissariat_id' =>'required'

          ]);

          $resi = Residence::create([

            // 'inconnu_id' => $request->inconnu_id,
            // 'numero' => $request->numero,
            'certifions' => $request->certifions,
            'ne' => $request->ne,
            'a' => $request->a,
            'fils' => $request->fils,
            'et' => $request->et,
            'profession' => $request->profession,
            'resulte' => $request->resulte,
            'domicile' => $request->domicile,
            // 'kati' => $request->kati,
            'commissariat_id' => $request->commissariat_id,

          ]);

          if ($resi) {
            Alert::success('Réussite', 'L\'enregistrement a bien été effectué !');
            return redirect('/Residence');
          } else {
            Alert::error('Erreur', 'L\'enregistrement n\'a pas bien été effectué !');
            return redirect('/Residence');
          }
       }catch(\Throwable $th){
       Alert::error( 'Erreur', 'L\'enregistrement n\'a pas bien été effectué !');
       return redirect('/Residence');
       }


    }

    public function update(Request $request, $id)
    {
      try{
          $id = decrypt($id);
          $resi = Residence::find($id);

          // 'numero' => $require->$
          $resi->certifions = $request->certifions;
          $resi->ne = $request->ne;
          $resi->a = $request->a;
          $resi->fils = $request->fils;
          $resi->profession = $request->profession;
          $resi->resulte = $request->resulte;
          $resi->domicile = $request->domicile;
          // $resi->kati = $request->kati;
          $resi->save();

          if ($resi) {
            Alert::success('Réussite', 'La residence a bien été modifié !');
            return redirect('/Residence');
          } else {
            Alert::error('Erreur', 'Modification non effectuée');
            return redirect('/Residence');
          }
      }catch(\Throwable $th){
      Alert::error('Erreur', 'Modification non effectuée !');
      return redirect('/Residence');
      }


    }

    public function destroy($id)
    {
      try{
        $id = decrypt($id);
        $resi = Residence::findOrFail($id);
        $resi->delete();
        Alert::success('Réussite', 'La residence a bien été supprimé !');
        return redirect('/Residence');
      }catch(\Throwable $th){
      Alert::error('Erreur', 'Suppression non effectuée !');
      return redirect('/Residence');
      }

    }


    public function PDF(Request $request) {
      // $id = decrypt($id);
       $resi = Residence::find($request->id);
       $pdf = PDF::loadView('_partials.pdfResi',  compact('resi'));
       $pdf->setPaper('A4', 'landscape');
       return $pdf->stream();

      $pdf->save(public_path("storage/documents/".$resi->inconnu->nomcomplet.".pdf"));      
      // return $pdf->download(Str::slug($resi->inconnu->nomcomplet).".pdf");
    }


}
