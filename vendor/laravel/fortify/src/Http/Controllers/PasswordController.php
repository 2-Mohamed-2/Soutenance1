<?php

namespace Laravel\Fortify\Http\Controllers;

use toastr;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yudhatp\ActivityLogs\ActivityLogs;
use RealRashid\SweetAlert\Facades\Alert;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\PasswordUpdateResponse;


class PasswordController extends Controller
{

    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\UpdatesUserPasswords  $updater
     * @return \Laravel\Fortify\Contracts\PasswordUpdateResponse
     */
    public function update(Request $request, UpdatesUserPasswords $updater)
    {        
        try {
            $updater->update($request->user(), $request->all());
            
            Alert::info('Réussite', 'operation a bien été effectué ! Veuillez vous reconnecter avec le nouveau mot de passe');
            return redirect(route('login'));        

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Erreur intervenue lors de la modification. Veuillez reverifier les entrées !');
        }

    }
}
