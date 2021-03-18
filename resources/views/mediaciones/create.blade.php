@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8">
        <h2 class="float-left">INGRESAR DATOS DE LA MEDIACION</h2>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <form action="/mediaciones" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="numero">Número</label>
              <input type="text" name="numero" value="{{ old('numero') }}" class="form-control" id="numero" placeholder="Número">
              @if ($errors->has('numero'))
                <span class="help-block">
                    <strong>{{ $errors->first('numero') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <input type="text" name="observaciones" value="{{ old('observaciones') }}"class="form-control" id="observaciones" placeholder="Observaciones">
                @if ($errors->has('observaciones'))
                    <span class="help-block">
                        <strong>{{ $errors->first('observaciones') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="expediente_id">Expediente</label>
                <select class="custom-select" name="expediente_id" id="expediente_id">
                    @foreach ($expedientes as $expediente)
                        <option value="{{$expediente->id}}">{{$expediente->caratula." ,  ".$expediente->numero}}</option>
                    @endforeach
                </select>

                @if ($errors->has('expediente_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('expediente_id') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label>Estado de la Mediacion</label>
                <select class="form-control" name="estado_id" id="estado_id">
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}"> {{$estado->estado}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tipo de cierre</label>
                <select class="form-control" name="tipo_cierre_id" id="tipo_cierre_id">
                    @foreach($cierres as $cierre)
                        <option value="{{ $cierre->id }}"> {{$cierre->tipo_cierre}} </option>
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
                <label class="col-xs-2 control-label">Adjuntar el archivo del resultado de la Mediación:</label>
                <input type="file" name="archivo" title="seleccionar fichero" id="importData" accept=".doc,.xdoc" />
            </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>

</div>

@endsection
