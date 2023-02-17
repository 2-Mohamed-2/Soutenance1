<?php

namespace App\Models;

use App\Models\User;
use App\Models\Avoir;
use App\Models\Section;
use App\Models\Munition;
use App\Models\Vehicule;
use App\Models\VoitAffecte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commissariat extends Model
{
    protected $guarded = [];
    use HasFactory;

    // public function sections()
    // {
    //     return $this->hasMany(Section::class);
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    // public function armements()
    // {

    //     return $this->hasMany(Armement::class);
    // }

    public function munitions()
    {

        return $this->hasMany(Munition::class);
    }

    public function avoir(){
        return $this->hasMany(Avoir::class);
    }

    public function tenues(){
        return $this->hasMany(Tenue::class);
    }

    public function vehicules()
    {
      return $this->hasMany(Vehicule::class);
    }

  public function voitaffecte()
  {
    return $this->hasMany(VoitAffecte::class);
  }
}
