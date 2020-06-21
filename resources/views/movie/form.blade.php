<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="name" class="form-control" placeholder="e.g Titanic" value="@if (isset($movie->name)){{$movie->name}}@endif">
</div>
<div class="form-group">
    <label>Artista </label>
    <input type="text" name="director" class="form-control" placeholder="e.g James Cameron" value="@if (isset($movie->director)){{$movie->director}}@endif">
</div>
<div class="form-group">
    <label >Año</label>
    <input type="number" min=0 name="year" class="form-control"placeholder="e.g 1998" value="@if (isset($movie->year)){{$movie->year}}@endif">
</div>
<div class="form-group">
    <label>Genero</label>
    <input type="text" name="genre" class="form-control" placeholder="e.g Clásico"value="@if (isset($movie->genre)){{$movie->genre}}@endif">
</div>
<div class="form-group">
    <label>Cantidad reservable</label>
    <input type="number" min=0 name="quantity" class="form-control" value="@if (isset($movie->quantity)){{$movie->quantity}}@endif">
</div>
<div class="form-group">
    <label>Precio</label>
    <input type="number" name="price" min="0.01" step="0.01" value="@if (isset($movie->price)){{$movie->price}}@endif" />
</div>
<div class="form-group">
    <div class="custom-file">
        <label>Eliga una imagen para la tapa</label>
        <input type="file" name="image" class="form-control-file">
    </div>
</div>