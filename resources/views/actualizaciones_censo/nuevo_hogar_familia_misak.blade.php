@extends('layouts.menu2')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="/js/sweetalert2@9.js"></script>

<link rel="stylesheet" href="css/estilos_pie_pagina.css">

<!--\\\\\\\ estilos css \\\\\\-->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>CENSO POBLACIONAL </h1>
        <h2 class="">Hogar </h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Ceonso Poblacional</a></li>
            <li class="active">Hogar</li>
        </ol>
    </div>
</div>

<!---///////////FORMULARIO DE ENCUENTA POBLACIONAL////////////////7777----
  -----------
  ------------
  ------------>

<!-- Modal -- Codigo  obtenido desde bootstrapp Modalhttps://getbootstrap.com/docs/4.0/components/modal/-->

<!--  modal Informacion de Moduli -->

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            Informacion de modulo
            -
            -
            -
            -
        </div>

    </div>
</div>
<!--///////fin de modal /////7-//--->

<!-- FIN-->



<!-- MODAL BUSCAR  CODIGO  DE VIVIENDA -->
<strong>
    <div class="modal fade" id="myModal_buscar_codigo_vivienda" data-keyboard="false" data-backdrop="static">
</strong>
<div class="modal-dialog modal-lg">
    <div class="modal-content  ">
        <img src="icon/Advertencia.png" width="200px" align="center">
        <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
            <h4 class="modal-title">Consultar la información de código de la vivienda, ingresado el número de
                identificación de la persona que está a cargo de la casa </h4>
        </div>
        <div class="modal-body">

            <div id="contenido_modal_confirm_alumno_matriculado">


                <!----------------=========================0--------------------->

                <!----BUSCAR CODIGO VIVIENDA POR DOCUMENTO DE INDENTIDAD -------------------->


                <div class="subir_informacion_general">
                    <div class="container clearfix">
                        <div class="col-sm-4 topmargin-sm">

                            <form id="buscar" class="form_cunsulta" name="form" action="/Hogar" method="GET"
                                role="Informacion_General" class="pocicion_formulario">
                                {{ csrf_field() }}
                                <div id="consulta_externa">
                                    <label>Ingresar el número de identificación de la persona </label><br>
                                    <input id="q" name="q" class="form-control"
                                        placeholder="Digíte el número sin puntos ni comas"
                                        title="El nùmero de cèdula debe ser de 2 a 10 dígitos" value="" style="">

                                    <span class="animated fadeIn"></span>


                                </div>

                                <br>
                                <div class="nobottommargin tright">
                                    <input type="submit" id="boton" name="enviar" value="Buscar "
                                        class="boton tab-linker btn-block" style="">
                                </div>
                            </form>







                        </div>

                        <br>
                        <br>
                        <br>




                        <div class="col-sm-5 topmargin-sm text-center">
                            <h2>Detalle Del codigo </h2>

                        </div>


                        <div id="success" class="col-sm-5 well text-justify">


                            <div class="table-responsive">
                                @if(isset($Personas))
                                Los Datos ingresados del estudiante : <b> {{ $query }} </b> Es :
                                <table id="refresh" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>NOMBRE</th>
                                            <th>CODIGO HOGAR</th>
                                            <th>CODIGO HOGAR</th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($Personas as $persona)
                                        <tr>

                                            <td>{{ $persona->docomento_persona}}</td>
                                            <td>{{$persona->nombres}}</td>
                                            <td>{{$persona->hogar_id }}</td>
                                            <td> </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                @elseif(isset($message))
                                <h3> {{$message}}</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- FIN DEL contenido_modal_confirm_alumno_matriculado-->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <!---->
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- FIN DEL MODAL  BUSCAR CODIGO DEL HOGAR-->






<!-- INICIO DE  CODIGO DE FORMULARIO -->


