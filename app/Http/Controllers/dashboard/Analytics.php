<?php

namespace App\Http\Controllers\dashboard;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yudhatp\ActivityLogs\ActivityLogs;
use RealRashid\SweetAlert\Facades\Alert;

class Analytics extends Controller
{
  public function index(Request $request)
  {


    $users = User::all();
    $usernbr = $users->count();

    ActivityLogs::log(auth()->user()->id, $request->ip(), 'Index', '/');

    // $tes = ActivityLogs::ActivityLogsLists();

    $es = auth()->user()->id;
    $users = DB::select('select * from activity_logs');
    if ($users) {
      // $user = DB::select('select * from activity_logs where user_id= '.$es.' first');
    }
    
    // dd($tes);

    return view('content.dashboard.dashboards-principal', compact('usernbr'));
  }
}
