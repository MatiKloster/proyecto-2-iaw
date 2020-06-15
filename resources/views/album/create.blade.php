@extends('index')
@section('content')
<div class="jumbotron">
    @if($movie ?? ''=='true')
    <h5 class=" row justify-content-center"> CREAR PELICULA</h5>
    <form action="{{  route('movieStore') }}" method="POST" enctype="multipart/form-data">
    @else
    <h5 class=" row justify-content-center"> CREAR ALBUM</h5>
    <form action="{{  route('albumStore') }}" method="POST" enctype="multipart/form-data">
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
    
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="e.g Viva la vida">
        </div>
        @if($movie ?? ''=='true')
        <div class="form-group">
            <label>Director</label>
            <input type="text" name="director" class="form-control" placeholder="e.g James Cameron">
        </div>
        @else
        <div class="form-group">
            <label>Banda</label>
            <input type="text" name="artist" class="form-control" placeholder="e.g Coldplay">
        </div>
        @endif
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