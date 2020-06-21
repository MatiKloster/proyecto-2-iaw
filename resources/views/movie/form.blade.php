<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="name" class="form-control" placeholder="e.g Load" value="@if (isset($movie->name)){{old('name','asdasd')}}@else {{old('name',NULL)}}@endif">
</div>
<div class="form-group">
    <label>Director </label>
    <input type="text" name="director" class="form-control" placeholder="e.g Metallica" value="@if (isset($movie->director)){{old('director',$movie->director)}}@else {{old('director')}}@endif">
</div>
<div class="form-group">
    <label >Año</label>
    <input type="number" min=0 name="year" class="form-control"placeholder="e.g 1995" value="@if (isset($movie->year)){{$movie->year}}@endif">
</div>
<div class="form-group">
    <label>Genero</label>
    <input type="text" name="genre" class="form-control" placeholder="e.g Thrash Metal"value="@if (isset($movie->genre)){{old('genre',$movie->genre)}}@else {{old('genre')}}@endif">
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