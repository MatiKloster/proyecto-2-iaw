@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Reservado</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($albums as $album)
        <tr>
            <td>{{$album->userName}}</td>
            <td>{{$album->albumName}}</td>
            <td>{{$album->createdAt}}</td>
          </tr>
        @endforeach
        @foreach ($movies as $movie)
        <tr>
            <td>{{$movie->userName}}</td>
            <td>{{$movie->movieName}}</td>
            <td>{{$movie->createdAt}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection