@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-8 offset-2">
        <form action="{{route('personas.update', $persona->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" value="{{ $persona->apellido }}" class="form-control" id="apellido" placeholder="Apellido">
              @if ($errors->has('apellido'))
                <span class="help-block">
                    <strong>{{ $errors->first('apellido') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" value="{{ $persona->nombre }}" class="form-control" id="nombre" placeholder="Nombre">
              @if ($errors->has('nombre'))
              <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
              </span>
            @endif
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" name="dni" value="{{ $persona->dni }}" class="form-control" id="dni" placeholder="DNI">
                @if ($errors->has('dni'))
                    <span class="help-block">
                       <strong>{{ $errors->first('dni') }}</strong>
                    </span>
            @endif
            </div>
            <div class="form-group">
                <label for="domicilio">Domicilio</label>
                <input type="text" name="domicilio" value="{{ $persona->domicilio }}" class="form-control" id="domicilio" placeholder="Domicilio">
                @if ($errors->has('domicilio'))
                <span class="help-block">
                    <strong>{{ $errors->first('domicilio') }}</strong>
                </span>
            @endif
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $persona->telefono }}" id="telefono" placeholder="Telefono">
                @if ($errors->has('telefono'))
                <span class="help-block">
                    <strong>{{ $errors->first('telefono') }}</strong>
                </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
    </div>
</div>

@endsection
