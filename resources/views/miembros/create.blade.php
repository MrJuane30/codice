@extends('layouts.admin')
@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection
@section('scripts3')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix-core.js" integrity="sha512-CbStBpljvPgo8jIJkWQeuvKa5O9BeXIg8LBwE30WqZCslH21AQk7SnL8alDwx9ecKJ8uukzLvR5TJoQESJkBCw==" crossorigin="anonymous" defer></script>
@endsection

@section('content')
    <h1 class="text-center">Agregar a un nuevo miembro</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Crear nuevo miembro') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('miembro.store')}}"  enctype="multipart/form-data" novalidate>
                            @csrf
    
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right ">{{ __('Nombre') }}</label>
    
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
    
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="apellidos" class="col-md-4 col-form-label text-md-right ">{{ __('Apellidos') }}</label>
    
                                <div class="col-md-6">
                                    <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>
    
                                    @error('apellidos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            
    
                            <div class="form-group row">
                                <label for="intereses" class="col-md-4 col-form-label text-md-right ">{{ __('Áreas de interes') }}</label>
    
                                <div class="col-md-6">
                                    <input type="hidden" id="intereses" name="intereses" value="{{old('intereses')}}">
                                    <trix-editor input="intereses" class="col-md-12"
                                     class="form-control @error('intereses') is-invalid @enderror"
                                    input="intereses"></trix-editor>
                                    @error('intereses')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="curriculum" class="col-md-4 col-form-label text-md-right">Curriculum</label>
                                <div class="col-md-6">
                                    <input type="hidden" id="curriculum" name="curriculum" value="{{old('curriculum')}}">
                                    <trix-editor input="curriculum" class="col-md-12"
                                     class="form-control @error('curriculum') is-invalid @enderror"
                                    input="curriculum"></trix-editor>
                                </div>
                                @error('curriculum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group row">
                                <label for="gustos" class="col-md-4 col-form-label text-md-right">Gustos</label>
                                <div class="col-md-6">
                                    <input type="hidden" id="gustos" name="gustos" value="{{old('gustos')}}">
                                    <trix-editor input="gustos" class="col-md-12"
                                     class="form-control @error('gustos') is-invalid @enderror"
                                    input="gustos"></trix-editor>
                                    @error('gustos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>
                                    <div class="col-md-6">
                                        <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen') }}" required autocomplete="imagen" autofocus>
                                        @error('imagen')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="form-group row mb-0 justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Crear ') }} <i class="fas fa-user-plus"></i>
                                    </button>
                                    <a href="{{route('miembro.index')}}" class="btn btn-dark offset-md-4">Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection