<?php

namespace Database\Seeders;

use App\Models\Almacen;
use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class AlmacenHasProductoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $tablaPivot = 'almacenes_has_productos';
    // Obtenemos los ID de todos los productos y almacenes y los convertimos a array, optimizando los seeders
    $productosIds = Producto::pluck('id')->toArray();
    $almacenesIds = Almacen::pluck('id')->toArray();


    // Debido a que este es un seeder para una tabla pivot y no tiene modelo tenemos que crear un for
    // que inserte los ID existentes de ambas tablas de forma aleatoria
    $data = [];

    for ($i = 0; $i < 15; $i++) {
      $data[] = [
        'producto_id' => Arr::random($productosIds),
        'almacen_id' => Arr::random($almacenesIds),
        'created_at' => now(),
        'updated_at' => now()
      ];
    }
    DB::table($tablaPivot)->insert($data);
  }
}
