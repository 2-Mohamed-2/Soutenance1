<?php

namespace App\Models;

use App\Models\Commissariat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Munition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Commissariat(){
        return $this->belongsTo(Commissariat::class, 'id');
    }
}