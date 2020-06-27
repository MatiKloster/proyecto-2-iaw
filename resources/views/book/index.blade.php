@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <h5 class=" row justify-content-center"> RESERVAS DE USUARIOS</h5>
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">Usuario</th>
        <th scope="col">Nombre</th>
        <th scope="col">Reservado</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($albums as $album)
    <tr>
        <td>{{$album->userName}}</td>
        <td>{{$album->albumName}}</td>
        <td>{{$album->createdAt}}</td>
        <td>
          <form action="{{route('albumBookedDeleteForUser',['id' => $album->id,'userId' => $album->userId])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-lg textButton"  onclick="return confirm('Estas por cancelar la reserva, estás seguro?')">Cancelar</button>
        </form>
        </td>
      </tr>
    @endforeach
    @foreach ($movies as $movie)
    <tr>
        <td>{{$movie->userName}}</td>
        <td>{{$movie->movieName}}</td>
        <td>{{$movie->createdAt}}</td>
        <td>
          <form action="{{route('albumBookedDeleteForUser',['id' => $movie->id,'userId' => $movie->userId])}}" method="POST">
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