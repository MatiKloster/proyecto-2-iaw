@extends('layouts.app')
@section('content')
<div class="jumbotron">
        <h5 class=" row justify-content-center"> CREAR PELICULA</h5>
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
            @if(session('message'))
            <div class="alert alert-success">
                <strong>Yey!</strong>{{session('message')}}<br><br>
            </div>
            @endif
        <form action="{{  route('movieStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('movie.form')
            <button type="submit" name="submit" class="btn btn-dark textButton">Crear</button>
        </form>
</div>
@endsection