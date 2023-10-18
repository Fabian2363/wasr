@extends('layouts.menu')

@section('content')

<link href="{{ asset('css/bootstrap_ver_contratos.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-theme-ver-contratos.css') }}" rel="stylesheet">

   <style>
    .contendor{
		
		margin-top:-90000px;
	}
    .DvFondoSuperiorResto{

     margin-top: -83px;
    }
    </style>
 @foreach ($datos as $contrato)

        <div class="contendor">
            <div class="container">
                <div id="ctl00_ctl00_DvFondoGrisSuperiosHp" class="DvFondoSuperiorResto">
                    <div id="ctl00_ctl00_dvContenido">
                        <div class="section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="registro noPrint">
                                            <p><span
                                                    style="font-family: Arial; font-size: 25px; color: red; font-weight: bold"></span></p>
                                            <hr style="border: 1px dotted; margin-top: 20px; margin-bottom: 20px">
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12 contenedor_menuiz sinpadding">

                                            <iframe id="HV_Completo" frameborder="0" width="100%" scrolling="no"
                                                height="300px"

                                                
                                                src="{{ asset('/css/HV_MenuIzquierdo.html') }}"></iframe>
                                        </div>
                                        <div class="col-md-9 col-sm-8 col-xs-12 pull-right sinpadding">
                                            <div id="ctl00_ctl00_ContenidoPanel_DvErrores" class="IbContenedorErrores"
                                                style="display: none; float: right">
                                                <div id="ctl00_ctl00_ContenidoPanel_DvErrorSup"></div>
                                                <div id="ctl00_ctl00_ContenidoPanel_DvErrorMed" class="BgErrores3">
                                                    <div id="ctl00_ctl00_ContenidoPanel_DvErrorLogo" class="BgErrores2">
                                                    </div>
                                                    <div id="ctl00_ctl00_ContenidoPanel_DvErrorTexto"
                                                        class="Error3Texto">
                                                        <span id="ctl00_ctl00_ContenidoPanel_lblValidacion"></span>
                                                    </div>
                                                </div>
                                                <div id="ctl00_ctl00_ContenidoPanel_DvErrorInf"></div>
                                            </div>
                                            <div class="noPrint BotonVerHojaVida">

                                                <a id="ctl00_ctl00_ContenidoPanel_SolapaVer" title="Ver Mi Hoja de Vida"
                                                    href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$ContenidoPanel$SolapaVer&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))"
                                                    style="text-decoration:none;"><img
                                                        id="ctl00_ctl00_ContenidoPanel_solapa1" alt="" border="0"
                                                        src="./Ver mi Hoja de Vida_files/BGSolapasON_2a.jpg"
                                                        style="width:200px;border-width:0px;"></a>
                                            </div>
                                            <div class="noPrint BotonVerHojaVida">
                                                <a id="ctl00_ctl00_ContenidoPanel_SolapaEditar"
                                                    title="Editar Mi Hoja de Vida"
                                                    href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$ContenidoPanel$SolapaEditar&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))"
                                                    style="text-decoration:none;"><img
                                                        id="ctl00_ctl00_ContenidoPanel_solapa2" alt="" border="0"
                                                        src="./Ver mi Hoja de Vida_files/BGSolapasOFF_2b.jpg"
                                                        style="width:200px;border-width:0px;"></a>
                                            </div>


                                            <div class="ContenedorMenuHojaVida">
                                                <div class="col-md-12 col-sm-12 col-xs-12 sinpadding">
                                                    <span
                                                        id="ctl00_ctl00_ContenidoPanel_HojaDeVidaPanel_ucVerHojaVida_lblValidacion"
                                                        style="color:Red;"></span>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 alert alert-info">
                                                        <span
                                                            id=""><strong>Fecha de Registro :</strong> {{$contrato->fecha_registro}}</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="clearfix"></div>
                                                        <!--<div class="noPrint">
                                                            <a id=""
                                                                title="Editar Mi Información Básica"
                                                                class="btn btn-warning btn-xs pull-right"
                                                                href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$ContenidoPanel$HojaDeVidaPanel$ucVerHojaVida$btnEditarInfo&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Editar</a>
                                                        </div>-->
                                                        <div class="apertura">
                                                            <h1> <span
                                                                    id="">{{$contrato->nombres}}-{{$contrato->apellidos}}  
                                                                    </span></h1>
                                                            <h3> <span
                                                                    id=""></span>
                                                            </h3>
                                                            <h4> <span
                                                                    id=""> {{$contrato->tipo_identificacion}}:
                                                                    </span>  <span
                                                                    id="">{{$contrato->documento_persona}}</span></h4>
                                                            <h4> 
                                                            </h4>
                                                            <!--
                                                            <h4>Teléfono: <span
                                                                    id="">--</span>
                                                                , Otro Teléfono: <span
                                                                    id=""></span>
                                                            </h4>
                                                            <h4>
                                                                <a
                                                                    id=""><span
                                                                        id="">fabianchoaranda@gmail.com</span></a>
                                                            </h4>-->
                                                            <div class="col-md-12 col-sm-12 col-xs-12 sinpadding">
                                                                <div class="clearfix"></div>
                                                                <div class=" noPrint">
                                                                    <a id=""
                                                                        title="Editar Mi Nivel Educativo"
                                                                        class="btn btn-warning btn-xs pull-right"
                                                                        href="/Actualizar-Contrato/{{$contrato->id_contrato}}">Editar</a>
                                                                </div>

                                                                <div class="imprime">Información del Contrato</div>
																 <h4><span
                                                                        id=""></span>
                                                                </h4>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <h4><strong>Numero Contrato Espiral E: </strong><span
                                                                            id="">{{$contrato->num_contrato}}
                                                                            </span></h4> 
                                                                    <h4><strong>Numero Contrato SedCauca: </strong><span
                                                                            id="">{{$contrato->num_sedcauca}}</span>
                                                                    </h4>
                                                                    <!--<h4><strong>Caja de Compensación: </strong><span
                                                                            id=""> {{$contrato->nombre}}</span></h4>
                                                                    <h4><strong></strong><span
                                                                            id=""></span></h4>
                                                                    <h4><strong>Riesgo Laborales : </strong><span
                                                                            id="">{{$contrato->nombre_risgo}}
                                                                            </span></h4>
                                                                    <h4><strong>Eps:
                                                                        </strong><span
                                                                            id="">{{$contrato->nombre_eps}}</span>
                                                                    </h4>
                                                                    <h4><strong>Afp:
                                                                        </strong><span
                                                                            id="">{{$contrato->afp_nombre}}</span>
                                                                    </h4>-->
                                                                </div>
																 <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <h4><strong>Salario Asignado: </strong><span
                                                                            id="">{{$contrato->salario}}</span>
                                                                    </h4>
                                                                    <h4><strong>Fecha Ingreso: </strong><span
                                                                            id="">{{$contrato->fecha_ingreso}}</span>
                                                                    </h4>
                                                                   <h4><strong>Fecha Vencimiento:
                                                                        </strong><span
                                                                            id="">{{$contrato->fecha_vencimiento}}</span>
                                                                    </h4>
                                                                   <!-- <h4><strong>Interesado en ofertas de teletrabajo:
                                                                        </strong><span
                                                                            id="">No</span>
                                                                    </h4>-->
                                                                </div>
                                                                <div class="clearfix"></div>


                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="clearfix"></div>
                                                            <!--    <div class=" noPrint">
                                                                    <a id="ctl00_ctl00_ContenidoPanel_HojaDeVidaPanel_ucVerHojaVida_btnEditarEduF"
                                                                        title="Editar Mi Nivel Educativo"
                                                                        class="btn btn-warning btn-xs pull-right"
                                                                        href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$ContenidoPanel$HojaDeVidaPanel$ucVerHojaVida$btnEditarEduF&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Editar</a>
                                                                </div>-->
                                                                <div class="imprime">Información del Contrato</div>
                                                                <h4><span
                                                                        id=""></span>
                                                                </h4>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <h4><strong>Tipo Contrato: </strong><span
                                                                            id="">{{$contrato->nombre_tipcontrato}}
                                                                            </span></h4> 
                                                                    <h4><strong>Dotacion: </strong><span
                                                                            id="">{{$contrato->nombretipodotacion}}</span>
                                                                    </h4>
                                                                    <h4><strong>Caja de Compensación: </strong><span
                                                                            id=""> {{$contrato->nombre}}</span></h4>
                                                                    <h4><strong></strong><span
                                                                            id=""></span></h4>
                                                                    <h4><strong>Riesgo Laborales : </strong><span
                                                                            id="">{{$contrato->nombre_risgo}}
                                                                            </span></h4>
                                                                    <h4><strong>Eps:
                                                                        </strong><span
                                                                            id="">{{$contrato->nombre_eps}}</span>
                                                                    </h4>
                                                                    <h4><strong>Afp:
                                                                        </strong><span
                                                                            id="">{{$contrato->afp_nombre}}</span>
                                                                    </h4>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <h4><strong>Item Canasta: </strong><span
                                                                            id="">{{$contrato->nombre_canasta}}</span>
                                                                    </h4>
                                                                    <h4><strong>Categoria Item: </strong><span
                                                                            id="">{{$contrato->nombre_categoria}}</span>
                                                                    </h4>
                                                                   <h4><strong>Razon Social:
                                                                        </strong><span
                                                                            id="">{{$contrato->razon_social}}</span>
                                                                    </h4>
                                                                   <h4><strong>Observaciones Contrato:
                                                                        </strong><span
                                                                            id="">{{$contrato->observaciones}}</span>
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>

                                                            <div class="clearfix"></div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="clearfix"></div>
                                                               <!-- <div class=" noPrint">
                                                                    <a id="ctl00_ctl00_ContenidoPanel_HojaDeVidaPanel_ucVerHojaVida_btnEditarExp"
                                                                        title="Editar Mi Experiencia Laboral"
                                                                        class="btn btn-warning btn-xs pull-right"
                                                                        href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$ContenidoPanel$HojaDeVidaPanel$ucVerHojaVida$btnEditarExp&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Editar</a>
                                                                </div>-->
                                                                <!--<div class="imprime">Información del Lugar de  Trabajo </div>-->
                                                                <div class="clearfix"></div>


                                                            </div>

                                                            <div class="clearfix"> </div>

                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="clearfix"></div>
                                                             <!--   <div class=" noPrint">
                                                                    <a id=""
                                                                        title="Editar Mi Educación Informal"
                                                                        class="btn btn-warning btn-xs pull-right"
                                                                        href="/Actualizar-Contrato">Editar</a>
                                                                </div>-->
                                                                <div class="imprime">INFORMACIÓN DEL LUGAR DE TRABAJO</div>
                                                                <div class="clearfix"></div>


                                                                <div
                                                                    id="">

                                                                    <div class="new_data">
                                                                       
                                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                                            <h4>
                                                                                <strong>Departamento:</strong>
                                                                                <span
                                                                                    id="">{{$contrato->nombre_intitucion}}</span>
                                                                            </h4>
                                                                            <h4>
                                                                                <strong>Municipio:</strong>
                                                                                <span
                                                                                    id="">{{$contrato->nombre_municipioi}}</span>
                                                                            </h4>
                                                                            <h4>
                                                                                <strong>Resguardo:</strong>
                                                                                <span
                                                                                    id="">{{$contrato->nombre_resguardoi}}</span>
                                                                            </h4>
                                                                            <h4>
                                                                              <!--  <div>

                                                                                    <strong>Fecha de
                                                                                        certificación:</strong>
                                                                                    <span
                                                                                        id="">Agosto
                                                                                        de 2010</span>

                                                                                </div>-->
                                                                            </h4>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 col-xs-12"
                                                                            style="margin-right: 0;">
                                                                            <h4>
                                                                                <strong>Institucio Educativa:</strong>
                                                                                <span
                                                                                    id="">{{$contrato->nombreie}}</span>
                                                                            </h4>
                                                                            <h4>
                                                                                <strong>Sede Educativa:</strong>
                                                                                <span
                                                                                    id="">{{$contrato->nombresi}}</span>
                                                                            </h4>
                                                                           <!-- <div>

                                                                                <h4>
                                                                                    <strong>Duración en horas:</strong>
                                                                                    <span
                                                                                        id="">4</span>
                                                                                </h4>

                                                                            </div>-->
                                                                        </div>
                                                                        <div class="clearfix">
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>

                                                                </div>
