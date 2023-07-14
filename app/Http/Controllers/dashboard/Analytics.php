<?php

namespace App\Http\Controllers\dashboard;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Commissariat;
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

  function statistique(){

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
    $tenueaffs = TenueAff::selectRaw('DATE_FORMAT(created_at, "%m") as mois, count(*) as count ')
    ->where('created_at', '>=', Carbon::now()->subMonths(12))
      ->groupBy('mois')->orderBy('mois')
      ->get();
    $voitaffectes = VoitAffecte::all();
    $muniaff = MuniAff::all();

    return view('content.dashboard.dashboards-principal', compact('usernbr', 'commnbr', 'tenueaffs', 'voitaffectes', 'muniaff'));
  }
  
}
