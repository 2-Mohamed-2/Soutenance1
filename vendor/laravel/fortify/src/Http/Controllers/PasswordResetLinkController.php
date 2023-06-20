<?php

namespace Laravel\Fortify\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Support\Responsable;
use Laravel\Fortify\Contracts\RequestPasswordResetLinkViewResponse;
use Laravel\Fortify\Contracts\FailedPasswordResetLinkRequestResponse;
use Laravel\Fortify\Contracts\SuccessfulPasswordResetLinkRequestResponse;

class PasswordResetLinkController extends Controller
{
    /**
     * Show the reset password link request view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\RequestPasswordResetLinkViewResponse
     */
    public function create(Request $request): RequestPasswordResetLinkViewResponse
    {
        return app(RequestPasswordResetLinkViewResponse::class);
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function store(Request $request): Responsable
    {
        try 
        {
            
            $request->validate([Fortify::email() => 'required|email']);

            // We will send the password reset link to this user. Once we have attempted
            // to send the link, we will examine the response then see the message we
            // need to show to the user. Finally, we'll send out a proper response.
            $status = $this->broker()->sendResetLink(
                $request->only(Fortify::email())
            );
            
            return $status == Password::RESET_LINK_SENT
                        ? app(SuccessfulPasswordResetLinkRequestResponse::class, ['status' => $status])
                        : app(FailedPasswordResetLinkRequestResponse::class, ['status' => $status]);

        } 
        catch (\Throwable $th) 
        {
            Alert::error('Erreur', 'Une erreur innattendue est survenue veuillez re-essayer plus tard');
            return redirect()->back();
        }
       
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    protected function broker(): PasswordBroker
    {
        return Password::broker(config('fortify.passwords'));
    }
}
