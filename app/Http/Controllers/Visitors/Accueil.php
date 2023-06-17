<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Accueil extends Controller
{
    public function index()
    {
        $pageConfigs = ['myLayout' => 'horizontal'];

        return view('Visitors.accueil',['pageConfigs'=> $pageConfigs]);
    }
}
