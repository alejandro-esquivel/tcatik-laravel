@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="contact__wrapper shadow-lg mt-n9">
      <div class="row no-gutters">
        <div class="col-lg-12 contact-form__wrapper p-5 order-lg-1">
          <form action="{{route('categorias.store')}}" class="contact-form form-validate" method="POST"
                enctype="multipart/form-data">
            @method("post")
            @csrf
            <div class="row">
              <div class="col-sm-6 mb-3">
                <div class="form-group">
                  <label class="required-field" for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                         value="" required>
                </div>
                <div class="invalid-feedback @error('nombre') d-block @enderror" id="mensajeNombre">
                  El nombre no puede estar vacío.
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
      const mensajeNombre = $('#mensajeNombre');
      const submitBtn = $('button[type=submit]');

      function verificarValidezFormulario() {
        if (nombreInput.is(':valid')) {
          submitBtn.prop('disabled', false);
        } else {
          submitBtn.prop('disabled', true);
        }
      }

      nombreInput.change(() => {
        if (nombreInput.is(':valid')) {
          mensajeNombre.removeClass('d-block');
        } else {
          mensajeNombre.addClass('d-block');
        }
        verificarValidezFormulario()
      })
    })
  </script>
@endsection
