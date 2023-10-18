@extends('layouts.menu')

@section('content')

<link rel="stylesheet" href="/css/hoja-de-vida.c">
<link rel="stylesheet" href="/css/estilos_pie_pagina.css">

<link type="text/css"  rel="stylesheet" href="/css/form_ingreso_familia.css">





<!-------
<html>
<head>
   <meta charset="utf-8">
   <title>Mostrar Ventane Modal de forma Automático</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>
</head>
<body>
   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>NOTA</h3>
           </div>
           <div class="modal-body">
              <h4>PARA TODOS LOS EFECTOS LEGALES, CERTIFICO QUE LOS DATOS EXPRESADOS EN EL PRESENTE FORMATO ÚNICO A INGRESAR   SON VERACES   (ARTÍCULO 5º. DE LA LEY 190/95).   
       </div>
           <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>
</body>
</html>

-->
    
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>Actualizacion</h1>
            <h2 class="">Actualizacion Informacion General</h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Actualizacion</a></li>
                <li class="active">Actualizacion Informacion General</li>
            </ol>
        </div>
    </div>
    <br>
    <br>
    <div class="color_informacion_modulo " style="margin-top: 15px;">
        <span class="color_infor  ">Usted se encuentra en: &nbsp;&nbsp;<font color="#060505"> Sistema de Informacion
                Poblacional Misak -SIPEMP &gt; <font color="#060505">Actualizacion </font> &gt; <font color="#060505">
                    Informacion General</font> </span>
    </div>


    {{-- Formulario --}}
    
    <div class="col-md-12 ">
        <div class="ContenedorFormularioActualiza">

    <div class="container">

        <div class="row">

            <div class="col-md-12">
            <div class="contenedor_informacion_persona">

                <div class="etiqueta2"> Recuerde que los campos con un asterisco (*) son obligatorios.
                </div>
    
                <form id="formInfoPersonal" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <!-- Codigos foraneos tabla personas -->
                    <input name="hoga_id" type="hidden" value="{{ $datos->hogar_id }}">

                    <input name="persona_id" type="hidden" value="{{ $datos->id }}">
                    <!---- fin codigos foraneos -->

                    {{-- Informacion basica de la persona --}}
                    <div class="row separador">
                        <div class="col-md-12 form-group text-center">
                            Información de la persona (*)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2 usuario">Nombre.(*)</div>
                            <input type="text" id="nombre" name="nombre" maxlength="50" placeholder="Ingrese nombre"
                            class="form-control" required value="{{ $datos->nombres }}">
        
                        </div>
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2 usuario">Apellido.(*)</div>
                            <input type="text" id="apellido" name="apellido" maxlength="50"
                                placeholder="Ingrese apellido" class="form-control" required value="{{ $datos->apellidos }}">
                        </div>
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2 usuario">Estado civil.(*)</div>
                            <select id="estado_civil" name="estado_civil" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="S" {{ $datos->estado_civil=='S'?'selected':'' }}>Soltero(a)</option>
                                <option value="C" {{ $datos->estado_civil=='C'?'selected':'' }}>Casado(a)</option>
                                <option value="UNI" {{ $datos->estado_civil=='UNI'?'selected':'' }}>Union Libre</option>
                                
                            </select>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2">Tipo Identificación.(*)</div>
                            <div>
                                <select id="tipo_identificacion" id="tipo_identificacion" name="tipo_identificacion" class="form-control">
                                    <option value="">Seleccione</option>
                                 
                                    <option value="CC" {{ $datos->tipo_identificacion=='CC'?'selected':'' }}>Cedula de Ciudadania</option>
                                    <option value="TI" {{ $datos->tipo_identificacion=='TI'?'selected':'' }}>Tarjeta de Identidad</option>
                                    <option value="CE" {{ $datos->tipo_identificacion=='CE'?'selected':'' }}>Cedula de Extranjeria</option>
                                    <option value="PA" {{ $datos->tipo_identificacion=='PA'?'selected':'' }}>Pasaporte</option>
                                </select>
                            </div>
                        </div>
        
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2">Numero Identificación.(*)</div>
                            <input type="text" id="documento_persona" name="documento_persona"  type="number" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" readonly="readonly" 
                                placeholder="Ingrese identificación" class="form-control" required value="{{ $datos->documento_persona }}">
                        </div>
                        <div class="col-md-4 form-group input-group-sm">
                            <div class="etiqueta2">Fecha de nacimiento(*)</div>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingrese fecha de nacimiento" class="form-control" required value="{{ $datos->fecha_nacimiento }}">
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-6 form-group input-group-sm">
                          <!--  <div class="etiqueta2">Parentesco. (*)</div>
                            <select id="parentesco" name="parentesco" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="CF" {{ $datos->parentesco=='CF'?'selected':'' }}>Cabeza de Familia</option>
                                <option value="ES" {{ $datos->parentesco=='ES'?'selected':'' }}>Esposo(a)</option>
                                <option value="HI" {{ $datos->parentesco=='HI'?'selected':'' }}>Hijo(a)</option>
                                <option value="NI" {{ $datos->parentesco=='NI'?'selected':'' }}>Nieto/a</option>
                                <option value="RY" {{ $datos->parentesco=='RY'?'selected':'' }}>Yerno</option>
                                <option value="NU" {{ $datos->parentesco=='NU'?'selected':'' }}>Nuera</option>
                                <option value="SU" {{ $datos->parentesco=='SU'?'selected':'' }}>Suegro(a)</option>
                                <option value="SO" {{ $datos->parentesco=='SO'?'selected':'' }}>Sobrino</option>
                                <option value="TI" {{ $datos->parentesco=='TI'?'selected':'' }}>Tio(a)</option>
                                <option value="AB" {{ $datos->parentesco=='AB'?'selected':'' }}>Abuelo(a)</option>
        

                               

                            </select>-->

                            
                            <div class="col-md-4 form-group input-group-sm">
                                 <div     for="" class="etiqueta2 usuario">Seleccione Perfil de la Persona</div>
                                <!-- <select id="tipo_vinculacion" name=""  class="form-control">
                                        <option value="">Seleccione el Perfil de la Persona</option>
                                     
                                    </select>-->

	       </select>--

                            </div>
							<div id="" style="">
                            <div class="col-md-4 form-group input-group-sm">
                                <div class="etiqueta2 usuario">Seleccione Cargo de la Persona </div>
                                
                               <!-- <select name="id_desempeno" id="nombre_esempeno" class="form-control" style="width:"  required autocomplete  >
                                </select>-->
		                               
                            </div>

                            
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
<div class="col-md-4 form-group input-group-sm">
                                 <div     for="" class="etiqueta2 usuario"> Seleccione Nivel  educativo  formación Postgradual  </div>
                               <select name="postgradual" id="postgradual" tabindex="51" class="form-control" onchange="shoIndigeana(this);" required autocomplete>
		    <option value="">Seleccione</option>
		      <option  value="No tiene">No tiene </option>
             <option  value="Pregrado">Pregrado</option>
		    <option value="Especialización">Especialización</option>
		     <option  value="Maestría">Maestría</option>
            <option  value="Doctorado">Doctorado </option>
          
	       </select>

                            </div>
        
                        </div>

                        
                        
                        
                        <div class="col-md-6 form-group input-group-sm">
                            <div class="etiqueta2">Seleccione Ultimo Nivel educativo(*)</div>
                            <select id="nivel_educativo" name="nivel_educativo" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="Ninguno" {{ $datos->nivel_academico=='Ninguno'?'selected':'' }}>Ninguno</option>

                                <option value="Basica Primaria(1-5)"{{ $datos->nivel_academico=='Basica Primaria(1-5)'?'selected':'' }}>Basica Primaria(1-5)</option>
                                <option value="Basica Secundaria(6-9)"{{ $datos->nivel_academico=='Basica Secundaria(6-9)'?'selected':'' }}>Basica Secundaria(6-9)</option>
                                <option value="Media(10-12)"{{ $datos->nivel_academico=='Media(10-12)'?'selected':'' }}>Media(10-12)</option>
                                <option value="Têcnico Laboral"{{ $datos->nivel_academico=='Têcnico Laboral'?'selected':'' }}>Têcnico Laboral</option>
                                <option value="Têcnico Profesional"{{ $datos->nivel_academico=='Têcnico Profesional'?'selected':'' }}>Têcnico Profesional</option>
                                <option value="Têcnologia"{{ $datos->nivel_academico=='Têcnologia'?'selected':'' }}>Têcnologia</option>
                                <option value="Normalista Superior"{{ $datos->nivel_academico=='Normalista Superior'?'selected':'' }}>Normalista Superior</option>
            
                                <option value="Universitaria" {{ $datos->nivel_academico=='Universitaria'?'selected':'' }}>Universitaria</option>
                                <option value="Especializacion" {{ $datos->nivel_academico=='Especializacion'?'selected':'' }}>Especializacion</option>
                                <option value="Maestria" {{ $datos->nivel_academico=='Maestria'?'selected':'' }}>Maestria</option>
                                <option value="Doctorado" {{ $datos->nivel_academico=='Doctorado'?'selected':'' }}>Doctorado</option>
                            </select>
                        </div>
                    </div>
                    </div>

                    <div class="clearfix"></div>
                    {{-- Informacion del censo --}}

                    <div class="container">

                    <div class="row">

                      <div class="col-md-12">
                    
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona"> INGRESE INFORMACION GENERAL DE: {{ $datos->nombres }}
                            {{ $datos->apellidos }} CC N° {{ $datos->ducomento_persona }} </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
    



                       
                    <div class="contenedor_informacion_persona">

                            
                            
                            <div class="row">
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Seleccione Genero</div>
                                <select name="genero" id="genero" class="form-control" style="width:"
                                    ="" required autocomplete>
                                    <option value="">Seleccione</option>
                                    <option value="M">Hombre</option>
                                    <option value="F">Mujer</option>

                                </select>

                            </div>
                           

                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">*@lang('¿Cuál carnet de salud tiene?')</div>
                                <select id="carnet_salud_id" name="carnet_salud_id"  id="select2_example"  id="framework" class="form-control" required autocomplete>
                                        <option value="">Seleccione carnet de Salud</option>
                                        @foreach($carnet_salud as $key => $carnet_salud)
                                            <option value="{{ $key }}"> {{ $carnet_salud }}</option>
                                        @endforeach
                                    </select>
                                   
                                </select>
                            </div>
							  <script type="text/javascript">
      $('select').select2();
  </script>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Número Telefono:</div>
                                  <input id="telefono" name="telefono" placeholder="Teléfono"   class="form-control" type="number" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required autocomplete  >
                           
                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Correo Electronico:</div>
                                <input id="email" name="email" placeholder="email"   class="form-control" type="text"  required autocomplete >
                           
                            </div>


                        </div>

                        <div id="lugarCCExoPDiv" class="col-md-12 form-group" style="display: none;">
                        <label> Lugar Expedicion CC:</label>
                                <input  value=""  class="form-control" id="lugarCCExoPInput" type="text" style="text-align: center;" disabled>                                            
                            </div>
                            


                        <div class="col-md-6 form-group input-group-sm">
                       
                                    <div class="etiqueta2">@lang('Seleccione Departamento Expedicion Cedula de Ciudadania (*)')</div>
                                    <select name="departamento" id="departamentoexp" class="form-control" style="width:"
                                    autocomplete>
                                    <option value="" selected disabled>Selecione Departamento</option>
                                    
                                </select>

                                </div>
                                <div class="col-md-6 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Seleccione Municipio de Expedicion CC(*)')</div>
                                    <select name="id_municipio_expedicion" id="municipio_expedicion" class="form-control" style="width:"  >
                                </select>
                                </div>

                                <div class="col-md-6 form-group input-group-sm ">
                                <div class="etiqueta2">Fecha Expedicion CC</div> 
                                <INPUT type="DATE"name="fechaexpedicioncc" id="fechaexpedicioncc" class="form-control" style="width:"
                                    ="" required autocomplete>
                                    
                            </div>
                        
