@extends('layouts.admin')

@section('scripts')
<link href="{{ asset('css/comentarios.css') }}" rel="stylesheet">
@endsection
@section('content')
    <h1 class="text-center">Comentarios de publicación: {{$publicacion->titulo}}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 panel panel-default widget">
                <div class="panel-body">
                    @foreach ($comentarios as $comentario)
                    <ul class="list-group">
                        <li class="list-group-item bg-light">
                            <div class="row">
                                <div class="col-xs-2 col-md-1">
                                    <img src="/storage/{{$comentario->imagen}}" width="40" height="40" class="rounded-circle" alt="" /></div>
                                <div class="col-xs-10 col-md-11">
                                    <div>
                                        <div class="mic-info">
                                            Por: <a href="#">{{$comentario->autor}}</a> {{$comentario->created_at}}
                                        </div> 
                                    </div>
                                    <div class="comment-text">
                                      {{$comentario->contenido}}
                                      <eliminar-comentario
                                      comentario-id={{$comentario->id}}> 
                                      </eliminar-comentario>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                {{$comentarios->links('pagination::bootstrap-4')}}
            </div>
    </div>
    </div>
@endsection