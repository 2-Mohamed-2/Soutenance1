<?php

namespace App\Http\Controllers\CRUDS;

use App\Http\Controllers\Controller;
use App\Models\SessionUser;
use Illuminate\Http\Request;
use Yudhatp\ActivityLogs\Models\ActivityLog;

class SurveillanceController extends Controller
{

    public function session_view()
    {
        $sessions = SessionUser::latest()->get();
        return view('content.surveillance.session-view', compact('sessions'));        
    }


    public function activity_view()
    {
        $activities = ActivityLog::latest()->get();
        return view('content.surveillance.activity-view', compact('activities'));
    }

}