<!--
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Cargar la    Cedula de Ciuudadania  formato PDF.</div> 
                             
                                <input type="file" id="documento_pdf" name="documento_pdf" class="btn-danger" accept=".pdf">
                            </div>-->
								
                            <div class="col-md-4 form-group input-group-sm">
                                 <div     for="ddIndigena" class="etiqueta2 usuario">¿Indigena?</div>
                               <select id="comunidad_indigena" name="comunidad_indigena"  tabindex="51" class="form-control" onchange="shoIndigeana1(this);" required autocomplete >
		    <option value="">Seleccione</option>
		    <option value="1">SI</option>
		    <option  value="2">NO</option>

	       </select>

                            </div>
							<div id="SiIndigena1" style="visibility: hidden; display: none;">
                            <div class="col-md-4 form-group input-group-sm">
                                <div class="etiqueta2 usuario">¿Cual?</div>
                                
									  <Input type="text" name="comunidad_indigena_cual" id="comunidad_indigena_cual" tabindex="52" class="form-control" style="display: none;" >
		                               
                            </div>
							</div>
							
							
							<script type="text/javascript">
		/// seelcionar si es indigena o no es indigena 
		    function shoIndigeana1() {
        var e = document.getElementById("comunidad_indigena");
        var strUser = e.options[e.selectedIndex].value;
        if (strUser == 1) {
			//input ¿Hace rituales de armonización y de equilibrio como familia?
            $('#SiIndigena1').show();
            $('#SiIndigena1').css('visibility', 'visible');
            $('#comunidad_indigena_cual').css('display', 'block');
					
        }
		
        else {
			 //input *Cada cuanto se hace a la armonizació
            $('#comunidad_indigena_cual :nth-child(1)').prop('selected', true);
			  $('#SiIndigena1').hide();
			  $('#SiIndigena1').css('visibility', 'hidden');
			  $('#comunidad_indigena_cual').css('display', 'none');
			 
        }
    };
</script>
								
						
						
                        <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2"> Dirección del Empleado.(*)</div>
                                <input type="text" name="txtDir" id="txtDir" maxlength="100"
                                    placeholder="-"
                                    class="form-control" readonly="readonly" autocomplete="on" >
                            </div>
                        </div>

                       
							
                        <div class="row">
                            <div class="col-md-3 form-group input-group-sm ">
                                <div class="etiqueta2">Seleccione Departamento</div>
                                <select name="departamento" id="departamentos" class="form-control" style="width:"
                                >
                                    <option value="" selected disabled>Selecione Departamento</option>
                  

                                </select>

                            </div>

                         

                            <div class="col-md-3 form-group input-group-sm ">
                                <div class="etiqueta2">Seleccione Municipio</div>
                                <select name="codigo_municipio" id="codigo_municipio" class="form-control" style="width:" >
                                </select>
                            </div>
                            <div class="col-md-6 form-group input-group-sm">
                                <div class="etiqueta2">Barrio / Vereda.(*)</div>
                                <input type="text" name="direccion" id="direccion" onchange="Bus();" maxlength="50"
                                    placeholder="Ingrese su Direccion" onkeypress="return validar(event)"
                                    class="form-control" autocomplete="on" >
                            </div>

                        </div>
						

                    </div>
                    </div>
                    </div>

                </div>
                    
        <div class="clearfix"></div>



 <div class="container">
  <div class="row">
    <div class="col-sm">
    
           <div class="row">
         <div class="contenedor_informacion_persona">
							<div class="row separador">
                            <div class="col-md-12 form-group text-center align-text-botton">
                            INFORMACIÓN DE DOCENTE :{{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->documento_persona }}  SIEMPRE EN CUANDO SI USTED ES  DIRECTOR DE GRADO 
                            
                            </div>
                        </div>
						   <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2">- </div>
                                <input type="text" name="txtDir" id="txtDir" maxlength="100" placeholder="-"
                                    class="form-control" readonly="readonly"  ="">
                            </div>
                        </div>
						  <div class="row">
                          
                   
                            <div class="panel-default col-md-6">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <strong>Información Importante: </strong>
                                    </h4>
                                </div>
                               
                                
                            </div>
                            <!--        
                    <div class="col-md-6 form-group input-group-sm">
                        <div class="etiqueta2">Tipo de PQRS.(*)</div>                        
                        <div><select name="slc_tipPQR" id="slc_tipPQR" class="form-control text-center">
