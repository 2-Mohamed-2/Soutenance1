<?php

namespace App\Models;

use App\Models\Inconnu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SessionCitoyen extends Model
{
    use HasFactory;
    public function inconnu()
    {
        return $this->belongsTo(Inconnu::class);
    }
}
