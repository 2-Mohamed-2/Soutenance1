<?php

namespace App\Http\Controllers\dashboard;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yudhatp\ActivityLogs\ActivityLogs;
use RealRashid\SweetAlert\Facades\Alert;

class Analytics extends Controller
{
  public function index(Request $request)
  {
    // $now = Carbon::now();
    // $request->session()->push('_previous', ['time' => $now]);
    // dd($request->session()->get('_previous'));

    $users = User::all();
    $usernbr = $users->count();

    ActivityLogs::log(auth()->user()->id, $request->ip(), 'Index', '/');

    // $tes = ActivityLogs::ActivityLogsLists();

    // $es = auth()->user()->id;
    // $users = DB::select('select * from activity_logs');
    // $user = DB::select('select * from activity_logs where user_id= '.$es.' first');
    // dd($tes);

    return view('content.dashboard.dashboards-principal', compact('usernbr'));
  }
}