<option value="">&lt;&lt; Seleccione &gt;&gt;</option>
<option value="3">CONSULTA</option>
<option value="5">FELICITACION</option>
<option value="1">PETICION</option>
<option value="2">QUEJA</option>
<option value="7">RECLAMO</option>
<option value="9">SOLICITUD INFORMACION PUBLICA</option>
<option value="6">SUGERENCIA</option>
</select>
</div>
                    </div>-->
                   
                          <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label for="director_grado"><span class="asterisco">*</span>@lang('¿Ustes es Director de Grado? ') </label>
                                                <select name="director_grado" id="director_grado"
                                                    class="form-control" onchange="showArmonizacion(this);" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">SI</option>
                                                    <option value="0">NO</option>

                                                </select>
                                            </div>
                                     
												<div id="SiHaceArmonizacion2" style="visibility: hidden; display: none;">
										     	<div class="form-group input-group-sm">
                                               <label  for="ddSiHaceArmonizacion2"><span class="asterisco">*</span>@lang('Escribir el grado que maneja como director')"</label>
								               <input id="nombre_grado"  type="text" 
                                                    class="form-control" name="nombre_grado"  value="" >
                                             </div>

                                             <div id="SiHaceArmonizacion9" style="visibility: hidden; display: none;">
										     	<div class="form-group input-group-sm">
                                               <label  for="ddSiHaceArmonizacion9"><span class="asterisco">*</span>@lang('¿ N° de estudiantes  que maneja como director de curso ?.')"</label>
								               <input id="n_estudiantes"  type="number" 
                                                    class="form-control" name="n_estudiantes"  value="" >
                                             </div>
                                             </div>

                                            </div>
                                            </div>
		
		  	<script type="text/javascript">
			
    function showArmonizacion() {
        var e = document.getElementById("director_grado");
        var strUser = e.options[e.selectedIndex].value;
        if (strUser == 1) {
            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#SiHaceArmonizacion').show();
            $('#SiHaceArmonizacion1').show();
            $('#SiHaceArmonizacion2').show();
            $('#SiHaceArmonizacion3').show();
            $('#SiHaceArmonizacion4').show();
            $('#SiHaceArmonizacion5').show();
            $('#SiHaceArmonizacion6').show();
            $('#SiHaceArmonizacion7').show();
            $('#SiHaceArmonizacion8').show();
            $('#SiHaceArmonizacion9').show();
            $('#SiHaceArmonizacion10').show();
            $('#SiHaceArmonizacion1').css('visibility', 'visible');
            $('#SiHaceArmonizacion2').css('visibility', 'visible');
            $('#SiHaceArmonizacion3').css('visibility', 'visible');
            $('#SiHaceArmonizacion4').css('visibility', 'visible');
            $('#SiHaceArmonizacion5').css('visibility', 'visible');
            $('#SiHaceArmonizacion6').css('visibility', 'visible');
            $('#SiHaceArmonizacion7').css('visibility', 'visible');
            $('#SiHaceArmonizacion8').css('visibility', 'visible');
            $('#SiHaceArmonizacion9').css('visibility', 'visible');
            $('#SiHaceArmonizacion10').css('visibility', 'visible');

            $('#SiHaceArmonizacion').css('visibility', 'visible');
            $('#ddSiHaceArmonizacion').css('display', 'block');
            $('#ddSiHaceArmonizacion1').css('display', 'block');
            $('#ddSiHaceArmonizacion2').css('display', 'block');
            $('#ddSiHaceArmonizacion3').css('display', 'block');
            $('#ddSiHaceArmonizacion4').css('display', 'block');
            $('#ddSiHaceArmonizacion5').css('display', 'block');
            $('#ddSiHaceArmonizacion6').css('display', 'block');
            $('#ddSiHaceArmonizacion7').css('display', 'block');
            $('#ddSiHaceArmonizacion8').css('display', 'block');
            $('#ddSiHaceArmonizacion9').css('display', 'block');
            $('#ddSiHaceArmonizacion10').css('display', 'block');

        } else {
            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#ddSiHaceArmonizacion :nth-child(1)').prop('selected', true);
            $('#ddSiHaceArmonizacion1 :nth-child(1)').prop('selected', true);
            $('#SiHaceArmonizacion').hide();
            $('#SiHaceArmonizacion1').hide();
            $('#SiHaceArmonizacion2').hide();
            $('#SiHaceArmonizacion3').hide();
            $('#SiHaceArmonizacion4').hide();
            $('#SiHaceArmonizacion5').hide();
            $('#SiHaceArmonizacion6').hide();
            $('#SiHaceArmonizacion7').hide();
            $('#SiHaceArmonizacion8').hide();
            $('#SiHaceArmonizacion9').hide();
            $('#SiHaceArmonizacion10').hide();
            $('#SiHaceArmonizacion').css('visibility', 'hidden');
            $('#SiHaceArmonizacion1').css('visibility', 'hidden');
            $('#SiHaceArmonizacion2').css('visibility', 'hidden');
            $('#SiHaceArmonizacion3').css('visibility', 'hidden');
            $('#SiHaceArmonizacion4').css('visibility', 'hidden');
            $('#SiHaceArmonizacion5').css('visibility', 'hidden');
            $('#SiHaceArmonizacion6').css('visibility', 'hidden');
            $('#SiHaceArmonizacion7').css('visibility', 'hidden');
            $('#SiHaceArmonizacion8').css('visibility', 'hidden');
            $('#SiHaceArmonizacion9').css('visibility', 'hidden');
            $('#SiHaceArmonizacion10').css('visibility', 'hidden');
            $('#ddSiHaceArmonizacion').css('display', 'none');
            $('#ddSiHaceArmonizacion1').css('display', 'none');
            $('#ddSiHaceArmonizacion2').css('display', 'none');
            $('#ddSiHaceArmonizacion3').css('display', 'none');
            $('#ddSiHaceArmonizacion4').css('display', 'none');
            $('#ddSiHaceArmonizacion5').css('display', 'none');
            $('#ddSiHaceArmonizacion6').css('display', 'none');
            $('#ddSiHaceArmonizacion7').css('display', 'none');
            $('#ddSiHaceArmonizacion7').css('display', 'none');
            $('#ddSiHaceArmonizacion8').css('display', 'none');
            $('#ddSiHaceArmonizacion9').css('display', 'none');
            $('#ddSiHaceArmonizacion10').css('display', 'none');

        }
    };
		 function shoeducacion7() {
        var e = document.getElementById("ddSiHaceArmonizacion");
        var strUser = e.options[e.selectedIndex].value;
        if (strUser == 4) {
		  $('#educacion7').show();
          $('#educacion7').css('visibility', 'visible');
          $('#ddeducacionmisak7').css('display', 'block');
		}else {
			  $('#ddeducacionmisak7 :nth-child(1)').prop('selected', true);
			  $('#educacion7').hide();
			  $('#educacion7').css('visibility', 'hidden');
			  $('#ddeducacionmisak7').css('display', 'none');
			 }}; </script>
                       
                       <div id="SiHaceArmonizacion10" style="visibility: hidden; display: none;">
                    <div class="panel-default col-md-12">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <strong  for="ddSiHaceArmonizacion10" >Si usted es director de curso, por favor y con mucha responsabilidad suministrar la información que solicita  en los siguientes recuadros. </strong>
                                    </h4>
                                </div>
                               
                                
                            </div>
                            </div>
                           
                    <div class="col-md-12 form-group">
                   
               

                   

                        <div class="row">
                        <div id="SiHaceArmonizacion3" style="visibility: hidden; display: none;">
                                <div class="col-md-4"><label  for="ddSiHaceArmonizacion3"><span class="asterisco">*</span>@lang('¿ N° de estudiantes Misak ?.')"</label>
								               <input id="ne_misak"  type="number" 
                                                    class="form-control" name="ne_misak"  value="" ></div>
                      </div>  

                      <div id="SiHaceArmonizacion4" style="visibility: hidden; display: none;">
                                <div class="col-md-4"><label  for="ddSiHaceArmonizacion4"><span class="asterisco">*</span>@lang('¿ N° de estudiantes Nasas ?.')"</label>
								               <input id="ne_nasa"  type="number" 
                                                    class="form-control" name="ne_nasa"  value="" ></div>
                      </div>  

                      <div id="SiHaceArmonizacion5" style="visibility: hidden; display: none;">
                                <div class="col-md-4"><label  for="ddSiHaceArmonizacion5"><span class="asterisco">*</span>@lang('¿N° de  Estuantes Yanaconas ?.')"</label>
								               <input id="ne_yanacula"  type="number" 
                                                    class="form-control" name="ne_yanacula"  value="" ></div>
                      </div>  

                      </div>  


                      <div class="row">
                      
                      <div id="SiHaceArmonizacion6" style="visibility: hidden; display: none;">
                                <div class="col-md-4"><label  for="ddSiHaceArmonizacion5"><span class="asterisco">*</span>@lang('¿ N° de  Estudiantes de otras etnias .  ?.')"</label>
								               <input id="n_envera"  type="number" 
                                                    class="form-control" name="n_envera"  value="" ></div>
                      </div>  

                      <div id="SiHaceArmonizacion7" style="visibility: hidden; display: none;">
                                <div class="col-md-4"><label  for="ddSiHaceArmonizacion7"><span class="asterisco">*</span>@lang('¿N° de  Estudiantes Campesinos ?.')"</label>
								               <input id="n_campesino"  type="number" 
                                                    class="form-control" name="n_campesino"  value="" ></div>
                      </div>  


                      <div id="SiHaceArmonizacion8" style="visibility: hidden; display: none;">
                                <div class="col-md-4"><label  for="ddSiHaceArmonizacion8"><span class="asterisco">*</span>@lang('N° de  Estudiantes Afros')"</label>
								               <input id="ne_otro_etnia"  type="number" 
                                                    class="form-control" name="ne_otro_etnia"  value="" ></div>
                      </div>  

                      <div id="" style="visibility: hidden; display: none;">
                                <div class="col-md-4"><label  for=""><span class="asterisco">*</span>@lang('')"</label>
								        </div>
                      </div>  
                      
                      
                      
                             
                    
                    </div>

                   


                   
                    </div>
                    </div>

                    <div id="SiHaceArmonizacion1" style="visibility: hidden; display: none;">
                  
                                
       
                           
                            
                              
                            </div>
                        </div>
						  
                        </div>
                        </div>

                        <div class="clearfix"></div>
                     
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>							
	            </div>
                </div>
                </div>
                </div>
    
    
                           
                           
    
                        </div>
                       
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>

                    




      <!--                  

