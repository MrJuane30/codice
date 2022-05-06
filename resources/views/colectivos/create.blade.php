@extends('layouts.admin')

@section('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <!-- Esri Leaflet Geocoder -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
        integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
        crossorigin="">
@endsection

@section('content')
    <h1 class="text-center">Agregar un nuevo colectivo</h1>
    <div class="container">
        <div class="mt-5 row justify-content-center">
            <form  id="registroColectivo" class="col-md-12 col-xs-12" action="{{route('colectivo.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="border p-4">
                    <legend class="text-primary">Nombre e imagen principal</legend>
                    <div class="form-group">
                        <label for="nombre" class="text-secondary">Título del Servicio</label>
                        <input id="nombre" type="text"
                            class="form-control @error('nombre') is-invalid @enderror "
                            placeholder="Nombre del colectivo" value="{{ old('nombre') }}"
                            name="nombre">
                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="imagen_principal" class="text-secondary">Imagen principal</label>
                        <input name="imagen_principal" id="imagen_principal" type="file"
                            class="form-control @error('imagen_principal') is-invalid @enderror "
                            value="{{ old('imagen_principal') }}">
                        @error('imagen_principal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </fieldset>
                <fieldset class="border p-4">
                    <legend class="text-primary">Página y hashtag</legend>
                    <div class="form-group">
                        <label for="pagina_web" class="text-secondary">Pagina del colectivo</label>
                        <input id="pagina_web" type="text"
                            class="form-control @error('pagina_web') is-invalid @enderror "
                            placeholder="Página del colectivo" value="{{ old('pagina_web') }}"
                            name="pagina_web">
                        @error('pagina_web')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hashtag" class="text-secondary">Hashtag del colectivo</label>
                        <input id="hashtag" type="text"
                            class="form-control @error('hashtag') is-invalid @enderror "
                            placeholder="Hashtag o lema del colectivo" value="{{ old('hashtag') }}"
                            name="hashtag">
                        @error('hashtag')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </fieldset>
                <fieldset class="border p-4">
                    <legend class="text-primary">Ubicacion</legend>
                    <div class="form-group">
                        <label for="formbuscador" class="text-secondary">Coloca la dirección del colectivo</label>
                        <input id="formbuscador" type="text" class="form-control"
                            placeholder="Calle del lugar o establecimiento">
                        <p class="text-secondary mt-5 mb-3 text-center">El asistente colocará una
                            dirección
                            estimada o mueve
                            el Pin hacía el lugar correcto</p>
                    </div>
                    <div class="form-group">
                        <div id="mapa" style="height: 400px;"></div>
                    </div>

                    <p class="informacion">Confirma que los siguientes campos sean correctos: </p>
                    <div class="form-group">
                        <label for="direccion" class="text-secondary">Dirección: </label>
                        <input id="direccion" name="direccion" type="text"
                            class="form-control @error('direccion') is-invalid @enderror"
                            placeholder="Dirección" value="{{ old('direccion') }}">
                        @error('direccion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="colonia" class="text-secondary">Colonia: </label>
                        <input id="colonia" name="colonia" type="text"
                            class="form-control @error('colonia') is-invalid @enderror"
                            placeholder="Colonia" value="{{ old('colonia') }}">
                        @error('colonia')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" id="lat" name="lat" value="{{ old('lat') }}">
                    <input type="hidden" id="lng" name="lng" value="{{ old('lng') }}">
                </fieldset>
                <fieldset class="border p-4">
                    <legend class="text-primary">Descripcion del colectivo</legend>
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
                 <div class="form-group row mb-0 justify-content-center">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-dark">
                            {{ __('Crear colectivo') }} <i class="fas fa-user-plus"></i>
                        </button>
                        <a href="{{route('colectivo.index')}}" class="btn btn-dark offset-md-4">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts2')
<script  src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="" defer></script>
    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.5.3/dist/esri-leaflet.js"
        integrity="sha512-K0Vddb4QdnVOAuPJBHkgrua+/A9Moyv8AQEWi0xndQ+fqbRfAFd47z4A9u1AW/spLO0gEaiE1z98PK1gl5mC5Q=="
        crossorigin="" defer></script>
    <script  src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
        integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
        crossorigin="" defer></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.js"
        integrity="sha512-QpZR7HNNxb5QQ5+qVXikXT0nDHUEwr0sNLG2pLaFCzpJ7ZqSsNEU8YfzWr9VzX29r7XPTPgASyfTFZeoSJe3sA=="
        crossorigin="anonymous"  defer></script>
@endsection
