<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class VerifyComMembre
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $comm_id = Auth::user()->commissariat_id;

        if ($comm_id == 0 && User::role('Informaticien|Administrateur')) 
        {
            return $next($request);
        }
        Alert::info('Information', 'Vous n\'avez pas les rôles requis pour acceder aux autres ressources !');
        return redirect(route('compte-profil-user-view'));
    }
}
