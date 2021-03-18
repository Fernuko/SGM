@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8">
        <h2 class="float-left">INGRESAR DATOS DEL JUZGADO</h2>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <form action="/juzgados" method="POST">
            @csrf
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" value="{{ old('nombre') }}"class="form-control" id="nombre" placeholder="Nombre">
              @if ($errors->has('nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control" id="telefono" placeholder="Telefono">
                @if ($errors->has('telefono'))
                <span class="help-block">
                    <strong>{{ $errors->first('apellido') }}</strong>
                </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
          </form>
    </div>
</div>

@endsection
