@extends('layouts.app')
@section('content')
@if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
<div class="jumbotron">
    <div class="row justify-content-center">
        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <button class="btn btn-lg textButton" onclick="toClipboard()" >Copiar al Portapapeles</button>
            </div>
            <div class="form-group">
              </div>
              <input class="form-control" disabled="true" aria-label="Large" aria-describedby="inputGroup-sizing-sm" id="tokenId" value={{$token}}>
          </div>
    </div>
    
</div>
    
@endsection
@section('scripts')
 <script src="js/copy.js"></script>
@endsection