<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
  use HasFactory;

  protected $fillable = ['nombre', 'precio', 'observaciones'];

  public function categorias(): BelongsToMany
  {
    return $this->belongsToMany(Categoria::class, "productos_has_categorias")->as('productos_has_categorias');
  }

  public function almacenes(): BelongsToMany
  {
    return $this->belongsToMany(Almacen::class, 'almacenes_has_productos')->as('almacenes_has_productos');
  }
}
