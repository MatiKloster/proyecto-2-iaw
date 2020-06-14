@extends('index')
@section('content')
<div class="jumbotron">
    <h5 class=" row justify-content-center"> CREAR ALBUM</h5>
    <form action="{{  route('albumStore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="e.g Master of Puppets">
        </div>
        <div class="form-group">
            <label>Banda</label>
            <input type="text" name="artist" class="form-control" placeholder="e.g Metallica">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Año</label>
            <input type="number" min=0 name="year" class="form-control" placeholder="e.g 1986">
        </div>
        <div class="form-group">
            <label>Genero</label>
            <input type="text" name="genre" class="form-control" placeholder="e.g Thrash Metal">
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