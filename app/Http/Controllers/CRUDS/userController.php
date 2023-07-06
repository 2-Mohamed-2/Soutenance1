<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\User;
use App\Models\Section;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\MdpNotification;
use Yudhatp\ActivityLogs\ActivityLogs;
use RealRashid\SweetAlert\Facades\Alert;

class userController extends Controller
{

  function __construct()
  {
    $this->middleware('permission:membre-list|membre-create|membre-edit|membre-delete|membre-affect', ['only' => ['index', 'store']]);
    $this->middleware('permission:membre-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:membre-edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:membre-delete', ['only' => ['destroy']]);
    $this->middleware('permission:membre-affect', ['only' => ['affecte_membres']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      
      $users = User::latest()->where('id', '!=', '1')->get();
      $roles = Role::all();
      $comms = Commissariat::all();

      return view('content.CRUD.user-crud', compact('users','roles', 'comms'));
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
      
      // try 
      // {
        
        $this->validate($request,[
          'matricule' => 'required',
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
  
            $user = User::create([
              'commissariat_id' => null,
              'grade_id' => 1,
              'section_id' => null,
              'password' => Hash::make($password),
              'matricule' => $request->matricule,
              'name' => $request->name,
              'email' => $request->email,
              'genre' => $request->genre,
              'telephone' => $request->telephone,
              'isActive' => 1,
            ]);  
  
            // $user->notify(new MdpNotification($password, $user->name));
          }
  
        } 
    
        if ($user) {
            Alert::success('Réussite', 'L\'enregistrement a bien été effectué !');
            return redirect('/Membre');
        } else {
            Alert::error('Echec', 'L\'enregistrement n\'a pas bien été effectué !');
            return redirect('/Membre');
        }

      // } catch (\Throwable $th) {
      //   Alert::error('Erreur', 'L\'opération a rencontré un problème !');
      //   return redirect('/Membre');
      // }

      
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
      dd('Bonjour');
      try 
      {


        $this->validate($request, [
          'commissariat_id' => 'required',
          'options' => 'required',
        ]);
        
        $options = $request->input('options');

        foreach($options as $option)
        {
          $users = User::where('id', $option)->get();

          foreach ($users as $user) {

            $user->commissariat_id = $request->input('commissariat_id');
            $user->save();

            Alert::success('Réussite', 'Le membre a bien été affecté au commissariat choisi !');
            return redirect()->back();

          }

        }

      } catch (\Throwable $th) {
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
    public function destroy(Request $request, $id)
    {
      try 
      {

        $id = decrypt($id);
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Réussite', 'Le membre a bien été supprimé !');
        return redirect('/Membre');

      } 
      catch (\Throwable $th) {
        Alert::error('Erreur', 'L\'opération a rencontré un problème !');
        return redirect('/Membre');
      }

    
    }
}
