@extends('layouts.admin')

@section('content')
<h1 class="text-center">Administración de Servicios</h1>
<div class="text-center table-responsive-md ">
    <table class="table">
        <thead class="bg-dark text-light" >
            <tr>
                <th scole="col">Titulo</th>
                <th scole="col">Descripcion</th>
                <th></th>
            </tr>
            <tbody>@foreach($servicios as $servicio)
                        
                <tr>
                 <td>{{$servicio->nombre}}</td>
                 <td>{{$servicio->descripcion}}</td>
                 <td> 
                 <a href="/#/servicios/{{$servicio->id}}" class="btn btn-success  mb-2 d-block">Ver</a>
                 <a href="{{route('servicio.edit', ['servicio'=>$servicio->id])}}" class="btn btn-dark  mb-2 d-block">Editar</a>
                </td>
                 </tr>
                <!-- Fin del for each -->
                @endforeach          
                    <tr>
                     <a href="{{route('servicio.create')}}" class="btn btn-primary d-block">Agregar nuevo servicio</a>
                    </tr>
            </tbody>
        </thead>
    </table>
    {{$servicios->links('pagination::bootstrap-4')}}
    @if(session('exito'))
    <script type="application/javascript">
         swal({
            title: '{{session('exito')}}',
            text: '¡Operación exitosa!',
            icon: 'success'
            });
    </script>
 @endif

</div>
    
@endsection