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
    // try
    // {
      // $validator = Validator::make($request->all(),[
      //   'image' => 'image|max:2048', // Taille maximale de 2 Mo (2048 kilo-octets)
      // ]);

      // ActivityLogs::log(auth()->user()->id, $request->ip(), 'Update', '/Compte/Paramètre/Gestion');

      $id = decrypt($id);
      // $user = User::findOrFail($id);

      // if ($validator->fails()) {
      //   Alert::error('Erreur', 'L\'entrée au niveau de l\'image ne correspond pas aux attentes. Veuillez bien choisir une image de taille inférieure à 2 Mo.');
      //   return redirect()->back();
      // }


      // if ($request->has("image"))
      // {

        $user = User::find(Auth::user()->id);
        if ($request->hasFile('profile_photo_path')) {
          //On supprime l'ancienne image
          // Storage::delete('public/Profils/' . $user->profile_photo_path);
          $image = $request->file('profile_photo_path');
          $ext = $image->getClientOriginalExtension();
          $autorise = ['png', 'jpg', 'jpeg'];
          if (!in_array(strtolower($ext), $autorise)) {
            return back()->with('error', 'Veuillez choissir une image');
          }
          $image_name = time() . '.' . $ext;
          $user->update([
            "profile_photo_path" => $image_name
          ]);
          $image->move(public_path('public/Profils/'), $image_name);
        }

        // $fileName = time() . '.' . $request->image->extension();
        // $request->image->storeAs('public/Profils', $fileName);

          $user->name = $request->name;
          $user->adresse = $request->adresse;
          $user->email = $request->email;
          $user->telephone = $request->telephone;
          $user->save();
          // 'profile_photo_path' => $image_name,

        if ($user) {
          Alert::success('Mis a jour Reussi', 'L\'utilisateur a ete mis a jour avec succes');
          return redirect()->back();
        }


      // }


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
    // catch (\Exception $e) {
    //     Alert::error('Echec lors de la mise ajour', 'Une erreur c\'est produite lors de la mise a jour !');
    //     return redirect()->back();
    // }

  }

