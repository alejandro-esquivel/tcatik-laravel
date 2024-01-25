@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-4 mt-0">
        <h1>Categorías</h1>
      </div>
      <div class="col-8 mt-2">
        <a class="btn btn-primary w-100" href="{{route('categorias.create')}}">
          <i class="fa fa-arrow-circle-right"></i> Crear Categoría
        </a>
      </div>
    </div>
  </div>
  <table class="table">
    <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Creado</th>
      <th>Actualizado</th>
      <th>Acción</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
      <tr>
        <td>{{$categoria->id}}</td>
        <td>{{$categoria->nombre}}</td>
        <td>{{$categoria->created_at}}</td>
        <td>{{$categoria->updated_at}}</td>
        <td>
          <a class="btn btn-primary" href="{{route('categorias.show', $categoria)}}">
            <i class="far fa-eye"></i> Ver</a>
          <a class="btn btn-success" href="{{route('categorias.edit', $categoria->id)}}">
            <i class=" fas fa-edit"></i> Editar</a>
          <form action="{{route('categorias.destroy', $categoria->id)}}" method="post" class="d-inline-block">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">
              <i class="far fa-trash-alt"></i>
              Eliminar
            </button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection
