@extends('layouts.menu')

@section('content')

<style>
.enlace {
    display: inline;
    border: 0;
    padding: 0;
    margin: 0;
    text-decoration: underline;
    background: none;
    color: #000088;
    font-family: arial, sans-serif;
    font-size: 1em;
    line-height: 1em;
}

.enlace:hover {
    text-decoration: none;
    color: #0000cc;
    cursor: pointer;
}
</style>

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Estado de retido</h1>
        <h2 class="">Estado</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Retiro censo Poblacioanal</a></li>
            <li class="active">Estado de retido</li>
        </ol>
    </div>
</div>


<div class="container">
    <!-- Fin Informacion menu izquierda-->
    <div style="margin-bottom: 2em;" class="col-md-12">
        <div class="ContenedorFormularioCenso">
            <div class="color_infor noPrint" style="margin-top: 15px;">
                <span class="color_infor  noPrint">Usted se encuentra en:&nbsp;&nbsp;Estado de retido &gt; <font
                        color="#666666"> Estado de retido del censo Poblacional </font></span>
            </div>


            {{-- BOTON ACEPTAR --}}
            {{--  <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                            <form>
                            BUSCAR POR CC: <input id="searchTerm" type="number" onkeyup="doSearch()" />
                         </form>

                             
                            </div>
                        </div>
                    </div>
                    --}}
            <div class="block-web full" style="overflow-y: auto; height: 500px;">
                <ul class="nav nav-tabs nav-justified nav_bg">
                    <li class="active"><a href="#Informacion_del_sistema" data-toggle="tab"><i
                                class="fa fa-laptop"></i>ESTADO DE RETIRO DEL CENSO POBLACIONAL SIPEMP </a></li>
                </ul>
                <table id="datos" class="table table-striped table-bordered table-hover" id="solicitudes">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo novedad</th>
                            <th>Motivo</th>
                            <th>Acta</th>
                            <th>Fecha novedad</th>
                            <th>Fecha autorización</th>
                            <th>Estado</th>

                            <th>Certificado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($novedades as $key=> $novedad)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $novedad->docomento_persona }}</td>
                            <td>{{ $novedad->nombres }}</td>
                            <td>{{ $novedad->apellidos }}</td>
                            <td>{{ $novedad->tipo_novedad==0?'Fallecimiento':'Retiro' }}
                            </td>
                            <td>{{ $novedad->motivo_retiro }}</td>
                            <td><button class="enlace" onclick="decargarActa({{ $novedad->id }});">Descargar
                                    acta</button></td>
                            <td>{{ $novedad->created_at }}</td>
                            <td>{{$novedad->fecha_autorizacion}}</td>
                            <td>{{ $novedad->estado==0?'No autorizada':'Autorizada' }}
                            </td>


                            <td>

                                <a href="{{ route('Certificado-Retiro', $novedad->id_persona) }}" target="_blank"
                                    class="btn btn-sm btn-default"
                                    style="background-color:#1b9e1d;border: 0px !important;color:white;"> <i
                                        class="fa fa-eye" aria-hidden="true"></i>
                                    Ver Certificado
                                </a>

                            </td>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr class='noSearch hide'>
                        <td colspan="5"></td>
                    </tr>
                </table>
                <div id="separar">
                    <br>
                    <br>
                    <a href="{{ route('Menu-Cunsultas') }}">
                        <span class="boton3">ACEPTAR</span>


                    </a>
                </div>

            </div>
            <!--FIN ContenedorFormularioCenso-->
        </div>
        <!--FIN col-md-9-->
    </div>
</div>
<style>
.boton3 {
    color: #318aac !important;
    font-size: 20px;
    font-weight: 500;
    padding: 0.5em 1.2em;
    background: rgba(0, 0, 0, 0);
    border: 2px solid;
    border-color: #318aac;
    transition: all 1s ease;
    position: relative;
    margin-left: 500px;
}

.boton3:hover {
    background: #318aac;
    color: #fff !important;
}
</style>


<div id="ConfirmAction" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Confirmar Acción</h5>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea realizar esta acción?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
let id_novedadForm = 0;
let modalConfirm = $('#ConfirmAction');
$(document).ready(() => {

    $('#btnConfirmar').click((e) => {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: '/cambiar-estado-solicitud/' + id_novedadForm,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: (response) => {
                if (response.result) {

                    Swal.fire('Exito', 'Se ha guardado con éxito.', 'success');

                    setTimeout(function() {
                        location.href = '/Validacion';
                    }, 2000);
                } else {

                    Swal.fire('Error',
                        'Se genero un problema, comuniquese con el administrador.',
                        'error');

                }
            },
        }).always(() => {
            modalConfirm.modal('hide');
        });
    });

});

function decargarActa(id_novedad) {
    $.ajax({
        type: 'GET',
        url: '/descargar-acta/' + id_novedad,
        dataType: 'json',
        contentType: false,
        processData: false,
    }).done((response) => {
        if (response.result) {

            var a = document.createElement("a");
            a.href = 'data:application/pdf;base64,' + response.pdf;
            a.download = "acta.pdf"; //update for filename
            a.target = '_blank';
            document.body.appendChild(a);
            a.click();

        } else {

            Swal.fire('Error',
                'Se genero un problema, comuniquese con el administrador.',
                'error');

        }

    });
}

function cambiarEstado(id_novedad) {
    id_novedadForm = id_novedad;
    modalConfirm.modal('show');
}
</script>

<script language="javascript">
function doSearch() {
    const tableReg = document.getElementById('datos');
    const searchText = document.getElementById('searchTerm').value.toLowerCase();
    let total = 0;

    // Recorremos todas las filas con contenido de la tabla
    for (let i = 1; i < tableReg.rows.length; i++) {
        // Si el td tiene la clase "noSearch" no se busca en su cntenido
        if (tableReg.rows[i].classList.contains("noSearch")) {
            continue;
        }

        let found = false;
        const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        // Recorremos todas las celdas
        for (let j = 0; j < cellsOfRow.length && !found; j++) {
            const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            // Buscamos el texto en el contenido de la celda
            if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                found = true;
                total++;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            // si no ha encontrado ninguna coincidencia, esconde la
            // fila de la tabla
            tableReg.rows[i].style.display = 'none';
        }
    }

    // mostramos las coincidencias
    const lastTR = tableReg.rows[tableReg.rows.length - 1];
    const td = lastTR.querySelector("td");
    lastTR.classList.remove("hide", "red");
    if (searchText == "") {
        lastTR.classList.add("hide");
    } else if (total) {
        td.innerHTML = "Se ha encontrado " + total + " coincidencia" + ((total > 1) ? "s" : "");
    } else {
        lastTR.classList.add("red");
        td.innerHTML = "No se ha encontrado la persona con este numero de indetificacion";
    }
}
</script>

<style>
#datos {
    border: 1px solid #ccc;
    padding: 10px;
    font-size: 1em;
}

#datos tr:nth-child(even) {
    background: #ccc;
}

#datos td {
    padding: 5px;
}

#datos tr.noSearch {
    background: White;
    font-size: 0.8em;
}

#datos tr.noSearch td {
    padding-top: 10px;
    text-align: right;
}

.hide {
    display: none;
}

.red {
    color: Red;
}
</style>
@endsection