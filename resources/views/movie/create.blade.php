@extends('index')
@section('content')
<div class="jumbotron">
    <h5 class=" row justify-content-center"> CREAR PELICULA</h5>
    <form action="{{   route('movieStore')  }}" method="POST">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="e.g Titanic">
        </div>
        <div class="form-group">
            <label>Director</label>
            <input type="text" name="director" class="form-control" placeholder="e.g James Cameron">
        </div>
        <div class="form-group">
            <label>Año</label>
            <input type="number" min=0 name="year" class="form-control" placeholder="e.g 1997">
        </div>
        <div class="form-group">
            <label>Genero</label>
            <input type="text" name="genre" class="form-control" placeholder="e.g Drama">
        </div>
        <div class="form-group">
            <label>Cantidad reservable</label>
            <input type="number" name="quantity" class="form-control" min="0" placeholder="e.g 5">
        </div>
        <div class="form-group">
            <label>Precio</label>
            <input type="number" name="price" min="0.01" step="0.01" />
        </div>
        <div class="form-group">
            <label>Eliga una imagen para la tapa</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" name="submit" class="btn btn-dark">Crear</button>
    </form>
</div>

@endsection