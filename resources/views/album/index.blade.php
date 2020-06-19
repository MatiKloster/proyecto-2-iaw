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
                @foreach ($albums as $album)
                <div class="col-4-lg">
                    <div class="card mb-4" style="min-width: 18rem; max-width: 18rem;">
                        <img src="{{ URL::asset('uploads/productos/'.$album->cover) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{$album->name}}</h4>
                            <p class="font-weight-bold blue-text">{{$album->artist}}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$album->year}}</li>
                                <li class="list-group-item">{{$album->genre}}</li>
                                <li class="list-group-item">Disponibles: {{$album->quantity}}</li>
                            </ul>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <button type="button" class="btn btn-success" style="background-color: #ff5100; border-color:#ff5100;"> $ {{$album->price}} </button>
                                <a href="#" class="card-link col-mb-4 offset-2">Reservar</a>
                                <a href="" class="card-link col-mb-4 offset-2">Editar</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endsection
        @section('scripts')
        <script src="js/app.js"></script>

        @endsection