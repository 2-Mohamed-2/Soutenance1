<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LieuStock extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function munition()
    {
      return $this->hasMany(Munition::class);
    }
}
