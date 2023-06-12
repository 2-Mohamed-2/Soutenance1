<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Residence extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inconnu(){

        return $this->belongsTo(Inconnu::class);
    }

  public function commissariat(): BelongsTo
  {

    return $this->belongsTo(Commissariat::class);
  }
}
