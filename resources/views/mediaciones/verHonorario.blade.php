@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <h5 class="card-header text-center"><strong>{{ $mediacion->expediente->actor->apellido." vs ".$mediacion->expediente->demandado->apellido }}</strong></h5>
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">VER HONORARIO DE MEDIACIÓN NÚMERO: <strong>{{ $mediacion->numero }}</strong></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>ACTOR:</h4>
                            <h5>Nombre: <strong>{{ $mediacion->expediente->actor->getApyNom() }}</strong></h5>
                            <h5>DNI: <strong>{{ $mediacion->expediente->actor->dni }}</strong></h5>
                            <h5>Teléfono: <strong>{{ $mediacion->expediente->actor->telefono }}</strong></h5>
                            <h5>Domicilio: <strong>{{ $mediacion->expediente->actor->domicilio }}</strong></h5>
                            <h5>Abogado: <strong>{{ $mediacion->expediente->abogado_actor->getApyNom() }}</strong></h5>
                            <h5>Fecha de Pago: <strong> {{ Carbon\Carbon::parse($mediacion->honorario->fecha_pago_actor)->format('d/m/Y') }}</strong></h5>
                            <h5>Con Beneficio: <strong> {{ $mediacion->honorario->beneficio_actor ? "SI":"NO" }}</strong></h5>
                            <h5>MONTO: <strong>$ {{ $mediacion->honorario->monto_actor }}</strong></h5>
                        </div>

                        <div class="col-md-6">
                            <h4>DEMANDADO:</h4>
                            <h5>Nombre: <strong>{{ $mediacion->expediente->demandado->getApyNom() }}</strong></h5>
                            <h5>DNI: <strong>{{ $mediacion->expediente->demandado->dni }}</strong></h5>
                            <h5>Teléfono: <strong>{{ $mediacion->expediente->demandado->telefono }}</strong></h5>
                            <h5>Domicilio: <strong>{{ $mediacion->expediente->demandado->domicilio }}</strong></h5>
                            <h5>Abogado: <strong>{{ $mediacion->expediente->abogado_demandado->getApyNom() }}</strong></h5>
                            <h5>Fecha de Pago: <strong> {{ Carbon\Carbon::parse($mediacion->honorario->fecha_pago_demandado)->format('d/m/Y') }}</strong></h5>
                            <h5>Con Beneficio: <strong> {{ $mediacion->honorario->beneficio_demandado ? "SI":"NO" }}</strong></h5>
                            <h5>MONTO: <strong>$ {{ $mediacion->honorario->monto_demandado }}</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h4> MONTO TOTAL: <strong>$ {{ $mediacion->honorario->monto_demandado + $mediacion->honorario->monto_demandado }}</strong></h4>
                </div>
            </div>
        </div>
    </div>
@endsection
