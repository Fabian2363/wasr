@extends('layouts.menu')

@section('content')
<link rel="stylesheet" href="css/estilos_pie_pagina_menu.css">
<!--\\\\\\\ contentpanel start\\\\\\-->



<link rel="stylesheet" href="css/estilos_pie_pagina.css">

<link href="./css/all.min.css" rel="stylesheet">


<link href="{{ asset('css/humano-el-estandar.css') }}" rel="stylesheet">
<link <!--\\\\\\\ contentpanel start\\\\\\-->

<main class="hg-bg-white">
    <div class="nano has-scrollbar">
        <div class="parallax nano-content" id="nano-content" tabindex="0" style="right: -17px;">

            <div id="pnlInicio" class="container">

                <link href="./Mi Cuenta_files/bootstrap-theme.css" rel="stylesheet" type="text/css" media="screen">

                <style type="text/css">
                .label-ubicacionpg_fb {
                    float: right;
                    height: auto;
                    font-weight: bold;
                    font-style: italic;
                    text-align: right;
                    padding: 10px 0px;
                    color: #888;
                }
                </style>


                <style type="text/css">
                .ctl00_MenuPrincipal_0 {
                    background-color: white;
                    visibility: hidden;
                    display: none;
                    position: absolute;
                    left: 0px;
                    top: 0px;
                }

                .ctl00_MenuPrincipal_1 {
                    text-decoration: none;
                }

                .ctl00_MenuPrincipal_2 {
                    border-color: #E6E6E6;
                }

                .ctl00_MenuPrincipal_3 {
                    border-style: none;
                }

                .ctl00_MenuPrincipal_4 {
                    padding: 0px 7px 0px 7px;
                }

                .ctl00_MenuPrincipal_5 {
                    border-style: none;
                }

                .ctl00_MenuPrincipal_6 {
                    width: 100%;
                    padding: 0px 0px 0px 0px;
                }

                .ctl00_MenuPrincipal_7 {
                    border-color: #CCCCCC;
                    border-width: 1px;
                    border-style: solid;
                }

                .ctl00_MenuPrincipal_8 {}

                .ctl00_MenuPrincipal_9 {}

                .ctl00_MenuPrincipal_10 {
                    border-style: none;
                }

                .ctl00_MenuPrincipal_11 {
                    padding: 0px 7px 0px 7px;
                }

                .ctl00_MenuPrincipal_12 {
                    border-style: none;
                }

                .ctl00_MenuPrincipal_13 {
                    width: 100%;
                    padding: 0px 0px 0px 0px;
                }
                </style>
                </head>

                <body id="ctl00_masterpageBody" class="LimpiarBody">

                    <script src="./Mi Cuenta_files/jquery-1.9.1.js.descarga" type="text/javascript"></script>
                    <script src="./Mi Cuenta_files/bootstrap.min.js.descarga" type="text/javascript"></script>
                    <script type="text/javascript" src="./Mi Cuenta_files/jquery-1.3.1.min.js.descarga"></script>
                    <script type="text/javascript" src="./Mi Cuenta_files/jqModal.js.descarga"></script>


                    <div id="modalError" onclick="modalErrorOcultar()">
                        <div id="modalErrorContenido">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="modalErrorTitulo">
                                        Valide Información
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div id="modalErrorIcon">
                                        <i class="icon-remove-sign icon-4x"></i>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div id="modalErrorListaCampos"></div>
                                </div>
                            </div>
                            <div class="row" id="modalErrorBotones">
                                <div class="col-lg-10">
                                </div>
                                <div class="col-lg-2">
                                    <input type="button" value="Cerrar" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>


                    <style>
                    #modalError {
                        display: none;
                        width: 100%;
                        height: 100%;
                        position: fixed;
                        background-color: rgba(56, 52, 44, 0.9);
                        top: 0;
                        left: 0;
                        z-index: 9999;
                    }

                    #modalErrorContenido {
                        width: 45%;
                        min-height: 150px;
                        margin: 140px auto;
                        background-color: white;
                        border-radius: 10px !important;
                        font-size: medium;
                        padding: 10px;
                        color: #808080;
                    }

                    #modalErrorTitulo {
                        width: 100%;
                        border-bottom-style: solid;
                        border-bottom-color: #808080;
                        color: #808080;
                        padding-bottom: 5px;
                        font-size: 15px;
                    }

                    #modalErrorIcon {
                        width: 20%;
                        float: left;
                        margin: 15px;
                    }

                    #modalErrorListaCampos {
                        width: 70%;
                        font-size: small;
                        color: #808080;
                        margin-top: 15px;
                        float: left;
                    }

                    #modalErrorBotones {
                        padding: 5px;
                    }
                    </style>




                    <div id="modalSuccess" onclick="modalSuccessOcultar()">
                        <div id="modalSuccessContenido">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="modalSuccessTitulo">
                                        Acción Realizada
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div id="modalSuccessIcon">
                                        <i class="icon-ok-sign icon-4x"></i>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div id="modalSuccessListaCampos"></div>
                                </div>
                            </div>
                            <div class="row" id="modalSuccessBotones">
                                <div class="col-lg-10">
                                </div>
                                <div class="col-lg-2">
                                    <input type="button" value="Cerrar" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                    function mostrarModalSuccess() {
                        $("#modalSuccess").css('display', 'block');
                        setTimeout(function() {
                            modalSuccessOcultar();
                        }, 3000);
                    }

                    function modalSuccessOcultar() {
                        $("#modalSuccess").css('display', 'none');
                    }
                    </script>
                    <style>
                    #modalSuccess {
                        display: none;
                        width: 100%;
                        height: 100%;
                        position: fixed;
                        background-color: rgba(56, 52, 44, 0.9);
                        top: 0;
                        left: 0;
                        z-index: 9999;
                    }

                    #modalSuccessContenido {
                        width: 45%;
                        min-height: 150px;
                        margin: 140px auto;
                        background-color: white;
                        border-radius: 10px !important;
                        font-size: medium;
                        padding: 10px;
                        color: #808080;
                    }

                    #modalSuccessTitulo {
                        width: 100%;
                        border-bottom-style: solid;
                        border-bottom-color: #808080;
                        color: #808080;
                        padding-bottom: 5px;
                        font-size: 15px;
                    }

                    #modalSuccessIcon {
                        width: 20%;
                        float: left;
                        margin: 15px;
                    }

                    #modalSuccessListaCampos {
                        width: 70%;
                        font-size: small;
                        color: #808080;
                        margin-top: 15px;
                        float: left;
                    }

                    #modalSuccessBotones {
                        padding: 5px;
                        /*border-top:1px solid #808080;*/
                    }


               
}
.contenedor {
  width: 90%;
  height: 100%;
  position: relative;
  max-width: 1000px;
  margin: auto;
 
}
.widget {
  width: 60%;
  height: 40%;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
}
.widget p {
  display: inline-block;
  line-height: 1em;
}
.fecha {
  font-family: arial;
  text-align: center;
  font-size: 1.5em;
  margin-bottom: 5px;
  background: rgb(67 70 167 / 50%);
  padding: 20px;
  width: 100%;
}
.reloj {
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
  width: 100%;
  padding: 20px;
  font-size: 4em;
  text-align: center;
  background: rgb(11 77 97 / 48%);
}
.reloj .cajaSegundos {
  display: inline-block;  
}
.reloj .ampm, .reloj .segundos{
  display: block;
  font-size: 2rem;
}
                    </style>

<script type="text/javascript">
$(function(){
  var actualizarHora = function(){
    var fecha = new Date(),
        hora = fecha.getHours(),
        minutos = fecha.getMinutes(),
        segundos = fecha.getSeconds(),
        diaSemana = fecha.getDay(),
        dia = fecha.getDate(),
        mes = fecha.getMonth(),
        anio = fecha.getFullYear(),
        ampm;
    
    var $pHoras = $("#horas"),
        $pSegundos = $("#segundos"),
        $pMinutos = $("#minutos"),
        $pAMPM = $("#ampm"),
        $pDiaSemana = $("#diaSemana"),
        $pDia = $("#dia"),
        $pMes = $("#mes"),
        $pAnio = $("#anio");
    var semana = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
    var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    
    $pDiaSemana.text(semana[diaSemana]);
    $pDia.text(dia);
    $pMes.text(meses[mes]);
    $pAnio.text(anio);
    if(hora>=12){
      hora = hora - 12;
      ampm = "PM";
    }else{
      ampm = "AM";
    }
    if(hora == 0){
      hora = 12;
    }
    if(hora<10){$pHoras.text("0"+hora)}else{$pHoras.text(hora)};
    if(minutos<10){$pMinutos.text("0"+minutos)}else{$pMinutos.text(minutos)};
    if(segundos<10){$pSegundos.text("0"+segundos)}else{$pSegundos.text(segundos)};
    $pAMPM.text(ampm);
    
  };
  
  
  actualizarHora();
  var intervalo = setInterval(actualizarHora,1000);
});
</script>

                    <form name="aspnetForm" method="post"
                        action="" id="aspnetForm">
                        <div>
                            <input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="">
                            <input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="">






                            <div>

                                <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR"
                                    value="726D6C56">
                            </div>

                            <div style="width: 1000px; margin: 0 auto 12px;">
                                <span id="ctl00_lblPauta"></span>
                            </div>

     

                            <div class="section   n1">
                                <div class="container">
                                    <div id="ctl00_DvFondoGrisSuperiosHp" class="DvFondoSuperiorResto">
                                        <div id="ctl00_DvRuta" class="breadcrumb noPrint" style="margin-top: 15px;">
                                            <span id="ctl00_lblUbicacion" class="breadcrumb noPrint">Usted se encuentra
                                                en: &nbsp;&nbsp;Inicio &gt; <font color="#666666">Datos Básicos</font>
                                                </span>
                                        </div>


                                        <div id="ctl00_dvContenido">



                                            <style type="text/css">
                                            .modal.in {
                                                width: 550px !important;
                                                height: 550px !important;
                                            }

                                            .cssAnuncio,
                                            .close {
                                                position: absolute;
                                                top: 0;
                                                right: 0;
                                            }
                                           .n1{
                                             margin-top:-100px;
                                           }
                                            .close {
                                                top: 2px;
                                                right: 5px;
                                                z-index: 100;
                                            }

                                            .mdlAnnounce-body {
                                                padding: 5px;
                                                width: 480px !important;
                                                height: 480px !important;
                                            }

                                            .mdlAnnounce-content {
                                                width: 500px !important;
                                                height: 500px !important;
                                            }

                                            .mdlAnnounce.fade.in {
                                                padding: 5px;
                                                width: 500px !important;
                                                height: 500px !important;
                                                margin: 0, 0, 0, 0;
                                            }

                                            .mdlAnnounce-dialog {
                                                padding: 10px;
                                                width: 500px !important;
                                                height: 500px !important;
                                            }
                                            </style>



                                            <style>
                                            .ui-autocomplete {
                                                max-height: 100px;
                                                overflow-y: auto;
                                                /* prevent horizontal scrollbar */
                                                overflow-x: hidden;
                                            }

                                            /* IE 6 doesn't support max-height
	     * we use height instead, but this forces the menu to always be this tall
	     */
                                            * html .ui-autocomplete {
                                                height: 100px;
                                            }

                                            .ui-helper-hidden-accessible {
                                                display: none;
                                            }
                                            </style>

                                            <div id="overlay" class="modalWaitExternal" style="display: none;">
                                                <div id="modalWaitInternal">
                                                    <img id="modalWaitImg" width="60px" height="60px"
                                                        src="./Mi Cuenta_files/wait.gi" alt="">
                                                </div>
                                            </div>
                                            <style>
                                            #overlay {
                                                width: 100%;
                                                height: 100%;
                                                position: fixed;
                                                background-color: rgba(56, 52, 44, 0.7);
                                                top: 0;
                                                left: 0;
                                                z-index: 9999;
                                                margin: 0;
                                            }

                                            #modalWaitInternal {
                                                margin-top: 20%;
                                                margin-left: 50%;
                                            }

                                            .contenedor_1´ {
                                                margin-top: -4000px;
                                            }

                                            .n2{
                                              margin-top:-90px;
                                            }
                                            </style>



                                            <div id="ctl00_ContenidoPanel_dvcontenido " class="">

                                                <div class="modal" id="dialogLogin" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <input type="submit"
                                                                    name="ctl00$ContenidoPanel$ImgCerrar" value="×"
                                                                    id="ctl00_ContenidoPanel_ImgCerrar" title="Cerrar"
                                                                    class="close">
                                                                <h4 class="modal-title">Importante</h4>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div id="ctl00_ContenidoPanel_overHVMensaje">



                                                                    <div id="ctl00_ContenidoPanel_pnlMensajeIncompleta">

                                                                        <p>
                                                                            <strong>ATENCIÓN: </strong>
                                                                            Su hoja de vida está incompleta. Le
                                                                            invitamos a diligenciar la información
                                                                            pendiente para poder consultar oportunidades
                                                                            laborales según su perfil.
                                                                            Si tiene dificultades en el diligenciamiento
                                                                            por favor contáctese con su Prestador.
                                                                        </p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

