@extends('layouts.app')
@section('loginStyle')
<link href="{{ asset('css/access.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card formulario">
                <div class="card-header text-center titulo">{{ __('Verifica tu dirección de correo eléctronico') }}</div>

                <div class="card-body text-light">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('¡Te hemos envíado un link de verificación a tu correo eléctronico!') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, verifique su correo electrónico para ver si hay un enlace de verificación.') }}
                    {{ __('Si no has recibido el email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link btn-light p-0 m-0 align-baseline">{{ __('haga clic aquí para solicitar otro') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
