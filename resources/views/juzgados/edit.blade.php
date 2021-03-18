@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-8">
        <h2 class="float-left">MODIFIQUELOS DATOS DEL JUZGADO</h2>
    </div>
</div>


<div class="row">
    <div class="col-8">
            <form action="{{route('juzgados.update', $juzgado->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" value="{{ $juzgado->nombre }}"class="form-control" id="nombre" placeholder="Nombre">
              @if ($errors->has('nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" value="{{ $juzgado->telefono }}" class="form-control" id="telefono" placeholder="Telefono">
                @if ($errors->has('telefono'))
                <span class="help-block">
                    <strong>{{ $errors->first('apellido') }}</strong>
                </span>
              @endif
            </div>



            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
    </div>
</div>

@endsection
