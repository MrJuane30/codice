@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Editar descripción</h1>
    <div class="container">
        <div class="mt-5 row justify-content-center">
            <form  id="registroColectivo" class="col-md-12 col-xs-12" action="{{route('colectivo.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="border p-4">
                    <legend class="text-primary">Descripcion de CoDiCE</legend>
                <div class="form-group">
                    <label for="descripcion" class="text-secondary">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror"  name="descripcion">{{ old('descripcion') }}</textarea>
                         @error('descripcion')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                 </fieldset>
                 <fieldset class="border p-4">
                    <legend class="text-primary">Misión de CoDiCE</legend>
                <div class="form-group">
                    <label for="mision" class="text-secondary">Misión</label>
                    <textarea class="form-control @error('mision') is-invalid @enderror"  name="mision">{{ old('mision') }}</textarea>
                         @error('mision')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                 </fieldset>
                 <fieldset class="border p-4">
                    <legend class="text-primary">Visión de CoDiCE</legend>
                <div class="form-group">
                    <label for="vision" class="text-secondary">Descripción</label>
                    <textarea class="form-control @error('vision') is-invalid @enderror"  name="vision">{{ old('vision') }}</textarea>
                         @error('vision')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                 </fieldset>
                 <fieldset class="border p-4">
                    <legend class="text-primary">Objetivos de CoDiCE</legend>
                <div class="form-group">
                    <label for="objetivos" class="text-secondary">Descripción</label>
                    <textarea class="form-control @error('objetivos') is-invalid @enderror"  name="objetivos">{{ old('objetivos') }}</textarea>
                         @error('objetivos')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                 </fieldset>
                 <div class="form-group row mb-0 justify-content-center">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-dark">
                            {{ __('Editar descripción') }} <i class="fas fa-user-plus"></i>
                        </button>
                        <a href="{{route('home')}}" class="btn btn-dark offset-md-4">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection