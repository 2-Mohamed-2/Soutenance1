<?php

namespace App\Http\Controllers\Visitors;

use Carbon\Carbon;
use App\Models\Residence;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Models\SessionCitoyen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Accueil extends Controller
{
    public function index()
    {
        $pageConfigs = ['myLayout' => 'horizontal'];

        if (Auth::guard('inconnu')->user()) 
        {        

            $resis = Residence::where([
                    ['inconnu_id', Auth::guard('inconnu')->user()->id]
                ])->latest()->get();            
            $comms = Commissariat::latest()->get();
            $sessions_cit = SessionCitoyen::where([['inconnu_id', Auth::guard('inconnu')->user()->id],
            ['deconnexion_cit', '<>', null]])->orderBy('deconnexion_cit', 'desc')->limit(5)->latest()->get();
            return view('Visitors.accueil',compact('pageConfigs', 'sessions_cit', 'comms', 'resis'));
        }


        

        
        return view('Visitors.accueil',compact('pageConfigs'));
    }
}
