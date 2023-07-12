<?php

namespace App\Http\Controllers\pages;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yudhatp\ActivityLogs\ActivityLogs;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AccountSettingsAccount extends Controller
{
  public function index(Request $request)
  {
    return view('content.pages.pages-account-settings-account');
  }

  public function updateUser(Request $request, $id)
  {
    try 
    {
      $validator = Validator::make($request->all(),[
        'image' => 'required|image|max:2048', // Taille maximale de 2 Mo (2048 kilo-octets)
      ]);
      
      // ActivityLogs::log(auth()->user()->id, $request->ip(), 'Update', '/Compte/Paramètre/Gestion');

      $id = decrypt($id);
      $user = User::findOrFail($id);

      if ($validator->fails()) {
        Alert::error('Erreur', 'L\'entrée au niveau de l\'image ne correspond pas aux attentes. Veuillez bien choisir une image de taille inférieure à 2 Mo.');
        return redirect()->back();
      }   


      if ($request->has("image")) 
      {

        if (Auth::user()->profile_photo_path) {
          //On supprime l'ancienne image
          Storage::delete('public/Profils/' . $user->profile_photo_path);
        }

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/Profils', $fileName);

        $user = User::whereId($id)->update([
          'name' => $request->name,
          'adresse' => $request->adresse,
          'email' => $request->email,
          'telephone' => $request->telephone,
          'profile_photo_path' => $fileName,
        ]);
        if ($user) {
          Alert::success('Mis a jour Reussi', 'L\'utilisateur a ete mis a jour avec succes');
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
        Alert::success('Mise a jour Reussi', 'L\'utilisateur a ete mis a jour avec succes');
        return redirect()->route('compte-user-modify');
      }

    } 
    catch (\Exception $e) {
        Alert::error('Echec lors de la mise ajour', 'Une erreur c\'est produite lors de la mise a jour !');
        return redirect()->back();
    }
 
  }
}
