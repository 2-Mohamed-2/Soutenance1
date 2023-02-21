<?php

namespace App\Models;

use App\Models\User;
use App\Models\Avoir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Armement extends Model
{
    use HasFactory;

    protected $guarded = [];


//     public function commissariat()
//     {
//         return $this->belongsTo(Commissariat::class);
//     }



    public function avoir(){
        return $this->hasOne(Avoir::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id');
    }
}
