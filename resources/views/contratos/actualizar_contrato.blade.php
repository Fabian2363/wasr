@extends('layouts.menu2')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/css/estilos_pie_pagina.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-------///////////selecc bootstrap abilita si es necesario //////////--------
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <!------////////////////------>
   <!------//////// select selct2 abilita si es necesario  ////////------>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" />

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="/js/sweetalert2@9.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" />
<link rel="stylesheet" href="css/estilos_pie_pagina.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="/js/sweetalert2@9.js"></script>


<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Wasr</title>
   
    <link href="{{ asset('/blade_wasr/layout.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/blade_wasr/MyResume.css') }}" rel="stylesheet">
    

<body  data-spy="scroll" data-target=".tooltip-advice-notification" onload="patternSmart();">
   
    <meta itemprop="isFamilyFriendly" content="true">

<iframe allow="join-ad-interest-group" data-tagging-id="AW-1010759038" data-load-time="1695179195142" height="0" width="0" style="display: none; visibility: hidden;" src="./blade_wasr/1010759038.html"></iframe><div class="container">
 
<hr class="hidden-xs hidden-sm">
<!--
|--------------------------------------------------------------------------
| 		Inicio  de informacion lateral,
|--------------------------------------------------------------------------
|
-->
<div class="myresume-wrapper js-myresume-wrapper ">
  <div class="myresume-info hidden-xs hidden-sm">
      <div class="myresume-info-content">
          <div class="hidden-xs hidden-sm toggle-column-wrapper">
              
              <a class="close-column js-toggle-column" href="">
               Wasr
                  <i class="fa fa-arrow-left icon-toggle-arrow"></i>
              </a>
          </div>

          <h2 class="welcome-text js-welcome-text">
             Ingresar contrato de  {{$datos->nombres}}-{{$datos->	apellidos}} en wast  
          </h2>

          
          <div class="ups-text-resume-state">
              <img class="js-resume-ups-text-img-desktop" src="./blade_wasr/proceso.jpg" alt="¡Procesos de la Misak Educación !" title="¡Procesos de la Misak Educación !" width="auto" height="25">
          </div>

        
        
<!--
          <ul class="info-anchors js-professional-info-module">
              <i class="fa fa-book icon-book"></i>
         
              <li class="anchor-item js-profesional-profile-module-menu">
                  <a href="" datalayertag="">
                      Describe tu perfil laboral
                  </a>

                  <a class="btn btn-sm info-actions js-anchor-jobs btn-info" href="" datalayertag="">
                      <i class="fa fa-pencil"></i>
                      <span>
                          Editar
                      </span>
                  </a>
              </li>
                  <li class="anchor-item">
                      <a href="" datalayertag="">
                          Tu experiencia laboral mmmm
                      </a>

                      <a class="btn btn-sm info-actions js-anchor-laboral-experience btn-info" href="" datalayertag="">
                          <i class="fa fa-pencil"></i>
                          <span>
                              Editar
                          </span>
                      </a>
                  </li>
                                <li class="anchor-item">
                      <a href="" datalayertag="">
                          Tu formación académica

                      </a>

                      <a class="btn btn-sm info-actions js-anchor-studies btn-info" href="" datalayertag="">
                          <i class="fa fa-pencil"></i>
                          <span>
                              Editar
                          </span>
                      </a>
                  </li>
          </ul>-->

  <div class="panel panel-default ee-mod ee-similar-offers-wrapper">
    <div class="panel-body panel-body-wrapper ee-mod">
      <h3 class="ee-mod">
__--
      </h3>
  </div>
  </div>
 </div>

    <div class="myresume-info-indicator">
      <div class="info-progress-collapsed">
        <i class="fa fa-book icon-book"></i>

        <span class="progress-number text-primary text-success">90%</span>

        <div class="progress progress-wrapper">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
              <span class="sr-only">0% Complete (warning)</span>
          </div>
        </div>
      </div>
    </div>
    </div><!--
        
    --><div class="myresume-modules">
    <div class="hidden-xs hidden-sm toggle-column-wrapper">
        
        <a class="open-column js-toggle-column" href="">
            <i class="fa fa-arrow-right icon-toggle-arrow"></i>
            Mostrar columna
        </a>
    </div>

   <div class="js-vip-module-wrapper hidden">


<div class="panel panel-default ee-vip-module ee-mod js-vip-module">
  <div class="panel-body">
    <div class="star-tape">
      <img class="img-responsive" src="./Mi hoja de vida – elempleo.com_files/icono-vip.png" width="40" height="40" alt="">
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9 col-lg-offset-3 col-lg-9">
        <h3 class="text-center vip-module-title">
          ¡Gana visibilidad con membresías Gold y Silver!

          <button class="close ee-mod js-vip-close" type="button" aria-label="Close">
            <span aria-hidden="true">
              ×
            </span>
          </button>
        </h3>

        <div class="row vip-module-desc">
          <div class="col-xs-12 col-sm-6">
            Tu hoja de vida aparecerá en un lugar preferencial en las búsquedas que realizan las empresas.
          </div>

          <div class="col-xs-12 col-sm-6">
            Tendrás acceso a una prueba de rasgos personales y a información salarial del mercado laboral.
          </div>
        </div>

        <div class="text-center">
          <a class="btn btn-secondary btn-vip" href="" type="button">
            Más Información Aqui
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!--
|--------------------------------------------------------------------------
| Fin de informacion lateral,
|--------------------------------------------------------------------------
|
-->

<!--
|--------------------------------------------------------------------------
|  MENU  INFORMACION  PERSONAL
|--------------------------------------------------------------------------
|
--

<div class="well resume-module module-personal-information" id="informacion-personal">
  <div class="js-box-personal-info">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-push-6 col-lg-5 col-lg-push-7">
        <div class="ups-text ups-text-visible js-ups-text hidden">
          <img src="./wasr/texto-ups-modulo-incompleto.svg" alt="¡Ups! ¡Completa esta sección!" title="¡Ups! ¡Completa esta sección!" width="auto" height="48">
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-sm-pull-6 col-lg-7 col-lg-pull-5">
        <h2 class="module-title title-edit cursor-pointer js-edit-form" datalayertag="Configuracion Perfil;Editar perfil - Tu informacion personal;Tu informacion personal">
          Tu información personal

          <a class="cta-edit js-btn-edit" href="">
            <i class="fa fa-pencil icon-edit" aria-hidden="true"></i>
            <div class="btn-help">
              <strong>
                Editar
              </strong>
            </div>
          </a>
        </h2>
      </div>
    </div>

    <div class="row module-flex-parent">
      <div class="col-xs-12 col-sm-4 col-sm-push-8">
        <div class="module-profile-photo">
    <div class="profile-photo-wrapper cursor-pointer js-edit-form" datalayertag="Configuracion Perfil;Editar perfil - Tu informacion personal;Foto">
        <img class="profile-photo js-profile-photo" src="./blade_wasr/1064436304_1_l.jpg" width="" height="" alt="" title="">
    </div>
    <div class="visible-xs-inline-block photo-requirements">
        <span class="caption">
            Cambia tu foto editando esta sección
        </span>
    </div>
    <div class="module-collapsible collapse in" aria-expanded="true">
        <span class="hidden-xs caption">
            Cambia tu foto editando esta sección
        </span>
    </div>
    <div class="module-collapsible collapse" aria-expanded="false">

        

