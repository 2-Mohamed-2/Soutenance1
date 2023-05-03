<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tenue extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class, 'id');
  }

  public function commissariat()
  {
    return $this->belongsTo(Commissariat::class, 'id');
  }

  public function tenueaff(): BelongsTo
  {
    return $this->belongsTo(tenueaff::class);
  }
}
