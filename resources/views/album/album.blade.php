@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="row">
            <div class="col-3">
              One of three columns
            </div>
            <div class="col-6">
                <div class="card" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="card-body">
                          <h4 class="card-title">{{$album->name}}</h4>
                        <h5 class="font-weight-bold blue-text">{{$album->artist}}</h5>
                          <p class="card-text">Lanzado {{$album->year}}</p>
                          <p class="card-text">Género {{$album->genre}}</p>
                          <p class="card-text"><small class="text-muted">Reservables {{$album->quantity}}</small></p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-3">
                <div class="row justify-content-center mt-5">
                    <form action="{{route('albumDelete',$album)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn  btn-lg"  onclick="return confirm('Estas segura/o?')">Eliminar</button>
                    </form>
                </div>
                <div class="row justify-content-center mt-5">
                    <button type="button" class="btn btn-lg" {{route('albumEdit',$album)}}>Editar</button>
                </div>
            </div>  
        </div>
    </div>
@endsection
@section('scripts')
@endsection