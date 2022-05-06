@extends('layouts.admin')
@section('scripts')
    <link href="{{asset('fullcalendar/main.css')}}" rel='stylesheet' />
    <link href="{{asset('fullcalendar/modal.css')}}" rel='stylesheet' />
    <script src="{{asset('fullcalendar/main.js')}}" defer></script>
    <script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" defer></script>
    <script>
        var url="{{url('/eventos')}}";
        var show="{{route('eventos.show')}}";
    </script>

    <script src="{{asset('fullcalendar/js/main.js')}}" defer></script>
        
@endsection

@section('content')
    <div class="container1">
        <div class="row">
            <div class="col"></div>
            <div class="col-md-12">
                <div id="calendar"></div>
            </div>
            <div class="col"></div>
        </div>
    
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Datos de la actividad</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="d-none">
                    id:
                    <input type="text" name="txtID" id="txtID">
                    <br>
                    Fecha:
                    <input type="text" name="txtFecha" id="txtFecha">
                    <br>
                </div>
               

              <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Titulo:</label>
                    <input type="text" class="form-control" name="txtTitulo" id="txtTitulo">
                </div>
                <div class="form-group col-md-4">
                    <label>Hora:</label>
                    <input type="time" min="07:00" max="19:00" step="600" class="form-control" name="txtHora" id="txtHora">
                </div>
                <div class="form-group col-md-12">
                    <label>Descripcion</label>
                <textarea class="form-control"  name="txtDescripcion" id="txtDescripcion" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Color:</label>
                <input type="color" class="form-control" name="txtColor" id="txtColor">
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
                <button  type="button" id="btn-agregar" class="btn btn-success">Agregar</button>
                <button  type="button" id="btn-modificar" class="btn btn-warning">Modificar</button>
                <button  type="button" id="btn-borrar" class="btn btn-danger">Borrar</button>
                <button  name="Add Calendar" id="btn-cal" class="btn btn-secondary addeventatc">
                    Celular
                   
                    <span class="start" id="startCal"></span>
                    <span class="end"></span>
                    <span class="timezone"></span>
                    <span class="title" id="tituloCal"></span>
                    <span class="description" id="descCal"></span>
                    <span class="location"></span>
                </button>
                <button  type="button" id="btn-cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                
            </div>
          </div>
        </div>
      </div>
    

        


@endsection