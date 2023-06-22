<?php

namespace App\Http\Controllers\Visitors;

use App\Models\Inconnu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{

    public function index()
    {
        $pageConfigs = ['myLayout' => 'horizontal'];

        return view('Visitors.profil',['pageConfigs'=> $pageConfigs]);
    }

    public function update(Request $request, $id) 
    {
    
        // try 
        // {            
            $id = decrypt($id);

            $validateData = $this->validate($request, [
                'password_actu' => 'required|min:8',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|min:8',
            ]);

            $inc = Inconnu::findOrFail($id);
            
            if(Hash::check($request->password_actu, $inc->password))
            {      
                $inc->password = Hash::make($request->password);
                $ok = $inc->save();

                if ($ok) {
                    Alert::success('Réussite', 'Le mot de passe a bien été modifié !');
                    return redirect()->back();
                } else {
                    Alert::error('Echec', 'Modification non effectuée !');
                    return redirect()->back();
                }               
            }
            else 
            {
                Alert::error('Echec', 'Le mot de passe entré ne correspond pas à votre mot de passe actuel !');
                return redirect()->back();
            }

        // } 
        // catch (\Throwable $th) {
        //     Alert::error('Erreur', 'L\'opération a rencontré un problème !');
        //     return redirect()->back();
        // }
        
    }

}
