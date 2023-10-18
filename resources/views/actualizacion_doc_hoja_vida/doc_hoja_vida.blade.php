@extends('layouts.menu4')

@section('content')
<!DOCTYPE html>
<!-- saved from url=(0076)https://jigra.nasaacin.org/candidato/hoja-de-vida-imprimir/get/fullscreen=1/ -->
<html lang="es" class="fontawesome-i2svg-active fontawesome-i2svg-complete">

<head>
   
    <title>
        GUMABIA </title>
  
    </style>
   
    <link rel="icon" href=""
        sizes="192x192">
       
        
        <link href="{{ asset('/CV_files/hoja-de-vida-imprimir.css') }}" rel="stylesheet">
     

    

</head>
<link href="{{ asset('css/certificado.css') }}" rel="stylesheet">
    <style type="text/css">
        .style3 {
            height: 16px;
        }
        


        .styleletrapagina {
            font-size: 0.2px;
        }

    </style>

                                @foreach($datos_persona as $key=>$temp)


                                <table style="margin: 0 auto;" width="800" border="0" aling="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                <tbody>
                    <tr bgcolor="#FFFFFF" ; height="55px" ;>
                        <td width="76%" rowspan="2"><img src="{{ asset('images/logo.jpg') }}"
                                width="286PX" height="59"></td>

                        <td width="8%" valing="middle" class="contenido">Fecha:</td>
                        <td width="16%" valing="middle">---</td>

                    </tr>

                    <tr>
                        <td height="19" valing="middle" bgcolor="#FFFFFF" class="contenido">Pagina:+</td>
                        <td valing="middle" bgcolor="#FFFFFF">1 de 1</td>
                    </tr>

                    <tr bgcolor="#F4F7FB">
                        <td colspan="3">
                            <!--<p>&nbsp;</p>-->
                            <table width="95%" border="0" aling="center" cellpadding="0" cellspacing="1"
                                bgcolor="#999999">
                                <tbody>
                                    <tr bgcolor="#327bb2">
                                        <td colspan="4" class="subtitulo4" aling="center"> <br>
                                            <div aling="center">INFORMACION PERSONA INGRESADO EN SISTEMA </div><br>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#243f78">
                                        <td colspan="2" height="25px" ; class="subtitulo4">
                                            CABILDO INDIGENA DE GUAMBIA-ESPIRAL DE EDUCACION- NIT:817-000-162-9
                                        </td>
                                        <td colspan="2" height="25px" ;>
                                            <div aling="left">


                                                <span class="subtitulo4"><b>SISTEMA DE INFORMACION  DE TALENTO HUMANO-SITH </b></span>&nbsp;<font size="0.6px" , color="#fff" ;>-
                                                </font>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#8398C5">
                                        <td colspan="4" class="tituloEtiqueta" aling="center">
                                            <div aling="center">DETALLES - PERSONA </div>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#327bb2">
                                        <td colspan="2" height="25px" ; class="subtitulo4">
                                            ESTADO 
                                        </td>
                                        <td colspan="2" height="25px" ;>
                                            <div aling="left">
                                                @if($temp->status == 1)
                                                    <span class="badge badge-success">REGISTRADO</span>
                                                @else
                                                    <span class="badge badge-danger">En proceso<p></p></span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>


                                    <tr bgcolor="#FFFFFF">
                                        <td width="26%" bgcolor="#ddd" class="subtitulo2"><strong>NOMBRE
                                                COMPLETO</strong>
                                        </td>
                                        <td colspan="3" bgcolor="#FFF" class="subtitulo2">{{ $temp->nombres }}
                                            -{{ $temp->apellidos }}&nbsp;</td>
                                    </tr>
                                    <tr bgcolor="#FFFFFF">
                                        <td width="25%" bgcolor="#ddd" class="subtitulo2"><strong>TIPO DE
                                                DOCUMENTO</strong>
                                        </td>
                                        <td width="23%" bgcolor="#FFF" class="subtitulo2">
                                            {{ $temp->tipo_identificacion }}&nbsp;</td>
                                        <td width="26%" bgcolor="#ddd" class="subtitulo2"><strong>NUMERO DE
                                                DOCUMENTO</strong></td>
                                        <td width="26%" bgcolor="#FFF" class="subtitulo2">
                                            {{ $temp->docomento_persona }}&nbsp;
                                        </td>
                                    </tr>
                                    <tr bgcolor="#FFFFFF">

                                        <td bgcolor="#ddd" class="style3"><strong>GÉNERO</strong></td>
                                        <td bgcolor="#FFF" class="style3">{{ $temp->sexo }}&nbsp;</td>
                                        <td bgcolor="#ddd" class="style3"><strong>FECHA NACIMIENTO</strong></td>
                                        <td bgcolor="#FFF" class="style3">{{ $temp->fecha_nacimiento }}</td>

                                    </tr>

                                    <tr bgcolor="#FFFFFF">
                                        <td bgcolor="#ddd" class="subtitulo2"><strong>ESTADO CIVIL</strong></td>
                                        <td bgcolor="#FFF" class="subtitulo2">{{ $temp->estado_civil }}&nbsp;</td>
                                        <td bgcolor="#ddd" class="subtitulo2"><strong>TELEFONO</strong></td>
                                        <td bgcolor="#FFF" class="subtitulo2">{{ $temp->telefono }}&nbsp;</td>
                                    </tr>
                                    <tr bgcolor="#FFFFFF">
                                        <td bgcolor="#ddd" class="subtitulo2"><strong>Departamento expedicion cc</strong></td>
                                        <td bgcolor="#FFF" class="subtitulo2">{{ $temp->departamento_expedicion}}&nbsp;</td>
                                        <td bgcolor="#ddd" class="subtitulo2"><strong>Municipio de expedicion cc</strong></td>
                                        <td bgcolor="#FFF" class="subtitulo2">{{ $temp->municipio_expedin }}&nbsp;</td>
                                    </tr>

                                    <tr bgcolor="#FFFFFF">
                                        <td colspan="4" class="subtitulo2">&nbsp;</td>
                                    </tr>


                                    <!--Aqui va el codigo de tablas  informacion del trabajador-->

                                    <tr bgcolor="#849AC6">
                                        <td colspan="4" class="tituloEtiqueta" aling="center">
                                            <div aling="center">DIRECCIÓN - PERSONA </div>
                                        </td>
                                    </tr>


                                    <tr bgcolor="#FFFFFF">
                                        <td width="25%" bgcolor="#ddd" class="subtitulo2"><strong>DEPARTAMENTO</strong>
                                        </td>
                                        <td width="23%" bgcolor="#FFF" class="subtitulo2">
                                            --&nbsp;</td>
                                        <td width="26%" bgcolor="#ddd" class="subtitulo2"><strong>MUNICIPIO</strong>
                                        </td>
                                        <td width="26%" bgcolor="#FFF" class="subtitulo2">
                                            --&nbsp;
                                        </td>
                                    </tr>
                                    <tr bgcolor="#FFFFFF">
                                        <td width="25%" bgcolor="#ddd" class="subtitulo2"><strong>DIRECCION</strong>
                                        </td>
                                        <td width="23%" bgcolor="#FFF" class="subtitulo2">
                                        {{ $temp->	direccion }} --&nbsp;
                                        </td>
                                        
                                    </tr>
                                 
                                    <!--
                    <tr bgcolor="#FFFFFF">
                      <td height="22" bgcolor="#ddd" class="subtitulo2"><strong>RESGUARDO</strong></td>
                      <td colspan="3" bgcolor="#FFF" class="subtitulo2">---&nbsp;</td>
                    </tr>-->
                                    <tr bgcolor="#FFFFFF">
                                        <td colspan="4" class="subtitulo2">&nbsp;</td>
                                    </tr>
                                    <!--Aqui finaliza el codigo de tablas direccion empleado-->
                                    <tr bgcolor="#849AC6">
                      <td colspan="4" class="tituloEtiqueta" align="center"> <div align="center">INFORMACIÓN - CONTRATO </div></td>
                    </tr>

                    <tr bgcolor="#327bb2">
                      <td colspan="4" class="subtitulo4" align="center">
                        <span class="subtitulo2"><b><font size="0.6px"></font></b></span>
                      </td>
                    </tr>
        
                <tr bgcolor="#FFFFFF">
                  <td height="22" bgcolor="#ddd" class="subtitulo2"><strong>PROGRAMA</strong></td>
                  <td colspan="3" bgcolor="#FFF" class="subtitulo2">Espiral de Educación&nbsp;</td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td height="22" bgcolor="#ddd" class="subtitulo2"><strong>TIPO CARGO</strong></td>
                  <td colspan="3" bgcolor="#FFF" class="subtitulo2">{{$temp->nombre_categoria_trabajo}}&nbsp;</td>
                </tr>

                <tr bgcolor="#FFFFFF">
                  <td width="25%" bgcolor="#ddd" class="subtitulo2"><strong>INICIO CONTRATO</strong></td>
                  <td width="23%" bgcolor="#FFF" class="subtitulo2">{{$temp->inicio_contratacion}}&nbsp;</td>
                  <td width="26%" bgcolor="#ddd" class="subtitulo2"><strong>FIN DEL CONTRATO</strong></td>
                  <td width="26%" bgcolor="#FFF" class="subtitulo2">{{$temp->fin_contrato}}&nbsp;</td>
                </tr>

                
                <tr bgcolor="#FFFFFF">
                  <td width="25%" bgcolor="#ddd" class="subtitulo2"><strong>PENSION</strong></td>
                  <td width="23%" bgcolor="#FFF" class="subtitulo2">{{$temp->pesiones}}&nbsp;</td>
                  <td width="26%" bgcolor="#ddd" class="subtitulo2"><strong>TIPO CONTRATO</strong></td>
                  <td width="26%" bgcolor="#FFF" class="subtitulo2">{{$temp->tipo_contrato}}&nbsp;</td>
                </tr>
                
                <tr bgcolor="#FFFFFF">
                  <td width="25%" bgcolor="#ddd" class="subtitulo2"><strong>SALARIO ASIGNADO</strong></td>
                  <td width="23%" bgcolor="#FFF" class="subtitulo2">{{$temp->salario}}&nbsp;</td>
                  <td width="26%" bgcolor="#ddd" class="subtitulo2"><strong>Observaciones del Contrato</strong></td>
                  <td width="26%" bgcolor="#FFF" class="subtitulo2">{{$temp->observaciones}}&nbsp;</td>
                </tr>

                <tr bgcolor="#FFFFFF">
                  <td height="22" bgcolor="#ddd" class="subtitulo2"><strong>CODIGO CONTRATO</strong></td>
                  <td colspan="3" bgcolor="#FFF" class="subtitulo2">En desarrollo de contrato No: <b>{{$temp->codigos_secretaria}}</b> de <b>{{ Carbon\Carbon::parse($temp->inicio_contratacion)->format('Y') }}</b>, suscrito entre el Cabildo Indígena de Guambia y la Secretaria de Educación del Departamento del Cauca.&nbsp;</td>
                </tr>
              
                <tr bgcolor="#FFFFFF">
                  <td colspan="4" class="subtitulo2">&nbsp;</td>
                </tr>
    
    
        <!--Aqui finaliza el codigo de tablas informacion trabajo-->
         

          <!--Aqui va el codigo de tablas persona encargada de registar al trabajador  -->
    
          <tr bgcolor="#849AC6">
                      <td colspan="4" class="tituloEtiqueta" align="center"> <div align="center">DIRECCIÓN DONDE VA LABORAR EL EMPLEADO</div></td>
                    </tr>

                    <tr bgcolor="#FFFFFF">
                  <td width="25%" bgcolor="#ddd" class="subtitulo2"><strong>DEPARTAMENTO</strong></td>
                  <td width="23%" bgcolor="#FFF" class="subtitulo2">--&nbsp;</td>
                  <td width="26%" bgcolor="#ddd" class="subtitulo2"><strong>MUNICIPIO</strong></td>
                  <td width="26%" bgcolor="#FFF" class="subtitulo2">{{$temp->nombre_municipio_trabajo }}&nbsp;</td> 
                </tr>

                <tr bgcolor="#FFFFFF">
                  <td height="22" bgcolor="#ddd" class="subtitulo2"><strong>INSTITUCION</strong></td>
                  <td colspan="3" bgcolor="#FFF" class="subtitulo2">{{$temp->nombre_tipo_institucion}}&nbsp;</td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td height="22" bgcolor="#ddd" class="subtitulo2"><strong> SEDE INSTITUCION</strong></td>
                  <td colspan="3" bgcolor="#FFF" class="subtitulo2">{{$temp->nombre_sede_institucion}}&nbsp;</td>
                </tr>
                
              <!--Aqui finaliza el codigo de tablas direccion empleado-->

            
                    
                          
                                    <tr bgcolor="#FFFFFF">
                                        <td colspan="4" class="subtitulo2">&nbsp;</td>
                                    </tr>

                                    <tr bgcolor="#FFFFFF">
                                        <td colspan="4">
                                            <table width="95%" border="0" aling="center" cellpadding="0" cellspacing="1"
                                                bgcolor="#EEEEEE">
                                                <tbody>
                                                    <tr bgcolor="#849AC6">
                                                        <td colspan="2" height="25px" ; class="subtitulo4">
                                                            <div aling="center" class="Estilo16">OTRAS INFORMACIONES
                                                                 </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table width="38%" border="0" aling="center" cellpadding="0"
                                                cellspacing="0">
                                                <tbody>
                                                    <tr>

                                                       
                                                            <div aling="center" class="contenedor1">
                                                           
                                                               
                                                            </div>

                                                            <style>
