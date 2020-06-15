@extends('index')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="card-deck">
        @foreach ($movies ?? '' as $movie)
        <div class="card mb-4" style="min-width: 18rem; max-width: 18rem;">
            <img src="{{ URL::asset('uploads/movies/'.$movie->cover) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">{{$movie->name}}</h4>
                <p class="card-text">{{$movie->director}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{$movie->year}}</li>
                <li class="list-group-item">{{$movie->genre}}</li>
                <li class="list-group-item">Disponibles: {{$movie->quantity}}</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Reservar</a>
                <a href="#" class="card-link">Editar</a>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    @endsection