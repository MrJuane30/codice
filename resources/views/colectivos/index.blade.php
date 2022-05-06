@extends('layouts.admin')

@section('content')
<h1 class="text-center">Administración de colectivos</h1>
<div class="text-center table-responsive-md ">
    <table class="table">
        <thead class="bg-dark text-light" >
            <tr>
                <th scole="col">Nombre</th>
                <th scole="col">Colonia</th>
                <th scole="col">Direccion</th>
                <th></th>
            </tr>
            <tbody>
              
                   
                   @foreach($colectivos as $colectivo)
                   <!-- Inicio del for each -->   
                   <tr>
                    <td>{{$colectivo->nombre}}</td>
                    <td>{{$colectivo->colonia}}</td>
                    <td>{{$colectivo->direccion}}</td>
                    <td> 
                    <a href="{{route('colectivo.edit', ['colectivo' => $colectivo->id])}}" class="btn btn-dark  mb-2 d-block">Editar <i class="fas fa-user-edit"></i></a>
                    <eliminar-colectivo 
                    colectivo-id={{$colectivo->id}}>
                    </eliminar-colectivo>                                        
                    </td>
                    </tr>
                   <!-- Fin del for each -->
                   @endforeach
                       
                
                     
                    <tr>
                     <a href="{{route('colectivo.create')}}" class="btn btn-primary d-block">Agregar nuevo colectivo</a>
                    </tr>

                    </td>
            </tbody>
        </thead>
    </table>
    {{$colectivos->links('pagination::bootstrap-4')}}
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