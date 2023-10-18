@extends('layouts.menu')

@section('content')

<link rel="stylesheet" href="css/estilos_pie_pagina.css">
<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>@lang('Reporte')</h1>
        <h2 class="">@lang('Listado de Personas Retirados')</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">@lang('Inicio')</a></li>
            <li><a href="#">@lang('Reporte')</a></li>
            <li class="active">@lang('Listado de Personas Retirados')</li>
        </ol>
    </div>
</div>


<br>
<br>
<br>
<div class="color_informacion_modulo " style="margin-top: 15px;">
    <span class="color_infor  ">@lang('Usted se encuentra en:')' &nbsp;&nbsp;<font color="#060505"> @lang('Sistema de Informacion  Poblacional Misak -SIPEMP') &gt; <font color="#060505">@lang('Reportes') </font> &gt; <font color="#060505">@lang('Listado de Personas Retirados')</font> </span>
</div>

<div class="col-lg-12">

    <section class="panel default blue_title h2">
        <div class="panel-heading"><span class="semi-bold"></span> </div>
        <div class="ContenedorFormularioCenso">
            <div class="panel-body">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#Tab1">@lang('Personas Retirados')</a></li>


                </ul>

                <div class="tab-content" id="myTabContent">
                    <div id="Tab1" class="tab-pane fade in active" style="margin: 0;">
                        <!----TAP 1 ------>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="content-header">@lang('Listado General')</h3>
                                        
    {{-- BOTON ACEPTAR --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                            <form>
                            @lang(' BUSCAR POR CC:')<input id="searchTerm" type="text" onkeyup="doSearch()" />
                         </form>

                             
                            </div>
                        </div>
                    </div>
                                    <div class="table-responsive">
                                       
                                            <h4>@lang('Listado de personas retirados  del Censo Poblacional   del Resguardo de Guambia:')</h4>
                                               <!-- <a href="/Censo_general/download" target="_blank" class="btn btn-defaul">Descargar</a>-->
                                                
                                               <table  id="datos" class="table table-striped table-bordered table-hover" id="solicitudes">
                                                <thead>

                                                    <tr>
                                                        <th>#</th>
                                                        <th>VIGENCIA </th>
                                                        <th>RESGUARDO INDIGENA</th>
                                                        <th>COMUNIDAD INDIGENA</th>
                                                        <th>FAMILIA</th>
                                                        <th>TIPO IDENTIFICACION</th>
                                                        <th>NUMERO DOCUMENTO</th>
                                                        <th>NOMBRES</th>
                                                        <th>APELLIDOS</th>
                                                        <th>FECHA NACIMIENTO</th>
                                                        <th>PARENTESCO</th>
                                                        <th>SEXO</th>
                                                        <th>ESTADO CIVIL</th>
                                                        <th>PROFESION</th>
                                                        <th>ESCOLARIDAD</th>
                                                        <th>INTEGRANTES</th>
                                                        <th>DIRECCION</th>
                                                        <th>TELEFONO</th>
                                                        <th>USUARIO</th>

                                                    </tr>


                                                </thead>
                                                <tbody>

                                                    @foreach($personas as $key=> $persona)
                                                        <tr>

                                                            <td> {{ $key+1 }}</td>
                                                            <td>{{ $persona->vigencia }}</td>
                                                            <td>{{ $persona->resguardo }}</td>
                                                            <td>{{ $persona->comunidad_indigena }}</td>
                                                            <td>{{ $persona->familia }}</td>
                                                            <td>{{ $persona->tipo_identificacion }}</td>
                                                            <td>{{ $persona->docomento_persona }}</td>
                                                            <td>{{ $persona->nombres }}</td>
                                                            <td>{{ $persona->apellidos }}</td>
                                                            <td>{{ $persona->fecha_nacimiento }}</td>
                                                            <td>{{ $persona->parentesco }}</td>
                                                            {{--<td>{{ $persona->sexo }}</td>--}}
                                                            <td> @if($persona->sexo == 1)
                                                             <span class="">F</span>
                                                              @else
                                                              <span class="">M<p></p></span>
                                                               @endif</td>
                                                            <td>{{ $persona->estado_civil }}</td>
                                                            <td>{{ $persona->profesion }}</td>
                                                            <td>{{ $persona->escolaridad }}</td>
                                                            <td>{{ $persona->integrantes }}</td>
                                                            <td>{{ $persona->vereda }}-Sector-{{ $persona->sector }}
                                                            </td>
                                                            <td>{{ $persona->telefono }}</td>
                                                            <td>CABILDO DE GUAMBIA</td>
                                                            </tr>
                        @endforeach
                    </tbody>
                    <tr class='noSearch hide'>
                <td colspan="5"></td>
            </tr>
                </table>
                                    </div>
                                </div>
                                <!--/porlets-content-->
                            </div>
                        </div>
                        <!--/block-web-->
                    </div>
                    <!--/col-md-12-->
                </div>
                <!--/row-->
            </div>
            <!--FIN --TAP 1 ------>


        </div>
</div>
</section>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<script language="javascript">
        function doSearch()
        {
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
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") {
                lastTR.classList.add("hide");
            } else if (total) {
                td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
            } else {
                lastTR.classList.add("red");
                td.innerHTML="No se ha encontrado la persona con este numero de indetificacion";
            }
        }
    </script>
 
    <style>
        #datos {border:1px solid #ccc;padding:10px;font-size:1em;}
        #datos tr:nth-child(even) {background:#ccc;}
        #datos td {padding:5px;}
        #datos tr.noSearch {background:White;font-size:0.8em;}
        #datos tr.noSearch td {padding-top:10px;text-align:right;}
        .hide {display:none;}
        .red {color:Red;}
    </style>

<!-- script de la librerias chart para generar reportes  -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}" defer></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}" defer></script>
<script src="{{ asset('vendors/build/js/custom.min.js') }}" defer></script>


@endsection
