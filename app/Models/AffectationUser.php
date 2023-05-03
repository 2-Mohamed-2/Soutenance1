<?php

namespace App\Models;

use App\Models\User;
use App\Models\Commissariat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffectationUser extends Model
{
    protected $guarded=[];
    use HasFactory;

    protected $table = 'affectation_users';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commissariat()
    {
        return $this->belongsTo(Commissariat::class);
    }
}
