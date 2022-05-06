@extends('layouts.admin')
@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.css"
integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
crossorigin="anonymous" />
@endsection
@section('content')
    <h1 class="text-center">Agregar un nuevo servicio</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Crear nuevo Servicio') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('servicio.store')}}" enctype="multipart/form-data" novalidate>
                            @csrf
    
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right ">{{ __('nombre') }}</label>
    
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
    
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="imagen_principal" class="col-md-4 col-form-label text-md-right">Imagen</label>
                                <input 
                                type="file" 
                                id="imagen_principal" 
                                class="form-contol @error('imagen_principal') is-invalid @enderror"
                                name="imagen_principal">
                                @error('imagen_principal')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>
                                <div class="col-md-6">
                                <textarea class="form-control @error('descripcion') is-invalid @enderror"  name="descripcion">{{ old('descripcion') }}</textarea>
                                     @error('descripcion')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="uuid" id="uuid"
                                    value="{{ Str::uuid()->toString() }}">
                                <fieldset class="border mt-5">
                                    <legend class="text-primary">Imagénes del servicio</legend>
                                    <div class="container">
                                        <label for="imagenes" class="text-secondary">Imagénes</label>
                                        <div id="dropzone" class="dropzone">

                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="form-group row mb-0 justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Crear ') }} <i class="fas fa-concierge-bell"></i>
                                    </button>
                                    <a href="{{route('servicio.index')}}" class="btn btn-dark offset-md-4">Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts2')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.js"
integrity="sha512-QpZR7HNNxb5QQ5+qVXikXT0nDHUEwr0sNLG2pLaFCzpJ7ZqSsNEU8YfzWr9VzX29r7XPTPgASyfTFZeoSJe3sA=="
crossorigin="anonymous" defer></script>
@endsection