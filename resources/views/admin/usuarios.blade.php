@extends('layouts.admin')

@section('content')
<h1 class="text-center">Administración de usuarios</h1>
<div class="text-center table-responsive-md ">
    <table class="table">
        <thead class="bg-dark text-light" >
            <tr>
                <th scole="col">Nombre</th>
                <th scole="col">Email</th>
                <th></th>
            </tr>
            <tbody>
              
                   
                   @foreach($usuarios as $usuario)
                   <!-- Inicio del for each -->   
                   <tr>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td> 
                    <a href="{{route('usuarios.edit', ['user' => $usuario->id])}}" class="btn btn-dark  mb-2 d-block">Editar <i class="fas fa-user-edit"></i></a>
                    <eliminar-usuario 
                    usuario-id={{$usuario->id}}>
                    </eliminar-usuario>                                        
                    </td>
                    </tr>
                   <!-- Fin del for each -->
                   @endforeach
                       
                
                     
                    <tr>
                     <a href="{{route('usuarios.create')}}" class="btn btn-primary d-block">Agregar nuevo usuario</a>
                    </tr>

                    </td>
            </tbody>
        </thead>
    </table>
    {{$usuarios->links('pagination::bootstrap-4')}}
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