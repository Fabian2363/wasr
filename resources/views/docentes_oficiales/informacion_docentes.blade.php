@extends('layouts.menu2')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-------///////////selecc bootstrap abilita si es necesario //////////--------
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <!------////////////////------>
   <!------//////// select selct2 abilita si es necesario  ////////------>

<link href="{{ asset('css/form_ingreso_familia.css') }}" rel="stylesheet">
 <!------////////////////------>
<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>@lang('docentes oficales ')</h1>
        <h2 class="">@lang('Información Persona')</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">@lang('Inicio')</a></li>
            <li><a href="#">@lang('Censo Poblacional')</a></li>
            <li class="active">@lang('Información Persona')</li>
        </ol>
    </div>
</div>
{{--{{count($datosPersona)}}--}}

<!-- INICIO DE  CODIGO DE FORMULARIO -->

<div class="container">

    <!--Informacion menu izquierda-->
    <div class="col-md-3 col-sm-4 col-xs-12 ">

        <iframe frameborder="0" width="100%" scrolling="no" height="245" src="">

        </iframe>
    </div>
    <!-- Fin Informacion menu izquierda-->
    <div class="col-md-9 ">
        <div class="ContenedorFormularioCenso">
            <div class="titulo_informacion">
            <div class="table-container table-responsive-md">
                <table>
                    <tbody>
                        <tr>
                          

                           

                            <td style="width:3px;"></td>
                            <td title="Miembros de la familia   Misak ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td><b href="">@lang('DATOS PERSONALES')</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href="">@lang('PERSONA') </b>
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
                                                <b href="">@lang('INFORMACIÓN DOCENTE')</b> </b>
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
                                                <b href="">@lang('NIVEL EDUCATIVO') </b>
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
                    <span class="color_infor  noPrint">@lang('Usted se encuentra en:')' &nbsp;&nbsp;@lang('Censo Poblacional Misak SIPEMP')&gt; <font color="#666666">@lang('Información Persona')</font></span>
                </div>
                <h1>@lang('Información Persona') </h1>
            </div>
            <!--FIN titulo_infobasica-->

            <!-- FORMULARIO-->
            <form id="censoPersona" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <!-- Codigos foraneos tabla personas -->
                <input name="hoga_id" type="hidden" value="{{ $datos->hogar_id }}">

                <input name="persona_id" type="hidden" value="{{ $datos->id }}">
                <!---- fin codigos foraneos -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                      
                    <div class="recuadro_info_persona"> @lang('INGRESE INFORMACIÓN GENERAL DE:') {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }} </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">

                            
                            
                            <div class="row">
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Genero</div>
                                <select name="genero" id="genero" class="form-control" style="width:"
                                    ="" required autocomplete>
                                    <option value="">Seleccione</option>
                                    <option value="M">Hombre</option>
                                    <option value="F">Mujer</option>

                                </select>

                            </div>
                           

                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">*@lang('¿Cuál carnet de salud tiene?')</div>
                                <select id="carnet_salud_id" name="carnet_salud_id"  id="select2_example"  id="framework" class="form-control"
                                    style="width:" ="" required autocomplete>
								 <option value="">Seleccione carnet de Salud</option>
                                    @foreach($carnet_salud as $key => $carnet_salud)
                                        <option value="{{ $key }}"> {{ $carnet_salud }}</option>
                                    @endforeach
                                </select>
                            </div>
				             <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Número Telefono:</div>
                                  <input id="telefono" name="telefono" placeholder="Teléfono"   class="form-control" type="number" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required autocomplete  >
                           
                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Correo Electronico:</div>
                                <input id="email" name="email" placeholder="email"   class="form-control" type="text"  required autocomplete >
                           
                            </div>


                        </div>
                        <div class="col-md-6 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Departamento Expedicion Cedula de Ciudadania (*)')</div>
                                    <select name="departamento" id="departamentoexp" class="form-control" style="width:"
                                    required="">
                                    <option value="" selected disabled>Selecione Departamento</option>
                                    @foreach($departamento_expedicion as $key => $departamento_expedicion)
                                    <option value="{{$key}}"> {{$departamento_expedicion}}</option>
                                    @endforeach
                                </select>

                                </div>
                                <div class="col-md-6 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Municipio de Expedicion CC(*)')</div>
                                    <select name="id_municipio_expedicion" id="municipio_expedicion" class="form-control" style="width:" required="">
                                </select>
                                </div>
                             
								
                            <div class="col-md-4 form-group input-group-sm">
                                 <div     for="ddIndigena" class="etiqueta2 usuario">¿Indigena?</div>
                               <select name="comunidad_indigena" id="ddIndigena" tabindex="51" class="form-control" onchange="shoIndigeana(this);" required autocomplete>
		    <option value="">Seleccione</option>
		    <option value="1">SI</option>
		    <option  value="2">NO</option>

	       </select>

                            </div>
							<div id="SiIndigena" style="visibility: hidden; display: none;">
                            <div class="col-md-4 form-group input-group-sm">
                                <div class="etiqueta2 usuario">¿Cual?</div>
                                
									  <input  name="comunidad_indigena_cual"  type= "text"id="ddSiIndigena" tabindex="52" class="form-control" style="display: none;" >
		                              
	                              
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
								
						
						
                        <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2"> Dirección del Empleado.(*)</div>
                                <input type="text" name="txtDir" id="txtDir" maxlength="100"
                                    placeholder="-"
                                    class="form-control" readonly="readonly" autocomplete="on" required autocomplete>
                            </div>
                        </div>

                       
                            <div id="educacionDiv" class="col-md-12 form-group" style="display: none;">
                                <input class="form-control" id="educacionInput" type="text" style="text-align: center;" disabled>                                            
                            </div>
							
                        <div class="row">
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Departamento</div>
                                <select name="departamento" id="departamentos" class="form-control" style="width:"
                                required autocomplete>
                                    <option value="" selected disabled>Selecione Departamento</option>
                                    @foreach($departamento as $key => $departamento)
                                    <option value="{{$key}}"> {{$departamento}}</option>
                                    @endforeach

                                </select>

                            </div>

                         

                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Municipio</div>
                                <select name="codigo_municipio" id="municipios" class="form-control" style="width:" required autocomplete>
                                </select>
                            </div>
                            <div class="col-md-6 form-group input-group-sm">
                                <div class="etiqueta2">Barrio / Vereda.(*)</div>
                                <input type="text" name="direccion" id="direccion" onchange="Bus();" maxlength="50"
                                    placeholder="Ingrese su Direccion" onkeypress="return validar(event)"
                                    class="form-control" autocomplete="on" required autocomplete>
                            </div>

                        </div>
						

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona --///////////////////////////////////
                ///////////////////////////////////////////////////////77777777
                //////////////////////////////////////////////////////77777777
                ///////////////////////////////////////////////////////////////7777777777
                //////////////////////////////////////////////////////////////////77777


                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona">@lang('SELECCIONE LOS IDIOMAS QUE HABLA:')' {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
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
                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona">@lang('CONOCIMIENTOS DE NAMUY WAM DE:') {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>

                    <div class="col-xs-12 col-xs-12 estilo1" id='namuy_wam'>
                        <fieldset>
                            <div class="form-group">
                                <label for="" class="col-lg-2 control-label">@lang('Habla Namuy Wam')</label>
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
                                <label for="" class="col-lg-2 control-label">@lang(' Escritura') </label>
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
                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                   <!-- <div class="recuadro_info_persona">@lang('CONOCIMIENTOS DEL ESPAÑOL DE:') {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
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
                    <!--Cierra el contenedor 2 . recuadro --
                </div>
                <!--Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                  <!--  <div class="recuadro_info_persona"> {{ $datos->nombres }} {{ $datos->apellidos }} CC N°
                        {{ $datos->docomento_persona }} @lang('SE VISTE CON EL VESTIDO PROPIO')</div>



                    <div class="col-xs-12 col-xs-12   estilo1">

                        <br>
                        
                        <fieldset>
                            <div class="form-group">
                                <label for="" class="col-lg-2 control-label">Vestido </label>
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
                        </fieldset>-->
                        <br>
                        <!--
									 <fieldset>
                                     <div class="form-group">
                                        <label for="" class="col-lg-2 control-label">Escritura  </label>
                                          <div class="col-lg-10">
                                              <div class="form-group input-group-sm">
                                                    <div class="form-group">
                                                            
                                                      
                                                         <div class="btn-group" data-toggle="buttons">
                                                                <label  class="btn btn-conocimiento" class="btn btn-info active" data-toggle="tooltip" data-placement="bottom" >
                                                                    <input   data-val="true" data-val-required="El nivel de habilidad es un campo obligatorio" id="radio-36920633" name="" required="" type="radio" aria-required="true">
                                                                    No escribe 
                                                                  </label>
																   <label  class="btn btn-conocimiento"  class="btn btn-info active"data-toggle="tooltip" data-placement="bottom" >
                                                                    <input   data-val="true" data-val-required="El nivel de habilidad es un campo obligatorio" id="radio-36920633" name="" required="" type="radio" aria-required="true">
                                                                     Escribe, pero no habla 
                                                                   </label>
                                                                   <label  class="btn btn-conocimiento"  class="btn btn-info active" data-toggle="tooltip" data-placement="bottom" >
                                                                    <input   data-val="true" data-val-required="El nivel de habilidad es un campo obligatorio" id="" name="" required="" type="radio" aria-required="true">
                                                                    Escribe y habla 
                                                                    </label>
                                                         </div>
                                                       
                                                       </div>
                                                    </div>
                                                  </div>
                                            </div>
											</fieldset>--

                    </div>
                    <div class="clearfix"></div>
                    Cierra el contenedor 2 . recuadro -->
                </div>
                <!--Fin del contenedor informacion_persona -->
                <div class="row">
<div class="contenedor_informacion_persona">
							<div class="row separador">
                            <div class="col-md-12 form-group text-center align-text-botton">
                            INFORMACIÓN  ENFERMEDAD  DE BASE  DE :{{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}
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
                    </div>-->
                   
                          <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label for="ddArmonizacion"><span class="asterisco">*</span>@lang('¿Tiene enfermedades de base? ') </label>
                                                <select name="rituales_armonizacion" id="ddArmonizacion"
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
                                             </div>-->
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
                        <div class="etiqueta2 ">Describa la enfermedad de base  que tiene  maximo 200  caracteres.</div>
                        <textarea class="form-control" id="ddSiHaceArmonizacion" class="form-control"  onchange="shoeducacion7(this);" style="display: none;" rows="3" name="observaciones" id="txtObservacion" placeholder="Ingrese Observaciones del empleado." onkeydown="valida_longitud(this.name)" onkeyup="valida_longitud(this.name)" onblur="valida_longitud(this.name)" =""></textarea>
                    </div>
                    </div>

                    <div id="SiHaceArmonizacion1" style="visibility: hidden; display: none;">
                    <label for="ddSiHaceArmonizacion1"><span
                            <div class="col-md-6 form-group input-group-sm">
                                <div class="etiqueta2">Cargar la  formula medica  de la enfermedad de base  formato PDF.</div>
                                <br>
                                
       
                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('Cargar la formula medica formato PDF ')</label>
                                <input type="file" id="ddSiHaceArmonizacion1" class="form-control"  onchange="shoeducacion7(this);" style="display: none;" id="documento_pdf" name="documento_pdf" class="btn-danger" accept=".pdf"  required autocomplete>
                            </div>
                            
                              
                            </div>
                        </div>
						  
                        </div>
                       


                     <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
               
                           
                           <!--////////////////////////////////////////-->
                           <div class="contenedor_informacion_persona">
						 <div class="row separador">
                            <div class="col-md-12 form-group text-center">
                                Información de la institución y dirección donde va laborar : {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}
                            </div>
                        </div>
						  <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2">- </div>
                                <input type="text" name="txtDir" id="txtDir" maxlength="100" placeholder="-"
                                    class="form-control" readonly="readonly" autocomplete="on" ="" required autocomplete>
                            </div>
                        </div>
						   <div class="row">
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Departamento donde va laboral</div>
                                <select name="departamento" id="departemento_lugar_trabajo" class="form-control"
                                    style="width:" ="" required autocomplete>
                                    <option value="" selected disabled>Selecione Departamento</option>
                                    @foreach($departemento_lugar_trabajo as $key => $departemento_lugar_trabajo)
                                    <option value="{{$key}}"> {{$departemento_lugar_trabajo}}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">*Municipio donde va laboral</div>
                                <select name="municipio" id="municipio_lugar_trabajo" class="form-control" style="width:" ="" required autocomplete >
                              </select>
                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Institucion donde va laboral</div>
                                <select name="municipio" id="nombre_institucion" class="form-control" style="width:" ="" required autocomplete >
                                </select>
                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Tipo institucion donde va laboral</div>
                                <select name="municipio" id="tipo_institucion" class="form-control" style="width:" ="" required autocomplete >
                               </select>
                            </div>


                        </div>
						   <div class="row">
                            <div class="col-md-4 form-group input-group-sm">
                                <div class="etiqueta2 usuario">Sede de la institucion donde va laboral.(*)</div>
                                <div class="etiqueta2 empresa" style="display: none">Nombre de la Empresa.(*)</div>
                                
                                <select name="id_sede_institucion" id="sede_institucion" class="form-control" style="width:" ="" required autocomplete>
                                </select>
                            </div>

                            <div class="col-md-3 form-group input-group-sm pull-left">
                            <div     for="" class="etiqueta2 usuario">Perfil de la Persona</div>
                                 <select id="tipo_vinculacion" name=""  class="form-control" required>
                                        <option value="">Seleccione el Perfil de la Persona</option>
                                        @foreach($tipo_vinculacion as $key => $tipo_vinculacion)
                                            <option value="{{ $key }}"> {{ $tipo_vinculacion }}</option>
                                        @endforeach
                                    </select>

                                    </div>
                      
                           <div class="col-md-4 form-group input-group-sm">
                                <div class="etiqueta2 usuario">Cargo de la Persona </div>
                                
                                <select name="cargo_persona" id="nombre_esempeno" class="form-control" style="width:"   >
                                </select>
		                               
                            </div>

                            
							
                              <!--
                    </div>
                    <div class="col-md-4 form-group input-group-sm">                                     
                        <div class="etiqueta2 usuario">Segundo Apellido.</div>
                        <div class="etiqueta2 empresa" style="display: none">Representante Legal</div>
                        <input type="text" name="txtApe2" id="txtApe2" placeholder="Ingrese su Segundo Apellido" class="form-control">
                    </div>-->
                        </div>
						  <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>




           
                           
                           <!--////////////////////////////////////////-->
                           <div class="contenedor_informacion_persona">
						 <div class="row separador">
                            <div class="col-md-12 form-group text-center">
                            INFORMACIÓN   DE ESTUDIOS REALIZADO Y ESCALAFÓN DEL  DOCENTE  : {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}
                            </div>
                        </div>
						  <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2">- </div>
                                <input type="text" name="txtDir" id="txtDir" maxlength="100" placeholder="-"
                                    class="form-control" readonly="readonly" autocomplete="on" ="" required autocomplete>
                            </div>
                        </div>
						   <div class="row">
                            <div class="col-md-3 form-group input-group-sm pull-left">
                            <div class="etiqueta2">Nivel Educativo - Formación de base(*)</div>
                            <select id="nivel_educativo" name="nivel_educativo" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="NI" {{ $datos->nivel_academico=='NI'?'selected':'' }}>Ninguno</option>

                                <option value="BR"{{ $datos->nivel_academico=='BP'?'selected':'' }}>Basica Primaria(1-5)</option>
                                <option value="BS"{{ $datos->nivel_academico=='BS'?'selected':'' }}>Basica Secundaria(6-9)</option>
                                <option value="MD"{{ $datos->nivel_academico=='MD'?'selected':'' }}>Media(10-12)</option>
                                <option value="TL"{{ $datos->nivel_academico=='TL'?'selected':'' }}>Têcnico Laboral</option>
                                <option value="TP"{{ $datos->nivel_academico=='TP'?'selected':'' }}>Têcnico Profesional</option>
                                <option value="TC"{{ $datos->nivel_academico=='TC'?'selected':'' }}>Têcnologia</option>
                                <option value="NR"{{ $datos->nivel_academico=='NR'?'selected':'' }}>Normalista</option>
            
                                <option value="UN" {{ $datos->nivel_academico=='UN'?'selected':'' }}>Universitaria</option>
                                
                            </select>

                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                            <div     for="" class="etiqueta2 usuario">Nivel  educativo  formación Postgradual  </div>
                               <select name="postgradual" id="" tabindex="51" class="form-control" onchange="shoIndigeana(this);" required autocomplete>
		    <option value="">Seleccione</option>
		    <option value="Especialización">Especialización</option>
		    <option  value="Maestría">Maestría</option>
            <option  value="Maestría">Maestría</option>
            <option  value="Doctorado">Doctorado </option>
            <option  value="No tiene">No tiene </option>

	       </select>
                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Grado en el escalafón docente</div>
                                <select name="postgradual" id="" tabindex="51" class="form-control" onchange="shoIndigeana(this);" required autocomplete>
		    <option value="">Seleccione</option>
		    <option value="1A">1A</option>
		    <option  value="1B">1B</option>
            <option  value="1C">1C</option>
            <option  value="1D">1D</option>
            <option  value="2A">2A </option>
            <option  value="2B ">2B </option>
            <option  value="2C">2C </option>
            <option  value="2D">2D </option>
            <option  value="3A">3A </option>
            <option  value="3B">3B </option>
            <option  value="3C">3C </option>
            <option  value="3D">3D </option>
            <option  value="1">1 </option>
            <option  value="2">2</option>
            <option  value="3">3 </option>
            <option  value="4">4 </option>
            <option  value="5">5 </option>
            <option  value="6">6</option>
            <option  value="7">7 </option>
            <option  value="8">8 </option>
            <option  value="9">9 </option>
            <option  value="10">10 </option>
            <option  value="11">11 </option>
            <option  value="12">12 </option>
            <option  value="13">13 </option>
            <option  value="14">14 </option>
            

	       </select>
                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Áreas de desempeño docente</div>
                                <select name="postgradual" id="" tabindex="51" class="form-control" onchange="shoIndigeana(this);" required autocomplete>
		    <option value="">Seleccione</option>
		    <option value="Ciencias naturales y educación ambiental">Ciencias naturales y educación ambiental</option>
            <option value="Ciencias sociales, historia, geografía, constitución política y democracia">Ciencias sociales, historia, geografía, constitución política y democracia</option>
            <option value="Educación artística y cultural">Educación artística y cultural</option>
            <option value="Educación ética y en valores humanos">Educación ética y en valores humanos</option>
            <option value="Educación física, recreación y deportes">Educación física, recreación y deportes</option>
            <option value="Educación religiosa">Educación religiosa</option>
            <option value="Humanidades, lengua castellana e idiomas extranjeros">Humanidades, lengua castellana e idiomas extranjeros</option>
            <option value="Matemáticas">Matemáticas</option>
            <option value="Tecnología e informática">Tecnología e informática</option>
            <option value="Ciencias políticas ">Ciencias políticas </option>
            <option value="Ciencias  económicas">Ciencias  económicas</option>
            <option value="Filosofía">Filosofía</option>
            <option value="Proyectos pedagógicos (áreas técnicas)">Proyectos pedagógicos (áreas técnicas)</option>
            <option value="Áreas preescolar">Áreas preescolar</option>
            <option value="Áreas primaria">Áreas primaria</option>
            <option value="Áreas educación inicial">Áreas educación inicial</option>
		 
            

	       </select>
                            </div>


                        </div>
                        <!--
						   <div class="row">
                            <div class="col-md-4 form-group input-group-sm">
                                <div class="etiqueta2 usuario">Sede de la institucion donde va laboral.(*)</div>
                                <div class="etiqueta2 empresa" style="display: none">Nombre de la Empresa.(*)</div>
                                
                                <select name="id_sede_institucion" id="sede_institucion" class="form-control" style="width:" ="" required autocomplete>
                                </select>
                            </div>

                            <div class="col-md-3 form-group input-group-sm pull-left">
                            <div     for="" class="etiqueta2 usuario">Perfil de la Persona</div>
                                 <select id="tipo_vinculacion" name=""  class="form-control" required>
                                      
                                    </select>

                                    </div>
                      
                           <div class="col-md-4 form-group input-group-sm">
                                <div class="etiqueta2 usuario">Cargo de la Persona </div>
                                
                                <select name="cargo_persona" id="nombre_esempeno" class="form-control" style="width:"   >
                                </select>
		                               
                            </div>

                            --->
							
                              <!--
                    </div>
                    <div class="col-md-4 form-group input-group-sm">                                     
                        <div class="etiqueta2 usuario">Segundo Apellido.</div>
                        <div class="etiqueta2 empresa" style="display: none">Representante Legal</div>
                        <input type="text" name="txtApe2" id="txtApe2" placeholder="Ingrese su Segundo Apellido" class="form-control">
                    </div>-->
                        </div>
						  <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>


						    
						<div class="contenedor_informacion_persona">
							<div class="row separador">
                            <div class="col-md-12 form-group text-center align-text-botton">
                                Anexos. Ingresar docuemnto requeridos  :{{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}
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
                               
                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <div class="row toggle" id="dropdown-detail-11" data-toggle="detail-11">
                                            <div class="col-md-12">
                                                
                                            <div class="etiqueta2">Anexar Contrato laboral, recomendamos formato PDF . Tamaño
                                    máximo de 5 Megabyte cada uno.</div>
                        
                        <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('Cargar el documento (contrato incluido hoja de vida del empleado) formato PDF')</label>
                                <input type="file" id="documento_pdf" name="documento_pdf" class="btn-danger" accept=".pdf"  required autocomplete>
                            </div>




                                            </div>
                                            <div class="col-md-1 pull-right">
                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div id="detail-11" style="display: none;">
                                            <div class="container">
                                                <div class="fluid-row">
                                                    <div class="col-md-5 text-justify">
                                                        Facultad que tienen las personas de solicitar y obtener acceso a
                                                        la información sobre
                                                        las actualizaciones derivadas del cumplimiento de las funciones
                                                        atribuidas a la entidad
                                                        y sus distintas dependencias.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row toggle" id="dropdown-detail-11" data-toggle="detail-11">
                                            <div class="col-md-12">
                                                
                                            <div class="etiqueta2">Anexar Contrato laboral, recomendamos formato PDF . Tamaño
                                    máximo de 5 Megabyte cada uno.</div>
                        
                        <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('Cargar el documento (contrato incluido hoja de vida del empleado) formato PDF')</label>
                                <input type="file" id="documento_pdf" name="documento_pdf" class="btn-danger" accept=".pdf"  required autocomplete>
                            </div>




                                            </div>
                                            <div class="col-md-1 pull-right">
                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div id="detail-11" style="display: none;">
                                            <div class="container">
                                                <div class="fluid-row">
                                                    <div class="col-md-5 text-justify">
                                                        Facultad que tienen las personas de solicitar y obtener acceso a
                                                        la información sobre
                                                        las actualizaciones derivadas del cumplimiento de las funciones
                                                        atribuidas a la entidad
                                                        y sus distintas dependencias.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
                           
                    <div class="col-md-6 form-group">
                      <div class="etiqueta2">Anexar Contrato laboral, recomendamos formato PDF . Tamaño
                                    máximo de 5 Megabyte cada uno.</div>
                        
                        <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('Cargar el documento (contrato incluido hoja de vida del empleado) formato PDF')</label>
                                <input type="file" id="documento_pdf" name="documento_pdf" class="btn-danger" accept=".pdf"  required autocomplete>
                            </div>
                    </div>
                            <div class="col-md-6 form-group input-group-sm">
                                <div class="etiqueta2">Anexar Contrato laboral, recomendamos formato PDF . Tamaño
                                    máximo de 5 Megabyte cada uno.</div>
                                <br>
                                

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('Cargar el documento (contrato incluido hoja de vida del empleado) formato PDF')</label>
                                <input type="file" id="documento_pdf" name="documento_pdf" class="btn-danger" accept=".pdf"  required autocomplete>
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





                           <!----------/////////////////////////->>>
    


                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->
            <!--
                    <div class="recuadro_info_persona">@lang('CONOCIMIENTOS ANCESTRALES DESDE SER MISAK DE:')'
                        {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
                    <div class="col-md-12 col-sm-12 col-xs-12">


                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 1-->
<!--
                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('¿Es usted médico tradicional?') </label>
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

                        <!--<div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 2--

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('¿Tiene alguno de estos  conocimientos empíricos “Saberes locales”?')
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


                        </div> <!-- Fin Columna 2--

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro --
                </div>
                <!--Fin del contenedor informacion_persona --

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona ---

                    <div class="recuadro_info_persona">@lang('HÁBITOS DE VIDA SALUDABLES DE:')' {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }} </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-sm-12 col-xs-12">                           <!--Columna 1--
                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('¿Que actividades propios realiza con mas frecuencia  dentro del territorio?')</label>
                                <select id="deporte_constante" name="deporte_constante" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1">Recorrido a las lagunas dentro del territorio</option>
                                    <option value="2">Recorrido de limintes dentro del territorio</option>
                                    <option value="3">Compartir la palabra con los shures y shuras </option>
                                    <option value="4">otros</option>
                                </select>
                            </div>

                            <div class="form-group input-group-sm">
                                <label f><span class="asterisco">*</span>@lang('¿Conoce lugares sagrados dentro del resguardo de
                                    Guambia?')</label>
                                <select id="lugares_sagrados" name="lugares_sagrados" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="sí">Sí</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                        </div> <!-- Fin de Columna 1--

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 2--
                          {{--
                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>¿Conoce algun juegos tradicionales?</label>
                                <select id="juegos_tradicionales" name="juegos_tradicionales" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            --}}



                            <div class="form-group input-group-sm">
                                <label f><span class="asterisco">*</span>@lang('¿Le han  realizado algunos de estos  baños en los diferentes etapas de la vida?') </label>
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
                                                  </div>--

                        </div> <!-- Fin Columna 2--

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro --
                </div>
                <!--Fin del contenedor informacion_persona -->
                 <!--Contenedor informacion_persona ---
                <div class="contenedor_informacion_persona">
                   

                    <div class="recuadro_info_persona">____________</div>
                    <div class="col-md-12 col-sm-12 col-xs-12">


                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 1--

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
                                </select>
                            </div>

                        </div> <!-- Fin de Columna 1--

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 2--

                            <div class="form-group input-group-sm">

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
                                </div>
                            </div>

                        </div> <!-- Fin Columna 2--
                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro --
                </div>
                Fin del contenedor informacion_persona -->

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona ---

                    <div class="recuadro_info_persona">@lang('ENFERMEDADES DE') {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}</div>
                    <div class="col-md-12 col-sm-12 col-xs-12">


                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 1--

                              <div class="form-group input-group-sm">
                                <label f><span class="asterisco">*</span>@lang('¿Precenta alguna de estas enfermedades?') </label>
                                <select id="enfermedades_id" name="enfermedades_id"  required id="framework" class="form-control selectpicker" data-live-search="true" >
                                    <option value="">Seleccione</option>
                                    @foreach($enfermedades as $key => $enfermedad)
                                        <option value="{{ $key }}"> {{ $enfermedad }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <script type="text/javascript">
      $('select').select2();
  </script>


                            <div class="form-group input-group-sm">
                                <label f><span class="asterisco">*</span>@lang('¿Recurre alguna de estas  medicinas alternativas?')' </label>
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

                        </div> <!-- Fin de Columna 1--

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!--Columna 2--

                            <div class="form-group input-group-sm">
                                <label><span class="asterisco">*</span>@lang('¿Usted consume?') </label>
                                <select id="consumo_sustancias" name="consumo_sustancias" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1">Alcohol</option>
                                    <option value="2">Cigarrillo</option>
                                    <option value="3">Sustancias psicoactivas </option>
                                    <option value="4">No consume</option>
                                </select>
                            </div>


                        </div> <!-- Fin Columna 2--

                    </div>
                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro --
                </div>
                <!--Fin del contenedor informacion_persona --

                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona ---

                    <div class="recuadro_info_persona"> @lang('SELECCIONE SI TIENE ALGUNA DE ESTAS  CAPACIDADES DIVERSAS')
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
                    <!--Cierra el contenedor 2 . recuadro --
                </div>
                <!--Fin del contenedor informacion_persona -->


                <!--borones Guardar y continuar -->
                <div class="pull-right ">
                    <input type="submit" class="botones_censo_poblacional" value="@lang('GUARDAR Y CONTINUAR')" id="boton"
                        class="btn btn-primary">
                </div>

            </form>
            <!--fIN DE VALIDACION DE ESTADO DEL CENSO POBLACIONL-->

            <!--fIN DE VALIDACION DE ESTADO DEL CENSO POBLACIONL-->


            <br>
            <br>
            <!-- FIN FORMULARIO-->
        </div>
        <!--FIN ContenedorMenu-->
    </div>
    <!--FIN col-md-9-->
</div>
<!--FIN container-->
<div id="ConfirmAction" class="modal" tabindex="-1"  data-keyboard="false" data-backdrop="static" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">@lang('Confirmar información​​​ personal') </h5>
            </div>
            <div class="modal-body">
                <p>@lang('¿Esta seguro que  de Guardar información​​​ personal de:')  {{ $datos->nombres }}
                        {{ $datos->apellidos }} ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Cancelar')</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">@lang('Confirmar')</button>
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
                            location.href = location.href+ `/educacion-formal-Docentes-Oficiales`;
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
    $('#genero').val(datosPersona.sexo);
    $('#religion').val(datosPersona.religion);
    $('#empresa_asociativa').val(datosPersona.empresa_asociativa);
    $('#enfemerma_recurre').val(datosPersona.enfemerma_recurre);
    $('#carnet_salud_id').val(datosPersona.carnet_salud_id);
    $('#profecion_id').val(datosPersona.profecion_id);
    $('#comunidad_indigena').val(datosPersona.comunidad_indigena);
    $('#telefono').val(datosPersona.telefono);
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
<!-- selector  categoria_trabajo -->
<script type="text/javascript">
$('#tipo_trabajo').change(function() {
    var tipo_trabajoID = $(this).val();
    if (tipo_trabajoID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-categoria_trabajo-list')}}?id_tipo_trabajo=" + tipo_trabajoID,
            success: function(res) {
                if (res) {
                    $("#categoria_trabajo").empty();
                    $("#categoria_trabajo").append('<option>Seleccione Categoria</option>');
                    $.each(res, function(key, value) {
                        $("#categoria_trabajo").append('<option value="' + key + '">' +
                            value + '</option>');
                    });

                } else {
                    $("#categoria_trabajo").empty();
                }
            }
        });
    } else {
        $("#categoria_trabajo").empty();

    }
});

 
{{--selector de municipio de expedicion de cedula  --}}

$('#departamento_expedicion').change(function() {
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


</script>
<script type="text/javascript">
$('#departemento_lugar_trabajo').change(function() {
    var lugar_trabajoID = $(this).val();
    if (lugar_trabajoID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-municipio_lugar_trabajo-list')}}?codigo_departamento_trabajo=" +
                lugar_trabajoID,
            success: function(res) {
                if (res) {
                    $("#municipio_lugar_trabajo").empty();
                    $("#municipio_lugar_trabajo").append('<option>Seleccione Categoria</option>');
                    $.each(res, function(key, value) {
                        $("#municipio_lugar_trabajo").append('<option value="' + key +
                            '">' + value + '</option>');
                    });

                } else {
                    $("#municipio_lugar_trabajo").empty();
                }
            }
        });
    } else {
        $("#municipio_lugar_trabajo").empty();
        $("#nombre_institucion").empty();
    }
});
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
                    $("#municipios").empty();
                    $("#municipios").append('<option>Seleccione Municipio</option>');
                    $.each(res, function(key, value) {
                        $("#municipios").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#municipios").empty();
                }
            }
        });
    } else {
        $("#municipios").empty();

    }
});
</script>
    
