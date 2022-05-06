@php
    $template = $usuario->tipo == 1 ? 'admin' : 'app';
@endphp
@extends('layouts.' . $template)

@section('content')
    <h1 class="text-center">Edición de perfil</h1>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($usuario->perfil->image==null)
                    <img class="w-25 p-3 mx-auto d-block rounded-circle" src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" width="50%" height="50%">
                    @else 
                    <img class="w-25 p-3 mx-auto d-block rounded-circle" src="/storage/{{$usuario->perfil->image}}">
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{route('profile.update', ['profile' => $usuario->id])}}" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('put')
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
    
                                <div class="col-md-6">
                                    <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ $usuario->apellidos }}" required autocomplete="apellidos" autofocus>
    
                                    @error('apellidos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Eléctronico') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email}}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
                                <div class="col-md-6">
                                <select name="sexo"
                                class="form-control @error('sexo') is-invalid @enderror"
                                id="sexo">
                                    @php
                                    if($usuario->perfil->sexo==1){
                                        $tipo="Masculino";
                                    } else if($usuario->perfil->sexo==2){
                                        $tipo="Femenino";
                                    } else {
                                        $tipo="Seleccione un sexo";
                                    }
                                    @endphp
                                <option value="{{$usuario->tipo}}">{{$tipo}}</option>
                                <option value="2">Femenino</option>
                                <option value="1">Masculino</option>                
                                </select>
                                @error('sexo')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Imagen</label>
                                <input 
                                type="file" 
                                id="image" 
                                class="form-contol @error('image') is-invalid @enderror"
                                name="image">
                                @error('image')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Editar usuario') }}
                                    </button>
                                    <a href="{{route('usuarios.index')}}" class="btn btn-dark offset-md-4">Regresar</a>
                                </div>
                        
                            </div>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('exito'))
    <script type="application/javascript">
         swal({
            title: '{{session('exito')}}',
            text: '¡Operación exitosa!',
            icon: 'success'
            });
    </script>
    @endif
@endsection