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
    $userH = User::where('genre', 'H')->count();
    $userF = User::where('genre', 'F')->count();
    $userWithSex = User::where('genre', '!=', null)->count();
    $comms = Commissariat::all();
    $commnbr = $comms->count();

    $today = Carbon::today();
    $Hours = SessionUser::whereDate('created_at', $today)->where('time', '!=', null)->sum('time');
    // dd($Hours);

    return view('content.dashboard.dashboards-principal', compact('usernbr', 'commnbr','Hours', 'userH', 'userF'));
  }

  public function getPreviousWeekSessions()
  {

    // Pour le graphe de la session 
    $sessions = SessionUser::selectRaw('DATE(created_at) as date, SUM(time) as total_minutes')
                ->where('created_at', '>=', Carbon::now()->subDays(7))
                ->groupBy('date')
                ->get();

    $dates = [];
    $minutes = [];

    $auj = Carbon::today();
    $e_auj = Carbon::parse($auj);
    $ee_auj = $e_auj->isoFormat('dddd');


    foreach ($sessions as $session) {
      $e = Carbon::parse($session->date);
      $ee = $e->isoFormat('dddd');
      $dates[] = $ee;
      $minutes[] = $session->total_minutes;
    }
    // Fin de la session


    // Pour le graphe de creation des membres par 06 mois
    $sixMonthsAgo = now()->subMonths(6);
    $userData = User::where('created_at','>=',$sixMonthsAgo)
                      ->groupBy(\DB::raw('MONTH(created_at)'))
                      ->selectRaw('COUNT(*) as user_count, MONTH(created_at) as month')
                      ->get();
    // Fin




    return response()->json([
      'userData' => $userData,
      'dates' => $dates,
      'minutes' => $minutes,
      'aujourd' => $ee_auj,
    ]);

  }

  public function getStatGenre(Request $request)
  {
    $userH = User::where('genre', 'H')->count();
    $userF = User::where('genre', 'F')->count();
    $userWithSex = User::where('genre', '!=', null)->count();
    $uhp = ($userH / $userWithSex)*100;
    $ufp = ($userF / $userWithSex)*100;

    return response()->json([
      'userH' => $userH,
      'userF' => $userF,
      'userWS' => $userWithSex,
      'uhp' => $uhp,
      'ufp' => $ufp,
    ]);
  }


}