<form action="FOTO" class="js-photo-form" enctype="multipart/form-data" method="post" novalidate="novalidate"><input name="__RequestVerificationToken" type="hidden" value="xWZH7sYKFremaebCVwXR1lgwwGEfMwyrt5BlsSZ8rK8wAFnhaNXVVkNHTwfCnu5Th6AZriTQg9QJ1ALk1yH6RkGg5MNFJlAkJHuwOw2cp2yWuua3tuqgDpqAcefXlVawZqEe5A2">    <div class="form-group">
        
        <span class="field-validation-valid help-block" data-valmsg-for="Image" data-valmsg-replace="true" id="helpBlock-photoProfile"></span>

        <label class="btn btn-secondary btn-block btn-load-photo js-load-photo-label" for="photoProfile">
            <i class="fa fa-camera fa-fw"></i>
            Cambiar foto
            <input accept="image/png, image/gif, image/jpeg" class="js-load-photo input-photo-uploader" data-val="true" data-val-maximumfilesize="La imagen debe tener formato JPG o PNG y peso máximo de {0}MB" data-val-maximumfilesize-size="3" data-val-validfiletype="La imagen debe tener formato JPG o PNG y peso máximo de 3MB" data-val-validfiletype-filetypes="png,jpg,gif,jpeg" id="photoProfile" inputfileattr="LeaderSearch.ElEmpleo.MVC.Shared.Components.Common.AttributeBuilder" name="Image" type="file" value="" datalayertag="Configuracion Perfil;Formulario - Tu informacion personal;Cambiar foto">
        </label>
    </div>
</form>

    </div>
</div>
      </div>

      <div class="col-xs-12 col-sm-8 col-sm-pull-4 module-flex-child">
        <div class="module-collapsible collapse in" aria-expanded="true">
          <div class="module-summary-wrapper personal-info">
            <div class="module-summary">
  <p>
    <span class="personalinfo-label">
      Nombre completo
    </span>
    <br>
    <strong class="personalinfo-input js-summary-completename">
      Fabian Aranda Tunubala
    </strong>
  </p>

  <p>
    <span class="personalinfo-label">
      Teléfono de contacto
    </span>
    <br>
    <strong class="personalinfo-input js-summary-principalphone">
      3126952899
    </strong>
  </p>
      </div>
       </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--
|--------------------------------------------------------------------------
| Fin  MENU  INFORMACION  PERSONAL
|--------------------------------------------------------------------------

<!--
|--------------------------------------------------------------------------
| MENU  INFORMACION   CUATRO
|--------------------------------------------------------------------------
|
-->


 <div class="ContenedorFormularioCenso">
<div class="well resume-module module-skills" id="habilidades">
  <div class="js-box-skills">
    

       
            <div class="titulo_informacion">
            <div class="table-container table-responsive-md">
                <table>
                    <tbody>
                        <tr>
                          <td style="width:3px;"></td>
                            <td title="Miembros de la familia   Misak ">
                                <table class="estatic">
                                    <tbody>
                                        <tr>
                                            <td><b href=""> ACTUALIZAR CONTRATO</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
