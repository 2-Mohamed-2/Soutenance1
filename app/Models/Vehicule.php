<?php

namespace App\Models;

use App\Models\VoitAffecte;
use App\Models\Commissariat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function commissariat(){
        return $this->belongsTo(Commissariat::class);
    }

  public function voitaffecte()
  {
    return $this->hasOne(VoitAffecte::class);
  }
}
