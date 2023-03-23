<?php

namespace App\Http\Controllers\UserCompte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yudhatp\ActivityLogs\ActivityLogs;

class UserProfilSecurity extends Controller
{
    public function index(Request $request)
  {
    ActivityLogs::log(auth()->user()->id, $request->ip(), 'Index', '/Compte/Paramètre/Sécurité');

    return view('content.pages.pages-account-settings-security');
  }
}
