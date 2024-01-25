@extends('layouts.app')
@section('content')
  <h1>Productos</h1>

  <table class="table">
    <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th class="text-end" style="width: 10rem;">Precio</th>
      <th>Observaciones</th>
      <th style="width: 10rem;">Categorías</th>
      <th style="width: 10rem;">Almacenes</th>
      <th>Acción</th>
    </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
      <tr>
        <td>{{$producto->id}}</td>
        <td style="max-width: 10rem;">{{$producto->nombre}}</td>
        <td class="text-end" style="width: 10rem;">{{$producto->precio}}€</td>
        <td style="max-width: 10rem;">{{$producto->observaciones}}</td>
        <td>
          @php
            $clases = ["bg-primary", "bg-secondary", "bg-danger", "bg-warning", "bg-dark-subtle", "bg-info", "bg-success"];
          @endphp
          @foreach($producto->categorias as $categoria)
            <span class="badge rounded-pill {{$clases[array_rand($clases)]}}">{{$categoria->nombre}}</span>
          @endforeach
        </td>
        <td>
          @foreach($producto->almacenes as $almacen)
            <span class="badge rounded-pill {{$clases[array_rand($clases)]}}">{{$almacen->nombre}}</span>
          @endforeach
        </td>
        <td>
          <a class="btn btn-primary" href="{{route('productos.show', $producto->id)}}"><i
              class="far fa-eye"></i> Ver</a>
          <a class="btn btn-success" href="{{route('productos.edit', $producto->id)}}"><i class=" fas fa-edit"></i>
            Editar</a>
          <form action="{{route('productos.destroy', $producto->id)}}" method="post" class="d-inline-block">
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

  {{--    {{//$productos->links('pagination::bootstrap-5');}}--}}

@endsection
