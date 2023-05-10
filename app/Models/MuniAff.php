<?php

namespace App\Models;

use App\Models\Commissariat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MuniAff extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function commissariat()
    {
      return $this->belongsTo(Commissariat::class);
    }

    public function munition(){
      
      return $this->belongsTo(Munition::class);
    }
}
