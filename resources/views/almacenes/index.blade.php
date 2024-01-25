@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-4 mt-0">
        <h1>Almacenes</h1>
      </div>
      <div class="col-8 mt-2">
        <a class="btn btn-primary w-100" href="{{route('almacenes.create')}}">
          <i class="fa fa-warehouse"></i>  Crear Almacén
        </a>
      </div>
    </div>
  </div>
  <table class="table">
    <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Ubicación</th>
      <th>Creado</th>
      <th>Actualizado</th>
      <th>Acción</th>
    </tr>
    </thead>
    <tbody>
    @foreach($almacenes as $almacen)
      <tr>
        <td>{{$almacen->id}}</td>
        <td>{{$almacen->nombre}}</td>
        <td style="max-width: 15rem;">{{$almacen->ubicacion}}</td>
        <td>{{$almacen->created_at}}</td>
        <td>{{$almacen->updated_at}}</td>
        <td>
          <a class="btn btn-primary" href="{{route('almacenes.show', $almacen)}}">
            <i class="far fa-eye"></i> Ver</a>
          <a class="btn btn-success" href="{{route('almacenes.edit', $almacen->id)}}">
            <i class=" fas fa-edit"></i> Editar</a>
          <form action="{{route('almacenes.destroy', $almacen->id)}}" method="post" class="d-inline-block">
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
