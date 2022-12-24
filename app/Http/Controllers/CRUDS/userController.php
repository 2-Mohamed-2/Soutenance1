<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\User;
use App\Models\Section;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::latest()->get();
      //$coms = Commissariat::latest()->get();

      return view('content.CRUD.user-crud', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'matricule' => 'required',
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'telephone' => 'required|max:255',
      ]);
      $com=1;
      $gra=1;

      $user = User::create([
          'commissariat_id' => $com,
          'grade_id' => $gra,
          'password' => Hash::make(123456),
          'matricule' => $request->matricule,
          'name' => $request->name,
          'email' => $request->email,
          'genre' => $request->genre,
          'telephone' => $request->telephone,
      ]);

      if ($user) {
          toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
          return redirect('/Membre');
      } else {
          toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
          return redirect('/Membre');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
