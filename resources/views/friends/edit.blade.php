@extends('layouts.admin')
@section('content')
<h2 class="text-center col-md-12" >Editar amigo</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edición de amigo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('amigos.update', ['friend'=>$friend->id])}}"  enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('put')
                        <p class="text-center">Información básica</p>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{$friend->nombre}}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{$friend->apellidos}}" required autocomplete="apellido" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <p class="text-center">Datos de contacto</p>
                        <div class="form-group row">
                            <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo eléctronico') }}</label>

                            <div class="col-md-6">
                                <input id="correo" type="text" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{$friend->correo}}" required autocomplete="correo">

                                @error('correo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{$friend->telefono}}" required autocomplete="numero">

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>
                            <div class="col-md-6">
                            <select name="tipo"
                            class="form-control @error('tipo') is-invalid @enderror"
                            id="tipo">
                                @php
                                if($friend->tipo==="plata"){
                                    $tipo="Plata";
                                } else if($friend->tipo==="diamante"){
                                    $tipo="Diamante";
                                } else {
                                    $tipo="Seleccione un sexo";
                                }
                                @endphp
                            <option value="{{$friend->tipo}}">{{$tipo}}</option>
                            <option value="plata">Plata</option>
                            <option value="diamante">Diamante</option>                
                            </select>
                            @error('tipo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <p class="text-center">Información pública</p>
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
                                <div class="col-md-6">
                                    <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" required autocomplete="foto" autofocus>
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            <div class="col-md-6">
                                <p>Imagen actual</p>
                                <img src="/storage/{{$friend->foto}}" style="width: 30%">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="comentario" class="col-md-4 col-form-label text-md-right">{{ __('Comentario') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control form-control @error('comentario') is-invalid @enderror" rows="3" name="comentario">{{$friend->comentario}}</textarea>
    
                                @error('comentario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                                <a href="{{route('amigos.index')}}" class="btn btn-dark offset-md-4">Regresar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('name'))
    <script type="application/javascript">
         swal({
            title: '{{session('name')}}',
            text: '¡El correo ingresado ya existe!',
            icon: 'error'
            });
    </script>
 @endif


@endsection