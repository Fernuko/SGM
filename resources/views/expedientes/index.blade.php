@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8">
            <h2 class="float-left">EXPEDIENTES</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <a href="{{ route('expedientes.create') }}" class="btn btn-success float-right">Nuevo <span class="fa fa-plus-square"></span></a>
            <br>
        </div>
    </div>
   <div class="row">
       <div class="col-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Caratula</td>
                        <td>Número de expediente</td>
                        <td>Actor</td>
                        <td>Demandado</td>
                        <td> - - - </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expedientes as $expediente)
                        <tr>
                            <td>{{ $expediente->caratula }}</td>
                            <td>{{ $expediente->numero }}</td>
                            <td>{{ $expediente->actor->apellido. "  ".$expediente->actor->nombre }}</td>
                            <td>{{ $expediente->demandado->apellido }}</td>
                            <td>

                                <span>
                                    <form action="{{ route('expedientes.destroy',$expediente->id) }}" method="POST">
                                        <a href="{{ route('expedientes.edit',$expediente->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro desea eliminar el expediente')"><span class="fa fa-trash"></span></button>
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
