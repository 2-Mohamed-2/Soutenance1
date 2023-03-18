<?php

namespace App\Http\Controllers\pages;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AccountSettingsAccount extends Controller
{
  public function index()
  {
    return view('content.pages.pages-account-settings-account');
  }

  public function updateUser(Request $request, $id)
  {
    $id = decrypt($id);
    // dd('bonjour Med '. $id);

    $user = User::findOrFail($id);

    // try {

      if ($request->has("image")) {

        
        if (Auth::user()->profile_photo_path) {
          //On supprime l'ancienne image
          Storage::delete('public/images/' .$user->profile_photo_path);
        }
          
        
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
// dd($image);
          $user = User::whereId($id)->update([
              'name' => $request->name,
              'adresse' => $request->adresse,
              'email' => $request->email,
              'telephone' => $request->telephone,
              'profile_photo_path' => $fileName,
          ]);
          if ($user) {
              Alert::success('Mis a jour Reussi', '.$user->name. a ete mis a jour avec succes');
              return redirect()->back();
          }
      }

      $user = User::whereId($id)->update([
        'name' => $request->name,
        'adresse' => $request->adresse,
        'email' => $request->email,
        'telephone' => $request->telephone,
    ]);

    if ($user) {
      Alert::success('Mis a jour Reussi', $user->name.' a ete mis a jour avec succes');
      return redirect()->route('compte-user-modify');
    }
  // } catch (\Exception $e) {
  //     Alert::error('Echec lors de la mis ajour', 'Une erreur c\'est produite lors de la mis a jour du docteur');
  //     return redirect()->back();
  // }
    // $id = decrypt($id);
    // //dd($id);


    // $this->validate($request, [
    //   'matricule' => 'required',
    //   'name' => 'required|max:255',
    //   'email' => 'required|max:255',
    //   'telephone' => 'required|max:255',
    //   'genre' => 'required',
    // ]);
    // // dd($request->all());

    // $user = User::find($id);
    // if ($user) {
    //   $user->matricule = $request->matricule;
    //   $user->name = $request->name;
    //   $user->email = $request->email;
    //   $user->telephone = $request->telephone;
    //   $user->genre = $request->genre;

    //   $user->save();
    //   toastr()->success('Le membre a bien été modifié !', 'Réussite');
    //   return redirect('/Membre');
    // } else {
    //   toastr()->error('Modification non effectuée !', 'Erreur');
    //   return redirect('/Membre');
    // }
  }
}
