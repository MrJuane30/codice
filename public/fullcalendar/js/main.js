
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var ancho = $(window).width();
    console.log(ancho);
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar:
        {
            left: 'prev,next today',
            center: 'title',
            right: 'myCustomButton',


        },
        customButtons: {
            myCustomButton: {
                text: 'Agregar',
                click: function () {
                    $('#exampleModal').modal('toggle');

                }
            }
        },
        dateClick: function (info) {
            CleanCalendario();
            $('#txtFecha').val(info.dateStr);
            $('#btn-agregar').prop("disabled", false);
            $('#btn-borrar').prop("disabled", true);
            $('#btn-modificar').prop("disabled", true);
            $('#btn-cal').prop("disabled", true);
            $('#exampleModal').modal('toggle');
        },
        eventClick: function (info) {
            $('#btn-agregar').prop("disabled", true);
            $('#btn-borrar').prop("disabled", false);
            $('#btn-modificar').prop("disabled", false);
            $('#btn-cal').prop("disabled", false);
            $('#exampleModal').modal('toggle');
            mes = (info.event.start.getMonth() + 1);
            dia = (info.event.start.getDate());
            anio = (info.event.start.getFullYear());
            mes = (mes < 10) ? "0" + mes : mes;
            dia = (dia < 10) ? "0" + dia : dia;
            minutos = info.event.start.getMinutes();
            hora = info.event.start.getHours();
            minutos = (minutos < 10) ? "0" + minutos : minutos;
            hora = (hora < 10) ? "0" + hora : hora;
            horario = (hora + ":" + minutos);

            $("#txtID").val(info.event.id);
            $("#txtFecha").val(anio + "-" + mes + "-" + dia);
            $("#txtTitulo").val(info.event.title);
            $("#txtHora").val(horario);
            $("#txtColor").val(info.event.backgroundColor);
            $("#txtDescripcion").val(info.event.extendedProps.descripcion);


            $('#exampleModal').modal('toggle');
        },
        events: show
    });

    defaultDate: new Date(2020, 11, 16);
    calendar.setOption("locale", 'Es');
    calendar.render();

    $('#btn-agregar').click(function () {
        var ObjEvento = recolectarDatosGUI('POST');
        EnviarInformacion('', ObjEvento);
    });
    $('#btn-borrar').click(function () {
        var ObjEvento = recolectarDatosGUI('DELETE');
        EnviarInformacion('/' + $('#txtID').val(), ObjEvento);
    });
    $('#btn-modificar').click(function () {
        var ObjEvento = recolectarDatosGUI('PATCH');
        EnviarInformacion('/' + $('#txtID').val(), ObjEvento);
    });
    $('#btn-cal').click(function () {
        var titulo = $('#txtTitulo').val();
        var hora = $('#txtHora').val();
        var descripcion = $('#txtDescripcion').val();
        document.getElementById('tituloCal').innerHTML = titulo;
        document.getElementById('startCal').innerHTML = hora;
        document.getElementById('descCal').innerHTML = descripcion;
    });
    function recolectarDatosGUI(method) {
        nuevoEvento = {
            id: $('#txtID').val(),
            title: $('#txtTitulo').val(),
            descripcion: $('#txtDescripcion').val(),
            color: $('#txtColor').val(),
            textColor: '#FFFFFF',
            start: $('#txtFecha').val() + " " + $('#txtHora').val(),
            end: $('#txtFecha').val() + " " + $('#txtHora').val(),
            "_token": $("meta[name='csrf-token']").attr("content"),
            '_method': method
        }
        return nuevoEvento;
    }

    function EnviarInformacion(accion, objetoEvento) {
        $.ajax(
            {
                type: "POST",
                url: url + accion,
                data: objetoEvento,
                success: function (msg) {
                    $('#exampleModal').modal('toggle');
                    calendar.refetchEvents();
                },
                error: function () { alert("Hay un error"); }
            });
    }

    function CleanCalendario() {
        $("#txtID").val("");
        $("#txtTitulo").val("");
        $("#txtHora").val("07:00");
        $("#txtColor").val("");
        $("#txtDescripcion").val("");
    }
});