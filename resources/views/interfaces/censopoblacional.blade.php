@extends('layouts.menu2')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="/js/sweetalert2@9.js"></script>

<link rel="stylesheet" href="css/estilos_pie_pagina.css">

<!-- Main CSS -->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<!-- Sub Nav -->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1> @lang('CENSO POBLACIONAL') </h1>
       {{-- <h2 class="">Hogar </h2>--}}
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">@lang('Inicio')</a></li>
            <li><a href="#">@lang('Censo Poblacional')</a></li>
            {{-- <li class="active">Hogar</li> --}}
        </ol>
    </div>
</div>

<div class="container">
    <!-- Progreso del formulario -->
    <div class="col-md-3 col-sm-4 col-xs-12 ">

        <iframe frameborder="0" width="100%" scrolling="no" height="245" src="/menu-lateral/0">

        </iframe>
    </div>

    {{-- Tipos de censado --}}
    <div class="col-md-9 ">
        <div class="ContenedorFormularioCenso">
            <div class="titulo_informacion">

                {{-- Taps del la gestion de censo --}}
                <div class="table-container table-responsive-md">
                <table>
                    <tbody>
                        <tr>
                            <td style="width:3px;"></td>
                            <td title="Censo vivienda de familia Misak">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td><b href=""> @lang('VIVIENDA MISAK')</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td style="width:3px;"></td>
                            <td title="Censo del Hogar Misak  ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href=""> @lang('HOGAR MISAK') </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>

                            <td style="width:3px;"></td>
                            <td title="Miembros de la familia   Misak ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td><b href="">@lang('FAMILIA MISAK') </b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href=""> @lang('PERSONAS MISAK') </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>

                            <td style="width:3px;"></td>
                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href=""> @lang('INFORMACIÓN PERSONA') </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>

                            <td style="width:3px;"></td>
                            <td title="Nivel educativo  que tiene  la persona que vive en la familia">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href=""> @lang('NIVEL EDUCATIVO') </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
 </div>
                <div class="color_infor noPrint" style="margin-top: 15px;">
                    <span class="color_infor  noPrint"> @lang('Usted se encuentra en:')&nbsp;&nbsp;@lang('Sistema de Información  Poblacional Misak | SIPEMP')</span>
                </div>
            </div>

            <div class="well resume-module module-jobs">
               
                <h2 class="module-title">
                     @lang('Vivienda Misak')
                </h2>
                <div class="js-box-laboral-experience" id="experiencia-laboral">
                    <h3 class="h4"> @lang('Si el hogar  que va realizar el censo población tiene vivienda Propia, ingresar en este módulo censo vivienda Misak')</h3>
                    <div class="module-collapsible collapse in" aria-expanded="true">
                        <div class="module-summary-wrapper laboral-experience">
                            <hr style="border: 1px solid #e0e0e0;">
                            <a class="btn btn-primary" href="{{ route('vivienda') }}">@lang('Ingresar')</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="well resume-module module-jobs">
                <h2 class="module-title">
                    @lang('Hogar Misak')
                </h2>
                <div class="js-box-laboral-experience" id="experiencia-laboral">
                    <h3 class="h4"> @lang('Si el Hogar  a censar vive dentro de la vivienda de algún familiar, (Padre, tío) ingresar en este módulo Hogar Misak') </h3>
                    <div class="module-collapsible collapse in" aria-expanded="true">
                        <div class="module-summary-wrapper laboral-experience">
                            <hr style="border: 1px solid #e0e0e0;">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal_buscar_codigo_vivienda">@lang('Ingresar')</button>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>




@endsection