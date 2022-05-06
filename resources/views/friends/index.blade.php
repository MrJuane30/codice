@extends('layouts.admin')

@section('content')
<h1 class="text-center">Administración de amigos</h1>
<div class="text-center table-responsive-md ">
    <table class="table">
        <thead class="bg-dark text-light" >
            <tr>
                <th scole="col">Nombre</th>
                <th scole="col">Apellido</th>
                <th scole="col">Tipo</th>
                <th scole="col">Correo</th>
                <th scole="col">Teléfono</th>
                <th></th>
            </tr>
            <tbody>   
                @foreach($amigos as $amigo)
                        
                <tr>
                 <td>{{$amigo->nombre}}</td>
                 <td>{{$amigo->apellidos}}</td>
                 <td>{{$amigo->tipo}}</td>
                 <td>{{$amigo->correo}}</td>
                 <td>{{$amigo->telefono}}</td>
                 <td> 
                 <a href="{{route('amigos.show', ['friend'=>$amigo->id])}}" class="btn btn-success  mb-2 d-block">Ver</a>
                 <a href="{{route('amigos.edit', ['friend'=>$amigo->id])}}" class="btn btn-dark  mb-2 d-block">Editar</a>
                 <eliminar-amigo 
                 amigo-id={{$amigo->id}}>
                 </eliminar-amigo>
                </td>
                 </tr>
                <!-- Fin del for each -->
                @endforeach                 
            </tbody>
        </thead>
    </table>
    {{$amigos->links('pagination::bootstrap-4')}}

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