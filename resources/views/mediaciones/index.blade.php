@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2 class="float-left">MEDIACIONES</h2>
        </div>
    </div>
   <div class="row">
       <div class="col-8 offset-2">
        <a href="{{ route('mediaciones.create') }}" class="btn btn-success float-right">Nuevo <span class="fa fa-plus-square"></span></a>
        <br>
    </div>
</div>
<div class="row">
   <div class="col-8 offset-2">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Número</td>
                        <td>Observaciones</td>
                        <td> - - - </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mediaciones as $mediacion)
                        <tr>
                            <td>{{ $mediacion->numero }}</td>
                            <td>{{ $mediacion->observaciones }}</td>
                            <td>

                                <span>
                                    <form action="{{ route('mediaciones.destroy',$mediacion->id) }}" method="POST">
                                        <a href="{{ route('mediaciones.edit',$mediacion->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro desea eliminar la mediación')"><span class="fa fa-trash"></span></button>
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
