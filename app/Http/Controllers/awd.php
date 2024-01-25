<?php

$categorias = Categoria::all();
$almacenes = Almacen::all();
return view('productos.create', compact('categorias', 'almacenes'));


public function update(Request $request, Producto $producto): \Illuminate\Http\RedirectResponse
{
  $request->validate([
    'nombre' => 'required|string|max:255',
    'precio' => 'required|numeric',
    'observaciones' => 'string',
    'categorias' => 'required'
  ]);

  $reqData = $request->all();

  $prod = Producto::find($producto->id);
  $prod->nombre = $request->input('nombre');
  $prod->precio = $request->input('precio');
  $prod->observaciones = $request->input('observaciones');
  $prod['updated_at'] = now();
  $prod->update();


  // Sincronizamos las categorías del formulario con las de la tabla
  $producto->categorias()->sync($request->input('categorias', []));
  $producto->almacenes()->sync($request->input('almacenes', []));

  unset($reqData['categorias']);
  unset($reqData['almacenes']);
  //$producto->update($reqData);
  return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
}
