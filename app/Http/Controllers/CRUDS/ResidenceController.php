<?php

namespace App\Http\Controllers\CRUDS;

use PDF;
use Str;
use App\Models\User;
use App\Models\Inconnu;
use App\Models\Residence;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ResidenceController extends Controller
{
  //
  function __construct()
  {
    $this->middleware('permission:resi-list|resi-delete|resi-pdf', ['only' => ['ResiView']]);
    $this->middleware('permission:resi-delete', ['only' => ['destroy']]);
    $this->middleware('permission:resi-pdf', ['only' => ['PDF']]);
  }

    public function ResiView()
    {
      $user = Auth::user();
      if ($user->hasanyrole('Informaticien', 'Administrateur')) 
      {
        $resis = Residence::latest()->get();
        $inconnus = Inconnu::latest()->get();
        $comms = Commissariat::latest()->get();

        return view('content.CRUD.resi-crud', compact('resis', 'inconnus','comms'));

      }
      elseif ($user->hasrole('Commissaire')) {

        $resis = Residence::where('commissariat_id', '=', Auth::user()->commissariat->id)->latest()->get();
        $inconnus = Inconnu::latest()->get();
        $comms = Commissariat::latest()->get();

        return view('content.CRUD.resi-crud', compact('resis', 'inconnus','comms'));

      }
      elseif ($user->hasrole('Membre')) {

        $resis = Residence::where('commissariat_id', '=', Auth::user()->commissariat->id)->latest()->get();
        $inconnus = Inconnu::latest()->get();
        $comms = Commissariat::latest()->get();

        return view('content.CRUD.resi-crud', compact('resis', 'inconnus','comms'));

      }
      
    }


    public function destroy($id)
    {
      try{
        $id = decrypt($id);
        $resi = Residence::findOrFail($id);
        $resi->delete();
        Alert::success('Réussite', 'La residence a bien été supprimé !');
        return redirect()->back();
      }
      catch(\Throwable $th){
      Alert::error('Erreur', 'Suppression non effectuée !');
      return redirect()->back();
      }

    }

    public function PDF(Request $request) {
      try 
      {

        $resi = Residence::find(Crypt::decrypt($request->id));
        $pdf = PDF::loadView('_partials.pdfResi',  compact('resi'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();

        $pdf->save(public_path("storage/documents/".$resi->inconnu->nomcomplet.".pdf"));      
      // return $pdf->download(Str::slug($resi->inconnu->nomcomplet).".pdf");

      }

      catch (\Throwable $th) 
      {
        Alert::error('Echec', 'Veuillez reessayer !');
        return redirect()->back();
      }
      
    }


}
