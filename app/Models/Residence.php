<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inconnu(){

        return $this->belongsTo(Inconnu::class);
    }
}
