@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Administrar comentarios</h1>

    <div class="row">
        @foreach ($publicaciones as $publicacion)
        <div class="col-lg-4 col-md-3 mb-4">
            <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="storage/{{$publicacion->imagen}}" class="img-fluid" />
                        <a href="#!">
                             <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                 <div class="card-body">
                 <h5 class="card-title">{{$publicacion->titulo}}</h5>
                    <p class="card-text">
                        {{ strip_tags($publicacion->descripcion) }} 
                    </p>
                     <a class="btn btn-primary d-block" href="{{route('comentarios.publicacion', ['publicacion' => $publicacion->id])}}">Ver Comentarios</a>
            </div>
        </div>
    </div>
        @endforeach
    </div>
    <div class="col-md-6">
        {{$publicaciones->links('pagination::bootstrap-4')}}
    </div>

   

@endsection