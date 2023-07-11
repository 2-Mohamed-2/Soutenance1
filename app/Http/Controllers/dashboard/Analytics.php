<?php

namespace App\Http\Controllers\dashboard;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Commissariat;
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

  public function index(Request $request)
  {

    $users = User::all();
    $usernbr = $users->count();
    $comms = Commissariat::all();
    $commnbr = $comms->count();

    return view('content.dashboard.dashboards-principal', compact('usernbr', 'commnbr'));
  }
}
