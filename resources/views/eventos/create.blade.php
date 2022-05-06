@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Agregar un nuevo evento</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Crear nuevo evento') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('acontecimientos.store')}}" enctype="multipart/form-data" novalidate>
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
                                <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>
                                    <div class="col-md-6">
                                        <input id="foto" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen') }}" required autocomplete="imagen" autofocus>
                                        @error('imagen')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Fecha</label>
                                <div class="col-md-6">
                                <input type="date" class="form-control" name="fecha" id="fecha">
                            </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Hora:</label>
                                <div class="col-md-6">
                                <input type="time" min="07:00" max="23:00" step="600" class="form-control" name="txtHora" id="txtHora">
                            </div>
                            
                            </div>
                            <div class="form-group row">
                                <label for="direccion" class="col-md-4 col-form-label text-md-right ">{{ __('Direccion') }}</label>
    
                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
    
                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            
    
                            <div class="form-group row">
                                <label for="link" class="col-md-4 col-form-label text-md-right ">{{ __('Link') }}</label>
    
                                <div class="col-md-6">
                                    <input id="link" type="link" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" required autocomplete="link">
    
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control form-control @error('descripcion') is-invalid @enderror" rows="3" name="descripcion"></textarea>
        
                                    @error('descripcion')
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
                                    <a href="{{route('acontecimientos.index')}}" class="btn btn-dark offset-md-4">Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection