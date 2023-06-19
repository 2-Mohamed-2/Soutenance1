<?php

namespace App\Http\Controllers\Visitors;

use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Features;
use Illuminate\Routing\Pipeline;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;

class InconnuConnexionController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard) {
        $this->guard = $guard;
    }

    /**
     * Show the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LoginViewResponse
     */
    // public function create(Request $request) {
    //     if (Auth::guard('inconnu')->user()) {
    //         return redirect('admin/dashborad');
    //     } else {
    //         return view('admin-login');
    //     }
    // }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function test(Request $request) 
    {
                
        $validator = Validator::make($request->all(), [
                    'n_ci' => 'required',
                    'password' => 'required',
        ]);

        // dd($validator);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $n_ci = $request->n_ci;
        $password = $request->password;

        if (Auth::guard('inconnu')->attempt(['n_ci' => $n_ci, 'password' => $password])) {
            Alert::info('Réussite', 'Bonjour et bienvenue sur Coms_Ml.');
            return redirect()->back();
        }
        else{
            Alert::error('Echec', 'Operation echouee !');
            return redirect()->back();
        }
    }

  

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy2(Request $request) {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Alert::info('Réussite', 'Coms_Ml vous remercie, veuillez passer une bonne suite de journée.');
        return redirect()->back();
    }
}
