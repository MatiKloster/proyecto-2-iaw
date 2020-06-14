@extends('index')
@section('content')
<div class="col-md-8 offset-md-2">
    <div class="jumbotron">
        <h5 class=" row justify-content-center"> CREAR PELICULA</h5>
        <form action="" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Nombre</label>
                <input type="text" class="form-control" id="formGro upExampleInput" placeholder="e.g Titanic">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Director</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g James Cameron">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Año</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g 1997">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Genero</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g Drama">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Cantidad reservable</label>
                <input type="number" class="form-control" min="0" id="formGroupExampleInput2" placeholder="e.g 5">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Precio</label>
                <input type="number" min="0.01" step="0.01" />
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Eliga una imagen para la tapa</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Crear</button>
        </form>
    </div>
</div>
@endsection