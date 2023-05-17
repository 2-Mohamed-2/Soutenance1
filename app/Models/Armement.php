<?php

namespace App\Models;

use App\Models\User;
use App\Models\Avoir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Armement extends Model
{
    use HasFactory;

    protected $guarded = [];


//     public function commissariat()
//     {
//         return $this->belongsTo(Commissariat::class);
//     }



    public function avoir(): HasOne{
        return $this->hasOne(Avoir::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id');
    }

  public function lieu_stock(): BelongsTo
  {
    return $this->belongsTo(LieuStock::class);
  }
}
