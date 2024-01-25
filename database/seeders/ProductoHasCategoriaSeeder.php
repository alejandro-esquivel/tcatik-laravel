<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductoHasCategoriaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $tablaPivot = 'productos_has_categorias';
    $productosIds = Producto::pluck('id')->toArray();
    $categoriasIds = Categoria::pluck('id')->toArray();

    // Debido a que este es un seeder para una tabla pivot y no tiene modelo tenemos que crear un for
    // que inserte los ID existentes de ambas tablas de forma aleatoria
    $data = [];

    for ($i = 0; $i < 10; $i++) {
      $data[] = [
        'producto_id' => Arr::random($productosIds),
        'categoria_id' => Arr::random($categoriasIds),
        'created_at' => now(),
        'updated_at' => now()
      ];
    }
    DB::table($tablaPivot)->insert($data);
  }
}
