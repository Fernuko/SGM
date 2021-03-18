@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-8">
        <h2 class="float-left">MODIFIQUELOS DATOS DEL ABODAGO</h2>
    </div>
</div>


<div class="row">
    <div class="col-8">
    <form action="{{route('abogados.update', $abogado->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido"  value="{{ $abogado->apellido }}" class="form-control" id="apellido" placeholder="Apellido">
              @if ($errors->has('apellido'))
                <span class="help-block">
                    <strong>{{ $errors->first('apellido') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" value="{{ $abogado->nombre }}" class="form-control" id="nombre" placeholder="Nombre">
              @if ($errors->has('nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
                <label for="domicilio">Domicilio</label>
                <input type="text" name="domicilio" value="{{ $abogado->domicilio }}" class="form-control" id="domicilio" placeholder="Domicilio Constituido">
                @if ($errors->has('domicilio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('domicilio') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $abogado->telefono }}" id="telefono" placeholder="Telefono">
                @if ($errors->has('telefono'))
                <span class="help-block">
                    <strong>{{ $errors->first('telefono') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
                <label for="matricula">Matricula</label>
                <input type="text" class="form-control" name="matricula" value="{{ $abogado->matricula }}" id="matricula" placeholder="Matricula">
                @if ($errors->has('matricula'))
                    <span class="help-block">
                        <strong>{{ $errors->first('matricula') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" value="{{ $abogado->email }}" id="email" placeholder="E-mail">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
    </div>
</div>

@endsection
