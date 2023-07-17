<?php

namespace App\Http\Controllers\CRUDS;

use App\Http\Controllers\Controller;
use App\Models\SessionUser;
use Illuminate\Http\Request;
use Yudhatp\ActivityLogs\Models\ActivityLog;

class SurveillanceController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:session-users-view', ['only' => ['session_view']]);
        // $this->middleware('permission:activities-users-view', ['only' => ['activity_view']]);
    }

    public function session_view()
    {
        $sessions = SessionUser::orderBy('deconnexion', 'desc')->take(50)->latest()->get();
        return view('content.surveillance.session-view', compact('sessions'));        
    }


    public function activity_view()
    {
        $activities = ActivityLog::orderBy('created_at', 'desc')->take(1000)->latest()->get();
        return view('content.surveillance.activity-view', compact('activities'));
    }

}
