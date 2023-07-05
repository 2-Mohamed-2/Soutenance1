<?php

namespace App\Http\Controllers\Visitors;

use App\Models\Inconnu;
use App\Models\Residence;
use Carbon\Carbon;
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
                'datenaiss' => 'required',
                'lieunaiss' => 'required',
                'namePere' => 'required',
                'nameMere' => 'required',
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
                        'date_naiss' => $request['datenaiss'],
                        'lieu_naiss' => $request['lieunaiss'],
                        'nom_pere' => $request['namePere'],
                        'nom_mere' => $request['nameMere'],
                        'adresse' => $request['adresse'],
                        'genre' => $request['genre'],
                        'n_ci' => $request['n_ci'],
                        'telephone' => $request['telephone'],
                        'password' => Hash::make($request['password']),
            ]);
            if ($inconnu) {
                Alert::success('Réussite', 'Bonjour et bienvenue sur Coms_Ml. Merci d\'avoir creer un compte sur la plateforme.');                
                Auth::guard('inconnu')->login($inconnu);
                return redirect('/');
            }

        } catch (\Throwable $th) {
            Alert::error('Echec', 'Operation echouee ! L\'une des informations existe peut-être déjà dans la base.');
            return redirect()->back();
        }
        
        
    }


    public function residence_store(Request $request) {

        try 
        {              
          
          $date_jour = Carbon::now()->format('Y-m-d');
          $verif = Residence::where('inconnu_id', '=', Auth::guard('inconnu')->user()->id)->get();

          foreach ($verif as $veri) {
            
            $new_date = Carbon::parse($veri['created_at'])->format('Y-m-d');

            if ($date_jour == $new_date) {
              Alert::error('Echec', 'Vous ne pouvez effectuer plus d\'une demande par jour !');
              return redirect()->back(); 
            }
          } 
          
          
          $test = Validator::make($request->all(), [
            'commissariat_id' => 'required|max:255',
            'adresseactu' => 'required|max:255',
            'profession' => 'required|max:255',
            'fils' => 'required|max:255'
          ]);

          $resi = Residence::create([
            'commissariat_id' => $request->commissariat_id,
            'inconnu_id' => Auth::guard('inconnu')->user()->id,
            'profession' => $request->profession,
            'domicile' => $request->adresseactu,
          ]);

          if ($resi) {
            Alert::success('Réussite', 'Votre demande s\'est soldée par une réussite. Merci de vous rendre dans le commissariat ou la demande a été effectuée avec votre pièce d\'identité pour le retrait.');
            return redirect()->back();
          } else {
            Alert::error('Erreur', 'L\'enregistrement n\'a pas bien été effectué !');
            return redirect()->back();
          }        
        }
        catch (\Throwable $th) {
          Alert::error('Echec', 'Operation echouee ! L\'operation s\'est soldé par un echec, veuilley reessayer .');
          return redirect()->back();
        }
                
    }



}
