@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8 offset-2">
        <h2 class="float-left">INGRESAR DATOS DE LA PERSONA</h2>
    </div>
</div>

<div class="row">
    <div class="col-8 offset-2">
        <form action="/personas" method="POST">
            @csrf
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control" id="apellido" placeholder="Apellido">
              @if ($errors->has('apellido'))
                <span class="help-block">
                    <strong>{{ $errors->first('apellido') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" id="nombre" placeholder="Nombre">
              @if ($errors->has('nombre'))
              <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
              </span>
            @endif
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" name="dni" value="{{ old('dni') }}" class="form-control" id="dni" placeholder="DNI">
                @if ($errors->has('dni'))
                    <span class="help-block">
                       <strong>{{ $errors->first('dni') }}</strong>
                    </span>
            @endif
            </div>
            <div class="form-group">
                <label for="domicilio">Domicilio</label>
                <input type="text" name="domicilio" value="{{ old('domicilio') }}" class="form-control" id="domicilio" placeholder="Domicilio">
                @if ($errors->has('domicilio'))
                <span class="help-block">
                    <strong>{{ $errors->first('domicilio') }}</strong>
                </span>
            @endif
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" id="telefono" placeholder="Telefono">
                @if ($errors->has('telefono'))
                <span class="help-block">
                    <strong>{{ $errors->first('telefono') }}</strong>
                </span>
              @endif

            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
          </form>

    </div>
</div>

@endsection
