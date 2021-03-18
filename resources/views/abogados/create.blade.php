
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8">
        <h2 class="float-left">INGRESAR DATOS DEL ABOGADO</h2>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <form action="{{ route('abogados.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido"  value="{{ old('apellido') }}" class="form-control" id="apellido" placeholder="Apellido">
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
                <label for="domicilio">Domicilio constituido</label>
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
            <div class="form-group">
                <label for="matricula">Matricula</label>
                <input type="text" class="form-control" name="matricula" value="{{ old('matricula') }}" id="matricula" placeholder="Matricula">
                @if ($errors->has('matricula'))
                    <span class="help-block">
                        <strong>{{ $errors->first('matricula') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="E-mail">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>

@endsection