<!--
                                                                <div
                                                                    id="">

                                                                    <div class="new_data">
                                                                        <h3>
                                                                            <input type="hidden"
                                                                                name="ctl00$ctl00$ContenidoPanel$HojaDeVidaPanel$ucVerHojaVida$RepeaterCursos$ctl01$HFcursos_ordi"
                                                                                id="ctl00_ctl00_ContenidoPanel_HojaDeVidaPanel_ucVerHojaVida_RepeaterCursos_ctl01_HFcursos_ordi"
                                                                                value="22823097|13792351">
                                                                            <span
                                                                                id="">ES</span>
                                                                        </h3>
                                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                                            <h4>
                                                                                <strong>Tipo capacitación o
                                                                                    certificación:</strong>
                                                                                <span
                                                                                    id="">Curso</span>
                                                                            </h4>
                                                                            <h4>
                                                                                <strong>Institución:</strong>
                                                                                <span
                                                                                    id="">es</span>
                                                                            </h4>
                                                                            <h4>
                                                                                <strong>Estado:</strong>
                                                                                <span
                                                                                    id="">Certificado</span>
                                                                            </h4>
                                                                            <h4>
                                                                                <div>

                                                                                    <strong>Fecha de
                                                                                        certificación:</strong>
                                                                                    <span
                                                                                        id="">Septiembre
                                                                                        de 2008</span>

                                                                                </div>
                                                                            </h4>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 col-xs-12"
                                                                            style="margin-right: 0;">
                                                                            <h4>
                                                                                <strong>Institución Educativa:</strong>
                                                                                <span
                                                                                    id="">.+--</span>
                                                                            </h4>
                                                                            <h4>
                                                                                <strong>Ubicación:</strong>
                                                                                <span
                                                                                    id="">Colombia</span>
                                                                            </h4>
                                                                            <div>

                                                                                <h4>
                                                                                    <strong>Duración en horas:</strong>
                                                                                    <span
                                                                                        id="">4</span>
                                                                                </h4>

                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix">
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>--->
                                                            </div>
                                                            <div class="clearfix"></div>
                                                           <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="clearfix"></div>
                                                                <div class=" noPrint">
                                                                    <a id="ctl00_ctl00_ContenidoPanel_HojaDeVidaPanel_ucVerHojaVida_btnEditarAcerca"
                                                                        title="Editar Mis Idiomas y Habilidades"
                                                                        class="btn btn-warning btn-xs pull-right"
                                                                        href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$ContenidoPanel$HojaDeVidaPanel$ucVerHojaVida$btnEditarAcerca&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">
                                                                        Editar</a>
                                                                </div>
                                                                <div class="imprime">Idiomas y otros conocimientos</div>
                                                                <div class="clearfix"></div>
                                                                <div class="new_data">
                                                                    <div class="form-group">
                                                                        <h3>IDIOMAS Y DIALECTOS</h3>
                                                                        <span
                                                                            id="">No
                                                                            Informado</span>

                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="new_data">
                                                                    <div class="form-group">
                                                                        <h3>OTROS CONOCIMIENTOS</h3>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>
                                                            </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearifix"></div>
  
        @endforeach@endforeach

@endsection