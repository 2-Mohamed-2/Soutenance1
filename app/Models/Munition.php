<?php

namespace App\Models;


use App\Models\LieuStock;
use App\Models\Commissariat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Munition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Commissariat(){
        return $this->belongsTo(Commissariat::class, 'id');
    }
    public function muniaff()
    {
      return $this->hasOne(MuniAff::class);
    }

    public function lieustock()
    {
      return $this->belongsTo(LieuStock::class);
    }
}
