@extends('layouts.app')
@section('content')
<div class="jumbotron">
        <h5 class=" row justify-content-center"> CREAR ALBUM</h5>
        <form action="{{  route('albumStore') }}" method="POST" enctype="multipart/form-data">
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
            @csrf
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="e.g Viva la vida">
            </div>
            <div class="form-group">
                <label>Artista</label>
                <input type="text" name="artist" class="form-control" placeholder="e.g Coldplay">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Año</label>
                <input type="number" min=0 name="year" class="form-control" placeholder="e.g 1981">
            </div>
            <div class="form-group">
                <label>Genero</label>
                <input type="text" name="genre" class="form-control" placeholder="e.g Clasico">
            </div>
            <div class="form-group">
                <label>Cantidad reservable</label>
                <input type="number" min=0 name="quantity" class="form-control" placeholder="e.g 5">
            </div>
            <div class="form-group">
                <label>Precio</label>
                <input type="number" name="price" min="0.01" step="0.01" />
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <label>Eliga una imagen para la tapa</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Crear</button>
        </form>
</div>
@endsection