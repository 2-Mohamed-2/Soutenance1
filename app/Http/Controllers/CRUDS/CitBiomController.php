<?php

namespace App\Http\Controllers\CRUDS;

use Illuminate\Http\Request;
use App\Models\CarteBiometrique;
use App\Http\Controllers\Controller;

use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Concerns\ToCollection;

class CitBiomController extends Controller
{
    public function index()
    {
        return view('content.CRUD.cartebio');
    }


}
