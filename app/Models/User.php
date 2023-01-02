<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Avoir;
use App\Models\Grade;
use App\Models\Tenue;
use App\Models\Section;
use App\Models\Armement;
use App\Models\Commissariat;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPassNotif;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassNotif as NotificationsResetPassNotif;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function commissariat()
    {
        return $this->belongsTo(Commissariat::class);
    }

    public function section()
    {
        return $this->belongsToMany(Section::class);
    }
    public function tenues(){
        return $this->hasMany(Tenue::class);
    }

    public function avoir(){
        return $this->hasOne('App\Models\Avoir');
    }

    public function arme() {
        return $this->belongsTo(Armement::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, 'role_users')->withTimestamps();
    // }

    // public function sessions()
    // {
    //     return $this->hasMany(Session::class);
    // }


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new ResetPassNotif($token));
    // }
}
