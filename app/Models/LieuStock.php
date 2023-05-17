<?php

namespace App\Models;

use App\Models\Tenue;
use App\Models\Armement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LieuStock extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function munition()
    {
      return $this->hasMany(Munition::class);
    }

    public function tenue(): HasMany
    {
      return $this->hasmany(Tenue::class);
    }

  public function armement(): HasMany
  {
    return $this->hasMany(Armement::class);
  }
}
