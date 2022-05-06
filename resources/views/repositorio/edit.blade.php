@extends('layouts.admin')
@section('scripts')
<script type="text/javascript">
    function update() {
        var select = document.getElementById('categoriaDocumento');
        var option = select.options[select.selectedIndex];

        if(option.value==1){
            document.getElementById('documentoImagen').style.display = 'none';
            document.getElementById('documentoDocumento').style.display = 'block';
            document.getElementById('documentoVideo').style.display = 'none';
        }
        else if(option.value==2){
            document.getElementById('documentoImagen').style.display = 'block';
            document.getElementById('documentoDocumento').style.display = 'none';
            document.getElementById('documentoVideo').style.display = 'none';


        } else if(option.value==3) {
            document.getElementById('documentoImagen').style.display = 'none';
            document.getElementById('documentoDocumento').style.display = 'none';
            document.getElementById('documentoVideo').style.display = 'block';
        } else {
            document.getElementById('documentoImagen').style.display = 'none';
            document.getElementById('documentoDocumento').style.display = 'none';
            document.getElementById('documentoVideo').style.display = 'none';
        }

    }

    update();
</script>
@endsection
@section('content')
    <h1 class="text-center">Editar documento: {{$documento->titulo}}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Editar un archivo') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('repositorio.update', ['documento'=>$documento->id])}}" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-group row" style="hidden">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right ">{{ __('Titulo') }}</label>
    
                                <div class="col-md-6">
                                    <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{$documento->titulo}}" required autocomplete="titulo" autofocus>
    
                                    @error('titulo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control form-control @error('descripcion') is-invalid @enderror" rows="3" name="descripcion">{{$documento->descripcion}}</textarea>
            
                                        @error('descripcion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoria</label>
                                    <div class="col-md-6">
                                    <select name="categoria"
                                    class="form-control @error('categoria') is-invalid @enderror"
                                    id="categoriaDocumento"
                                    onChange="update()">
                                    <option value="">Seleccione</option>
                                    <!--Comienzo for each -->
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}" {{$documento->categoria_id == $categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
                                    @endforeach
                                    <!--termino for each -->
                                    </select>
                                    @error('categoria')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                @if($documento->categoria_id==2)
                                <div id="documentoImagen" style="display: block">
                                    <div class="form-group row">
                                        <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>
                                            <div class="col-md-6">
                                                <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen') }}" required autocomplete="imagen" autofocus>
                                                @error('imagen')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="mt-4">
                                                    <p>Imagen actual</p>
                                
                                                    <img src="/storage/{{$documento->url}}" style="width: 30%">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                @endif
                                @if($documento->categoria_id==1)
                                <div id="documentoDocumento" style="display: block">
                                    <div class="form-group row">
                                        <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>
                                            <div class="col-md-6">
                                                <input id="documento" type="file" class="form-control @error('documento') is-invalid @enderror" name="documento" value="{{ old('documento') }}" required autocomplete="documento" autofocus>
                                                @error('documento')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <a href="/storage/{{$documento->url}}" target="_blank" rel="noopener noreferrer">Su archivo actual</a>
                                            </div>
                                        </div>
                                </div>
                                @endif
                            @if($documento->categoria_id==3)
                            <div id="documentoVideo" style="display: block">
                                <div class="form-group row">
                                    <label for="link" class="col-md-4 col-form-label text-md-right ">{{ __('Link') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="link" type="link" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $documento->url }}" required autocomplete="link">
        
                                        @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group row mb-0 justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Editar ') }} <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{route('repositorio.index')}}" class="btn btn-dark offset-md-4">Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection