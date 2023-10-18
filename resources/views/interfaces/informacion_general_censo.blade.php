<!DOCTYPE html PUBLIC "">
<html xmlns="">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Misak</title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">


    <!--\\\\\\\ estilos css \\\\\\-->
    <link href="css/admin.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!--///////////Estilos formularios////////////////--->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link rel="stylesheet" href="/css/estilo_formulario.css" type="text/css" media="all">
    <link href="/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="light_theme  fixed_header left_nav_fixed" background="">
    <div class="wrapper">
        <!--\\\\\\\ wrapper Start \\\\\\-->
        <div class="header_bar">
            <!--\\\\\\\ header Start \\\\\\->
    <div class="brand">
      <!-\\\\\\\ brand Start \\\\\\--
      <div class="logo" style="display:block"><span class="theme_color">ULTIMO</span> Admin</div>
      <div class="small_logo" style="display:none"><img src="images/s-logo.png" width="50" height="47" alt="s-logo" /> <img src="images/r-logo.png" width="122" height="20" alt="r-logo" /></div>
    </div>--->
            <!--\\\\\\\ brand end \\\\\\-->
            <div class="header_top_bar">
                <!--\\\\\\\ header top bar start \\\\\\-->
                <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>

                <img src="images/logo.png" width="190" class="bandera_img">

                <div class="top_right_bar">
                    <div class="top_right">
                        <div class="top_right_menu">
                            <ul>
                                <li class="dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"> noti<span
                                            class="badge badge color_2">6</span> </a>
                                    <div class="notification_drop_down dropdown-menu">
                                        <div class="top_pointer"></div>
                                        <div class="box"> <a href="inbox.html"> <span class="block primery_6"> <i
                                                        class="fa fa-envelope-o"></i> </span> <span
                                                    class="block_text">Mailbox</span> </a> </div>
                                        <div class="box"> <a href="calendar.html"> <span class="block primery_2"> <i
                                                        class="fa fa-calendar-o"></i> </span> <span
                                                    class="block_text">Calendar</span> </a> </div>
                                        <div class="box"> <a href="maps.html"> <span class="block primery_4"> <i
                                                        class="fa fa-map-marker"></i> </span> <span
                                                    class="block_text">Map</span> </a> </div>
                                        <div class="box"> <a href="todo.html"> <span class="block primery_3"> <i
                                                        class="fa fa-plane"></i> </span> <span
                                                    class="block_text">To-Do</span> </a> </div>
                                        <div class="box"> <a href="task.html"> <span class="block primery_5"> <i
                                                        class="fa fa-picture-o"></i> </span> <span
                                                    class="block_text">Tasks</span> </a> </div>
                                        <div class="box"> <a href="timeline.html"> <span class="block primery_1"> <i
                                                        class="fa fa-clock-o"></i> </span> <span
                                                    class="block_text">Timeline</span> </a> </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--\\\\\\\  usuari login \\\\\\-->
                    <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img
                                src="images/shura.png" width="30" /><span class="user_adminname">
                                USUARIO:{{ Auth::user()->name }}</span> </a>
                        <ul class="dropdown-menu">
                            <div class="top_pointer"></div>
                            <li> <a href="profile.html"><i class="fa fa-user"></i>Usuario</a> </li>
                            <li> <a href="help.html"><i class="fa fa-question-circle"></i>Ayuda</a> </li>
                            <!--
            <li> <a href="settings.html"><i class="fa fa-cog"></i>  </a></li>
            -->
                            <li> <a class="fa  fa-power-off" href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"> SALIR</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                    <a href="javascript:;" class="toggle-menu menu-right push-body jPushMenuBtn rightbar-switch"></a>
                </div>
            </div>
            <!--\\\\\\\ header top bar end \\\\\\-->
        </div>
        <!--\\\\\\\ header end \\\\\\-->

        <div class="inner">
            <!--\\\\\\\ inner start \\\\\\-->
            <div class="left_nav">
                <!--\\\\\\\logo plataform \\\\\\-->
                <img src="images/logo-web.png" width="215" class="img-circle profile_img">

                <br>
                <br>
                <br>
                <div class="left_nav_slidebar">
                    <ul>
                        <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> MENU <span
                                    class="left_nav_pointer"></span> <span class="plus"><i
                                        class="fa fa-plus"></i></span> </a>
                            <!--  <ul>
              <li> <a href="index.html" class="left_nav_sub_active"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Dashboard</b> </a> </li>
              <li> <a href="settings.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Settings</b> </a> </li>
              <li> <a href="layouts.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Layouts</b> </a> </li>
              <li> <a href="themes.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Themes</b> </a> </li>
              <li> <a href="widgets.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Widgets</b> </a> </li>
              <li> <a href="animations.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Animations</b> </a> </li>
            </ul>-->
                        </li>
                        <li> <a href="javascript:void(0);"> <i class="fa fa-edit"></i> CENSO POBLACIONAL <span
                                    class="plus"><i class="fa fa-plus"></i></span></a>
                            <ul>
                                <li> <a href="#"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Nuevo Censo</b>
                                    </a> </li>
                                <li> <a href="buttons.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                        <b>Actualización</b> </a> </li>

                            </ul>
                        </li>
                        <li> <a href="javascript:void(0);"> <i class="fa fa-tasks"></i> CUNSULTA POBLACIONAL <span
                                    class="plus"><i class="fa fa-plus"></i></span></a>
                            <ul>
                                <li> <a href="components.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                        <b>Informacion Habitante</b> </a> </li>
                                <li> <a href="validation.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                        <b>Cultural</b> </a> </li>
                                <li> <a href="multi-upload.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                        <b>Familiar</b> </a> </li>
                                <li> <a href="other-forms.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                        <b>Vivienda</b> </a> </li>
                            </ul>
                        </li>
                        <li> <a href="javascript:void(0);"> <i class="fa fa-users icon"></i> INFORMACIÓN GENERAL <span
                                    class="plus"><i class="fa fa-plus"></i></span> </a>
                            <ul class="opened" style="display:block">
                                <li> <a href="Censo_General"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                        <b>Habitantes</b> </a> </li>
                                <li> <a href="task.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                        <b>Familia</b> </a> </li>
                                <li> <a href="notes.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                        <b>Cultural</b> </a> </li>
                                <li> <a href="media.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Otros</b>
                                    </a> </li>



                            </ul>
                        </li>

                    </ul>
                </div>
            </div>


            <!--\\\\\\\left_nav end \\\\\\-->
            <div class="contentpanel">
                <!--\\\\\\\ contentpanel start\\\\\\-->
                <div class="pull-left breadcrumb_admin clear_both">
                    <div class="pull-left page_title theme_color">
                        <h1>Administrador</h1>
                        <h2 class="">Inicio</h2>
                    </div>
                    <div class="pull-right">
                        <ol class="breadcrumb">
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Administrador</a></li>
                            <li class="active">Administrador</li>
                        </ol>
                    </div>
                </div>

                <!------->

                <div class="row">
                    <div class="col-md-12">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i
                                            class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i
                                            class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i
                                            class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Censo General</h3>
                            </div>
                            <div class="porlets-content">
                                <div class="adv-table editable-table ">
                                    <div class="clearfix">
                                        <div class="btn-group">



                                            <form id="" class="form_cunsulta" name="form" action="/Censo_General"
                                                method="POST" role="Censo_General" class="pocicion_formulario">
                                                {{ csrf_field() }}
                                                <div id="consulta_externa">
                                                    <label>Seleccione el año a Generar:</label><br>

                                                    <!--	<input  id="nuip" name="q" class="form-control"  placeholder="Digíte el número sin puntos ni comas" title="El nùmero de cèdula debe ser de 2 a 10 dígitos" value="{{ Auth::user()->id_persona}}" style="width: 160px"  style=""> -->

                                                    <select id="nuip" name="q" class="form-control"
                                                        placeholder="Digíte el número sin puntos ni comas"
                                                        title="El nùmero de cèdula debe ser de 2 a 10 dígitos"
                                                        value="{{ Auth::user()->id_persona}}" style="width: 160px"
                                                        style="">
                                                        <option value="" selected disabled>Selecione el Año</option>
                                                        <option value="2019">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>

                                                    </select>
                                                    <span class="animated fadeIn"></span>
                                                </div>
                                                <br>
                                                <div class="nobottommargin tright">
                                                    <input type="submit" id="boton" name="enviar"
                                                        value="Ver información " class="boton tab-linker btn-block"
                                                        style="width: 160px">
                                                </div>
                                            </form>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="btn-group pull-right">
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">Descargar <i
                                                    class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <!--<li><a href="#"></a></li>-->
                                                <li><a href="#">Guardar como PDF</a></li>
                                                <li><a href="#">Exportar en Excel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="margin-top-10 table-responsive"></div>

                                    <div class="table-responsive">
                                        @if(isset($details))
                                        <h4>La Información del censo poblacional del Resguardo de Guambia vigencia <b>
                                                {{ $query }} </b> son:</h4>
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
                                                @foreach($details as $persona)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$persona-> fecha_censo }}</td>
                                                    <td>{{$persona-> codigo_resguardo }}</td>
                                                    <td></td>
                                                    <td>{{$persona-> codigo_hogar }}</td>
                                                    <td>{{$persona-> tipo_identificacion }}</td>
                                                    <td>{{$persona-> id }}</td>
                                                    <td>{{$persona-> nombres }}</td>
                                                    <td>{{$persona-> apellidos }}</td>
                                                    <td>{{$persona-> fecha_nacimiento }}</td>
                                                    <td>{{$persona-> parentesco }}</td>
                                                    <td>{{$persona-> sexo  }}</td>
                                                    <td>{{$persona-> estado_civil }}</td>
                                                    <td>{{$persona-> codigo_profesion}}</td>
                                                    <td>{{$persona-> nivel_academico }}</td>
                                                    <td>{{$persona-> integrantes }}</td>
                                                    <td>{{$persona-> nombre_vereda }}</td>
                                                    <td>{{$persona-> telefono  }}</td>
                                                    <td></td>
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

                    </div>
                    <!--/porlets-content-->
                </div>
                <!--/block-web-->
            </div>
            <!--/col-md-12-->
        </div>
        <!--/row-->



















        <script src="js/jquery-2.1.0.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/common-script.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>
        <script src="plugins/data-tables/jquery.dataTables.js"></script>
        <script src="plugins/data-tables/DT_bootstrap.js"></script>
        <script src="plugins/data-tables/dynamic_table_init.js"></script>
        <script src="plugins/edit-table/edit-table.js"></script>
        <script>
        jQuery(document).ready(function() {
            EditableTable.init();
        });
        </script>

        <script src="js/jPushMenu.js"></script>
        <script src="js/side-chats.js"></script>

</body>

</html>