@extends('layouts.admin')

@section('content')
<h1 class="text-center">Administración de miembros</h1>
<div class="text-center table-responsive-md ">
    <table class="table">
        <thead class="bg-dark text-light" >
            <tr>
                <th scole="col">Nombre</th>
                <th scole="col">Apellido</th>
                <th></th>
            </tr>
            <tbody>   
                <!-- Inicio del for each -->  
                    @foreach($miembros as $miembro)
                        
                   <tr>
                    <td>{{$miembro->nombre}}</td>
                    <td>{{$miembro->apellidos}}</td>
                    <td> 
                    <a href="{{'/#/miembro/'.$miembro->id}}" class="btn btn-success  mb-2 d-block"><i class="fas fa-eye"></i> Ver</a>
                    <a href="{{route('miembro.edit', ['miembro'=>$miembro->id])}}" class="btn btn-dark  mb-2 d-block"><i class="fas fa-edit"></i> Editar</a>
                    <eliminar-miembro
                    miembro-id={{$miembro->id}}> 
                    </eliminar-miembro>
                    </td>
                    </tr>
                   <!-- Fin del for each -->
                   @endforeach
                                        
                    <tr>
                     <a href="{{route('miembro.create')}}" class="btn btn-primary d-block">Agregar nuevo miembro</a>
                    </tr>
            </tbody>
        </thead>
    </table>
    {{$miembros->links('pagination::bootstrap-4')}}
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