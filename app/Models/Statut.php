<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Statut;

class Statut extends Model
{
    use HasFactory;
    protected $guarded = [];

    

    public function avoirs(){
        return $this->hasMany(Avoir::class);
    }

    
}
