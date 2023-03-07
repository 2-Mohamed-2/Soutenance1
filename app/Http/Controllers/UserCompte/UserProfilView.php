<?php

namespace App\Http\Controllers\UserCompte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfilView extends Controller
{
  public function index()
  {
    return view('content.pages.pages-profile-user');
  }
}