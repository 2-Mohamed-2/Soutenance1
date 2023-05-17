<?php

namespace App\Models;

use App\Models\User;
use App\Models\LieuStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

  public function lieu_stock(): BelongsTo
  {
    return $this->belongsTo(LieuStock::class);
  }

}
