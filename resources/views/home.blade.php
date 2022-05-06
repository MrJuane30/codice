@extends('layouts.admin')
@section('scripts')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row ">
            <chart-month></chart-month>
            <div class="col-md-2"></div>
            <chart-gender></chart-gender>
        </div>
    </div>
    <hr>
    <div class="conatiner-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="col-xs-5">
                            <div class="text-center icon-big icon-warning">
                                <i class="fas fa-user-friends"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers text-center">
                                <p>
                                    Gestionar usuarios
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="stats">
                            <i class="fas fa-fighter-jet"></i>
                            <a href="{{route('usuarios.index')}}">Ir ahora</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="col-xs-5">
                            <div class="text-center icon-big icon-success">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers text-center">
                                <p>Información inicial
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="stats">
                            <i class="fas fa-fighter-jet"></i>
                            <a href="{{route('descripcion')}}">Ir ahora</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="col-xs-5">
                            <div class="text-center icon-big icon-danger">
                                <i class="fas fa-book-reader"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers text-center">
                                <p>
                                    Nosotros
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="stats">
                            <i class="fas fa-fighter-jet"></i>
                            <a href="{{route('miembro.index')}}">Ir ahora</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="col-xs-5">
                            <div class="text-center icon-big icon-info">
                                <i class="fas fa-concierge-bell"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers text-center">
                                <p>
                                    Servicios
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="stats">
                            <i class="fas fa-fighter-jet"></i>
                            <a href="{{route('servicio.index')}}">Ir ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="cardB">
                    <div class="card-header bg-dark text-light">Actividades colectivo</div>
                    <div class="card-body text-center">
                        @foreach($eventos as $evento)
                        <!-- Inicio del for each -->   
                        <li>{{$evento->title}}</li>
                        <!-- Fin del for each -->
                        @endforeach

                    </div>
                    <div class="footer">
                        <div class="stats">
                            <i class="fas fa-calendar-week"></i>
                            <a href="{{route('eventos')}}">Ir a calendario</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cardB">
                    <div class="card-header bg-dark text-light">Últimas publicaciones</div>
                    <div class="card-body text-center">
                        @foreach($publicaciones as $publicacion)
                        <!-- Inicio del for each -->   
                        <li>{{$publicacion->titulo}}</li>
                        <!-- Fin del for each -->
                        @endforeach


                    </div>
                    <div class="footer">
                        <div class="stats">
                            <i class="fas fa-pen"></i>
                            <a href="{{route('publicacion.index')}}">Ir a publicaciones</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cardB">
                    <div class="card-header bg-dark text-light">Últimos colectivos</div>
                    <div class="card-body text-center">
                        @foreach($colectivos as $colectivo)
                        <!-- Inicio del for each -->   
                        <li>{{$colectivo->nombre}}</li>
                        <!-- Fin del for each -->
                        @endforeach

                    </div>
                    <div class="footer">
                        <div class="stats">
                            <i class="fas fa-users"></i>
                            <a href="{{route('colectivo.index')}}">Ir a colectivos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
