@extends('layouts.app')
@section('content')
@if(session('message'))
            <div class="alert alert-success">
                <strong>Yey! </strong>{{session('message')}}<br><br>
            </div>
        @endif
{{$albums->links()}}
<div class="col ml-auto">
    <form action="{{route('albumSearch')}}" method="get" onsubmit="checkInput()">
        <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Busqueda por nombre" id="inputSearch">
            <span class="input-group-prepend">
                <button type="submit"><svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                  </svg></button>
            </span>
        </div>
    </form>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card-wrapper ml-4 pl-4">
            <div class="card-deck">
                @foreach ($albums as $album)
                <div class="col-4-lg pl-4">
                    <div class="card mb-4" style="min-width: 18rem; max-width: 18rem;" >
                        <img src="data:image/jpg;base64, {{$album->cover}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$album->name}}</h5>
                            <p class="font-weight-bold blue-text">{{$album->artist}}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$album->year}}</li>
                                <li class="list-group-item">{{$album->genre}}</li>
                                <li class="list-group-item">Disponibles: {{$album->quantity}}</li>
                            </ul>
                        </div>
                        
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <button type="button" class="btn btn-success" style="background-color: #ff5100; border-color:#ff5100; disabled:true;"> $ {{$album->price}} </button>
                            </div>
                            <div class="row justify-content-center">
                                <p class="card-text"><small class="text-muted">Clickeá en donde se te ocurra para mas info.</small></p>
                            </div>
                        </div>
                        <a href="{{route('albumShow',$album)}}" class="stretched-link"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="js/app.js"></script>
@endsection