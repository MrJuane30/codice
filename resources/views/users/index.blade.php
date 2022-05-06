@extends('layouts.app')

@section('content')
    <h1 class="text-center">Bienvenido: {{ Auth::user()->name }}</h1>
    <div class="container">
        <h2 class="text-center">Publicaciones que te gustaron: </h2>
        <div class="row">
            @if (count($megusta) > 0)
                @foreach ($megusta as $like)
                    <div class="col-lg-4 col-md-3 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="storage/{{ $like->imagen }}" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $like->titulo }}</h5>
                                <p class="card-text">
                                    {{ strip_tags($like->descripcion) }}
                                </p>
                                <a class="btn btn-primary d-block" href="/#/publicaciones/{{$like->id}}">Ver Publicación</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $megusta->links('pagination::bootstrap-4') }}
            @else
                <p class="text-center">Aún no has dado ningún me gusta.
                    <small>Cuando des me gusta a alguna publicación aparecerá aquí.</small>
                </p>
            @endif
        </div>
    </div>
    <div class="container">
        <h2 class="text-center">Publicaciones que podrían gustarte: </h2>
        <div class="row">
            @foreach ($publicaciones as $publicacion)
                <div class="col-md-4">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="storage/{{ $publicacion->imagen }}" class="img-fluid" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                            <p class="card-text">
                                {{ strip_tags($publicacion->descripcion) }}
                            </p>
                            <a class="btn btn-primary d-block" href="/#/publicaciones/{{$publicacion->id}}">Ver Publicación</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <h2 class="text-center">Eventos que podrían interesarte: </h2>
        <div class="row">
            
        </div>
    </div>
@endsection
