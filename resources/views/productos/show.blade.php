@extends('layouts.app')
@section('content')
  <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6">
          <img class="card-img-top mb-5 mb-md-0" src="https://placehold.co/600x400?text=Producto+{{$producto->id}}"
               alt="...">
        </div>
        <div class="col-md-6">
          <div class="small mb-1">ID: {{$producto->id}}</div>
          <h1 class="display-5 fw-bolder text-capitalize">{{$producto->nombre}}</h1>
          <div class="fs-5 mb-3">
            <span>{{$producto->precio}}€</span>
          </div>
          <div class="fs-5 mb-3 row">
            <div class="col col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item h5 text-center">Categorías</li>
                @foreach($producto->categorias as $categoria)
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center h6 fw-normal text-capitalize">
                    {{$categoria->nombre}}
                    <span class="badge bg-primary rounded-pill">{{$categoria->id}}</span>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="col col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item h5 text-center">Almacenes</li>
                @foreach($producto->almacenes as $almacen)
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center h6 fw-normal text-capitalize">
                    {{$almacen->nombre}}
                    <span class="badge bg-primary rounded-pill">{{$almacen->id}}</span>
                  </li>
                @endforeach
              </ul>
            </div>

          </div>
          <p class="lead">{{$producto->observaciones}}</p>
          <div class="d-flex">
            <a href="{{route('productos.edit', $producto->id)}}" class="btn btn-outline-dark flex-shrink-0 me-4">
              <i class="me-1"></i>
              Editar
            </a>
            <a href="{{route('productos.index')}}" class="btn btn-outline-dark btn-warning text-black flex-shrink-0">
              <i class="me-1"></i>
              Volver
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
