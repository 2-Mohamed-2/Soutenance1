<?php

namespace App\Http\Controllers\dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Avoir;
use App\Models\Tenue;
use App\Models\MuniAff;
use App\Models\TenueAff;
use App\Models\Vehicule;
use App\Models\VoitAffecte;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SessionUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Yudhatp\ActivityLogs\ActivityLogs;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Encryption\DecryptException;

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

  function statistique1(){
    $data1 = VoitAffecte::selectRaw('DATE_FORMAT(created_at, "%m") as mois, count(*) as count, DATE_FORMAT(created_at, "%Y") as annee ')
      ->where('created_at', '>=', Carbon::now()->subMonths(12))
      ->groupBy('mois', 'annee')
      ->orderBy('mois')
      ->get()
      ->toArray();
    return response()->json($data1);
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
    $data = Avoir::selectRaw('DATE_FORMAT(created_at, "%m") as mois, count(*) as count ')
    ->where('created_at', '>=', Carbon::now()->subMonths(12))
      ->groupBy('mois')->orderBy('mois')
      ->get();
      response()->json($data);
    $voitaffectes = VoitAffecte::all();
    $muniaff = MuniAff::all();

    $today = Carbon::today();
    $Hours = SessionUser::whereDate('created_at', $today)->where('time', '!=', null)->sum('time');
    // dd($Hours);

    return view('content.dashboard.dashboards-principal', compact('usernbr', 'commnbr', 'tenueaffs', 'voitaffectes', 'muniaff', 'Hours'));
  }

  public function getPreviousWeekSessions()
  {
    // Récupérer la date d'il y a 7 jours
    $startDate = Carbon::now()->subDays(7)->startOfDay();

    // Récupérer les sessions pour les 7 jours précédents
    $sessions = SessionUser::whereBetween('created_at', [$startDate, now()])
      ->orderBy('created_at')
      ->get();

    // Préparer les données pour le graphique
    $data = [];
    $labels = [];

    foreach ($sessions as $session) {
      $data[] = $session->time;
      $labels[] = $session->created_at->format('Y-m-d');
    }

    return response()->json([
      'data' => $data,
      'labels' => $labels,
    ]);
  }


}
