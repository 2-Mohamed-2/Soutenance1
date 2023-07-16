<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\User;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\MdpNotification;
use Yudhatp\ActivityLogs\ActivityLogs;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Encryption\DecryptException;

class userController extends Controller
{

  function __construct()
  {
    $this->middleware('permission:membre-list|membre-create|membre-edit|membre-delete|membre-affect|membre-active|membre-desactive', ['only' => ['index', 'store']]);
    $this->middleware('permission:membre-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:membre-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:membre-delete', ['only' => ['destroy']]);
    $this->middleware('permission:membre-affect', ['only' => ['affecte_membres']]);
    $this->middleware('permission:membre-active', ['only' => ['active_user']]);
    $this->middleware('permission:membre-desactive', ['only' => ['desact_user']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $user = Auth::user();

      if ($user->hasrole('Commissaire')) {
        $users = User::latest()->where('commissariat_id', Auth::user()->commissariat->id)
                      ->whereDoesntHave('roles', function ($query){
                        $query->whereIn('name', ['Informaticien', 'Administrateur','Commissaire']);
                      })->get();
        $comms = Commissariat::all();
        $grades = Grade::all();
        return view('content.CRUD.user-crud', compact('users','comms', 'grades'));
      }
      elseif($user->hasrole('Administrateur'))
      {
        $users = User::latest()
                      ->whereDoesntHave('roles', function ($query){
                        $query->whereIn('name', ['Informaticien', 'Administrateur']);
                      })->get();
        $roles_exclus = ['Informaticien','Administrateur'];
        $roles = Role::whereNotIn('name', $roles_exclus)->get();
        $comms = Commissariat::all();
        $grades = Grade::all();
        return view('content.CRUD.user-crud', compact('users','roles', 'comms', 'grades'));
      }
      elseif($user->hasrole('Informaticien'))
      {
        $users = User::latest()
                      ->whereDoesntHave('roles', function ($query){
                        $query->whereIn('name', ['Informaticien']);
                      })->get();
        $roles = Role::latest()->get();
        $comms = Commissariat::all();
        $grades = Grade::all();
        return view('content.CRUD.user-crud', compact('users','roles', 'comms', 'grades'));
      }

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

      try
      {

        $this->validate($request,[
          // 'matricule' => 'required',
          'name' => 'required|max:255',
          'email' => 'required|max:255',
          'telephone' => 'required|max:255',
        ]);

        $test = User::select('*')
                    ->where([
                      ['matricule', '=', $request->matricule]
                    ])->exists();

        $test1 = User::select('*')
        ->where([
          ['email', '=', $request->email]
        ])->exists();


        if ($test) {
          Alert::error('Echec', 'Ce matricule existe déjà !');
          return redirect('/Membre');
        }else {
          if ($test1) {
            Alert::error('Echec', 'Cet email existe déjà !');
            return redirect('/Membre');
          }else {

            // Les caracteres a entré dans la combinaison
            $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890@-$%&$%&');
            // La combinaison
            $password = substr($random, 0, 8);

            // Récupérer le dernier matricule
            $dernierMatricule = User::max('matricule');
            // Incrémenter le dernier matricule
            $nouveauMatricule = $dernierMatricule + 1;

            $user = User::create([
              'commissariat_id' => null,
              'grade_id' => 1,
              'section_id' => null,
              'password' => Hash::make($password),
              'matricule' => $nouveauMatricule,
              'name' => $request->name,
              'email' => $request->email,
              'genre' => $request->genre,
              'telephone' => $request->telephone,
              'isActive' => 1,
            ]);

            // Inserer le role membre par defaut au nouveau membre creer
            $role = Role::where('name', 'Membre')->get();
            $user->assignRole($role);

            $user->notify(new MdpNotification($password, $user->name));
          }

        }

        if ($user) {
            Alert::success('Réussite', 'L\'enregistrement a bien été effectué !');
            return redirect()->back();
        } else {
            Alert::error('Echec', 'L\'enregistrement n\'a pas bien été effectué !');
            return redirect()->back();
        }

      } catch (\Throwable $th) {
        Alert::error('Erreur', 'L\'opération a rencontré un problème !');
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
      try
      {

        $id = decrypt($id);
        //dd($id);

        $this->validate($request, [
          'matricule' => 'required',
          'name' => 'required|max:255',
          'email' => 'required|max:255',
          'telephone' => 'required|max:255',
          'genre' => 'required',
        ]);
        // dd($request->all());

        $user = User::find($id);
        if ($user) {
          $user->matricule = $request->matricule;
          $user->name = $request->name;
          $user->email = $request->email;
          $user->telephone = $request->telephone;
          $user->genre = $request->genre;

          $user->save();
          Alert::success('Réussite', 'Le membre a bien été modifié !');
          return redirect('/Membre');
        } else {
          Alert::error('Echec', 'Modification non effectuée !');
          return redirect('/Membre');
        }

      } catch (\Throwable $th) {
        Alert::error('Erreur', 'L\'opération a rencontré un problème !');
        return redirect('/Membre');
      }


    }

    // Fonction pour mettre a jour le commissariat des membres
    public function affecte_membres(Request $request)
    {
      // dd($request->all());
      try
      {
        // dd($request->has('commissariat_id'), $request->has('grade_id'));
        $this->validate($request, [
          'options' => 'required',
        ]);

        if ($request->has('commissariat_id') AND !$request->has('grade_id')) {
          User::whereIn('id', $request->input('options'))->update(
            ['commissariat_id' => $request->input('commissariat_id')]
          );
          Alert::success('Réussite', 'Le membre a bien été affecté au commissariat choisi !');
          return redirect()->back();
        }
        elseif ($request->has('grade_id') AND !$request->has('commissariat_id')) {
          User::whereIn('id', $request->input('options'))->update(
            ['grade_id' => $request->input('grade_id')]
          );
          Alert::success('Réussite', 'Le membre a bien été promu au grade choisi !');
          return redirect()->back();
        }
        elseif ($request->has(['commissariat_id', 'grade_id'])) {
          User::whereIn('id', $request->input('options'))->update([
            'commissariat_id' => $request->input('commissariat_id'),
            'grade_id' => $request->input('grade_id')
          ]);
          Alert::success('Réussite', 'Les promotions et affectations ont bien été effectuées !');
          return redirect()->back();
        }
        else{
          Alert::error('Echec', 'L\'affectation ou la promotion a échoué, veuillez revoir les entrées !');
          return redirect()->back();
        }


      }
      catch (\Throwable $th) {
        Alert::error('Erreur', 'L\'opération a rencontré un problème !');
        return redirect('/Membre');
      }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Contenu plus valable etant donne qu'on ne supprime jamais un user

    // public function destroy(Request $request, $id)
    // {
    //   try
    //   {

    //     $id = decrypt($id);
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     Alert::success('Réussite', 'Le membre a bien été supprimé !');
    //     return redirect('/Membre');

    //   }
    //   catch (\Throwable $th) {
    //     Alert::error('Erreur', 'L\'opération a rencontré un problème !');
    //     return redirect('/Membre');
    //   }


    // }

    // Fonction de desactivation
    public function desact_user($id)
    {
      try
      {

        $id = decrypt($id);

        $user = User::find($id);
        if ($user) {

          $user->isActive = 0;
          $user->save();

          Alert::info('Réussite', 'Le compte du membre a bien été désactivé !');
          return redirect('/Membre');
        }
        else {
          Alert::error('Echec', 'Modification non effectuée !');
          return redirect('/Membre');
        }

      } catch (\Throwable $th) {
        Alert::error('Erreur', 'L\'opération de desactivation a rencontré un problème !');
        return redirect('/Membre');
      }


    }

    // Fonction de desactivation
    public function active_user($id)
    {
      try
      {

        $id = decrypt($id);

        $user = User::find($id);
        if ($user) {

          $user->isActive = 1;
          $user->save();

          Alert::success('Réussite', 'Le compte du membre a bien été activé !');
          return redirect('/Membre');
        }
        else {
          Alert::error('Echec', 'Modification non effectuée !');
          return redirect('/Membre');
        }

      } catch (\Throwable $th) {
        Alert::error('Erreur', 'L\'opération de desactivation a rencontré un problème !');
        return redirect('/Membre');
      }


    }
}
