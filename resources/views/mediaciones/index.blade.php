@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8">
            <h2 class="float-left">MEDIACIONES</h2>
        </div>
    </div>
   <div class="row mb-4">
       <div class="col-8">
            <div class="btn-toolbar float-right" role="toolbar">
                <div class="btn-group mr-2">
                    <a href="{{ route('mediaciones.excel') }}" target="_blank" class="btn btn-success"><span class="far fa-file-excel"></span><strong>Exportar</strong></a>
                </div>
                <div class="btn-group" role="group">
                    <a href="{{ route('mediaciones.create') }}" class="btn btn-primary float-right"><strong>Nuevo +</strong> </a>
                </div>
            </div>


    </div>
</div>
<div class="row">
   <div class="col-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Número</td>
                        <td>Observaciones</td>
                        <td>Estado</td>
                        <td>Actor</td>
                        <td>Demandado</td>
                        <td>Honorarios</td>
                        <td colspan="3">Monto total</td>
                        <td> - - - </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mediaciones as $mediacion)
                        <tr>
                            <td>{{ $mediacion->numero }}</td>
                            <td>{{ $mediacion->observaciones }}</td>
                            <td>{{ $mediacion->estado->estado }}</td>
                            <td>{{ $mediacion->expediente->actor->getApyNom() }}</td>
                            <td>{{ $mediacion->expediente->demandado->getApyNom() }}</td>
                            <td>{{ $mediacion->honorario()->exists() ? "ACORDADOS":"SIN ACORDAR" }}</td>
                            <td>{{ $mediacion->honorario()->exists() ? "$ ".strval($mediacion->honorario->monto_actor+$mediacion->honorario->monto_demandado):"- - -" }}</td>
                            <td></td>
                            <td></td>

                            <td>

                                <span>
                                    <form action="{{ route('mediaciones.destroy',$mediacion->id) }}" method="POST">
                                        <a href="{{ route('mediaciones.edit',$mediacion->id) }}" title="Editar" tooltip-dir="left" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Elimianr" tooltip-dir="left" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro desea eliminar la mediación')"><span class="fa fa-trash"></span></button>
                                        <a href="{{ route('asignarHonorario.view',$mediacion->id) }}" title="Honorarios" tooltip-dir="left" class="btn btn-sm btn-primary"><strong>$</strong></a>
                                    </form>
                                </span>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
       </div>
   </div>

@endsection
