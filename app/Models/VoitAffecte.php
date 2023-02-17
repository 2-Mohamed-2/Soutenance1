<?php

namespace App\Models;

use App\Models\User;
use App\Models\Statut;
use App\Models\Vehicule;
use App\Models\Commissariat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoitAffecte extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function commissariat(){
      return $this->belongsTo(Commissariat::class);
    }

  public function statut()
  {
    return $this->belongsTo(Statut::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function vehicule()
  {
    return $this->belongsTo(Vehicule::class);
  }
}
