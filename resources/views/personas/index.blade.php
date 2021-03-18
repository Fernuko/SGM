@extends('layouts.app')

@section('content')
   <div class="row">
       <div class="col-8">
           <h2 class="float-left">PERSONAS</h2>
       </div>
   </div>
   <div class="row">
        <div class="col-8">
            <a href="{{ route('personas.create') }}" class="btn btn-success float-right">Nuevo <span class="fa fa-plus-square"></span></a>
            <br>
        </div>
    </div>
    <div class="row">
       <div class="col-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Apellido</td>
                        <td>Nombre</td>
                        <td>DNI</td>
                        <td>Domicilio</td>
                        <td>Teléfono</td>
                        <td> - - - </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personas as $persona)
                        <tr>
                            <td>{{ $persona->apellido }}</td>
                            <td>{{ $persona->nombre }}</td>
                            <td>{{ $persona->dni }}</td>
                            <td>{{ $persona->domicilio }}</td>
                            <td>{{ $persona->telefono }}</td>
                            <td>

                                <form action="{{ route('personas.destroy',$persona->id) }}" method="POST">
                                    <a href="{{ route('personas.edit',$persona->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>

                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro desea eliminar el persona')"> <span class="fa fa-trash"></span></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
       </div>
   </div>

@endsection