<!--
                                                                <a id="ctl00_ContenidoPanel_btnHV"
                                                                    title="Completar Hoja de Vida"
                                                                    class="btn btn-success pull-right"
                                                                    href="javascript:__doPostBack(&#39;ctl00$ContenidoPanel$btnHV&#39;,&#39;&#39;)">Completar
                                                                    Hoja de Vida</a>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input name="ctl00$ContenidoPanel$hdnDialogShowId" type="hidden"
                                                    id="ctl00_ContenidoPanel_hdnDialogShowId" class="hdnDialogShowId"
                                                    value="dialogLogin">

                                                <div class="section">
                                                    <div class="container n2">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                                <div id="ctl00_ContenidoPanel_DIVAlert"
                                                                    class="col-md-12 col-sm-12 col-xs-12  contenedor_1">
                                                                    <div id="ctl00_ContenidoPanel_TextoAlerta"
                                                                        class="alert alert-warning">
                                                                        <div id="ctl00_ContenidoPanel_DIVAlertInf">
                                                                        </div>

                                                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                                                            <span id="ctl00_ContenidoPanel_lblAlert"
                                                                                class="LblAlert"><i
                                                                                    class="icon-warning-sign icon-2x"></i>
                                                                                <strong>ATENCIÓN:</strong>Le invitamos a
                                                                                diligenciar la información pendiente en actilizar mi Informacion. Si
                                                                           tiene dificultades en el
                                                                                diligenciamiento contáctese con  Espiral  de Educacion Area Estaditica Y Sistemas.</span>
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                                                           <!-- <input type="submit"
                                                                                name="ctl00$ContenidoPanel$Button1"
                                                                                value="Completar mi Hoja de Vida"
                                                                                id="ctl00_ContenidoPanel_Button1"
                                                                                class="btn  btn-success pull-right">-->
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                                    <div class="col-md-3 col-sm-4 col-xs-12 datos_user">
                                                                        <h1>Bienvenido(a):</h1>
                                                                        <h2>
                                                                            <span
                                                                                id="ctl00_ContenidoPanel_lblNombreyApe">{{ Auth::user()->name}}-{{ Auth::user()->apellidos}}</span>
                                                                        </h2>
                                                                       <!-- <h3>Hoja de vida <strong>70 %</strong> completa
                                                                        </h3>
                                                                        <div class="progress">
                                                                            <div id="Celda1"
                                                                                class="progress-bar progress-bar-success"
                                                                                style="width:70%;"></div>
                                                                        </div>-->

                                                                        <input type=""
                                                                            name="ctl00$ContenidoPanel$Button2"
                                                                            value="Sistema de Informacion Talento Humano"
                                                                            id=""
                                                                            class="btn btn-primary btn-sm btn-block">
                                                                        <ul class="list-group lista-cuenta">
                                                                            <li class="first"><a
                                                                                    href="#">Mi
                                                                                    Cuenta</a></li>

                                                                             <li class="list-group-item">
                                                                                <a id="ctl00_ContenidoPanel_HyperLink4"
                                                                                    href="{{ url('Informacion_talento_humano') }}">Ver mi informacion en SITH </a>
                                                                                    
                                                                            </li>       
                                                                            <li class="list-group-item">
                                                                                <a id="ctl00_ContenidoPanel_HyperLink4"
                                                                                    href=" {{ url('Actualizacion-informacion-talento-humano') }}">Actualizar mi información </a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <a id="ctl00_ContenidoPanel_HyperLink5"
                                                                                    href=" {{ url('Consultar_Contratos') }}">Ver mis contratos laborales</a>
                                                                            </li>
                                                                            
                                                                            <li class="list-group-item">
                                                                                <a id="ctl00_ContenidoPanel_HyperLink10"
                                                                                    href="">Términos
                                                                                    y Condiciones</a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                            <a href=""> <i
                                        class="fa fa-eye" aria-hidden="true"></i>
                                   
                                </a>
                                                            
                                                                            </li>

                                                                                        </ul>

                                                                    </div>
                                                                    <div
                                                                        class="col-md-9 col-sm-8 col-xs-12 buscador_datos datos_user" >

                                                                        <div
                                                                            class="col-md-6 col-sm-12 col-xs-12 sinpadding">
                                                                            <div class="palabra table-responsive">
                                                                                <p style="color: #5F6A6A">
                                                                                </p>
                                                                                <p></p>
                                                                                <table
                                                                                    class="table table-striped table-condensed">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th>Número documento: </th>
                                                                                            <td>
                                                                                                <span
                                                                                                    id="ctl00_ContenidoPanel_lblCedula">{{ Auth::user()->cedula }}</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Nombre:</th>
                                                                                            <td>
                                                                                                <span
                                                                                                    id="ctl00_ContenidoPanel_lblNom">{{ Auth::user()->name}}{{ Auth::user()->apellidos }}</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Correo:</th>
                                                                                            <td>
                                                                                                <span
                                                                                                    id="ctl00_ContenidoPanel_lblemail">{{ Auth::user()->email}}</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Fecha de nacimiento:
                                                                                            </th>
                                                                                            <td>
                                                                                                <span
                                                                                                    id="ctl00_ContenidoPanel_lblFecNacimiento">10
                                                                                                    de Octubre
                                                                                                    1994</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Canal de registro:</th>
                                                                                            <td>
                                                                                                <span
                                                                                                    id="ctl00_ContenidoPanel_lblCanalRegistro">Autoregistro</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Última actualización de SITH:
                                                                                            </th>

                                                                                            <td>
                                                                                                <span
                                                                                                    id="ctl00_ContenidoPanel_lblFechaUlt">16
                                                                                                    Agosto de  2021</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Operador:</th>
                                                                                            <td>
                                                                                                <span
                                                                                                    id="ctl00_ContenidoPanel_lblPrestador">CABILDO DE GUAMBIA-ESPIRAL DE EDUCACION</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Punto de atención:</th>
                                                                                            <td>
                                                                                                <span
                                                                                                    id="ctl00_ContenidoPanel_lblPuntoAtencion">----</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <a id="ctl00_ContenidoPanel_HyperLink1"
                                                                                    class="btn btn-primary"
                                                                                    href="">Ver
                                                                                    mi Hoja de Vida</a>

                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="col-md-6 col-sm-12 col-xs-12 buscando_codigo">
                                                                            <div>
                                                                                
                                                                                <div class="contenedor">
  <div class="widget">
    <div class="fecha">
      <p id="diaSemana" class="diaSemana"></p>
      <p id="dia" class="dia"></p>
      <p>de</p>
      <p id="mes" class="mes"></p>
      <p>del</p>
      <p id="anio" class="anio"></p>
    </div>
    <div class="reloj">
      <p id="horas" class="horas"></p>
      <p>:</p>
      <p id="minutos" class="minutos"></p>
      <p>:</p>
      <div class="cajaSegundos">
        <p id="ampm" class="ampm"></p>
        <p id="segundos" class="segundos"></p>
      </div>
    </div>
  </div>