<!--
                            <td style="width:3px;"></td>
                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href="">DATOS </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>

                            <td style="width:3px;"></td>
                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="estatic">
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
                                                <b href="">EDUCACION </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>
							--->
                        </tr>
                    </tbody>
                </table>
                </DIV>
                <div class="color_infor noPrint" style="margin-top: 15px;">
                    <span class="color_infor  noPrint">Usted se encuentra en:&nbsp;&nbsp;Talento Humano- Wasr 
                        &gt; <font color="#666666">Contratos</font></span>
                </div>

                <!--  <h1  class="btn btn-sm btn-default" >Residentes y/o miembros del hogar </h1>-->
               
                
                      <!---------------------->
                    
            </div>                 
      <form id="censoPersona" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                      
                        <div class="form-group row">

                      
                           <!----------------->
                                           <input name="persona_id" type="hidden" value="">

                                           
                           <!----------------->
						    <div class="row separador">
                                <div class="col-md-12 form-group text-center">
                                @lang('Información  del contrato de:  ') {{ $datos->nombres }}- {{ $datos->apellidos }} (*)
                                </div>
                            </div>
                           
						   
					<div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                          <div class="recuadro_info_persona"> @lang('INGRESE INFORMACIÓN DEL CONTRATO  DE:') {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }} </div>
                  
                            <!--Columna 1-->
                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('N° Contrato E-E(*)')</div>
                                    <input type="number" id="num_contrato" name="num_contrato" maxlength="50" placeholder="Ingrese N° Contrato E-E"
                                        class="form-control" required  style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                        

                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('N° Contrato SedCauca(*)')</div>
                                    <input type="number" id="num_sedcauca" name="num_sedcauca" maxlength="50"
                                        placeholder="Ingrese N° Contrato SedCauca" class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Salario Asignado .(*)')</div>
                                    <input type="number" id="salario" name="salario" maxlength="50"
                                        placeholder="Ingrese Salario Asignado " class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Feche Ingreso .(*)')</div>
                                    <input type="date" id="fecha_ingreso" name="fecha_ingreso" maxlength="50" placeholder="Ingrese nombre"
                                        class="form-control" required  style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                        

                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Fecha Salida.(*)')</div>
                                    <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" maxlength="50"
                                        placeholder="Ingrese apellido" class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Razón Social (*)')</div>
                                    <select id="razon_social" name="razon_social" class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <option value="">Seleccione</option>
                                        <option value="Persona Natural">Persona Natural </option>
                                        <option value="Persona Jurídica">Persona Jurídica </option>
                                        
                                    </select>
                                </div>
                            </div>
          
					       <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
				
				
				
                <!--Fin del contenedor informacion_persona -->
                            
					<!--
					<div class="recuadro_info_persona"> @lang('INGRESE INFORMACIÓN GENERAL DE:') {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }} </div>-->
						<div class="recuadro_info_persona">-  </div>
						<!-----------Informacion -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
					
					<div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                          <div class="recuadro_info_persona"> @lang('INGRESE INFORMACIÓN DEL CONTRATO   DE:') {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }} </div>
                  


    
                            <!--Columna 1-->
                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Tipo Contrato(*)')</div>
                                    <select name="id_tipo_contrato" id="id_tipo_contrato" class="form-control" style="width:"
                                        required autocomplete>
                                    <option value="" selected disabled>Selecione Tipo Contrato</option>
                                      @foreach($tipo_contrato as $key => $tipo_contrato)
                                    <option value="{{$key}}"> {{$tipo_contrato}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Caja Compensacion(*)')</div>
                                     <select name="id_caja_compensacion" id="id_caja_compensacion" class="form-control" style="width:"
                                        required autocomplete>
                                    <option value="" selected disabled>Selecione Caja Compensacion</option>
                                      @foreach($cajacompens as $key => $cajacompens)
                                    <option value="{{$key}}"> {{$cajacompens}}</option>
                                    @endforeach
                                    </select>
									</div>
									
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Riesgo Laborales .(*)')</div>
                                     <select name="id_riesgo" id="id_riesgo" class="form-control" style="width:"
                                        required autocomplete>
                                    <option value="" selected disabled>Selecione Riesgo Laborales</option>
                                      @foreach($riesgo as $key => $riesgo)
                                    <option value="{{$key}}"> {{$riesgo}}</option>
                                    @endforeach
                                    </select>
									
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Seleciones EPS .(*)')</div>
                                       <select name="id_eps" id="id_eps" class="form-control" style="width:"
                                        required autocomplete>
                                    <option value="" selected disabled>Selecione EPS</option>
                                      @foreach($eps as $key => $eps)
                                    <option value="{{$key}}"> {{$eps}}</option>
                                    @endforeach
                                    </select>
                                        

                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Seleccione AFP.(*)')</div>
                                       <select name="id_afp" id="id_afp" class="form-control" style="width:"
                                        required autocomplete>
                                    <option value="" selected disabled>Selecione AFP</option>
                                      @foreach($afp as $key => $afp)
                                    <option value="{{$key}}"> {{$afp}}</option>
                                    @endforeach
                                    </select>

							   </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang(' Selec  Tipo Dotacion (*)')</div>
                                       <select name="id_tipo_dotacion" id="id_tipo_dotacion" class="form-control" style="width:"
                                        required autocomplete>
                                    <option value="" selected disabled>Selecione Tipo Dotacion</option>
                                      
									   @foreach($tipo_dotacion as $key => $tipo_dotacion)
                                    <option value="{{$key}}"> {{$tipo_dotacion}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
							
          
					       <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
				
					
					
					
					
		<div class="recuadro_info_persona"> @lang('Información  de Item y Rubro Canasta ') {{ $datos->nombres }}
         </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
					 <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                   <div class="etiqueta2">@lang('ITEM Canasta (*)')</div>
								     <select name="departamento" id="item_canasta" class="form-control" style="width:"
                                        required autocomplete>
                                    <option value="" selected disabled>Selecione item Canasta</option>
									 @foreach($item_canasta as $key => $item_canasta)
                                     
                                    <option value="{{$key}}"> {{$item_canasta}}</option>
                                    @endforeach
                                    </select>
									
									 
                               
                                </div>

                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">@lang(' Categoria Item.(*)')</div>
                                 <select name="id_categoria_canasta" id="categoria_item" class="form-control" style="width:">
                                </select>
                                </div>
                              <!-- <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Fecha Expedicion CC.(*)')</div>
                                  hhh
                                </div>-->
                            </div>
							<div class="recuadro_info_persona"> @lang('Información lugar de Trabajo  :') {{ $datos->nombres }}
                              </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
					
							  <div class="row">
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                
                                    <div class="etiqueta2">@lang('Departamento (*)')</div>
							     <select name="departamento" id="departamento_institucion" class="form-control" style="width:"
                                        required autocomplete>
                                    <option value="" selected disabled>Selecione item Canasta</option>
									 @foreach($departamento_institucion as $key => $departamento_institucion)
                                     
                                    <option value="{{$key}}"> {{$departamento_institucion}}</option>
                                    @endforeach
                                    </select>
									

                            </div>

                         

                            <div class="col-md-3 form-group input-group-sm pull-left">
                                
                              <div class="etiqueta2">@lang(' Municipio(*)')</div>
                                 <select name="categoria_item" id="municipio_institucion" class="form-control" style="width:">
                                </select>
                            </div>
                            <div class="col-md-6 form-group input-group-sm">
                                <div class="etiqueta2">Resguardo Istitucion.(*)</div>
                                 <select name="categoria_item" id="resguardo_istitucion" class="form-control" style="width:">
                                </select>
                            </div>

                        </div>
								
                            <div class="col-md-4 form-group input-group-sm">
                                 <div     for="ddIndigena" class="etiqueta2 usuario">Institucio Educativa</div>
                               
							    <select name="categoria_item" id="institucio_educativa" class="form-control" style="width:">
                                </select>
                            </div>
							   
							    <div class="col-md-4 form-group input-group-sm">
                                 <div     for="ddIndigena" class="etiqueta2 usuario"> Sede Institucio Educativa</div>
                               
							    <select name="id_sede_institucion" id="sede_institucion" class="form-control" style="width:">
                                </select>
                            </div>

                            </div>
							
                          
							
							</div>
					 <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
					 <div class="recuadro_info_persona">-  </div>
						<div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->
                        
                          <div class="recuadro_info_persona"> @lang('INGRESE INFORMACIÓN DEL CONTRATO PDF  DE:') {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }} </div>
                  
                            <!--Columna 1-->
                            <div class="row">
                                 <div class="col-md-6 form-group">
                    
                        <div class="etiqueta2 ">Observaciones del Contrato</div>
                        <textarea class="form-control" rows="3" name="observaciones" id="observaciones" placeholder="Ingrese Observaciones del Contrato." onkeydown="valida_longitud(this.name)" onkeyup="valida_longitud(this.name)" onblur="valida_longitud(this.name)" =""></textarea>
                    </div>
                            <div class="col-md-6 form-group input-group-sm">
                                <div class="etiqueta2">Anexar Contrato laboral, recomendamos formato PDF . Tamaño
                                    máximo de 5 Megabyte cada uno.</div>
                                <br>
                                

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('Cargar el documento (contrato incluido hoja de vida del empleado) formato PDF')</label>
                                <input type="file" id="documento_pdf" name="documento_pdf" class="btn-danger" style="width:300px" accept=".pdf">
                            </div>
                            
                              
                            </div>
                        </div>
						   <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2">- </div>
                                <input type="text" name="txtDir" id="txtDir" maxlength="100" placeholder="-"
                                    class="form-control" readonly="readonly" autocomplete="on" ="">
                            </div>
                        </div>
                       <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>

							
		 <script type="text/javascript">
		/// seelcionar si es indigena o no es indigena 
		    function shoIndigeana() {
        var e = document.getElementById("ddIndigena");
        var strUser = e.options[e.selectedIndex].value;
        if (strUser == 1) {
			//input ¿Hace rituales de armonización y de equilibrio como familia?
            $('#SiIndigena').show();
            $('#SiIndigena').css('visibility', 'visible');
            $('#ddSiIndigena').css('display', 'block');
					
        }
		
        else {
			 //input *Cada cuanto se hace a la armonizació
            $('#ddSiIndigena :nth-child(1)').prop('selected', true);
			  $('#SiIndigena').hide();
			  $('#SiIndigena').css('visibility', 'hidden');
			  $('#ddSiIndigena').css('display', 'none');
			 
        }
    };
</script>
						
				<div class="ContenedorFormularioCenso">
                 <div class="cont-botons-action-formulario row m-0 justify-content-md-center">
					<small class="mensaje-form font-weight-bold"><svg class="svg-inline--fa fa-robot fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="robot" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M32,224H64V416H32A31.96166,31.96166,0,0,1,0,384V256A31.96166,31.96166,0,0,1,32,224Zm512-48V448a64.06328,64.06328,0,0,1-64,64H160a64.06328,64.06328,0,0,1-64-64V176a79.974,79.974,0,0,1,80-80H288V32a32,32,0,0,1,64,0V96H464A79.974,79.974,0,0,1,544,176ZM264,256a40,40,0,1,0-40,40A39.997,39.997,0,0,0,264,256Zm-8,128H192v32h64Zm96,0H288v32h64ZM456,256a40,40,0,1,0-40,40A39.997,39.997,0,0,0,456,256Zm-8,128H384v32h64ZM640,256V384a31.96166,31.96166,0,0,1-32,32H576V224h32A31.96166,31.96166,0,0,1,640,256Z"></path></svg><!-- <i class="fas fa-robot"></i> Font Awesome fontawesome.com --> Hola, <span>Se guardaron cambios automaticamente</span></small>
					<button type="submit"  id="boton" class="btn btn-md btn-primary col-6 col-sm-3"><svg class="svg-inline--fa fa-save fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg><!-- <i class="fas fa-save"></i> Font Awesome fontawesome.com --> Guardar cambios</button>
					<a id="btn-ver-hdv" href="" class="btn btn-md btn-success col-6 col-sm-3"><svg class="svg-inline--fa fa-eye fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" role="img" xmlns="" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg><!-- <i class="fas fa-eye"></i> Font Awesome fontawesome.com --> Cancelar </a>
				</div>
				
                </div>
                </form>
            <!--fIN DE FORMULARIO-->
            <br>
            <br>
            <!-- FIN FORMULARIO-->
        </div>
        <!--FIN ContenedorMenu-->
    </div>
    <!--FIN col-md-9-->
</div>
<!--FIN container-->
</div>
</div>
<div id="ConfirmAction" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <h5 class="modal-title">Confirmar información personal</h5>
              </div>
              <div class="modal-body">
                <p>@lang('¿Esta seguro que  de Guardar información​​​ personal de:')  {{ $datos->nombres }}
                        {{ $datos->apellidos }} ?</p>
            </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
              </div>
          </div>
      </div>
  </div>
<br>
<br>
<br>
</div>
</div>
</div>


@endsection

@section('scripts')


<script >

let datosPersona = {!!($datos->status==0?0:$datosPersona)!!};

let form=$('#censoPersona');

$(document).ready(()=>{
    window.onbeforeunload = function() { return "Your work will be lost."; };
    if(datosPersona!=0){
        cargarFormulario();
    }
    
    form.on('submit', (event)=> {
        event.preventDefault(); //cancelar el envio
        modalConfirm.modal('show');
    });

    let modalConfirm = $('#ConfirmAction');
        $('#btnConfirmar').click((e) => { 
            e.preventDefault();
            let data = new FormData($('#censoPersona')[0]);
            $.ajax({
                type: 'POST',
                url: `{{$datos->id}}`,
                data: data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status) {
                        setTimeout(() => {
                            Swal.fire(
                                'Exito',
                                'Se ha guardado con éxito.',
                                'success'
                            );
                        }, 200);
                        setTimeout(function () {
                            location.href = `/Cunsultas-Personal`;
                           // location.href = location.href+ `/Cunsultas-Personal`;
                        }, 2000);

                    } else {
                        let mensaje ="";
                        if(response.errors){
                            $.map(response.errors,(value, index)=>{
                                mensaje+=value+'\n';
                            });
                        }else{
                            mensaje = response.mensaje;
                        }
                        setTimeout(() => {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Error',
                                text: mensaje,
                            })
                        }, 200);
                    }
                }
            }).fail(() => {
                setTimeout(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrio un error en el servidor, cantacta al administrador.',
                    })
                }, 200);
            }).always(() => {
                modalConfirm.modal('hide');
            });
        });
});    


