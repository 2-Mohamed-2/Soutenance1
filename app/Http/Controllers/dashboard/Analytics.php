<?php

namespace App\Http\Controllers\dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Avoir;
use Illuminate\Support\Facades\Auth;
use App\Models\MuniAff;
use App\Models\Tenue;
use App\Models\TenueAff;
use App\Models\Vehicule;
use App\Models\VoitAffecte;
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


  function statistique()
  {
    $data = TenueAff::selectRaw('DATE_FORMAT(created_at, "%m") as mois, count(*) as count, DATE_FORMAT(created_at, "%Y") as annee ')
                              ->where('created_at', '>=', Carbon::now()->subMonths(12))
                              ->groupBy('mois','annee')
                              ->orderBy('mois')
                              ->get()
                              ->toArray();



    return response()->json($data);
  }

  public function index(Request $request)
  {

    $users = User::all();
    $usernbr = $users->count();
    $comms = Commissariat::all();
    $commnbr = $comms->count();
    $armeAff = Avoir::selectRaw('DATE_FORMAT(created_at, "%m") as mois, count(*) as count, DATE_FORMAT(created_at, "%Y") as annee ')
    ->where('created_at', '>=', Carbon::now()->subMonths(12))
      ->groupBy('mois', 'annee')
      ->orderBy('mois')
      ->get()
      ->toArray();
       response()->json($armeAff);
    return view('content.dashboard.dashboards-principal', compact('usernbr', 'commnbr','armeAff'));
  }
}