<div class="container">
    <!--Informacion menu izquierda-->
    <div class="col-md-3 col-sm-4 col-xs-12 ">

        <iframe frameborder="0" width="100%" scrolling="no" height="245" src="./menu-lateral">

        </iframe>
    </div>
    <!-- Fin Informacion menu izquierda-->
    <div class="col-md-9 ">
        <div class="ContenedorFormularioCenso">
            <div class="titulo_informacion">

                <table>
                    <tbody>
                        <tr>
                            <td style="width:3px;"></td>
                            <td title="Censo vivienda de familia Misak">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td><b href="">VIVIENDA MISAK</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td style="width:3px;"></td>
                            <td title="Censo del Hogar Misak  ">
                                <table class="estatic">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href="">HOGAR MISAK </b>
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
                                            <td><b href="">FAMILIA MISAK</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href="">PERSONAS </b>
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
                                                <b href="">INFORMACIÓN PERSONA </b>
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
                                                <b href="">NIVEL EDUCATIVO </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>



                <div class="color_infor noPrint" style="margin-top: 15px;">
                    <span class="color_infor  noPrint">Usted se encuentra en: &nbsp;&nbsp;Censo poblacional Misak SIPEMP
                        &gt; <font color="#666666">Censo Hogar</font></span>
                </div>
                <h1>Datos Personales </h1>
            </div>
            <!--FIN titulo_infobasica-->
            <!-- FORMULARIO-->
            <div class="well resume-module module-jobs" id="trabajos">
                <h2 class="module-title">
                    Vivienda Misak
                </h2>
                <div class="js-box-laboral-experience" id="experiencia-laboral">
                    <h3 class="h4">Si la familia que va realizar el censo población tiene vivienda Propia, ingresar en
                        este módulo censo vivienda Misak. </h3>
                    <div class="module-collapsible collapse in" aria-expanded="true">
                        <div class="module-summary-wrapper laboral-experience">
                            <p class="text-muted">
                                _______________________ </p>
                            <h4 class="panel-title">


                                <button type="button" class="btn btn-primary"
                                    onclick="location.href='{{ url('Vivienda') }}'">Ingresar</button>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="well resume-module module-jobs">
                    <h2 class="module-title">
                        Hogar Misak
                    </h2>
                    <div class="js-box-laboral-experience" id="experiencia-laboral">
                        <h3 class="h4">Si la Familia vive dentro de la vivienda de algún familiar, (Padre, tío) ingresar
                            en este módulo Hogar Misak. </h3>
                        <div class="module-collapsible collapse in" aria-expanded="true">
                            <div class="module-summary-wrapper laboral-experience">
                                <p class="text-muted">
                                    ___________________</p>
                                <h4 class="panel-title">
                                    <button><a href="#collapse5" type="button" class="btn btn-primary"
                                            data-parent="#accordion" data-toggle="collapse" class=""> Agregar
                                            <i class=""></i> </a>
                                    </button>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="panel-collapse collapse" id="collapse5" style="height: 0px;">
                    <div class="panel-body">

                        <div class="subtitle-edit-add-hv module-subtitle">


                            <a class="cta-module-cancel js-cta-cancel" ">
        <i class=" fa fa-times-circle-o icon-cancel" aria-hidden="true"></i>
                                <div class="btn-help">

                                    <h4 class="panel-title">
                                        <button><a href="#collapse5" data-parent="#accordion" data-toggle="collapse"
                                                class=""> Cerrar
                                                <i class="fa fa-plus"></i> </a>
                                        </button>
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <p>
                            Todos los campos son obligatorios
                        </p>
                        <!------------------>
                        <!------------------>

                        <!-- ///FORMULARIO////     -->






                        <!---------------------->








                        <!------------------>


                        <form id="Hogar" method="post" action="Vivienda-Hogar/Guardado">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="titulo_informacion">

                                    <h1>Información general del Hogar </h1>
                                </div>
                                <!--Inicio de formulario-->
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group input-group-sm">
                                            <label><span class="asterisco">*</span>Tipo de propiedad</label>
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" value="Familiar"
                                                        checked>Familiar</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="optradio"
                                                        value="Arrendada">Arrendada</label>
                                            </div>
                                            <!--<div class="radio">
                           <label><input type="radio" name="optradio" value="A lado rio" >Propia</label>
                         </div>-->



                                        </div>

                                        <div class="form-group input-group-sm">

                                            <div class="form-group ">
                                                <label><span class="asterisco">*</span>Código de la vivienda</label>
                                                <div class="clearfix"></div>
                                                <div class="form-inline input-group-sm">

                                                    <input name="vivienda_id" type="text" tabindex="2"
                                                        class="form-control" style="width:100px" value="" required="">
                                                    <input type="submit" class="btn btn-warning" value="Buscar codigo "
                                                        data-toggle="modal"
                                                        data-target="#myModal_buscar_codigo_vivienda"
                                                        onclick="location.href='{{ url('home') }}">

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group input-group-sm">
                                            <div class="form-group input-group-sm">
                                                <label><span class="asterisco">*</span>Número de personas</label>
                                                <input name="total_personas_hogar" type="number" tabindex="2"
                                                    class="form-control" style="" autocomplete="on" value=""
                                                    style="width:200px" required="">
                                            </div>


                                            <div class="form-group ">
                                                <label><span class="asterisco">*</span>Dormitorios</label>
                                                <div class="clearfix"></div>
                                                <div class="form-inline input-group-sm">
                                                    <input name="numero_dormitorio" type="number" value="ingresarr"
                                                        tabindex="2" class="form-control" style="" autocomplete="on"
                                                        value="" style="width:200px" required="">

                                                    <input name="dormitorio_usado" type="number" tabindex="2"
                                                        class="form-control" style="" autocomplete="on" value=""
                                                        style="width:200px" required="">

                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group input-group-sm">
                                            <label style="width:300px" for="title">¿donde preparan los alimentos?
                                                :</label>
                                            <select name="donde_preparan_alimento" id="" class="form-control"
                                                required="">
                                                <option value="">Selec Lugar donde preparan el alimento</option>
                                                <option value="Cocina">Cocina</option>
                                                <option value="Sala">Sala</option>
                                                <option value="Habitacion">Habitacion</option>
                                                <option value="Patio">Patio</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-6 col-sm-12 col-xs-12">

                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12"></div>
                            </div>



                            <div class="titulo_informacion">
                                <h1>Información general de la educación propia desde el hogar </h1>

                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <div class="form-group input-group-sm">
                                        <label><span class="asterisco">*</span>¿Número de Personas que estan Estudiando
                                            actual mente?</label>
                                        <input name="num_personas_estudiando" type="number" tabindex="2"
                                            class="form-control" style="" autocomplete="on" value="" style="width:200p"
                                            required="">

                                    </div>
                                    <div class="form-group input-group-sm">
                                        <label for=""><span class="asterisco">*</span>¿Como está fortaleciendo la
                                            Educación propia en su familia.?</label>

                                        <select name="forta_educacion_propia" id="ddlSalario" tabindex="49"
                                            class="form-control" required="">
                                            <option value="">Seleccione</option>
                                            <option value="1">Desde la tradición oral.</option>
                                            <option value="2">Desde la identidad cultural</option>
                                            <option value="3">Respetando el derecho mayor</option>
                                            <option value="4">No perdiendo el pensamiento como misak</option>
                                        </select>
                                    </div>
                                    <div class="form-group input-group-sm">
                                        <label for=""><span class="asterisco">*</span>¿Cómo le gustaría que fuera la
                                            educación en el pueblo misak?. </label>

                                        <select name="gustar_edu_propia" id="" tabindex="50" class="form-control"
                                            required="">
                                            <option value="">Pendiente</option>
                                            <option value="1">nn</option>
                                            <option value="2">nn</option>
                                            <option value="3">nn</option>

                                        </select>
                                    </div>

                                    <div class="form-group input-group-sm">
                                        <label for="ddlSituacionLaboral"><span class="asterisco">*</span>¿La Educación
                                            que brinda las instituciones educativas del resguardo de guambia es?</label>


                                        <select name="calidad_ie_guambia" tabindex="50" class="form-control"
                                            required="">

                                            <option value="">Seleccione</option>
                                            <option value="1">A:Excelente</option>
                                            <option value="2">B:Bueno</option>
                                            <option value="3">C:Regular</option>
                                            <option value="4">D:Malo</option>


                                        </select>

                                    </div>

                                    <div class="form-group input-group-sm">
                                        <label for=""><span class="asterisco">*</span>¿Que debilidades ha visto hasta el
                                            momento, de la educación en el pueblo Misak?.</label>


                                        <select name="debilidades_ie_guambia" tabindex="50" class="form-control"
                                            required="">

                                            <option value="">Seleccione</option>
                                            <option value="1">A:No hay modalidades que requieran los estudiantes
                                            </option>
                                            <option value="2">B: Falta de motivación por parte de los padres de familia.
                                            </option>
                                            <option value="3">C: Falta de medios de transporte para dirigir a las
                                                instituciones donde se requiera.</option>
                                            <option value="4">D: Docentes que no contextualizan desde el pensamiento
                                                holístico </option>
                                            <option value="5">E:La educación en Guambia, si cumple las necesidades de la
                                                comunidad Misak </option>

                                        </select>

                                    </div>




                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <div class="form-group input-group-sm">
                                        <label for="ddNoEstudiaResguardo"><span class="asterisco">*</span>¿Tiene
                                            estudiando hijos en las Instituciones Educativas del Resguardo de
                                            Guambía</label>
                                        <select name="hijos_estudiando_guambia" id="ddNoEstudiaResguardo" tabindex="51"
                                            class="form-control" onchange="showNoEstudiaResguardo(this);" required="">
                                            <option value="">Seleccione</option>
                                            <option value="2">SI</option>
                                            <option value="1">NO</option>

                                        </select>
                                    </div>

                                    <div id="NoGustaQueEstudienGuambia" style="visibility: hidden; display: none;">
                                        <div class="form-group input-group-sm">
                                            <label for="ddNoEstudiaResguardoEscuela"><span
                                                    class="asterisco">*</span>¿Por qué no le gusta que sus hijos
                                                estudien en las instituciones educativas del resguardo de
                                                Guambia?</label>

                                            <select name="no_estudia_guambia" id="ddNoEstudiaResguardoEscuela"
                                                tabindex="52" class="form-control" style="display: none;">
                                                <option value="">Seleccione</option>
                                                <option value="1">A:Por qué solo enseñan lo propio</option>
                                                <option value="2">B:Pierden mucho tiempo</option>
                                                <option value="3">C:Los profesores no tienen buena metodología para
                                                    enseñar</option>
                                                <option value="4">_-</option>


                                            </select>
                                        </div>
                                    </div>

                                    <div id="DesercionEscuela" style="visibility: hidden; display: none;">
                                        <div class="form-group input-group-sm">
                                            <label for="ddNoEstudiaResguardoEscuela1"><span
                                                    class="asterisco">*</span>¿El problema de la deserción escolar en
                                                nuestro pueblo Misak se debe a?</label>

                                            <select name="deserción_guambia" id="ddNoEstudiaResguardoEscuela1"
                                                tabindex="52" class="form-control" style="display: none;">
                                                <option value="">Seleccione</option>
                                                <option value="1">A:Cambio de domicilio</option>
                                                <option value="2">C:Pierde mucho el año</option>
                                                <option value="3">D:No hay buena preparación académica</option>
                                                <option value="4">E:Falta de motivación de los niños para permanecer en
                                                    la institución educativa </option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="titulo_informacion">
                                <h1>Consumo de alimentos propios desde la familia </h1>

                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group input-group-sm">
                                        <label for=""><span class="asterisco">*</span>¿Cada cuánto consume comidas
                                            propias?</label>

                                        <select name="tiempo_comida_propia" id="" tabindex="49" class="form-control"
                                            required="">
                                            <option value="">Seleccione</option>
                                            <option value="1">agregar</option>
                                            <option value="2">Todo los dias</option>
                                            <option value="3">Cada semana</option>
                                            <option value="4">Cada mes</option>
                                            <option value="5">Nunca </option>
                                        </select>
                                    </div>
                                    <div class="form-group input-group-sm">
                                        <label for=""><span class="asterisco">*</span>¿Se alimenta con productos
                                            propios? </label>

                                        <select name="alimenta_producto_propio" id="" tabindex="50" class="form-control"
                                            required="">
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>

                                        </select>
                                    </div>

                                    <div class="form-group input-group-sm">
                                        <label for=""><span class="asterisco">*</span>¿Se alimenta con semillas
                                            nativas?</label>


                                        <select name="aliemnta_semillas_propio" id="" tabindex="50" class="form-control"
                                            required="">

                                            <option value="">Seleccione</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>



                                        </select>

                                    </div>

                                    <div class="form-group input-group-sm">
                                        <label for=""><span class="asterisco">*</span>¿Se alimenta con cultivos
                                            orgánicos? </label>


                                        <select name="aliemnta_cultivos_propios" id="" tabindex="50"
                                            class="form-control" required="">

                                            <option value="">Seleccione</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>


                                        </select>

                                    </div>




                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <div class="form-group input-group-sm">
                                        <label for="ddArmonizacion"><span class="asterisco">*</span>¿Hace rituales de
                                            armonización y de equilibrio como familia? </label>
                                        <select name="rituales_armonizacion" id="ddArmonizacion" tabindex="51"
                                            class="form-control" onchange="showArmonizacion(this);" required="">
                                            <option value="">Seleccione</option>
                                            <option value="1">SI</option>
                                            <option value="2">NO</option>

                                        </select>
                                    </div>

                                    <div id="SiHaceArmonizacion" style="visibility: hidden; display: none;">
                                        <div class="form-group input-group-sm">
                                            <label for="ddSiHaceArmonizacion"><span class="asterisco">*</span>Cada
                                                cuanto se hace a la armonizació</label>

                                            <select name="tiempo_rituales" id="ddSiHaceArmonizacion" tabindex="52"
                                                class="form-control" style="display: none;">
                                                <option value="">Seleccione</option>
                                                <option value="Cada 6 meses">Cada 6 meses</option>
                                                <option value="1 año">1 año </option>
                                                <option value="Cada Problema Familiar">Cada Problema Familiar</option>



                                            </select>
                                        </div>
                                    </div>



                                </div>
                            </div>

                    </div>




                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="titulo_informacion">
                            <h1>Informacion sobre la sostenibilidad económica y comidas propias que consume la familia
                            </h1>

                        </div>
                        <div class="col-md-3 col-lg-4">

                            <div class="titulo_informacion">
                                <h1>Su economía familiar de que depende?</h1>

                            </div>
                            <ul class="">

                                <li>
                                    <label>

                                        <ul class="">

                                            @foreach($economia as $economia_familia)
                                            <li>
                                                <label>
                                                    {{ Form::checkbox('plancondiaroma[]', $economia_familia->id, null) }}
                                                    {{ $economia_familia->nombre}}

                                                </label>
                                            </li>
                                            @endforeach
                                        </ul>



                                    </label>
                                </li>

                            </ul>

                        </div>
                        <div class="col-md-3 col-lg-4">
                            <div class="titulo_informacion">
                                <h1> ¿Conoce alguna de estas comidas propias?</h1>

                            </div>
                            <ul class="">

                                @foreach($comida as $comida_familia)
                                <li>
                                    <label>
                                        {{ Form::checkbox('plancondiaroma[]', $comida_familia->id, null) }}
                                        {{ $comida_familia->nombre}}

                                    </label>
                                </li>
                                @endforeach
                            </ul>

                        </div>



                    </div>


                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="titulo_informacion">
                            <h1>¿En el yatul Que tipo de Plantas Tiene ?. Seleccione las plantas que tiene en el yatul!
                            </h1>

                        </div>


                        <div class="col-md-3 col-lg-3">

                            <div class="titulo_informacion">
                                <h1>Condimentarías </h1>

                            </div>
                            <ul class="">

                                @foreach($plancondiaroma as $plantas_codimentarias)
                                <li>
                                    <label>
                                        {{ Form::checkbox('plancondiaroma[]', $plantas_codimentarias->id, null) }}
                                        {{ $plantas_codimentarias->nombre_codimentarias}}

                                    </label>
                                </li>
                                @endforeach
                            </ul>


                        </div>

                        <div class="col-md-3 col-lg-3">
                            <div class="titulo_informacion">
                                <h1> Aromáticas </h1>

                            </div>
                            <ul class="">

                                @foreach($plantaAromaticas as $plantaAromaticas)
                                <li>
                                    <label>
                                        {{ Form::checkbox('plancondiaroma[]', $plantas_codimentarias->id, null) }}
                                        {{ $plantaAromaticas->nombre_aromáticas}}

                                    </label>
                                </li>
                                @endforeach
                            </ul>


                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="titulo_informacion">
                                <h1>medicinales </h1>

                            </div>
                            <ul class="">

                                @foreach($plantaMedicinal as $plantaMedicinal)
                                <li>
                                    <label>
                                        {{ Form::checkbox('plancondiaroma[]', $plantaMedicinal->id, null) }}
                                        {{ $plantaMedicinal->nombre_medicinales}}

                                    </label>
                                </li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="col-md-3 col-lg-3">
                            <div class="titulo_informacion">
                                <h1> Nutricionales- espirituales</h1>

                            </div>
                            <ul class="">

                                @foreach($plantaNutricional as $plantaNutricional)
                                <li>
                                    <label>
                                        {{ Form::checkbox('plancondiaroma[]', $plantaNutricional->id, null) }}
                                        {{ $plantaNutricional->nombre_nutricionaless}}

                                    </label>
                                </li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="col-md-3 col-lg-3">
                            <div class="titulo_informacion">
                                <h1> Nutricionales- espirituales</h1>

                            </div>

                            <ul class="">

                                @foreach($plantaEspirituales as $plantaEspirituales)
                                <li>
                                    <label>
                                        {{ Form::checkbox('plancondiaroma[]', $plantaEspirituales->id, null) }}
                                        {{ $plantaEspirituales->nombre_espirituales}}

                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>







                    </div>



                    ---------------

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="titulo_informacion">
                            <h1>*Ingresar la direccion donde habita la familia </h1>
                        </div>
                        <div class="col-md-6">
                            <label for="title">Seleccione Departamento:</label>
                            <select name="departamento" id="departamento" class="form-control" style="width:"
                                required="">
                                <option value="" selected disabled>Selecione Departamento</option>
                                @foreach($departamento as $key => $departamento)
                                <option value="{{$key}}"> {{$departamento}}</option>
                                @endforeach

                            </select>



                            <label for="title">Seleccione Municipio:</label>
                            <select name="municipio" id="municipio" class="form-control" style="width:" required="">
                            </select>

                            <label for="title">Seleccione Resguardo:</label>
                            <select name="resguardo" id="resguardo" class="form-control" style="width:" required="">
                            </select>

                        </div>


                        <div class="col-md-6">

                            <label for="title">Seleccione zona:</label>
                            <select name="zona" id="zona" class="form-control" style="width:" required="">
                            </select>

                            <label for="title">Seleccione vereda:</label>
                            <select name="vereda" id="vereda" class="form-control" style="width:" required="">
                            </select>

                            <label for="title">Seleccione sector :</label>
                            <select name="codigo_sector" id="sector" class="form-control" style="width:" required="">
                            </select>
                        </div>

                    </div>

                    <div class="titulo_informacion">
                        <h4>* </h4>
                    </div>






                    <!--/*===========================
               
                ============================ */ ---->
                    <div class="pull-right ">


                        <button type="button" class="botones_censo_cancelar"
                            onclick="location.href='{{ url('Hogar') }}'">CANCELAR</button>



                        <input type="submit" class="botones_censo_poblacional" value="GUARDAR Y CONTINUAR " id="boton"
                            class="btn btn-primary">


                    </div>


                    </form>





                    <br>
                    <br>


                    <!------------------>
                </div>
            </div>
        </div>
    </div>




    <!-- FIN FORMULARIO-->
