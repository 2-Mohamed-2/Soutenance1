<?php

namespace App\Http\Controllers\dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yudhatp\ActivityLogs\ActivityLogs;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class Analytics extends Controller
{
  function __construct()
  {
    $this->middleware('permission:dashboard-view', ['only' => ['index']]);
  }

  public function index()
  {

    $user = Auth::user();

    if ($user->hasrole('Commissaire')) 
    {

      $users = User::latest()->where('commissariat_id', Auth::user()->commissariat->id)
                      ->whereDoesntHave('roles', function ($query){
                        $query->whereIn('name', ['Informaticien', 'Administrateur']);
                      })->get();
      $usernbr = $users->count();
      $comms = Commissariat::all();
      $commnbr = $comms->count();
  
      return view('content.dashboard.dashboards-principal', compact('usernbr', 'commnbr'));
    } 
    elseif ($user->hasrole('Administrateur')) 
    {
      
      $users = User::latest()->whereDoesntHave('roles', function ($query){
                        $query->whereIn('name', ['Informaticien']);
                      })->get();
      $usernbr = $users->count();
      $comms = Commissariat::all();
      $commnbr = $comms->count();
  
      return view('content.dashboard.dashboards-principal', compact('usernbr', 'commnbr'));
    }
    elseif ($user->hasrole('Informaticien')) 
    {
            
      $users = User::all();
      $usernbr = $users->count();
      $comms = Commissariat::all();
      $commnbr = $comms->count();
  
      return view('content.dashboard.dashboards-principal', compact('usernbr', 'commnbr'));
    }

    return view('content.dashboard.dashboards-principal');

  }
}
