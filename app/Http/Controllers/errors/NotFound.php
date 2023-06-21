<?php

namespace App\Http\Controllers\errors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotFound extends Controller
{
    public function index()
    {
        $pageConfigs = ['myLayout' => 'horizontal'];

        return view('errors.404',['pageConfigs'=> $pageConfigs]);
    }
}