</div>

                                                                                

                                                                               
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            
                                                                        </div>

                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>

jj
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                            <div id="ctl00_ContenidoPanel_up4">






                                            </div>
                                            <!-- Modal -->
                                            <div class="modal" id="ModalCenter" tabindex="-1" role="dialog"
                                                aria-labelledby="ModalCenterTitle" aria-hidden="true">
                                                <div class="mdlAnnounce-dialog">
                                                    <div class="mdlAnnounce-content">
                                                        <div class="mdlAnnounce-body" style="align-content:center">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <a href="https://personas.serviciodeempleo.gov.co/Postulante/HV_InfoBasica.aspx"
                                                                style="cursor:pointer"><img id="imagenAnuncio"
                                                                    class="cssAnuncio"
                                                                    src="./Mi Cuenta_files/AnuncioOferente.png"
                                                                    alt="imagen" style="width:100%;height:100%"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="clearifix"></div>

                            <div id="ctl00_divPie">

                                <div class="clearifix"></div>
                                <div class="section pie">
                                    <div class="container ">
                                        <!-- <div class="row">
                        <div class="mejores-oportunidades col-xs-12 col-sm-12 col-md-2">
                            <img id="ctl00_Image1" src="./Mi Cuenta_files/Screenshot_8.png" style="width:100%;border-width:0px;">
                    
                        </div>
                        <div class="sist-info col-xs-12 col-sm-12 col-md-5">
                            <span style="font-weight: bold; color: #151515;">S</span>ISTEMA DE 
                        <span style="font-weight: bold; color: #151515;">I</span>NFORMACIÓN DEL 
                        <span style="font-weight: bold; color: #151515;">S</span>ERVICIO DE 
                        <span style="font-weight: bold; color: #151515;">E</span>MPLEO
                        </div>
                        <div class="unidad-admin col-xs-12 col-sm-12 col-md-3">
                            
                        </div>
                        <div class="col-md-3 col-md-offset-0 col-xs-12 col-sm-6 col-sm-offset-3 ">
                            <img src="./Mi Cuenta_files/logos-footer-new-templates.jpg" alt="Ministerio del Trabajo. Todos por un nuevo país. Paz, Equidad, Educación" width="100%">
                        </div>

                    </div>-->
                                    </div>


                                </div>
                            </div>
                            -->


                    </form>





                </body>
                <!--------------------------->

            </div>
            <!--/tab-content-->
        </div>
        <!--/block-web-->
    </div>
    <!--/col-md-8-->
    </div>
    <!--/row-->
    </div>
    </div>
    <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
    </div>
    <!--\\\\\\\ inner end\\\\\\-->
    </div>
    <!--\\\\\\\ wrapper end\\\\\\-->


    @endsection