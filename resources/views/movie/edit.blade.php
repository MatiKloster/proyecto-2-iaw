@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <h5 class=" row justify-content-center"> EDIT PELICULA</h5>
    @if(session('message'))
            <div class="alert alert-success">
                <strong>Yey!</strong>{{session('message')}}<br><br>
            </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hay un par de problemas con las inputs.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <form action="{{  route('movieUpdate',$movie->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('movie.form')
        <button type="submit" name="submit" class="btn btn-dark textButton">Guardar</button>
    </form>
</div>
@endsection