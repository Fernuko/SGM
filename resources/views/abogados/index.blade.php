@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2 class="float-left">ABOGADOS</h2>
        </div>
    </div>
   <div class="row">
        <div class="col-8 offset-2">
            <a href="{{ route('abogados.create') }}" class="btn btn-success float-right">Nuevo <span class="fa fa-plus-square"></span></a>
            <br>
        </div>
   </div>
   <div class="row">
       <div class="col-8 offset-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Apellido</td>
                        <td>Nombre</td>
                        <td>Domicilio</td>
                        <td>Teléfono</td>
                        <td>E-mail</td>
                        <td>Matricula</td>
                        <td> - - - </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abogados as $abogado)
                        <tr>
                            <td>{{ $abogado->apellido }}</td>
                            <td>{{ $abogado->nombre }}</td>
                            <td>{{ $abogado->domicilio }}</td>
                            <td>{{ $abogado->telefono }}</td>
                            <td>{{ $abogado->email }}</td>
                            <td>{{ $abogado->matricula }}</td>
                            <td>

                                <span>
                                    <form action="{{ route('abogados.destroy',$abogado->id) }}" method="POST">
                                        <a href="{{ route('abogados.edit',$abogado->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm ('Esta seguro desea eliminar el Abogado')"><span class="fa fa-trash"></span></button>
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