</div>
<!--FIN Contenedor-->
</div>
<!--FIN col-md-9-->
</div>
<!--FIN container-->

</div>
</div>

<br>
<br>

<!--PIE DE PAGINA --->
<footer>

    <div class="container-footer-all">

        <div class="container-body">

            <div class="colum1">
                <h1>SISTEMA DE INFORMACIÓN POBLACIONAL MISAK - SIPEMP</h1>

                <img src="images/logo.png" alt="">

            </div>

            <div class="colum2">

                <h1>Contacto</h1>

                <div class="row2">
                    <img src="icon/smartphone.png">
                    <label>3217452529</label>
                </div>
                <div class="row2">
                    <img src="icon/contact.png">
                    <label>CabildoGuambia@gmail.com</label>
                </div>




            </div>

            <div class="colum3">

                <h1>Direccion</h1>

                <div class="row2">
                    <img src="icon/house.png">
                    <label>CARRERA 2 12 25-Silvia Cauca
                    </label>
                </div>

                <!-- <div class="row2">
                        <img src="icon/smartphone.png">
                        <label>+1-829-395-2064</label>
                    </div>-->



            </div>

        </div>

    </div>

    <div class="container-footer">
        <div class="footer">
            <div class="copyright">
                &copy;2020 Todos los Derechos Reservados | <a href="">Cabido de Guambia</a>
            </div>

            <div class="informacion1">
                <!-- <a href="">Informacion Compañia</a>--| <a href="">Privacion y Politica</a>--> | <a href="">©
                    Desarrollado: Ingeniero Fabian Aranda T - |Cabildo de Guambia</a>
            </div>
        </div>

    </div>

