@extends('layouts.menu')

@section('content')

<link rel="stylesheet" href="css/estilos_pie_pagina.css">
<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>@lang('Reporte')</h1>
        <h2 class="">@lang('Reporte por Vigencia<')/h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">@lang('Inicio')</a></li>
            <li><a href="#">@lang('Reporte')</a></li>
            <li class="active">@lang('Reporte por Vigencia')</li>
        </ol>
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
    margin-left: 1000px;
    margin-top:-100px;
}

.boton3:hover {
    background: #318aac;
    color: #fff !important;
}
</style>

<br>
<br>
<br>
<div class="color_informacion_modulo " style="margin-top: 15px;">
    <span class="color_infor  ">@lang('Usted se encuentra en:')' &nbsp;&nbsp;<font color="#060505"> @lang('Sistema de Informacion Poblacional Misak -SIPEMP') &gt; <font color="#060505">@lang('Reportes') </font> &gt; <font color="#060505">@lang('Reporte por Vigencia formato Ministerios')</font> </span>
</div>

<div class="col-lg-12">

    <section class="panel default blue_title h2">
        <div class="panel-heading"><span class="semi-bold"></span> </div>
        <div class="ContenedorFormularioCenso">
            <div class="panel-body">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#Tab1">@lang('CENSO GENERAL POR VIGENCIA')</a></li>


                </ul>

                <div class="tab-content" id="myTabContent">
                    <div id="Tab1" class="tab-pane fade in active" style="margin: 0;">
                        <!----TAP 1 ------>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="content-header">@lang('Censo General')</h3>
                                    <div id="separar">
                                            
                                            <a href="/Censo_general/download">
                                                <span class="boton3">@lang('Exportar en  Excel')</span>


                                            </a>
                                        </div>
                                       

                                    <div class="table-responsive">
                                        

                                        @if(isset($personas))
                                        <h4>@lang('La Información del censo poblacional del Resguardo de Guambia vigencia son:')</h4>
                                           
                                      {{--
                                        <a href="/Censo_general/download" target="_blank"
                                            class="btn btn-defaul">@lang('Descargar')</a>--}}

                                        <table class="table table-bordered table-striped">
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
                                                    <td> {{ Carbon\Carbon::parse($persona->fecha_nacimiento)->format('m/d/Y') }} </td>
                                                    
                                                    <td>{{ $persona->parentesco }}</td>
                                                    <td>{{ $persona->sexo }}</td>
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
                                        </table>
                                        @elseif(isset($message))
                                        <h3> {{ $message }}</h3>
                                        @endif
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


<!-- script de la librerias chart para generar reportes  -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}" defer></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}" defer></script>
<script src="{{ asset('vendors/build/js/custom.min.js') }}" defer></script>


@endsection