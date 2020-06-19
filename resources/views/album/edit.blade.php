@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <h5 class=" row justify-content-center"> EDIT ALBUM</h5>
    @if(session('message'))
            <div class="alert alert-success">
                <strong>Yey!</strong>{{session('message')}}<br><br>
            </div>
    @endif
    <form action="{{  route('albumUpdate',$album->id) }}" method="POST" enctype="multipart/form-data">
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
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{$album->name}}">
        </div>
        <div class="form-group">
            <label>Artista </label>
            <input type="text" name="artist" class="form-control" value="{{$album->artist}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Año</label>
            <input type="number" min=0 name="year" class="form-control" value="{{$album->year}}">
        </div>
        <div class="form-group">
            <label>Genero</label>
            <input type="text" name="genre" class="form-control" value="{{$album->genre}}">
        </div>
        <div class="form-group">
            <label>Cantidad reservable</label>
            <input type="number" min=0 name="quantity" class="form-control" value="{{$album->quantity}}">
        </div>
        <div class="form-group">
            <label>Precio</label>
            <input type="number" name="price" min="0.01" step="0.01" value="{{$album->price}}" />
        </div>
        <div class="form-group">
            <div class="custom-file">
                <label>Eliga una imagen para la tapa</label>
                <input type="file" name="image" class="form-control-file">
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-dark">Guardar</button>
    </form>
</div>
@endsection