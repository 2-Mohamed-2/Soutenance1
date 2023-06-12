<?php

namespace Laravel\Fortify\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Support\Responsable;
use Laravel\Fortify\Actions\CompletePasswordReset;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Laravel\Fortify\Contracts\PasswordResetResponse;
use Laravel\Fortify\Contracts\ResetPasswordViewResponse;
use Laravel\Fortify\Contracts\FailedPasswordResetResponse;

class NewPasswordController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show the new password view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\ResetPasswordViewResponse
     */
    public function create(Request $request): ResetPasswordViewResponse
    {
        return app(ResetPasswordViewResponse::class);
    }

    /**
     * Reset the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function store(Request $request): Responsable
    {
        try {
                       
            $request->validate([
                'token' => 'required',
                Fortify::email() => 'required|email',
                'password' => 'required',
            ]);

            // Here we will attempt to reset the user's password. If it is successful we
            // will update the password on an actual user model and persist it to the
            // database. Otherwise we will parse the error and return the response.
            $status = $this->broker()->reset(
                $request->only(Fortify::email(), 'password', 'password_confirmation', 'token'),
                function ($user) use ($request) {
                    app(ResetsUserPasswords::class)->reset($user, $request->all());

                    app(CompletePasswordReset::class)($this->guard, $user);
                }
            );

            // If the password was successfully reset, we will redirect the user back to
            // the application's home authenticated view. If there is an error we can
            // redirect them back to where they came from with their error message.
            return $status == Password::PASSWORD_RESET
                        ? app(PasswordResetResponse::class, ['status' => $status])
                        : app(FailedPasswordResetResponse::class, ['status' => $status]);

        } 
        catch (\Throwable $th) {
            Alert::error('Erreur', 'Une erreur innattendue est survenue veuillez re-essayer plus tard');
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