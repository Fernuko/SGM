@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-8">
        <h2 class="float-left">MODIFIQUELOS DATOS DE LA MEDIACION</h2>
    </div>
</div>


<div class="row">
    <div class="col-8">
        <form action="{{route('mediaciones.update',$mediacion->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="numero">Número</label>
              <input type="text" name="numero" value="{{ $mediacion->numero }}" class="form-control" id="numero" placeholder="Número">
              @if ($errors->has('numero'))
                <span class="help-block">
                    <strong>{{ $errors->first('numero') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
                <label for="numero">Observaciones</label>
                <input type="text" name="observaciones" value="{{ $mediacion->observaciones }}"class="form-control" id="observaciones" placeholder="Observaciones">
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
                        <option value="{{ $estado->id }}"
                            @if($estado->id === $mediacion->estado_id) selected @endif>
                            {{$estado->estado}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tipo de cierre</label>
                <select class="form-control" name="tipo_cierre_id" id="tipo_cierre_id">
                    @foreach($cierres as $cierre)
                        <option value="{{ $cierre->id }}"
                             @if($cierre->id === $mediacion->tipo_cierre_id) selected @endif>
                             {{$cierre->tipo_cierre}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="datetime-local" name="fecha" value="{{ $mediacion->fecha }}" class="form-control" id="fecha">
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




            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
    </div>
</div>

@endsection
