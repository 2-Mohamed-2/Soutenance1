<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Analytics extends Controller
{
  public function index()
  {
    $users = User::all();
    $usernbr = $users->count();

    return view('content.dashboard.dashboards-principal', compact('usernbr'));
  }
}
