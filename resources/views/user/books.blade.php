@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <h5 class=" row justify-content-center"> {{ Auth::user()->name }}, estas son tus reservas.</h5>
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Accion</th>  
        </tr>
        </thead>
        <tbody>
        @foreach ($albums as $album)
        <tr>
            <td>{{$album->name}}</td>
            <td>Disco</td>
            <td>
                <form action="{{route('albumBookedDeleteForUser',$album)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-lg textButton"  onclick="return confirm('Estas por cancelar la reserva, estás seguro?')">Cancelar</button>
                </form>
            </td>
          </tr>
        @endforeach
        @foreach ($movies as $movie)
        <tr>
            <td>{{$movie->name}}</td>
            <td>Pelicula</td>
            <td>
                <form action="{{route('movieBookedDeleteForUser',$movie)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-lg textButton"  onclick="return confirm('Estas por cancelar la reserva, estás seguro?')">Cancelar</button>
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
</div>  
@endsection
