<?php

namespace App\Http\Controllers\UserCompte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Commissariat;
use Illuminate\Support\Facades\Auth;
use Yudhatp\ActivityLogs\ActivityLogs;

class UserProfilView extends Controller
{
  public function index(Request $request)
  {

    if (Auth::user()->Commissariat) {
      $comms = Commissariat::where('id', '!=', Auth::user()->Commissariat->id)->get();
    }
    else {
      $comms = Commissariat::all();
    }
    // dd();
    
    return view('content.pages.pages-profile-user', compact('comms'));
  }
}