<?php

namespace App\Http\Controllers\authentications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Http\Requests\LoginRequest;

class LoginCover extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login-cover', ['pageConfigs' => $pageConfigs]);
  }
  public function store(LoginRequest $request)
    {
        $request->authenticate();

        // dd($request->ip());

        // Session::create([
        //     'user_id'=> Auth::user()->id,
        //     'debut'=> Carbon::now()->toDateTimeString(),
        //     'ip_address'=> $request->ip(),
        // ]);

        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
        // if (Auth::user()->isActive == false) {
        //     return redirect('/Profil')->with('info', "Veuillez s'il vous plait changer de mot de passe avant de continuer !");
        // }
        // else {

        // }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // $test = Auth::user()->sessions->last();
        // $test->fin = Carbon::now()->toDateTimeString();
        // $test->save();

        // dd($test->debut);
        // $id = User::findOrFail(Auth::user()->id);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
