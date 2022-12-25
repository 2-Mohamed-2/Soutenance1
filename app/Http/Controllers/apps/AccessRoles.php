<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class AccessRoles extends Controller
{

  // function __construct()
  // {
  //   $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
  //   $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
  //   $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
  //   $this->middleware('permission:role-delete', ['only' => ['destroy']]);
  // }

  public function index()
  {
    $roles = Role::orderBy('id','DESC')->latest();
    return view('content.apps.app-access-roles', compact('roles'));
  }
}
