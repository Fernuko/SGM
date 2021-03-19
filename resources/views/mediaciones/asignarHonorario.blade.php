@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <h5 class="card-header text-center"><strong>{{ $mediacion->expediente->actor->apellido." vs ".$mediacion->expediente->demandado->apellido }}</strong></h5>
                <form action="{{ route('asignarHonorario.post',$mediacion->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">AGREGAR HONORARIOS</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>ACTOR:</h4>
                            <h5>Nombre: <strong>{{ $mediacion->expediente->actor->getApyNom() }}</strong></h5>
                            <h5>DNI: <strong>{{ $mediacion->expediente->actor->dni }}</strong></h5>
                            <h5>Teléfono: <strong>{{ $mediacion->expediente->actor->telefono }}</strong></h5>
                            <h5>Domicilio: <strong>{{ $mediacion->expediente->actor->domicilio }}</strong></h5>
                            <h5>Abogado: <strong>{{ $mediacion->expediente->abogado_actor->getApyNom() }}</strong></h5>
                            <label><input type="checkbox" id="beneficio_actor" name="beneficio_actor" value="1"><strong> Con Beneficio</strong></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="fecha-label"><strong>FECHA DE PAGO</strong></span>
                                </div>
                                <input type="date" class="form-control" id="fecha_pago_actor" name="fecha_pago_actor" aria-describedby="fecha-label">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="monto-label"><strong>MONTO  $</strong></span>
                                </div>
                                <input type="text" class="form-control" id="monto_actor" name="monto_actor" aria-describedby="monto-label">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>DEMANDADO:</h4>
                            <h5>Nombre: <strong>{{ $mediacion->expediente->demandado->getApyNom() }}</strong></h5>
                            <h5>DNI: <strong>{{ $mediacion->expediente->demandado->dni }}</strong></h5>
                            <h5>Teléfono: <strong>{{ $mediacion->expediente->demandado->telefono }}</strong></h5>
                            <h5>Domicilio: <strong>{{ $mediacion->expediente->demandado->domicilio }}</strong></h5>
                            <h5>Abogado: <strong>{{ $mediacion->expediente->abogado_demandado->getApyNom() }}</strong></h5>
                            <label><input type="checkbox" id="beneficio_actor" name="beneficio_demandado" value="1"><strong> Con Beneficio</strong></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="fecha-label"><strong>FECHA DE PAGO</strong></span>
                                </div>
                                <input type="date" class="form-control" id="fecha_pago_demandado" name="fecha_pago_demandado" aria-describedby="fecha-label">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="monto-label"><strong>MONTO  $</strong></span>
                                </div>
                                <input type="text" class="form-control" id="monto_demandado" name="monto_demandado" aria-describedby="monto-label">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-primary"><strong>ASIGNAR HONORARIOS</strong></button>
                </div>
                </form>
              </div>
        </div>
    </div>
@endsection