.boton3 {
    color: #318aac !important;
    
    padding: 0.5em 1.2em;
    background: rgba(0, 0, 0, 0);
    border: 2px solid;
    border-color: #318aac;
    transition: all 1s ease;
    position: relative;
    
}

.boton3:hover {
    background: #318aac;
    color: #fff !important;
}
</style>
                                                        
                                                    </tr>
                                                </tbody>
                                                
                                                <BR>
                                                <BR>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          <style>
                              .contenedor1{
                                  margin-left:500px;
                              }
                          </style>
                           

                        </td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td colspan="3">
                            <div aling="center"></div>
                        </td>
                    </tr>
                </tbody>
           
                               





                                                        _________________________________________________
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="cont-cell">
                                                                    <label>Observaciones Formula Medica</label>
                                                                    <p id="perfilProfesional"></p>
                                                                    <label>{{$temp->	observaciones_formula_medica}}</label>
                                                                    <p class="text-justify"
                                                                        id="descripcionPerfilProfesional"></p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="cont-cell">
                                                                <div class="block block-datos-actualizacion-academica">
                                            <h2>
                                                <span class="numero bg-cafe"><span>3</span></span>
                                                <span class="line bg-cafe"></span>
                                                <span class="text bg-cafe"><span>Idiomas que domina</span></span>
                                            </h2>
                                      
                                        </div>
                                                                   
                                                                  
                                                                    <div class="recuadro_info_persona"></div>
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
                        <div class="block block-datos-actualizacion-academica">
                                            <h2>
                                                <span class="numero bg-cafe"><span>4</span></span>
                                                <span class="line bg-cafe"></span>
                                                <span class="text bg-cafe"><span>Información Académica</span></span>
                                            </h2>
                                      
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
                    
                    {{-- BOTON SUBMIT --}}
            

                {{-- Informacion de educación superior --}}
                <div id="NoGustaQueEstudienGuambia" style="visibility: hidden; display: none;">
                    
                    
                  
    
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
    
                        <div class="clearfix"></div>
                        <!--Cierra el contenedor 2 . recuadro -->
                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/box-impresion-->
                                </td>
                            </tr>
                         
                            
                           
                                <td>
                                    <div class="box-impresion">
                                        <!--Segunda pagina-->
                                        <p aling="left">
                                <span class="Estilo4 Estilo5 Estilo6 Estilo7">
                                    <span class="Estilo4 Estilo5 Estilo6  Estilo8 Estilo9">
                                        <span class="Estilo5 Estilo6 Estilo8 Estilo9  Estilo11">
                                            <span class="Estilo9 Estilo5">
                                                <span class="Estilo6 Estilo8 Estilo9 Estilo13 Estilo14">
                                                    <span style="font-size:10px">NOTA:PARA TODOS LOS EFECTOS LEGALES, CERTIFICO QUE LOS DATOS EXPRESADOS EN EL PRESENTE FORMATO ÚNICO, SON VERACES, (ARTÍCULO 5º. DE LA LEY 190/95).
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </p>
                                        
                                       
                                    </div> <!-- / box impresion-->
                                </td>
                            </tr>
                         
                         
                           <tr bgcolor="#FFFFFF">
                                        <td colspan="4" class="subtitulo2">&nbsp;</td>
                                    </tr>

                                    <tr bgcolor="#FFFFFF">
                                        <td colspan="4">
                                            <table width="95%" border="0" aling="center" cellpadding="0" cellspacing="1"
                                                bgcolor="#EEEEEE">
                                                <tbody>
                                                    <tr bgcolor="#849AC6">
                                                        <td colspan="2" height="25px" ; class="subtitulo4">
                                                            <div aling="center" class="Estilo16">SEGUIR CON EL PROCESO
                                                                 </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table width="38%" border="0" aling="center" cellpadding="0"
                                                cellspacing="0">
                                                <tbody>
                                                    <tr>

                                                       
                                                   

                                                            <style>