<script type="text/javascript">
$('#municipio_lugar_trabajo').on('change', function() {
    var municipioID = $(this).val();
    if (municipioID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-nombre-instituciono-list')}}?codigo_municipio_trabajo=" + municipioID,
            success: function(res) {
                if (res) {
                    $("#nombre_institucion").empty();
                    $("#nombre_institucion").append('<option>Seleccione Resguardo </option>');
                    $.each(res, function(key, value) {
                        $("#nombre_institucion").append('<option value="' + key + '">' +
                            value + '</option>');
                    });

                } else {
                    $("#nombre_institucion").empty();
                }
            }
        });
    } else {
        $("#nombre_institucion").empty();
        $("#tipo_institucion").empty();
    }

});

$('#nombre_institucion').on('change', function() {
    var municipioID = $(this).val();
    if (municipioID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-tipo-institucion-list')}}?id_nombre_institucion=" + municipioID,
            success: function(res) {
                if (res) {
                    $("#tipo_institucion").empty();
                    $("#tipo_institucion").append('<option>Seleccione Tipo Institucion </option>');
                    $.each(res, function(key, value) {
                        $("#tipo_institucion").append('<option value="' + key + '">' +
                            value + '</option>');
                    });

                } else {
                    $("#tipo_institucion").empty();
                }
            }
        });
    } else {
        $("#tipo_institucion").empty();
        $("#sede_institucion").empty();
    }

});


$('#tipo_institucion').on('change', function() {
    var municipioID = $(this).val();
    if (municipioID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-sede_institucion-list')}}?id_tipo_institucion=" + municipioID,
            success: function(res) {
                if (res) {
                    $("#sede_institucion").empty();
                    $("#sede_institucion").append('<option>Seleccione Tipo Institucion </option>');
                    $.each(res, function(key, value) {
                        $("#sede_institucion").append('<option value="' + key + '">' +
                            value + '</option>');
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
