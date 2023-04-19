<?php

namespace App\Models;

use App\Models\Tenue;
use App\Models\Commissariat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TenueAff extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function tenue(): BelongsTo
  {
    return $this->belongsTo(Tenue::class);
  }

  public function commissariat(): BelongsTo
  {
    return $this->belongsTo(Commissariat::class);
  }
}
