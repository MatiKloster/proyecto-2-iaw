@extends('layouts.app')

@section('content')
@if(session('success'))
            <div class="alert alert-success">
                <strong>Yey!</strong>{{session('success')}}<br><br>
            </div>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('adminStore') }}">
                        @csrf
                        @include('shared.form')
                        <div class="form-group row">
                            <label for="isAdmin" class="col-md-4 col-form-label text-md-right">{{ __('Es admin?') }}</label>
                            {{Form::hidden('isAdmin',0)}}
                            <div class="col-md-6">
                                <input type="checkbox" name="isAdmin" value="false" aria-label="Checkbox for following text input">
                        
                                @error('isAdmin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
