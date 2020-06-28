@extends('layouts.app')
@section('content')
<div class="col ml-auto">
  <form action="{{route('bookSearchUser')}}" method="get" onsubmit="checkInput()">
      <div class="input-group">
          <input type="search" name="searchUser" class="form-control" placeholder="Búsqueda por Nombre de Usuario"id="inputSearch">
          <span class="input-group-prepend">
              <button type="submit"><svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg></button>
          </span>
      </div>
  </form>
</div>
<div class="col ml-auto">
  <form action="{{route('bookSearchProduct')}}" method="get" onsubmit="checkInput()">
      <div class="input-group">
          <input type="search" name="searchProduct" class="form-control" placeholder="Búsqueda por Nombre de producto"id="inputSearch">
          <span class="input-group-prepend">
              <button type="submit"><svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg></button>
          </span>
      </div>
  </form>
</div>
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
          <form action="{{route('adminBookedAlbumDelete',['id' => $album->id,'userId' => $album->userId])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-lg textButton"  onclick="return confirm('Estas por eliminar la reserva, estás seguro?')">Eliminar</button>
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
          <form action="{{route('adminBookedMovieDelete',['id' => $movie->id,'userId' => $movie->userId])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-lg textButton"  onclick="return confirm('Estas por eliminar la reserva, estás seguro?')">Eliminar</button>
        </form>
      </td>
      </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
@section('scripts')
<script src="js/app.js"></script>
@endsection