function cargarFormulario(){
    $('#num_contrato').val(datosPersona.num_contrato);
    $('#num_sedcauca').val(datosPersona.num_sedcauca);
    $('#salario').val(datosPersona.salario);
    $('#razon_social').val(datosPersona.razon_social);
    $('#fecha_ingreso').val(datosPersona.fecha_ingreso);
    $('#observaciones').val(datosPersona.observaciones );
    $('#fecha_vencimiento').val(datosPersona.fecha_vencimiento );
    //$('#docomento_pdf').val(datosPersona.docomento_pdf);
    $('#id_tipo_contrato').val(datosPersona.id_tipo_contrato);
    $('#id_persona').val(datosPersona.id_persona );
    $('#id_tipo_dotacion').val(datosPersona.id_tipo_dotacion);
    $('#id_caja_compensacion').val(datosPersona.id_caja_compensacion );
    $('#id_riesgo').val(datosPersona.id_riesgo);
    $('#id_eps').val(datosPersona.id_eps);
    $('#id_afp').val(datosPersona.id_afp);
    $('#id_categoria_canasta').val(datosPersona.id_categoria_canasta);
    let idiomas={!!($idiomasPersona)!!};
    idiomas.forEach((idioma,index)=>{
        $('#idiomas :input[value="'+idioma.idiomas_id+'"]').prop('checked', true);
    });
    let inputNamuyHabla=$('#namuy_wam :input[value="'+datosPersona.habla_namuy_wam+'"]');
    inputNamuyHabla.prop('checked', true);
    inputNamuyHabla.parent().addClass('active');
    let inputNamuyEscribe=$('#namuy_wam :input[value="'+datosPersona.escritura_namuy_wam+'"]');
    inputNamuyEscribe.prop('checked', true);
    inputNamuyEscribe.parent().addClass('active');

    let inputEspañolHabla=$('#español :input[value="'+datosPersona.habla_español+'"]');
    inputEspañolHabla.prop('checked', true);
    inputEspañolHabla.parent().addClass('active');
    let inputEspañolEscribe=$('#español :input[value="'+datosPersona.escribe_español+'"]');
    inputEspañolEscribe.prop('checked', true);
    inputEspañolEscribe.parent().addClass('active');   

    let inputVestimenta=$('#vestimenta :input[value="'+datosPersona.vestimenta_misak+'"]');
    inputVestimenta.prop('checked', true);
    inputVestimenta.parent().addClass('active');
    
    $('#medico_tradicional').val(datosPersona.medico_tradicional);
    $('#conocimientos_empiricos').val(datosPersona.conocimientos_empiricos);
    $('#deporte_constante').val(datosPersona.deporte_constante);
    $('#juegos_tradicionales').val(datosPersona.juegos_tradicionales);
    $('#lugares_sagrados').val(datosPersona.lugares_sagrados);
    $('#baños_etapas_vida').val(datosPersona.baños_etapas_vida);
    $('#mestruacion').val(datosPersona.mestruacion);
    $('#enfermedades_id').val(datosPersona.enfermedades_id);
    $('#consumo_sustancias').val(datosPersona.consumo_sustancias);
    $('#medicina_alternativa').val(datosPersona.medicina_alternativa);

    let limitaciones={!!($limitacionesPersona)!!};
    limitaciones.forEach((limitacion,index)=>{
        $('#limitaciones :input[value="'+limitacion.limitaciones_fisinas_id+'"]').prop('checked', true);
    });
    
}

