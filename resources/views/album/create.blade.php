@extends('index')
@section('content')
<div class="col-md-8 offset-md-2">
    <div class="jumbotron">
        <h5 class=" row justify-content-center"> CREAR ALBUM</h5>
        <form action="" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Nombre</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g Master of Puppets">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Banda</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g Metallica">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Año</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g 1986">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Genero</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g Thrash Metal">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Cantidad reservable</label>
                <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="e.g 5">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Cantidad reservable</label>
                <input type="number" min ="0" class="form-control" id="formGroupExampleInput2" placeholder="e.g 5">
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