</footer>



<script type="text/javascript">
$('#departamento').change(function() {
    var departamentoID = $(this).val();
    if (departamentoID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-municipio-list')}}?codigo_departamento=" + departamentoID,
            success: function(res) {
                if (res) {
                    $("#municipio").empty();
                    $("#municipio").append('<option>Seleccione Municipio</option>');
                    $.each(res, function(key, value) {
                        $("#municipio").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#municipio").empty();
                }
            }
        });
    } else {
        $("#municipio").empty();
        $("#resguardo").empty();
    }
});


$('#municipio').on('change', function() {
    var municipioID = $(this).val();
    if (municipioID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-resguardo-list')}}?codigo_municipio=" + municipioID,
            success: function(res) {
                if (res) {
                    $("#resguardo").empty();
                    $("#resguardo").append('<option>Seleccione Resguardo </option>');
                    $.each(res, function(key, value) {
                        $("#resguardo").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#resguardo").empty();
                }
            }
        });
    } else {
        $("#resguardo").empty();
        $("#zona").empty();
    }

});


$('#resguardo').on('change', function() {
    var resguardoID = $(this).val();
    if (resguardoID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-zona-list')}}?codigo_resguardo=" + resguardoID,
            success: function(res) {
                if (res) {
                    $("#zona").empty();
                    $("#zona").append('<option>Seleccione Zona</option>');
                    $.each(res, function(key, value) {
                        $("#zona").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#zona").empty();
                }
            }
        });
    } else {
        $("#zona").empty();
        $("#vereda").empty();
    }

});

