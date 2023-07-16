<?php

namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yudhatp\ActivityLogs\ActivityLogs;

class AccountSettingsSecurity extends Controller
{
  public function index(Request $request)
  {
    // ActivityLogs::log(auth()->user()->id, $request->ip(), 'Index', '/');

    return view('content.pages.pages-account-settings-security');
  }
}
