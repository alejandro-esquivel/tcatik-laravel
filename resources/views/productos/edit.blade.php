@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="contact__wrapper shadow-lg mt-n9">
      <div class="row no-gutters">
        <div class="col-lg-12 contact-form__wrapper p-5 order-lg-1">
          <form action="{{route('productos.update', $producto->id)}}" class="contact-form form-validate" method="POST"
                enctype="multipart/form-data">
            @method("put")
            @csrf
            <div class="row">
              <div class="col-sm-6 mb-3">
                <div class="form-group">
                  <label class="required-field" for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                         value="{{$producto->nombre}}" required>
                </div>
                <div class="invalid-feedback @error('nombre') d-block @enderror" id="mensajeNombre">
                  El nombre no puede estar vacío.
                </div>
              </div>
              <div class="col-sm-6 mb-3">
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" step="0.01"
                         value="{{$producto->precio}}" required>
                </div>
                <div class="invalid-feedback @error('precio') d-block @enderror" id="mensajePrecio">
                  El precio introducido no es válido.
                </div>
              </div>
              <div class="col-sm-6 mb-3">
                <div class="form-group">
                  <label class="required-field">Categorías</label>
                  <ul class="list-group">
                    <li class="list-group-item">
                      @foreach($categorias as $categoria)
                        <label>
                          <input class="form-check-input me-1" type="checkbox" name="categorias[]"
                                 value="{{$categoria->id}}"
                                 @if($producto->categorias->contains($categoria)) checked @endif
                          >
                        </label>
                        {{$categoria->nombre}}
                        <br/>
                      @endforeach
                    </li>
                  </ul>
                </div>
                <div class="invalid-feedback @error('categorias') d-block @enderror" id="mensajeCategorias">
                  El producto debe de tener como mínimo una categoría
                </div>
              </div>
              <div class="col-sm-6 mb-3">
                <div class="form-group">
                  <label class="required-field">Almacenes</label>
                  <ul class="list-group">
                    <li class="list-group-item">
                      @foreach($almacenes as $almacen)
                        <label>
                          <input class="form-check-input me-1" type="checkbox" name="almacenes[]"
                                 value="{{$almacen->id}}"
                                 @if($producto->almacenes->contains($almacen)) checked @endif
                          >
                        </label>
                        {{$almacen->nombre}}
                        <br/>
                      @endforeach
                    </li>
                  </ul>
                </div>
                <div class="invalid-feedback @error('almacenes') d-block @enderror" id="mensajeAlmacenes">
                  El producto debe pertenecer como mínimo un almacén.
                </div>
              </div>
              <div class="col-sm-12 mb-3">
                <div class="form-group">
                  <label class="required-field" for="observaciones">Observaciones</label>
                  <textarea class="form-control" id="observaciones" name="observaciones" rows="4"
                            placeholder="Observaciones" required>{{$producto->observaciones}}
                  </textarea>
                </div>
                <div class="invalid-feedback @error('observaciones') d-block @enderror" id="mensajeObservaciones">
                  Las observaciones no deben de estar vacías.
                </div>
              </div>
              <div class="col-sm-12 mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    $('document').ready(() => {
      const nombreInput = $('#nombre');
      const precioInput = $('#precio');
      const categoriasCheck = $("input[name='categorias[]'");
      const almacenesCheck = $("input[name='almacenes[]'");
      const observacionesInput = $("textarea#observaciones");
      const mensajeNombre = $('#mensajeNombre');
      const mensajePrecio = $('#mensajePrecio');
      const mensajeCategorias = $('#mensajeCategorias');
      const mensajeAlmacenes = $('#mensajeAlmacenes');
      const mensajeObservaciones = $('#mensajeObservaciones');
      const submitBtn = $('button[type=submit]');

      function verificarValidezFormulario() {
        if (nombreInput.is(':valid') && precioInput.is(':valid') && categoriasCheck.is(':checked')
          && almacenesCheck.is(':checked') && observacionesInput.is(':valid')
        ) {
          submitBtn.prop('disabled', false);
        } else {
          submitBtn.prop('disabled', true);
        }
      }

      categoriasCheck.change(() => {
        if (categoriasCheck.is(':checked')) {
          mensajeCategorias.removeClass('d-block')
          console.info('Categorías válidas');
        } else {
          mensajeCategorias.addClass('d-block')
        }
        verificarValidezFormulario()
      })

      almacenesCheck.change(() => {
        if (almacenesCheck.is(':checked')) {
          mensajeAlmacenes.removeClass('d-block')
        } else {
          mensajeAlmacenes.addClass('d-block')
        }
        verificarValidezFormulario()
      })

      nombreInput.change(() => {
        if (nombreInput.is(':valid')) {
          mensajeNombre.removeClass('d-block');
        } else {
          mensajeNombre.addClass('d-block');
        }
        verificarValidezFormulario()
      })

      precioInput.change(() => {
        if (precioInput.is(':valid')) {
          mensajePrecio.removeClass('d-block');
        } else {
          mensajePrecio.addClass('d-block');
        }
        verificarValidezFormulario()
      })

      observacionesInput.change(() => {
        if (observacionesInput.is(':valid')) {
          mensajeObservaciones.removeClass('d-block');
        } else {
          mensajeObservaciones.addClass('d-block');
        }
        verificarValidezFormulario()
      })
    })
  </script>
@endsection
