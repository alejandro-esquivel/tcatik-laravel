@extends('layouts.app')
@section('content')
  <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6">
          <img class="card-img-top mb-5 mb-md-0"
               src="https://placehold.co/600x400?text=Categor&iacute;a+{{$categoria->id}}"
               alt="...">
        </div>
        <div class="col-md-6">
          <div class="small mb-1">ID: {{$categoria->id}}</div>
          <h1 class="display-5 fw-bolder text-capitalize">{{$categoria->nombre}}</h1>
          <div class="d-flex">
            <a href="{{route('categorias.edit', $categoria->id)}}" class="btn btn-outline-dark flex-shrink-0 me-4">
              <i class="me-1"></i>
              Editar
            </a>
            <a href="{{route('categorias.index')}}" class="btn btn-outline-dark btn-warning text-black flex-shrink-0">
              <i class="me-1"></i>
              Volver
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
