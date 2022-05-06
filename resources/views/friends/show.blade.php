@extends('layouts.admin')

@section('content')

<div class="container">
    <a href="{{route('amigos.index')}}"class="btn btn-success mr-2  text-white"> Regresar</a>


<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Información de amigo</div>

            <div class="card-body">
                <h3 class="text-center">Información básica</h3>
            <p class="text-center"><b>Nombre: </b>{{$friend->nombre}}</p>
            <p class="text-center" ><b>Apellidos: </b>{{$friend->apellidos}}</p>
            <h3 class="text-center">Información de contacto</h3>
            <p class="text-center"><b>Correo eléctronico: </b>{{$friend->correo}}</p>
            <p class="text-center" ><b>Número de contacto: </b>{{$friend->telefono}}</p>
            <p class="text-center"><b>Tipo: </b>{{$friend->tipo}}</p>

            <h3 class="text-center">Info. publica</h3>
            <p class="text-center"><b>Imagen: </b><img src="/storage/{{$friend->foto}}" style="width: 30%">
            </p>
            <p class="text-center" ><b>Comentario: </b>{{$friend->comentario}}</p>
          
            </div>
        </div>
    </div>
</div>
  
    
</div>
@endsection