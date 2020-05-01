@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2 class="float-left">JUZGADOS</h2>
        </div>
    </div>

   <div class="row">
       <div class="col-8 offset-2">
            <a href="{{ route('juzgados.create') }}" class="btn btn-success float-right">Nuevo <span class="fa fa-plus-square"></span></a>
            <br>
        </div>
    </div>
    <div class="row">
    <div class="col-8 offset-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Teléfono</td>
                        <td> - - - </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($juzgados as $juzgado)
                        <tr>
                            <td>{{ $juzgado->nombre }}</td>
                            <td>{{ $juzgado->telefono }}</td>
                            <td>

                                <span>
                                    <form action="{{ route('juzgados.destroy',$juzgado->id) }}" method="POST">
                                        <a href="{{ route('juzgados.edit',$juzgado->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro desea eliminar el juzgado')"><span class="fa fa-trash"></span></button>
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
