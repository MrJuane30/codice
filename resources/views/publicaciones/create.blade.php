@extends('layouts.admin')

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection
@section('scripts3')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix-core.js" integrity="sha512-CbStBpljvPgo8jIJkWQeuvKa5O9BeXIg8LBwE30WqZCslH21AQk7SnL8alDwx9ecKJ8uukzLvR5TJoQESJkBCw==" crossorigin="anonymous" defer></script>
@endsection

@section('content')
<h2 class="text-center mb-5" >Crear nueva Publicación</h2>
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
    <form method="post" action="{{route('publicacion.store')}}" enctype="multipart/form-data" novalidate>
        @csrf
            <div class="form-group">
                <label for="Titulo">Título de la publicación</label>

                <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror" 
                 placeholder="Título de la publicación"
                 value="{{old('titulo')}}">
            </div>
            @error('titulo')
            <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
            </span>
            @enderror

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria"
                class="form-control @error('categoria') is-invalid @enderror"
                id="categoria">
                <option value="">Seleccione</option>
                <!--Comienzo for each -->
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}" {{old('categoria')== $categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
                @endforeach
                <!--termino for each -->
                </select>
                @error('categoria')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="descripcion">Descripción</label>
                <input type="hidden" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
                <trix-editor input="descripcion" class="col-md-12"
                class="form-control @error('descripcion') is-invalid @enderror"
                input="descripcion"></trix-editor>
                @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="contenido">Contenido</label>
                <input type="hidden" id="contenido" name="contenido" value="{{old('contenido')}}">
                <trix-editor input="contenido" class="col-md-12"
                class="form-control @error('contenido') is-invalid @enderror"
                input="contenido"></trix-editor>
                @error('contenido')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="fuentes">Fuentes</label>
                <input type="hidden" id="fuentes" name="fuentes" value="{{old('fuentes')}}">
                <trix-editor input="fuentes" class="col-md-12"
                class="form-control @error('fuentes') is-invalid @enderror"
                input="fuentes"></trix-editor>
                @error('fuentes')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="imagen">Imagen</label>
                <input 
                type="file" 
                id="imagen" 
                class="form-contol @error('imagen') is-invalid @enderror"
                name="imagen">
                @error('imagen')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">
                    {{ __('Crear publicación ') }} <i class="fas fa-plus"></i>
                </button>           
                <a href="{{route('publicacion.index')}}" class="btn btn-dark offset-md-4">Regresar</a>
             </div>
        </form>
    </div>
</div>


@endsection

