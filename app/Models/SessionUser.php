<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SessionUser extends Model
{
    protected $guarded=[];
    use HasFactory;

    protected $table = 'session_users';

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