$('#zona').on('change', function() {
    var zonaID = $(this).val();
    if (zonaID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-vereda-list')}}?codigo_zona=" + zonaID,
            success: function(res) {
                if (res) {
                    $("#vereda").empty();
                    $("#vereda").append('<option>Seleccione Vereda</option>');
                    $.each(res, function(key, value) {
                        $("#vereda").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#vereda").empty();
                }
            }
        });
    } else {
        $("#vereda").empty();
        $("#sector").empty();
    }

});

$('#vereda').on('change', function() {
    var veredaID = $(this).val();
    if (veredaID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-sector-list')}}?codigo_vereda=" + veredaID,
            success: function(res) {
                if (res) {
                    $("#sector").empty();
                    $("#sector").append('<option>Seleccione Sector</option>');
                    $.each(res, function(key, value) {
                        $("#sector").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#sector").empty();
                }
            }
        });
    } else {
        $("#sector").empty();

    }

});
// buscar codigo vivienda
$(function() {
    $('#buscar').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            type: $(this).attr('method'),
            success: function(data) {
                console.log(data);
                Search();
            }
        })
    })
})
</script>

<script>
function Search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("q");
    filter = input.value.toUpperCase();
    table = document.getElementById("refresh");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>



<script type="text/javascript">
//--Modificación para disminuir lentitud de la página y disminuir las peticiones al servidor.
//PARA QUE APARESCAN LOS OBCIONES  CUANDO SELECCIONE  NO TENGO HIJOS ESTUDIANDO  EN LAS INSTITUICONES EDUCATIVAS DEL RESGUARDO
function showNoEstudiaResguardo() {
    var e = document.getElementById("ddNoEstudiaResguardo");
    var strUser = e.options[e.selectedIndex].value;
    if (strUser == 1) {
        //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
        $('#NoGustaQueEstudienGuambia').show();
        $('#NoGustaQueEstudienGuambia').css('visibility', 'visible');
        $('#ddNoEstudiaResguardoEscuela').css('display', 'block');

        //input ¿El problema de la deserción escolar    en nuestro pueblo Misak se debe a?
        $('#DesercionEscuela').show();
        $('#DesercionEscuela').css('visibility', 'visible');
        $('#ddNoEstudiaResguardoEscuela1').css('display', 'block');


    } else {
        //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
        $('#ddNoEstudiaResguardoEscuela :nth-child(0)').prop('selected', true);
        $('#NoGustaQueEstudienGuambia').hide();
        $('#NoGustaQueEstudienGuambia').css('visibility', 'hidden');
        $('#ddNoEstudiaResguardoEscuela').css('display', 'none');
        //input ¿El problema de la deserción escolar    en nuestro pueblo Misak se debe a?
        $('#ddNoEstudiaResguardoEscuela1 :nth-child(0)').prop('selected', true);
        $('#DesercionEscuela').hide();
        $('#DesercionEscuela').css('visibility', 'hidden');
        $('#ddNoEstudiaResguardoEscuela1').css('display', 'none');
    }
};


