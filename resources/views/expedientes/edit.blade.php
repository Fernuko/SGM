@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-8 offset-2">
        <form action="{{route('expedientes.update',$expediente->id)}}" method="POST">
            @csrf
            @method('PUT')
              <div class="form-group">
              <label for="caratula">Caratula</label>
              <input type="text" name="caratula" value="{{ $expediente->caratula }}" class="form-control" id="caratula" placeholder="Caratula">
              @if ($errors->has('caratula'))
                <span class="help-block">
                    <strong>{{ $errors->first('caratula') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="numero">Número de expediente</label>
              <input type="text" name="numero" value="{{ $expediente->numero }}" class="form-control" id="numero" placeholder="Número">
              @if ($errors->has('numero'))
                <span class="help-block">
                    <strong>{{ $errors->first('numero') }}</strong>
                </span>
              @endif
            </div>





            <div class="form-group">
                <label for="actor_id">Actor</label>
                <select class="custom-select" name="actor_id" id="actor_id">
                    @foreach ($personas as $actor)
                        <option value="{{$actor->id}}">{{$actor->apellido.", ".$actor->nombre}}</option>
                    @endforeach
                </select>
                @if ($errors->has('actor_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('actor_id') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group">
                <label for="abogado_actor_id">Abogado del Actor</label>
                <select class="custom-select" name="abogado_id" id="abogado_id">
                    @foreach ($abogados as $abogado_actor)
                        <option value="{{$abogado_actor->id}}">{{$abogado_actor->apellido.", ".$abogado_actor->nombre}}</option>
                    @endforeach
                </select>
                @if ($errors->has('abogado_actor_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('abogado_actor_id') }}</strong>
                  </span>
                @endif

            <div class="form-group">
                <label for="demandado_id">Demandado</label>
                <select class="custom-select" name="demandado_id" id="demandado_id">
                    @foreach ($personas as $demandado)
                        <option value="{{$demandado->id}}">{{$demandado->apellido.", ".$demandado->nombre}}</option>
                    @endforeach
                </select>
                @if ($errors->has('demandado_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('demandado_id') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group">
                <label for="abogado_demandado_id">Abogado del Demandado</label>
                <select class="custom-select" name="abogado_demandado_id" id="abogado_demandado_id">
                    @foreach ($abogados as $abogado_demandado)
                        <option value="{{$abogado_demandado->id}}">{{$abogado_demandado->apellido.", ".$abogado_demandado->nombre}}</option>
                    @endforeach
                </select>
                @if ($errors->has('abogado_demandado_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('abogado_demandado_id') }}</strong>
                  </span>
                @endif
            </div>

            </div>
            <div class="form-group">
                <label for="juzgado_id">Juzgado</label>
                <select class="custom-select" name="juzgado_id" id="juzgado_id">
                    @foreach ($personas as $juzgado)
                        <option value="{{$juzgado->id}}">{{$juzgado->nombre.", ".$juzgado->telefono}}</option>
                    @endforeach
                </select>
                @if ($errors->has('juzgado_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('juzgado_id') }}</strong>
                  </span>
                @endif
            </div>






            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
    </div>
</div>

@endsection
