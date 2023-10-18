@extends('layouts.menu')
@section('content')

<!--\\\\\\\Informacion donde esta ubicado dentro del sistema  \\\\\\-->
<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>Familia</h1>
            <h2 class="">Informacion General</h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Administrador</a></li>
                <li class="active">Administrador hoa</li>
            </ol>
        </div>
    </div>
    <!--fin  Informacion donde esta ubicado dentro del sistema-->

    <!---///////////FORMULARIO  ////////////////---->

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

    <!-- FIN -->

    <!-- INICIO DE  CODIGO DE FORMULARIO -->

    <strong>

        <body>

            <div class="nivel_progeso">
                <div class="iformacion_progeso">
                    Informacion
                </div>
                Misak
                <label><span class="asterisco">*</span>Necesita Ayuda?</label>
                <!-- opcion para agregar miebros de de la familia si es cabeza de hogar-->

                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target=".bd-example-modal-sm">SI</button>
            </div>
            <!--//Fin Nivel de Progreso//-->

            <div class="contenedor">
                <!-- iformacion donde se enuentra  -->
                <div style="margin-top: 15px;">
                    <span class="breadcrumb noPrint">Usted se encuentra en: &nbsp;&nbsp;Censo Poblacional de Habitantes
                        Misak &gt; <font color=" #666666">Información General</font> </span>
                </div><!-- fin   -->
                <!-- Contenedor_informacion persona-->
                <div class="contenedor_formulario_encuentas">

                    <div class="card">
                        <div class="card-header">Informacion Habitante</div>

                        <div class="card-body">
                            <!-- ///FORMULARIO////     -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="alert alert-success" role="alert">
                                        <p><strong>N° Documento::</strong> {{ $personas->id }}</p>
                                        <p><strong>Tipo ID::</strong> {{ $personas->tipo_identificacion}}</p>
                                        <p><strong>Nombres::</strong> {{ $personas->nombres}}</p>
                                        <p><strong>Apellidos::</strong> {{ $personas->apellidos}}</p>
                                        <p><strong>Genero::</strong> {{ $personas->sexo}}</p>
                                        <p><strong>Estado Civil::</strong> {{ $personas->estado_civil}}</p>
                                        <p><strong>Fecha Nacimiento::</strong> {{ $personas->fecha_nacimiento}}</p>
                                        <p><strong>Edad Actual::</strong> {{ $personas->edad_actual}}</p>
                                    </div>


                                </div>
                                <!--FIN  col-md-6-->
                                <div class="col-md-6">

                                    <div class="alert alert-success" role="alert">
                                        <p><strong>Parentesco::</strong> {{ $personas->parentesco}}</p>
                                        <p><strong>Nivel Academico::</strong> {{ $personas->nivel_academico }}</p>
                                        <p><strong>Carnet Salud::</strong> {{ $personas->carnet_salud}}</p>
                                        <p><strong>Codigo Hogar::</strong> {{ $personas->codigo_hogar}}</p>
                                        <p><strong>Telefono ::</strong> {{ $personas->telefono}}</p>
                                        <p><strong>Profesion::</strong> {{ $personas->codigo_profesion}}</p>
                                        <p><strong> Fecha Censo::</strong> {{ $personas->fecha_censo}}</p>
                                        <p><strong> </strong> </p>
                                        <p><strong>'</strong> </p>
                                    </div>
                                </div>
                                <!--FIN  col-md-6-->
                                <div class="titulo_de_formulaario"></div>

                            </div>
                            <button type="button" class="btn btn-danger"
                                onclick="location.href='{{ url('familia_persona') }}'">Cancelar</button>

                        </div>
                    </div><!-- ///fin Contenedor_informacion persona    -->



                    @endsection