.boton3 {
    color: #318aac !important;
    
    padding: 0.5em 1.2em;
    background: rgba(0, 0, 0, 0);
    border: 2px solid;
    border-color: #318aac;
    transition: all 1s ease;
    position: relative;
    
}

.boton3:hover {
    background: #318aac;
    color: #fff !important;
}
</style>
                                                        
                                                    </tr>
                                                </tbody>
                                                
                                                <BR>
                                                <BR>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          <style>
                              .contenedor1{
                                  margin-left:500px;
                              }
                          </style>
                      

                            <div aling="center" class="contenedor1">
                                                           
                                                           <a href="/home">
                   <span class="boton3">SEGUIR CON EL PROCESO SITH</span>


               </a>
              
                                                       </div>

                        </td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td colspan="3">
                            <div aling="center"></div>
                        </td>
                    </tr>
                </tbody>
           
                               

                           ____
                            
                          
                            @endforeach
                               

    <script type="text/javascript">
    direc.ruta = "";
    direc.path_app_v1 = "";
    </script>
    <script src="./CV_files/hoja-de-vida-imprimir.js.descarga"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async="" src="./CV_files/js"></script>

    <script>
    $(document).on('ready', function() {



        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());



        gtag('config', 'UA-109209166-1');



    });
    </script>





    <!--Start of HubSpot Embed Code -->

    <script type="text/javascript" id="hs-script-loader" async="" defer="" src="./CV_files/8843973.js(2).descarga">
    </script>

    <!-- End of HubSpot Embed Code -->

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
            educacionFormal[0].nombre_municipio+' - '+educacionFormal[0].nombre_colegio+' - '+
            educacionFormal[0].nombre_sede+' - '+educacionFormal[0].tipo+' - '+educacionFormal[0].estado+' - '+
            educacionFormal[0].año_educacion+' - '+educacionFormal[0].modalidad_colegio);
        }

        
        let direccion_cc_expedicion1={!!($direccion_cc_expedicion1)!!};
        if(direccion_cc_expedicion1.length>0){
            $('#lugarCCExoPDiv').show();
            $('#lugarCCExoPInput').val( 'Departamento de-'+direccion_cc_expedicion1[0].departamento_expedicion+' - Municipio de-  '+
            direccion_cc_expedicion1[0].municipio_expedin);
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












    <iframe owner="archetype" title="archetype" style="display: none; visibility: hidden;"
        src="./CV_files/saved_resource.html"></iframe>
</body>

</html>