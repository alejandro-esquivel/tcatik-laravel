<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenesController extends Controller
{
  public function index()
  {
    $almacenes = Almacen::all();
    return view('almacenes.index', compact('almacenes'));
  }

  public function create()
  {
    return view('almacenes.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nombre' => 'required|string|max:255',
      'ubicacion' => 'required|string',
    ]);

    $reqData = $request->all();

    Almacen::create($reqData);
    return redirect()->route('almacenes.index')->with('success', 'Almacén creado exitosamente.');
  }

  public function show(Almacen $almacene)
  {
    return view('almacenes.show', compact('almacene'));
  }

  public function edit(Almacen $almacene)
  {
    return view('almacenes.edit', compact('almacene'));
  }

  public function update(Request $request, Almacen $almacene)
  {
    $request->validate([
      'nombre' => 'required|string|max:255',
      'ubicacion' => 'required|string|max:255',
    ]);

    $reqData = $request->all();

    $almacene->update($reqData);
    return redirect()->route('almacenes.index')->with('success', 'Almacén actualizado exitosamente.');
  }

  public function destroy(Almacen $almacene)
  {
    $almacene->delete();
    return redirect()->route('almacenes.index')->with('success', 'Almacén eliminado exitosamente.');
  }
}
