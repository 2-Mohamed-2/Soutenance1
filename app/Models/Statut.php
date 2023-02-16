<?php

namespace App\Models;

use App\Models\VoitAffecte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statut extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function avoirs(){
        return $this->hasMany(Avoir::class);
    }

  public function voitaffectes()
  {
    return $this->hasMany(VoitAffecte::class);
  }




}
