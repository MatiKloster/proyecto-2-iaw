<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="name" class="form-control" placeholder="e.g Load" value="@if (isset($album->name)){{old('name',$album->artist)}}@else {{old('name',NULL)}}@endif">
</div>
<div class="form-group">
    <label>Artista </label>
    <input type="text" name="artist" class="form-control" placeholder="e.g Metallica" value="@if (isset($album->artist)){{old('artist',$album->artist)}}@else {{old('artist')}}@endif">
</div>
<div class="form-group">
    <label >Año</label>
    <input type="number" min=0 name="year" class="form-control"placeholder="e.g 1995" value="@if (isset($album->year)){{$album->year}}@endif">
</div>
<div class="form-group">
    <label>Genero</label>
    <input type="text" name="genre" class="form-control" placeholder="e.g Thrash Metal"value="@if (isset($album->genre)){{old('genre',$album->genre)}}@else {{old('genre')}}@endif">
</div>
<div class="form-group">
    <label>Cantidad reservable</label>
    <input type="number" min=0 name="quantity" class="form-control" value="@if (isset($album->quantity)){{$album->quantity}}@endif">
</div>
<div class="form-group">
    <label>Precio</label>
    <input type="number" name="price" min="0.01" step="0.01" value="@if (isset($album->price)){{$album->price}}@endif" />
</div>
<div class="form-group">
    <div class="custom-file">
        <label>Eliga una imagen para la tapa</label>
        <input type="file" name="image" class="form-control-file">
    </div>
</div>