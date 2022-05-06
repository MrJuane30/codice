@extends('layouts.admin')

@section('content')
<h1 class="text-center">Administración de Repositorio</h1>
<div class="text-center table-responsive-md ">
    <table class="table">
        <thead class="bg-dark text-light" >
            <tr>
                <th scole="col">Título</th>
                <th scole="col">Categoria</th>
                <th></th>
            </tr>
            <tbody>
                @foreach($documentos as $documento)
                        
                <tr>
                 <td>{{$documento->titulo}}</td>
                 <td>{{$documento->categoriaDocumento->nombre}}</td>
                 <td> 
                    <a href="{{route('repositorio.edit', ['documento'=>$documento->id])}}" class="btn btn-dark  mb-2 d-block"><i class="fas fa-edit"></i> Editar</a>
                    <eliminar-documento
                    documento-id={{$documento->id}}> 
                    </eliminar-documento>
                </td>
                 </tr>
                <!-- Fin del for each -->
                @endforeach    
                                  
                    <tr>
                     <a href="{{route('repositorio.create')}}" class="btn btn-primary d-block">Agregar nuevo documento</a>
                    </tr>
            </tbody>
        </thead>
    </table>
    {{$documentos->links('pagination::bootstrap-4')}}
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