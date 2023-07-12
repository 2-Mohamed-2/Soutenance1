<?php

namespace App\Http\Controllers\UserCompte;

use Carbon\Carbon;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Models\AffectationUser;
use App\Http\Controllers\Controller;
use App\Models\SessionUser;
use Illuminate\Support\Facades\Auth;
use Yudhatp\ActivityLogs\ActivityLogs;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfilView extends Controller
{
  public function index(Request $request)
  {
    // dd(today());

    if (Auth::user()->Commissariat) {
      $comms = Commissariat::where('id', '!=', Auth::user()->Commissariat->id)->get();
    }
    else {
      $comms = Commissariat::all();
    }

    $sessions = SessionUser::where([
      ['user_id', Auth::user()->id],
      ['deconnexion', '!=', null]
      ])->limit(5)->get();
    // dd($sessions);
    
    return view('content.pages.pages-profile-user', compact('comms', 'sessions'));
  }

  public function affectationUser(Request $request)
  {

    try {

      $this->validate($request, [
        'motif' => 'required',
        'commissariat_id' => 'required',
      ]);

      // dd(url()->current());

      $affUser = AffectationUser::create([
        'motif' => $request->motif,
        'user_id' => Auth::user()->id,
        'commissariat_id' => $request->commissariat_id,
      ]);

      // dd($affUser);
      if ($affUser) {
        
        $ok = Carbon::create($affUser->created_at);
        AffectationUser::whereId($affUser->id)->update([
          'delaiExpiration' => $ok->addDay(10),
        ]);

        if ($affUser->delaiExpiration  ) {
          # code...
        }

        Alert::success('Réussite', 'Votre demande a bien été envoyée ! Vous receverez un email dans les 10 prochains jours et si tel n\'est pas le cas, sachez que votre ');
        return redirect('/Compte/Profil');
      } else {
        Alert::error('Erreur', 'L\operation a rencontre une erreur !');
        return redirect('/Compte/Profil');
      }


    } catch (\Throwable $th) {
      Alert::error('Erreur', 'L\operation a rencontre une erreur !');
      return redirect('/Compte/Profil');
    }

  }

}