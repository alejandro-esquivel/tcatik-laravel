<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
  public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
  {
    $productos = Producto::all();
    return view('productos.index', compact('productos'));
  }

  public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
  {
    $categorias = Categoria::all();
    $almacenes = Almacen::all();
    return view('productos.create', compact('categorias', 'almacenes'));
  }

  public function store(Request $request): \Illuminate\Http\RedirectResponse
  {
    $request->validate([
      'nombre' => 'required|string|max:255',
      'precio' => 'required|numeric',
      'categorias' => 'required'
    ]);

    $reqData = $request->all();
    unset($reqData['categorias']);
    unset($reqData['almacenes']);

    $producto = Producto::create($reqData);

    // Sincronizamos las categorías del formulario con las de la tabla
    $producto->categorias()->sync($request->input('categorias', []));
    $producto->almacenes()->sync($request->input('almacenes', []));

    return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
  }

  public function show(Producto $producto): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
  {
    return view('productos.show', compact('producto'));
  }

  public function edit(Producto $producto): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
  {
    $categorias = Categoria::all();
    $almacenes = Almacen::all();
    return view('productos.edit', compact('producto', 'categorias', 'almacenes'));
  }

  public function update(Request $request, Producto $producto): \Illuminate\Http\RedirectResponse
  {
    $request->validate([
      'nombre' => 'required|string|max:255',
      'precio' => 'required|numeric',
      'observaciones' => 'string',
      'categorias' => 'required',
      'almacenes' => 'required'
    ]);

    $reqData = $request->all();

    // Sincronizamos las categorías del formulario con las de la tabla
    $producto->categorias()->sync($request->input('categorias', []));
    $producto->almacenes()->sync($request->input('almacenes', []));

    unset($reqData['categorias']);
    unset($reqData['almacenes']);
    $producto->update($reqData);
    return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
  }

  public function destroy(Producto $producto): \Illuminate\Http\RedirectResponse
  {
    $producto->delete();
    return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
  }
}
