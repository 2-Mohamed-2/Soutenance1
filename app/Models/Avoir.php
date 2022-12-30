<?php

namespace App\Models;

use App\Models\User;
use App\Models\Statut;
use App\Models\Armement;
use App\Models\Commissariat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avoir extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user() {
        return $this->belongsTo(User::class);
    }
    

    public function commissariat(){
        return $this->belongsTo(Commissariat::class);
    }

    public function armement(){
        return $this->belongsTo(Armement::class);
    }

    public function statut(){
        return $this->belongsTo(Statut::class);
    }

}
