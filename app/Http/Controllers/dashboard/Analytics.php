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

    
    $es = auth()->user()->id;
    $users = DB::select('select created_at from activity_logs where user_id= '.$es.' order by created_at DESC limit 1');
    $user = DB::select('select * from activity_logs where user_id= '.$es.' order by created_at DESC limit 1');

    $now = Carbon::now()->format('Y-m-d H:i:s');

    foreach ($users as $test) {

            $diff = abs( strtotime($now) - strtotime($test->created_at) ); 
            $session_exp = config('session.lifetime') * 60 ;

            if ($diff <= $session_exp) {
                
                // dd('bjr');
            }

        }

    // dd($now);
    // $lastDayOfFeb2021 = Carbon::parse('last day of March 2021'); 
    // $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $users)->format('Y-m-d H:i:s');
    // dd($users[0]);
    // dd(abs($users[0] - $now));
    
    return view('content.dashboard.dashboards-principal', compact('usernbr'));
  }
}
