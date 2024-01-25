<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Almacen extends Model
{
  use HasFactory;

  protected $table = 'almacenes';
  protected $fillable = ['nombre', 'ubicacion'];


  public function productos(): BelongsToMany
  {
    return $this->belongsToMany(Producto::class, 'almacenes_has_productos');
  }

}
