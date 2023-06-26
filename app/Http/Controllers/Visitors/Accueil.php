<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use App\Models\SessionCitoyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Accueil extends Controller
{
    public function index()
    {
        $pageConfigs = ['myLayout' => 'horizontal'];

        if (Auth::guard('inconnu')->user()) {
            $sessions_cit = SessionCitoyen::where([['inconnu_id', Auth::guard('inconnu')->user()->id],
            ['deconnexion_cit', '<>', null]])->orderBy('deconnexion_cit', 'desc')->limit(5)->latest()->get();
            return view('Visitors.accueil',compact('pageConfigs', 'sessions_cit'));
        }
        

        
        return view('Visitors.accueil',compact('pageConfigs'));
    }
}