<div class="row">
<div class="contenedor_informacion_persona">
							<div class="row separador">
                            <div class="col-md-12 form-group text-center align-text-botton">
                            INSTITUCIÓN  EDUCATIVA,SI   :{{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }} ES DIRECTIVOS DOCENTES 
                            </div>
                        </div>
						   <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2">- </div>
                                <input type="text" name="txtDir" id="txtDir" maxlength="100" placeholder="-"
                                    class="form-control" readonly="readonly" autocomplete="on" ="">
                            </div>
                        </div>
						  <div class="row">
                          
                   
                            <div class="panel-default col-md-6">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <strong>Información Importante: </strong>
                                    </h4>
                                </div>
                               
                                
                            </div>
                            <!--        
                    <div class="col-md-6 form-group input-group-sm">
                        <div class="etiqueta2">Tipo de PQRS.(*)</div>                        
                        <div><select name="slc_tipPQR" id="slc_tipPQR" class="form-control text-center">
<option value="">&lt;&lt; Seleccione &gt;&gt;</option>
<option value="3">CONSULTA</option>
<option value="5">FELICITACION</option>
<option value="1">PETICION</option>
<option value="2">QUEJA</option>
<option value="7">RECLAMO</option>
<option value="9">SOLICITUD INFORMACION PUBLICA</option>
<option value="6">SUGERENCIA</option>
</select>
</div>
                    </div>--
                   
                          <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label for="ddArmonizacion"><span class="asterisco">*</span>@lang('¿Usted es asignado dirección de  un  grupo ? ') </label>
                                                <select name="enfermedad_base" id="ddArmonizacion"
                                                    class="form-control" onchange="showArmonizacion(this);" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">SI</option>
                                                    <option value="0">NO</option>

                                                </select>
                                            </div>
                                     <!--
												<div id="educacion7" style="visibility: hidden; display: none;">
										     	<div class="form-group input-group-sm">
                                               <label  for="ddeducacionmisak7"><span class="asterisco">*</span>@lang('¿Cuál?.')"</label>
								               <input id="otro_rituales"  type="text"
                                                    class="form-control" name="otro_rituales"  value="" >
                                             </div>--
                                            </div>
		
		  	<script type="text/javascript">
			
    function showArmonizacion() {
        var e = document.getElementById("ddArmonizacion");
        var strUser = e.options[e.selectedIndex].value;
        if (strUser == 1) {
            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#SiHaceArmonizacion').show();
            $('#SiHaceArmonizacion1').show();
            $('#SiHaceArmonizacion1').css('visibility', 'visible');
            $('#SiHaceArmonizacion').css('visibility', 'visible');
            $('#ddSiHaceArmonizacion').css('display', 'block');
            $('#ddSiHaceArmonizacion1').css('display', 'block');

        } else {
            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#ddSiHaceArmonizacion :nth-child(1)').prop('selected', true);
            $('#ddSiHaceArmonizacion1 :nth-child(1)').prop('selected', true);
            $('#SiHaceArmonizacion').hide();
            $('#SiHaceArmonizacion1').hide();
            $('#SiHaceArmonizacion').css('visibility', 'hidden');
            $('#SiHaceArmonizacion1').css('visibility', 'hidden');
            $('#ddSiHaceArmonizacion').css('display', 'none');
            $('#ddSiHaceArmonizacion1').css('display', 'none');

        }
    };
		 function shoeducacion7() {
        var e = document.getElementById("ddSiHaceArmonizacion");
        var strUser = e.options[e.selectedIndex].value;
        if (strUser == 4) {
		  $('#educacion7').show();
          $('#educacion7').css('visibility', 'visible');
          $('#ddeducacionmisak7').css('display', 'block');
		}else {
			  $('#ddeducacionmisak7 :nth-child(1)').prop('selected', true);
			  $('#educacion7').hide();
			  $('#educacion7').css('visibility', 'hidden');
			  $('#ddeducacionmisak7').css('display', 'none');
			 }}; </script>
                       

                           
                    <div class="col-md-6 form-group">
                    <div id="SiHaceArmonizacion" style="visibility: hidden; display: none;">
                    <label for="ddSiHaceArmonizacion"><span
                        <div class="etiqueta2 ">Escriba en Nombre de la enfermedad de base  que tiene  maximo 50 caracteres.</div>
                        <textarea class="form-control" id="ddSiHaceArmonizacion" class="form-control"  onchange="shoeducacion7(this);" style="display: none;" rows="3" name="cual_enfermedad_base" id="" placeholder="Ingrese Observaciones del empleado." onkeydown="valida_longitud(this.name)" onkeyup="valida_longitud(this.name)" onblur="valida_longitud(this.name)" =""></textarea>
                    </div>
                    </div>

                    <div id="SiHaceArmonizacion1" style="visibility: hidden; display: none;">
                    <label for="ddSiHaceArmonizacion1"><span
                            <div class="col-md-6 form-group input-group-sm">
                                <div class="etiqueta2">Cargar la  formula medica  de la enfermedad de base  formato PDF.</div>
                                <br>
                                
       
                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('Cargar la formula medica formato PDF ')</label>
                                <input type="file" id="ddSiHaceArmonizacion1" class="form-control"  onchange="shoeducacion7(this);" style="display: none;" id="formula_medica_pdf" name="formula_medica_pdf" class="btn-danger" accept=".pdf"  autocomplete>
                            </div>
                            
                              
                            </div>
                        </div>
						  
                        </div>
                        </div>


                     <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro --
                </div>							
	            </div>
    
    
                           
                           
    
                     
                        <!--Cierra el contenedor 2 . recuadro -->
                   

                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona">SELECCIONE LOS IDIOMAS QUE HABLA: {{ $datos->nombres }}
                            {{ $datos->apellidos }} CC N° {{ $datos->documento_persona }}</div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
    
                            <div id="idiomas" class="col-md-3 col-lg-3">
                                </ul>
                                @foreach($idiomas as $idiomas_persona)
                                    <li>                                    
                                        {{--<input name="{{$idiomas_persona->id}}" id="{{$idiomas_persona->id}}" value="{{$idiomas_persona->id}}" type="checkbox">
                                        <label>{{$idiomas_persona->nombre}}</label>--}}
                                        <label>
                                            {{ Form::checkbox('idiomas[]', $idiomas_persona->id, null) }}
                                            {{ $idiomas_persona->nombre }}
                                        </label>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
    
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>

                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona"> CONOCIMIENTOS DE NAMUY WAM DE : {{ $datos->nombres }}
                            {{ $datos->apellidos }} CC N° {{ $datos->documento_persona }}</div>
    
                        <div class="col-xs-12 col-xs-12 estilo1" id='namuy_wam'>
                            <fieldset>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 control-label">Habla Namuy Wam</label>
                                    <div class="col-lg-10">
                                        <div class="form-group input-group-sm">
                                            <div class="form-group">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input id="habla_namuy_wam" name="habla_namuy_wam" value="No habla" data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            required="" type="radio" aria-required="true">
                                                        No habla
                                                    </label>
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="habla_namuy_wam" value="Entiende, pero no habla"
                                                            data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            required="" type="radio" aria-required="true">
                                                        Entiende, pero no habla
                                                    </label>
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="habla_namuy_wam" value="Si Habla" data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            name="" required="" type="radio" aria-required="true">
                                                        Si Habla
                                                    </label>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 control-label"> Escritura </label>
                                    <div class="col-lg-10">
                                        <div class="form-group input-group-sm">
                                            <div class="form-group">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="escritura_namuy_wam" value="No escribe" data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            required="" type="radio" aria-required="true">
                                                        No escribe
                                                    </label>
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="escritura_namuy_wam" value="Escribe, pero no habla"
                                                            data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            required="" type="radio" aria-required="true">
                                                        Escribe, pero no habla
                                                    </label>
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="escritura_namuy_wam" value="Escribe y habla"
                                                            data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            required="" type="radio" aria-required="true">
                                                        Escribe y habla
                                                    </label>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>
                    {{--
                    <div class="contenedor_informacion_persona">
                        <div class="recuadro_info_persona"> CONOCIMIENTOS DEL ESPAÑOL DE: {{ $datos->nombres }}
                            {{ $datos->apellidos }} CC N° {{ $datos->documento_persona }}</div>
                        <div class="col-xs-12 col-xs-12 estilo1" id="español">
                            <fieldset>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 control-label">Habla Español </label>
                                    <div class="col-lg-10">
                                        <div class="form-group input-group-sm">
                                            <div class="form-group">
    
    
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="habla_español" value="No habla" data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            id="radio-36920633" name="" required="" type="radio"
                                                            aria-required="true">
                                                        No habla
                                                    </label>
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="habla_español" value="Entiende, pero no habla"
                                                            data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            id="radio-36920633" name="" required="" type="radio"
                                                            aria-required="true">
                                                        Entiende, pero no habla
                                                    </label>
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="habla_español" value="Si Habla" data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            id="" name="" required="" type="radio" aria-required="true">
                                                        Si Habla
                                                    </label>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 control-label">Escritura </label>
                                    <div class="col-lg-10">
                                        <div class="form-group input-group-sm">
                                            <div class="form-group">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="escribe_español" value="No escribe" data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            required="" type="radio" aria-required="true">
                                                        No escribe
                                                    </label>
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="escribe_español" value="Escribe,pero no habla"
                                                            data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            required="" type="radio" aria-required="true">
                                                        Escribe,pero no habla
                                                    </label>
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="escribe_español" value="Escribe y habla"
                                                            data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            id="" name="" required="" type="radio" aria-required="true">
                                                        Escribe y habla
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
    
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>^--}}
                    {{--
                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona"> {{ $datos->nombres }} {{ $datos->apellidos }} CC N°
                            {{ $datos->documento_persona }} SE VISTE CON EL VESTIDO PROPIO</div>
    
    
    
                        <div class="col-xs-12 col-xs-12   estilo1">
    
                            <br>
                            <fieldset>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 control-label">Vestimenta </label>
                                    <div class="col-lg-10">
                                        <div id="vestimenta" class="form-group input-group-sm">
                                            <div class="form-group">
    
    
                                                <div class="btn-group contendor_bt" data-toggle="buttons">
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="vestimenta_misak" value="No se viste" data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            required="" type="radio" aria-required="true">
                                                        No se viste
                                                    </label>
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="vestimenta_misak" value="Se viste cada evento especial"
                                                            data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            required="" type="radio" aria-required="true">
                                                        Se viste cada evento especial
                                                    </label>
                                                    <label class="btn btn-conocimiento" class="btn btn-info active"
                                                        data-toggle="tooltip" data-placement="bottom">
                                                        <input name="vestimenta_misak" value="Si se viste" data-val="true"
                                                            data-val-required="El nivel de habilidad es un campo obligatorio"
                                                            required="" type="radio" aria-required="true">
                                                        Si se viste
                                                    </label>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
    
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>--}}
                    {{--
                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona">CONOCIMIENTOS ANCESTRALES DESDE SER MISAK DE:
                            {{ $datos->nombres }}
                            {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
    
    
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <!--Columna 1-->
    
                                <div class="form-group input-group-sm">
                                    <label><span class="asterisco">*</span>¿Es usted médico tradicional? </label>
                                    <select id="medico_tradicional" name="medico_tradicional" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Ninguno">Ninguno</option>
                                    <option value="Partera">Partera/o</option>
                                    <option value="Sobandero">Sobandero/a</option>
                                    <option value="Pulsador">Pulsador/a</option>
                                    <option value="Medico T">Mørøpik</option>
    
                                    </select>
                                </div>
    
                            </div> <!-- Fin de Columna 1-->
    
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <!--Columna 2-->
    
                                <div class="form-group input-group-sm">
                                    <label><span class="asterisco">*</span>¿Tiene usted conocimientos empíricos “Saberes locales”?
                                    </label>
                                    <select id="conocimientos_empiricos" name="conocimientos_empiricos" class="form-control" required>
                                        
                                    <option value="">Seleccione</option>
                                    <option value="7">Ninguno</option>
                                    <option value="1">Artesano/a</option>
                                    <option value="2">músico</option>
                                    <option value="3">deportistas</option>
                                    <option value="4">consejeros (wachip, kᶿrᶿshᶿp)</option>
                                    <option value="5">constructor/a</option>
                                  <option value="8">pintor/a</option>
                                    <option value="9">mecanico/a</option>
                                    <option value="10">cerámica </option>
                                    </select>
                                </div>
    
    
                            </div> <!-- Fin Columna 2-->
    
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>
    
                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona"> HÁBITOS DE VIDA SALUDABLES DE: {{ $datos->nombres }}
                            {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }} </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-12 col-xs-12">                           <!--Columna 1-->
                                <div class="form-group input-group-sm">
                                    <label><span class="asterisco">*</span>¿Que actividades propios realiza con mas frecuencia  dentro del territorio?</label>
                                    <select id="deporte_constante" name="deporte_constante" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1">Recorrido a las lagunas dentro del territorio</option>
                                    <option value="2">Recorrido de limintes dentro del territorio</option>
                                    <option value="3">Compartir la palabra con los shures y shuras </option>
                                    <option value="4">otros</option>
                                    </select>
                                </div>
    
                                <div class="form-group input-group-sm">
                                    <label f><span class="asterisco">*</span>¿Conoce lugares sagrados dentro del resguardo de
                                        Guambia?</label>
                                    <select id="lugares_sagrados" name="lugares_sagrados" class="form-control" required>
                                        <option value="">Seleccione</option>
                                        <option value="sí">Sí</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
    
                            </div> <!-- Fin de Columna 1-->
    
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <!--Columna 2-->
                              
                                <div class="form-group input-group-sm">
                                    <label><span class="asterisco">*</span>¿Conoce algun juegos tradicionales?</label>
                                    <select id="juegos_tradicionales" name="juegos_tradicionales" class="form-control" required>
                                        <option value="">Seleccione</option>
                                        <option value="Sí">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="form-group input-group-sm">
                                    <label f><span class="asterisco">*</span>¿Le realizan baños en las diferentes etapas de
                                        la vida? </label>
                                    <select id="baños_etapas_vida" name="baños_etapas_vida" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Vientre (preconcepción)">Vientre (preconcepción) </option>
                                    <option value="Concepción">Concepción</option>
                                    <option value="Niñez">Niñez</option>
                                    <option value="Juventud">Juventud</option>
                                    <option value="Adulto mayor">Adulto mayor</option>
                                    <option value="Adulto mayor">Ninguno</option>
                                    </select>
                                </div>
                                <!-- <div class="form-group input-group-sm">
                                                     <label ><span class="asterisco">*</span>cual? </label>
                                                          <input type="text"  name="" id="nombre5" placeholder="Ingrese contenido"  class="form-control" style="text-transform:uppercase;" style="width:300px" > 
                                                      </div>-->
    
                            </div> <!-- Fin Columna 2-->
    
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>
               {{--
                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona">____________</div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
    
    
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <!--Columna 1-->
    
                                <div class="form-group input-group-sm">
                                    <label f><span class="asterisco">*</span>¿Le realizan baños en las diferentes etapas de
                                        la vida? </label>
                                    <select id="baños_etapas_vida" name="baños_etapas_vida" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Vientre (preconcepción)">Vientre (preconcepción) </option>
                                    <option value="Concepción">Concepción</option>
                                    <option value="Niñez">Niñez</option>
                                    <option value="Juventud">Juventud</option>
                                    <option value="Adulto mayor">Adulto mayor</option>
                                    <option value="Adulto mayor">Ninguno</option>
                                    </select>
                                </div>
    
                            </div> <!-- Fin de Columna 1-->
    
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <!--Columna 2-->
    
                                <div class="form-group input-group-sm">
                             {{--
                                    <div id="Mujer">
                                        <div class="form-group input-group-sm">
                                            <label for="ddMujer"><span class="asterisco">*</span>¿Cuando llega la
                                                menstruación usted guarda?</label>
                                            <select name="mestruacion" id="mestruacion"
                                                class="form-control">
                                                <option value="">Seleccione</option>
                                                <option value="Sí">SI</option>
                                                <option value="No">NO</option>
                                            </select>
                                        </div>
                                    </div>--}} {{-- 
                                </div>
    
                            </div> <!-- Fin Columna 2-->
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>
    
                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
    
    
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <!--Columna 1-->
    
                                <div class="form-group input-group-sm">
                                    <label f><span class="asterisco">*</span>¿Precenta alguna de estas enfermedades? </label>
                                    <select id="enfermedades_id" name="enfermedades_id" class="form-control" required>
                                        <option value="">Seleccione</option>
                                        @foreach($enfermedades as $key => $enfermedad)
                                            <option value="{{ $key }}"> {{ $enfermedad }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="form-group input-group-sm">
                                    <label f><span class="asterisco">*</span>¿Recurre a la medicina alternativa? </label>
                                    <select id="medicina_alternativa" name="medicina_alternativa" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Ninguno">Ninguno </option>
                                    <option value="Homeópata">Homeópata</option>
                                    <option value="Reflexología">Reflexología</option>
                                    <option value="Acupuntura">Acupuntura</option>
                                    <option value="Aromaterapia">Aromaterapia</option>
                                    <option value="Temascal">Temascal</option>
                                    <option value="Yagüe">Yagüe</option>
                                    <option value="Rape">Rape</option>
                                    <option value="Dudoterapia">Dudoterapia </option>
                                    </select>
                                </div>
    
                            </div> <!-- Fin de Columna 1-->
    
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <!--Columna 2-->
    
                                <div class="form-group input-group-sm">
                                    <label><span class="asterisco">*</span>¿Usted consume? </label>
                                    <select id="consumo_sustancias" name="consumo_sustancias" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1">Alcohol</option>
                                    <option value="2">Cigarrillo</option>
                                    <option value="3">Sustancias psicoactivas </option>
                                    <option value="4">No consume</option>
                                    </select>
                                </div>
    
    
                            </div> <!-- Fin Columna 2-->
    
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>
                   
                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
    
                        <div class="recuadro_info_persona"> SELECCIONE SI TIENE ALGUNA DE ESTAS LIMITACIONES FÍSICAS
                            {{ $datos->nombres }} {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
    
                            <div id="limitaciones" class="col-md-3 col-lg-3">
                                </ul>
                                @foreach($limitaciones_fisinas as $limitacion)
                                    <li>
                                        <label>
                                            {{ Form::checkbox('limitaciones_fisinas[]', $limitacion->id, null) }}
                                            {{ $limitacion->nombre }}
                                        </label>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
    
                        </div>
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    
                    <div id="educacionDiv" class="col-md-12 form-group" style="display: none;">
                                <input class="form-control" id="educacionInput" type="text" style="text-align: center;" disabled>                                            
                            </div>
--}}
                    {{-- Informacion de educación formal --}}
                    <div id="SiTieneEducacion">
                        <div class="recuadro_info_persona">SELECCIONE EL COLEGIO DONDE HA ESTUDIADO - </div>
                            <div id="educacionDiv" class="col-md-12 form-group" style="display: none;">
                                <input class="form-control" id="educacionInput" type="text" style="text-align: center;" disabled>                                            
                            </div>
                        <div class="container">
                        <div class="contenedor_informacion_persona">

                            <div class="row">
                                <div class="col-md-12 form-group input-group-sm">
                                    <div class="etiqueta2"> Recuerde que los campos con un asterisco (*) son
                                        obligatorios.
                                    </div>
                                </div>
                            </div>
    

                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Seleccione departamento(*)</div>
    
                                    <select id="departamento" name="departamento" class="form-control">
                                        <option value="">Seleccione</option>
                                       
                                    </select>
    
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Seleccione Municipio(*)</div>
    
                                    <select id="municipio" name="municipio" class="form-control">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Seleccione Nombre del colegio(*)</div>
    
                                    <select id="colegio" name="colegio" class="form-control">
                                        <option value="">Seleccione</option>
                                    </select>
    
                                </div>
                            </div>
                 
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Seleccione Estado(*)</div>
                                    <select id="estado" name="estado" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="En Curso">En Curso</option>
                                        <option value="Incompleto">Incompleto</option>
                                        <option value="Graduado">Graduado</option>
                                        <option value="Retirado">Retirado</option>
                                    </select>
                                </div>
                            </div>
                            </div>
    
                            <div class="row">
                            <div class="contenedor_informacion_persona">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Año que Termino el Colegio/a (*)</div>
                                    <input id='anio' name='anio' type="number" placeholder="YYYY">
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Modalidad del Colegio(*)</div>
                                    <input type="text" id="modalidad" name="modalidad"
                                        placeholder="Ingrese modalidad de estudio" class="form-control">
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div for="ddNoEstudiaResguardo" class="etiqueta2">Tiene estudios de Educacion
                                        Superior(*)</div>
                                    <select name="nivel_academico" class=" form-control" id="ddNoEstudiaResguardo"
                                        onchange="showNoEstudiaResguardo(this);" autocomplete="of">
                                        <option value="">Seleccione</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>

          <div class="clearfix"></div>
                    

                    {{-- BOTON SUBMIT --}}
                 <!--   <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success" style="background-color:#1b9e1d;color:white;" >Guardar</button>
                            </div>
                        </div>
                    </div>-->>
                    <br>

                   <div class="cont-botons-action-formulario row m-0 justify-content-md-center boton_guardar">
					<small class="mensaje-form font-weight-bold"><svg class="svg-inline--fa fa-robot fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="robot" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M32,224H64V416H32A31.96166,31.96166,0,0,1,0,384V256A31.96166,31.96166,0,0,1,32,224Zm512-48V448a64.06328,64.06328,0,0,1-64,64H160a64.06328,64.06328,0,0,1-64-64V176a79.974,79.974,0,0,1,80-80H288V32a32,32,0,0,1,64,0V96H464A79.974,79.974,0,0,1,544,176ZM264,256a40,40,0,1,0-40,40A39.997,39.997,0,0,0,264,256Zm-8,128H192v32h64Zm96,0H288v32h64ZM456,256a40,40,0,1,0-40,40A39.997,39.997,0,0,0,456,256Zm-8,128H384v32h64ZM640,256V384a31.96166,31.96166,0,0,1-32,32H576V224h32A31.96166,31.96166,0,0,1,640,256Z"></path></svg><!-- <i class="fas fa-robot"></i> Font Awesome fontawesome.com --> Hola, <span>Se guardaron cambios automaticamente</span></small>
					<button type="submit"  id="guardar" class="btn btn-md btn-primary col-6 col-sm-3"><svg class="svg-inline--fa fa-save fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" role="img" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg><!-- <i class="fas fa-save"></i> Font Awesome fontawesome.com --> Guardar cambios</button>
					<a id="btn-ver-hdv" href="" class="btn btn-md btn-success col-6 col-sm-3"><svg class="svg-inline--fa fa-eye fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg><!-- <i class="fas fa-eye"></i> Font Awesome fontawesome.com --> Cancelar</a>
				</div>

                </form>

                {{-- Informacion de educación superior --}}
                <div id="NoGustaQueEstudienGuambia" style="visibility: hidden; display: none;">
                    <div class="container">
                        <div class="contenedor_informacion_persona">
                            <!--Contenedor informacion_persona --->
    
                            <div class="recuadro_info_persona">Agregar el Nivel de Educacion superior</div>
    
                            <div class="contenedor_informacion_persona">
                                <div class="container">
                                    <form id="formSuperior">
                                        <div class="form-group input-group-sm col-md-4">
                                            <label><span class="asterisco">*</span>Tipo Educacion Superior
                                            </label>
                                            <select id="tipo_educacion_superior" name="tipo_educacion_superior"
                                                class="form-control" required>
                                                <option value="">Seleccione</option>
                                                <option value="TL">Técnica Laboral</option>
                                                <option value="TC">Tecnológica</option>
                                                <option value="UN">Universitaria</option>
                                                <option value="EP">Especialización</option>
                                                <option value="ME">Maestria</option>
                                                <option value="DOC">Doctorado</option>
                                            </select>
                                        </div>
    -
                                        <div class="form-group input-group-sm col-md-4">
                                            <label>
                                                <span class="asterisco">*</span>
                                                Estado</label>
                                            <select id="estado_actual" name="estado_actual" class="form-control" required>
                                                <option value="">Seleccione</option>
                                                <option value="En Curso">En Curso</option>
                                                <option value="Incompleto">Incompleto</option>
                                                <option value="Graduado">Graduado</option>
                                                <option value="Retirado">Retirado</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group-sm col-md-4">
                                            <label><span class="asterisco">*</span>Nombre de la
                                                Carrera</label>
                                            <input id="nombre_carrera" name="nombre_carrera" type="text"
                                                class="form-control" placeholder="Nombre carrera" required>
                                        </div>
                                        <div class="form-group input-group-sm col-md-12">
                                            <input type="submit" class="Agregareducacion"  
                                                value="Agregar carrera de educacion superior" id="agregarCarrera"
                                                class="btn btn-primary" data-index="-1">
                                                
                                                <button type="reset" class="btn btn-primary">Resetear</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="titulo_informacion">
                        <h1>Estudios realizados de Educación superior</h1>
                    </div>
    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Tipo Educacion Superior</th>
                                <th>Nombre de la Carrera</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="bodyTable">
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>


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
                    <p>¿Está seguro de haber ingresado la información correcta en los  respectivos formularios...?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    //--Modificación para disminuir lentitud de la página y disminuir las peticiones al servidor.
    //PARA QUE APARESCAN LOS OBCIONES   CUANDO SELECCIONE SI O NO / EDUCACION SUPERIOR 

        //// SI TIENE EDUCACION SUPERIOR //////////////////
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

</script>

<script>
    let datosPersona = {!!($datos->status==0?0:$datosPersona)!!};
    let formEduFormal=$('#formFormal');
    let estidioSuperior = [];
    $(document).ready(() => {
        
        window.onbeforeunload = function() { return "Your work will be lost."; };

        if(datosPersona!=0){
            cargarFormulario();
        }

        $('#btnSiguiente').click(()=>{
            $.ajax({
                type: "DELETE",
                url: location.href,
                data: formEduFormal.serialize(),
                dataType: "json",
                success: function (response) {
                    if(response.validate){
                        location.href = `resumen`;
                    }else{
                        Swal.fire(
                            'Error',
                            validate.mensaje,
                            'error'
                        );
                    }
                }
            });
        });

        $('#departamento').change(() => {
            if ($('#departamento').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultarmunicipios/${$('#departamento').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#municipio').empty();
                        $('#municipio').append('<option value="">Seleccione</option>');
                        $.map(response, (municipio, index) => {
                            $('#municipio').append(
                                `<option value="${municipio.codigo_muni}">${municipio.nombre_municipio}</option>`
                                );
                        });
                    });
            }
        });

        $('#municipio').change(() => {
            if ($('#municipio').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultarcolegios/${$('#municipio').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#colegio').empty();
                        $('#colegio').append('<option value="">Seleccione</option>');
                        $.map(response, (colegio, index) => {
                            $('#colegio').append(
                                `<option value="${colegio.codigo_colegio}">${colegio.nombre_colegio}</option>`
                                );
                        });
                    });
            }
        });

        $('#colegio').change(() => {
            if ($('#colegio').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultarsedes/${$('#colegio').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#sede').empty();
                        $('#sede').append('<option value="">Seleccione</option>');
                        $.map(response, (sede, index) => {
                            $('#sede').append(
                                `<option value="${sede.codigo_sede}">${sede.nombre_sede}</option>`
                            );
                        });
                    });
            }
        });

        $('#sede').change(() => {
            if ($('#sede').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultartiposeducacion/${$('#sede').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#tipo_educacion').empty();
                        $('#tipo_educacion').append('<option value="">Seleccione</option>');
                        $.map(response, (tipo, index) => {
                            $('#tipo_educacion').append(
                                `<option value="${tipo.codigo_tipo}">${tipo.tipo}</option>`
                                );
                        });
                    });
            }
        });

        let modalConfirm = $('#ConfirmAction');

        formEduFormal.submit((e)=> {
            e.preventDefault();
        });

        let formSuperior = $('#formSuperior');
        formSuperior.submit((e) => {
            e.preventDefault();
            var estudio = {};
            $.map(formSuperior.serializeArray(), function (element, index) {
                estudio[element['name']] = element['value'];
            });
            if($('#agregarCarrera').data('index') == -1){
                // Registrar Carrera
                estidioSuperior.push(estudio);
            }else{
                // Actualizar carrera
                estidioSuperior[$('#agregarCarrera').data('index')] = estudio;
            }

            $('#bodyTable').html(estructurarTablaDeCarreras());
            formSuperior[0].reset();
        });

        $("[type='reset']").closest('#formSuperior').on('reset', function () {
            $('#agregarCarrera').data('index', '-1');
        });

        let formInfoPersonal = $('#formInfoPersonal');
        formInfoPersonal.on('submit', (event)=> {
            event.preventDefault();
            modalConfirm.modal('show');
        }); 

        $('#btnConfirmar').click((e) => { 
            e.preventDefault();
            let data = new FormData($('#formInfoPersonal')[0]);

            $.ajax({
                type: 'POST',
                headers: {"X-CSRF-TOKEN": $('[name=_token]').val()},
                url: location.href,
                data: data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.result) {
                        if(estidioSuperior.length > 0){
                            $.ajax({
                                url: 'educacion-superior',
                                type: 'POST',
                                data: { 
                                    estudioSuperior: JSON.stringify(estidioSuperior),
                                    id_info_persona: response.id,
                                },
                                success: function (response) {
                                    if(response.result){
                                        setTimeout(() => {
                                            Swal.fire(
                                                'Exito',
                                                'Se ha actualizado exitosamente',
                                                'success'
                                            );
                                        }, 200);

                                        setTimeout(function () {
                                            location.href = `resumen-docente`;
                                        }, 2000);

                                    }else{
                                        setTimeout(() => {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: response.mensaje,
                                            });
                                        }, 200);
                                    }     
                                }
                            });
                        }else{
                            setTimeout(() => {
                                Swal.fire(
                                    'Exito',
                                    'Se ha actualizado exitosamente',
                                    'success'
                                );
                            }, 200);

                            setTimeout(function () {
                                 location.href = `resumen-docente`;
                            }, 2000);
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.mensaje,
                        })
                    }
                }
            }).fail((error) => {
                // console.log(e.responseJSON.errors);
                let mensaje='';
                $.map(error.responseJSON.errors, function (elementOrValue, indexOrKey) {
                    // console.log(elementOrValue);
                    mensaje+= elementOrValue[0]+"  ";
                });
                setTimeout(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: mensaje,
                    });
                }, 200);

            }).always(() => {
                modalConfirm.modal('hide');
            });

        });


    });

    function cargarFormulario(){
        $('#genero').val(datosPersona.sexo);
        $('#religion').val(datosPersona.religion);
        $('#empresa_asociativa').val(datosPersona.empresa_asociativa);
        $('#enfemerma_recurre').val(datosPersona.enfemerma_recurre);
        $('#carnet_salud_id').val(datosPersona.carnet_salud_id);
        $('#profecion_id').val(datosPersona.profecion_id);
        $('#comunidad_indigena').val(datosPersona.comunidad_indigena);
        $('#telefono').val(datosPersona.telefono);
        $('#email').val(datosPersona.email);
        $('#postgradual').val(datosPersona.postgradual);

        
        $('#fechaexpedicioncc').val(datosPersona.fechaexpedicioncc);
        $('#direccion').val(datosPersona.direccion);

        $('#comunidad_indigena').val(datosPersona.comunidad_indigena);
        shoIndigeana1($('#comunidad_indigena'));
        $('#comunidad_indigena_cual').val(datosPersona.comunidad_indigena_cual);
        
        $('#director_grado').val(datosPersona.director_grado);
        showArmonizacion($('#director_grado'));

        $('#director_grado').val(datosPersona.director_grado);
        $('#n_estudiantes').val(datosPersona.n_estudiantes);
        $('#ne_misak').val(datosPersona.ne_misak);
        $('#ne_nasa').val(datosPersona.ne_nasa);
        $('#ne_yanacula').val(datosPersona.ne_yanacula);
        $('#n_envera').val(datosPersona.n_envera);
        $('#n_campesino').val(datosPersona.n_campesino);
        $('#ne_otro_etnia').val(datosPersona.ne_otro_etnia);
        $('#nombre_grado').val(datosPersona.nombre_grado);


       

        
        

        
        
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

        let educacionFormal={!!($educacionFormal)!!};
        if(educacionFormal.length>0){
            $('#educacionDiv').show();
            $('#educacionInput').val(educacionFormal[0].nombre_depatamento+' - '+
            educacionFormal[0].nombre_municipio+' - '+educacionFormal[0].nombre_colegio+'  - '+educacionFormal[0].estado+' - '+
            educacionFormal[0].año_educacion+' - '+educacionFormal[0].modalidad_colegio);
        }

        
        

        


        estidioSuperior={!!($educacionSuperior)!!};
        if(estidioSuperior.length>0){
            $('#ddNoEstudiaResguardo').val('1');
            showNoEstudiaResguardo($('#ddNoEstudiaResguardo'));
            $('#bodyTable').html(estructurarTablaDeCarreras());
        }
        
    }

    function estructurarTablaDeCarreras(){
        let html = '';
            $.each(estidioSuperior, function (index, element) {
                html+=`<tr>
                        <td>${index + 1}</td>
                        <td>${element.tipo_educacion_superior}</td>
                        <td>${element.nombre_carrera}</td>
                        <td>${element.estado_actual}</td>
                        <td>
                            <button type="button"  class="borrar" onClick="editar('${index}')">Editar</button>
                            <button type="button"  class="borrar" onClick="borrar('${index}')">Eliminar</button>
                        </td>
                     </tr>`;
            });
        return html;
    }

    function borrar(index) {
        estidioSuperior.splice(index, 1);
        $('#bodyTable').html(estructurarTablaDeCarreras());
    }

    function editar(index) {
        $('#tipo_educacion_superior option').attr('selected', false);
        $('#estado_actual option').attr('selected', false);
        $('#tipo_educacion_superior').val(estidioSuperior[index].tipo_educacion_superior);
        $('#estado_actual').val(estidioSuperior[index].estado_actual);
        $('#nombre_carrera').val(estidioSuperior[index].nombre_carrera);
        $('#agregarCarrera').data('index', index); //-1 = Register, >=0 = Actualizar
    }

