@extends('layouts.admin')

@section('content')
<h2 class="text-center mb-5">Administra tus publicaciones</h2>

<div class="text-center table-responsive-md ">
    <table class="table">
        <thead class="bg-primary text-light" >
            <tr>
                <th scole="col">Nombre</th>
                <th scole="col">Categoria</th>
                <th></th>
            </tr>
            <tbody>
              
                   
                   
                   <!-- Inicio del for each -->  
                    @foreach($publicaciones as $publicacion)
                        
                   <tr>
                    <td>{{$publicacion->titulo}}</td>
                    <td>{{$publicacion->categoriaPublicacion->nombre}}</td>
                    <td> 
                    <a href="/#/publicaciones/{{$publicacion->id}}" class="btn btn-success  mb-2 d-block"><i class="fas fa-eye"></i> Ver</a>
                    <a href="{{route('publicacion.edit', ['publicacion'=>$publicacion->id])}}" class="btn btn-dark  mb-2 d-block"><i class="fas fa-edit"></i> Editar</a>
                    <eliminar-publicacion
                    publicacion-id={{$publicacion->id}}> 
                    </eliminar-publicacion>
                    </td>
                    </tr>
                   <!-- Fin del for each -->
                   @endforeach
                       
              
                     
                    <tr>
                     <a href="{{route('publicacion.create')}}" class="btn btn-success d-block">Agregar nueva publicación</a>
                    </tr>

                    </td>
            </tbody>
        </thead>
    </table>
</div>
{{$publicaciones->links()}}

@if(session('exito'))
    <script type="application/javascript">
         swal({
            title: '{{session('exito')}}',
            text: '¡Operación exitosa!',
            icon: 'success'
            });
    </script>
 @endif
@endsection