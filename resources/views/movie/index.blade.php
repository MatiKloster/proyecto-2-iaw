@extends('layouts.app')
@section('content')
@if(session('message'))
            <div class="alert alert-success">
                <strong>Yey!</strong>{{session('message')}}<br><br>
            </div>
        @endif
<div class="container mt-5">
    <div class="row">
        <div class="card-wrapper">
            <div class="card-deck">
                @foreach ($movies as $movie)
                <div class="col-4-lg">
                    <div class="card mb-4" style="min-width: 18rem; max-width: 18rem;">
                        <img src="{{ URL::asset('uploads/productos/'.$movie->cover) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{$movie->name}}</h4>
                            <p class="font-weight-bold blue-text">{{$movie->director}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$movie->year}}</li>
                            <li class="list-group-item">{{$movie->genre}}</li>
                            <li class="list-group-item">Disponibles: {{$movie->quantity}}</li>
                        </ul>
                        <div class="card-body">
                            <div class="row">
                                <button type="button" class="btn btn-success" style="background-color: #ff5100; border-color:#ff5100;"> $ {{$movie->price}} </button>
                                <a href="#" class="card-link col-mb-4 offset-2">Reservar</a>
                            </div>

                        </div>
                        <a href="{{route('movieShow',$movie)}}" class="stretched-link"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endsection
        @section('scripts')
        <script src="js/app.js"></script>

        @endsection