@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="contact__wrapper shadow-lg mt-n9">
      <div class="row no-gutters">
        <div class="col-lg-12 contact-form__wrapper p-5 order-lg-1">
          <form action="{{route('productos.store')}}" class="contact-form form-validate" method="POST"
                enctype="multipart/form-data">
            @method("post")
            @csrf
            <div class="row">
              <div class="col-sm-6 mb-3">
                <div class="form-group">
                  <label class="required-field" for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value=""
                         required>
                </div>
                <div class="invalid-feedback @error('nombre') d-block @enderror" id="nombreMessage">
                  El nombre no puede estar vacío.
                </div>
              </div>
              <div class="col-sm-6 mb-3">
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" step="0.01"
                         value="" required>
                </div>
                <div class="invalid-feedback @error('precio') d-block @enderror" id="precioMessage">
                  El precio introducido no es válido.
                </div>
              </div>
              <div class="col-sm-6 mb-3">
                <div class="form-group">
                  <label class="required-field" for="email">Categorías</label>
                  <ul class="list-group">
                    <li class="list-group-item">
                      @foreach($categorias as $categoria)
                        <input class="form-check-input me-1" type="checkbox" name="categorias[]"
                               value="{{$categoria->id}}"
                               aria-label="..."
                        >
                        {{$categoria->nombre}}
                        <br/>
                      @endforeach
                    </li>
                  </ul>
                </div>
                <div class="invalid-feedback @error('categorias') d-block @enderror" id="categoriasMessage">
                  El producto debe de tener como mínimo una categoría
                </div>
              </div>
              <div class="col-sm-6 mb-3">
                <div class="form-group">
                  <label class="required-field" for="email">Almacenes</label>
                  <ul class="list-group">
                    <li class="list-group-item">
                      @foreach($almacenes as $almacen)
                        <input class="form-check-input me-1" type="checkbox" name="almacenes[]"
                               value="{{$almacen->id}}"
                               aria-label="..."
                        >
                        {{$almacen->nombre}}
                        <br/>
                      @endforeach
                    </li>
                  </ul>
                </div>
                <div class="invalid-feedback @error('almacen') d-block @enderror" id="almacenesMessage">
                  El producto debe pertenecer como mínimo un almacén.
                </div>
              </div>
              <div class="col-sm-12 mb-3">
                <div class="form-group">
                  <label class="required-field" for="observaciones">Observaciones</label>
                  <textarea class="form-control" id="observaciones" name="observaciones" rows="4"
                            placeholder="Observaciones" required></textarea>
                </div>
                <div class="invalid-feedback @error('observaciones') d-block @enderror" id="observacionesMessage">
                  Las observaciones no deben de estar vacías.
                </div>
              </div>
              <div class="col-sm-12 mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
      const nombreMessage = $('#nombreMessage');
      const precioMessage = $('#precioMessage');
      const categoriasMessage = $('#categoriasMessage');
      const almacenesMessage = $('#almacenesMessage');
      const observacionesMessage = $('#observacionesMessage');
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
          categoriasMessage.removeClass('d-block')
        } else {
          categoriasMessage.addClass('d-block')
        }
        verificarValidezFormulario()
      })

      almacenesCheck.change(() => {
        if (almacenesCheck.is(':checked')) {
          almacenesMessage.removeClass('d-block')
        } else {
          almacenesMessage.addClass('d-block')
        }
        verificarValidezFormulario()
      })

      nombreInput.change(() => {
        if (nombreInput.is(':valid')) {
          nombreMessage.removeClass('d-block');
        } else {
          nombreMessage.addClass('d-block');
        }
        verificarValidezFormulario()
      })

      precioInput.change(() => {
        if (precioInput.is(':valid')) {
          precioMessage.removeClass('d-block');
        } else {
          precioMessage.addClass('d-block');
        }
        verificarValidezFormulario()
      })

      observacionesInput.change(() => {
        if (observacionesInput.is(':valid')) {
          observacionesMessage.removeClass('d-block');
        } else {
          observacionesMessage.addClass('d-block');
        }
        verificarValidezFormulario()
      })
    })
  </script>
@endsection
