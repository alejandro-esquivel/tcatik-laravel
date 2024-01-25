<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
  public function index()
  {
    $categorias = Categoria::all();
    return view('categorias.index', compact('categorias'));
  }

  public function create()
  {
    return view('categorias.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nombre' => 'required|string|max:255',
    ]);

    $reqData = $request->all();

    Categoria::create($reqData);
    return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
  }

  public function show(Categoria $categoria)
  {
    return view('categorias.show', compact('categoria'));
  }

  public function edit(Categoria $categoria)
  {
    return view('categorias.edit', compact('categoria'));
  }

  public function update(Request $request, Categoria $categoria): \Illuminate\Http\RedirectResponse
  {
    $request->validate([
      'nombre' => 'required|string|max:255',
    ]);

    $reqData = $request->all();

    $categoria->update($reqData);
    return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
  }

  public function destroy(Categoria $categoria)
  {
    $categoria->delete();
    return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
  }
}
