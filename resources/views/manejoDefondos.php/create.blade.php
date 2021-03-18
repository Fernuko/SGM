@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8">
        <h2 class="float-left">INGRESAR DATOS DEL MANEJO DE FONDOS</h2>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <form action="/manejoDeFondos" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="mediacion_id">Mediación</label>
                <select class="custom-select" name="mediacion_id" id="mediacion_id">
                    @foreach ($mediaciones as $mediacion)
                        <option value="{{$mediacion->id}}">{{$mediacion->caratula." ,  ".$mediacion->numero}}</option>
                    @endforeach
                </select>

                @if ($errors->has('mediacion_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('mediacion_id') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="actor_id">Persona</label>
                <select class="custom-select" name="actor_id" id="actor_id">
                    @foreach ($personas as $persona)
                        <option value="{{$persona->id}}">{{$persona->apellido.", ".$persona->nombre}}</option>
                    @endforeach
                </select>
                @if ($errors->has('persona_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('persona_id') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group">
                <label>Forma de Pago</label>
                <select class="form-control" name="manejo_forma_id" id="manejo_forma_id">
                    @foreach($formas as $forma)
                        <option value="{{ $forma->id }}"> {{$forma->manejo_forma}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
              <label for="monto">Monto</label>
              <input type="text" name="monto" value="{{ old('monto') }}" class="form-control" id="monto" placeholder="Monto">
              @if ($errors->has('monto'))
                <span class="help-block">
                    <strong>{{ $errors->first('monto') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
                <label>Cuota/as</label>
                <select class="form-control" name="manejo_cuota_id" id="manejo_cuota_id">
                    @foreach($cuotas as $cuota)
                        <option value="{{ $cuota->id }}"> {{$cuota->manejo_cuota}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="datetime-local" name="fecha" value="{{ old('fecha') }}" class="form-control" id="fecha">
                @if ($errors->has('fecha'))
                  <span class="help-block">
                      <strong>{{ $errors->first('fecha') }}</strong>
                  </span>
                @endif
            </div>

             <div class="form-group">
                <label>Estado</label>
                <select class="form-control" name="manejo_estado_id" id="manejo_estado_id">
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}"> {{$estado->manejo_estado}} </option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>

</div>

@endsection
