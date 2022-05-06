@extends('layouts.admin')

@section('content')
<h1 class="text-center">Administración de eventos</h1>
<div class="text-center table-responsive-md ">
    <table class="table">
        <thead class="bg-dark text-light" >
            <tr>
                <th scole="col">Nombre</th>
                <th scole="col">Dirección</th>
                <th scole="col">Fecha y hora</th>
                <th></th>
            </tr>
            <tbody>  
                @foreach($acontecimientos as $acontecimiento)
                        
                <tr>
                 <td>{{$acontecimiento->nombre}}</td>
                 <td>{{$acontecimiento->direccion}}</td>
                 <td>{{$acontecimiento->fecha}}</td>
                 <td> 
                    <a href="{{route('acontecimientos.edit', ['acontecimiento'=>$acontecimiento->id])}}" class="btn btn-dark  mb-2 d-block">Editar</a>
                    <eliminar-evento 
                    evento-id={{$acontecimiento->id}}>
                    </eliminar-evento>
                </td>
                 </tr>
                <!-- Fin del for each -->
                @endforeach                   
                    <tr>
                     <a href="{{route('acontecimientos.create')}}" class="btn btn-primary d-block">Agregar nuevo evento</a>
                    </tr>
            </tbody>
        </thead>
    </table>
    {{$acontecimientos->links('pagination::bootstrap-4')}}
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