function showArmonizacion() {
    var e = document.getElementById("ddArmonizacion");
    var strUser = e.options[e.selectedIndex].value;
    if (strUser == 1) {
        //input ¿Hace rituales de armonización y de equilibrio como familia?
        $('#SiHaceArmonizacion').show();
        $('#SiHaceArmonizacion').css('visibility', 'visible');
        $('#ddSiHaceArmonizacion').css('display', 'block');

    } else {
        //input *Cada cuanto se hace a la armonizació
        $('#ddSiHaceArmonizacion :nth-child(1)').prop('selected', true);
        $('#SiHaceArmonizacion').hide();
        $('#SiHaceArmonizacion').css('visibility', 'hidden');
        $('#ddSiHaceArmonizacion').css('display', 'none');

    }
};
</script>




<script>
function pageLoad() {
    //--Modificación para disminuir lentitud de la página y disminuir las peticiones al servidor.

    showNoEstudiaResguardo();

}
</script>


<script type="text/javascript">
$('#Hogar').submit(function(e) {
    e.preventDefault(); //cancelar el envio
    var url = $("#Hogar").attr('action');
    var type = $("#Hogar").attr('method');
    $.ajax({
        type: type,
        url: base + '/' + url,
        data: $('#Hogar').serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.validate) {
                Swal.fire(
                    'Exito',
                    'Se ha guardado con éxito ss',
                    'success'
                )
                //redireccion a vista con codigo correspondiente
                setTimeout(function() {
                    location.href = base + "/Nueva-Familia-Misak/" + response.id;
                }, 2000);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Se generó un error al guardar!',
                })
            }
        }
    })
})
</script>




@endsection