</script>

<script type="text/javascript">
{{-- Seleccion de CANASTA  item --}}

  $('#item_canasta').change(function() {
    var departamentoexpID = $(this).val();
    if (departamentoexpID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-categoria_item-list')}}?id_canasta=" + departamentoexpID,
            success: function(res) {
                if (res) {
                    $("#categoria_item").empty();
                    $("#categoria_item").append('<option>Seleccione Intem</option>');
                    $.each(res, function(key, value) {
                        $("#categoria_item").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#categoria_item").empty();
                }
            }
        });
    } else {
        $("#categoria_item").empty();

    }
});
</script>



<script type="text/javascript">
$('#departamento_institucion').change(function() {
    var departamentoID = $(this).val();
    if (departamentoID) {
        $.ajax({
            type: "GET",
            url: "{{url('/get-genmunicipioie-list')}}?id_departamento=" + departamentoID,
            success: function(res) {
                if (res) {
                    $("#municipio_institucion").empty();
                    $("#municipio_institucion").append('<option>Seleccione Municipio</option>');
                    $.each(res, function(key, value) {
                        $("#municipio_institucion").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#municipio_institucion").empty();
                }
            }
        });
    } else {
        $("#municipio_institucion").empty();

    }
});


$('#municipio_institucion').change(function() {
    var departamentoID = $(this).val();
    if (departamentoID) {
        $.ajax({
            type: "GET",
            url: "{{url('/get-getresguardo-direccion-list')}}?id_municipio=" + departamentoID,
            success: function(res) {
                if (res) {
                    $("#resguardo_istitucion").empty();
                    $("#resguardo_istitucion").append('<option>Seleccione Municipio</option>');
                    $.each(res, function(key, value) {
                        $("#resguardo_istitucion").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#resguardo_istitucion").empty();
                }
            }
        });
    } else {
        $("#resguardo_istitucion").empty();

    }
});

$('#resguardo_istitucion').change(function() {
    var departamentoID = $(this).val();
    if (departamentoID) {
        $.ajax({
            type: "GET",
            url: "{{url('/get-getinstitucio_educativa-list')}}?id_resguardo=" + departamentoID,
            success: function(res) {
                if (res) {
                    $("#institucio_educativa").empty();
                    $("#institucio_educativa").append('<option>Seleccione Municipio</option>');
                    $.each(res, function(key, value) {
                        $("#institucio_educativa").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#institucio_educativa").empty();
                }
            }
        });
    } else {
        $("#institucio_educativa").empty();

    }
});

$('#institucio_educativa').change(function() {
    var departamentoID = $(this).val();
    if (departamentoID) {
        $.ajax({
            type: "GET",
            url: "{{url('/get-getsede_institucion-list')}}?id_institucio=" + departamentoID,
            success: function(res) {
                if (res) {
                    $("#sede_institucion").empty();
                    $("#sede_institucion").append('<option>Seleccione Municipio</option>');
                    $.each(res, function(key, value) {
                        $("#sede_institucion").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#sede_institucion").empty();
                }
            }
        });
    } else {
        $("#sede_institucion").empty();

    }
});




</script>


@endsection
