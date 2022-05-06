@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Editar Usuario: {{$usuario->name}}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
              
                    <div class="card-header text-center">{{ __('Editar usuario') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('usuarios.update', ['user' => $usuario->id])}}" novalidate>
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
                                <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo de usuario</label>
                                <div class="col-md-6">
                                <select name="tipo"
                                class="form-control @error('tipo') is-invalid @enderror"
                                id="tipo">
                                    @php
                                    if($usuario->tipo==1){
                                        $tipo="Administrador";
                                    } else if($usuario->tipo==2){
                                        $tipo="Normal";
                                    }   
                                    @endphp
                                <option value="{{$usuario->tipo}}">{{$tipo}}</option>
                                @if($usuario->tipo == "1")
                                <option value="2">Normal</option>
 
    
                                @else
                                <option value="1">Administrador</option>

        
                                @endif                 
                                </select>
                                </div>
                                @error('tipo')
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

