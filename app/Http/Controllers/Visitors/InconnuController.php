<?php

namespace App\Http\Controllers\Visitors;

use App\Models\Inconnu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\StatefulGuard;

class InconnuController extends Controller {

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
     * Show the registration view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\RegisterViewResponse
     */
    // public function create(Request $request) {

    //     if (Auth::guard('admin')->user()) {
    //         return redirect('admin/dashboard');
    //     } else {
    //         return view('admin-register');
    //     }
    // }

    /**
     * Create a new registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\CreatesNewUsers  $creator
     * @return \Laravel\Fortify\Contracts\RegisterResponse
     */
    public function store(Request $request) {

        try 
        {            
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'adresse' => 'required',
                'telephone' => 'required',
                'genre' => 'required',
                'n_ci' => 'required',
                'adresse' => 'required',
                'password' => 'required|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            }
            $inconnu = Inconnu::create([
                        'nomcomplet' => $request['name'],
                        'adresse' => $request['adresse'],
                        'genre' => $request['genre'],
                        'n_ci' => $request['n_ci'],
                        'telephone' => $request['telephone'],
                        'password' => Hash::make($request['password']),
            ]);
            if ($inconnu) {
                Alert::success('Réussite', 'L\'enregistrement a bien été effectué !');
                
                Auth::guard('inconnu')->login($inconnu);
                return redirect('Accueil');
            }

        } catch (\Throwable $th) {
            Alert::error('Echec', 'Operation echouee ! L\'une des informations existe peut-être déjà dans la base.');
            return redirect()->back();
        }
        
        
    }

}