</script>

{{--selector de direccion  del trabajador --}}
<script type="text/javascript">
$('#departamentos').change(function() {
    var departamentoID = $(this).val();
    if (departamentoID) {
        $.ajax({
            type: "GET",
            url: "{{url('/get-municipio-lists')}}?codigo_departamento=" + departamentoID,
            success: function(res) {
                if (res) {
                    $("#codigo_municipio").empty();
                    $("#codigo_municipio").append('<option>Seleccione Municipio</option>');
                    $.each(res, function(key, value) {
                        $("#codigo_municipio").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#codigo_municipio").empty();
                }
            }
        });
    } else {
        $("#codigo_municipio").empty();

    }
});

{{--selector de municipio de expedicion de cedula  --}}

$('#departamentoexp').change(function() {
    var departamentoexpID = $(this).val();
    if (departamentoexpID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-municipioexpe-list')}}?codigo_departamento=" + departamentoexpID,
            success: function(res) {
                if (res) {
                    $("#municipio_expedicion").empty();
                    $("#municipio_expedicion").append('<option>Seleccione Municipio</option>');
                    $.each(res, function(key, value) {
                        $("#municipio_expedicion").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#municipio_expedicion").empty();
                }
            }
        });
    } else {
        $("#municipio_expedicion").empty();

    }
});


{{--selector de municipio de expedicion de cedula  --}}

$('#tipo_vinculacion').change(function() {
    var tipo_vinculacionID = $(this).val();
    if (tipo_vinculacionID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-nombre_desempeno-list')}}?id_vinvulacion=" + tipo_vinculacionID,
            success: function(res) {
                if (res) {
                    $("#nombre_esempeno").empty();
                    $("#nombre_esempeno").append('<option>Seleccione nombre_esempeno</option>');
                    $.each(res, function(key, value) {
                        $("#nombre_esempeno").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#nombre_esempeno").empty();
                }
            }
        });
    } else {
        $("#municipio_expedicion").empty();

    }
});
</script>

@endsection
