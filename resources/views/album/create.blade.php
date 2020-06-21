@extends('layouts.app')
@section('content')
<div class="jumbotron">
        <h5 class=" row justify-content-center"> CREAR ALBUM</h5>
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
        <form action="{{  route('albumStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('album.form')
            <button type="submit" name="submit" class="btn btn-dark">Crear</button>
        </form>
</div>
@endsection