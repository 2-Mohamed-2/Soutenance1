<?php

namespace App\Models;

use App\Models\VoitAffecte;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> c878fd62bd696e968a0863e388fd02ddac162e1d

class Statut extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function avoirs(){
        return $this->hasMany(Avoir::class);
    }

<<<<<<< HEAD
=======
  public function voitaffectes()
  {
    return $this->hasMany(VoitAffecte::class);
  }



>>>>>>> c878fd62bd696e968a0863e388fd02ddac162e1d

}
