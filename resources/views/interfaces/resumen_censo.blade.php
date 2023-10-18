<!doctype html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('menu2.name', 'INFORMACION PERSONA INGRESADO EN WASR') }}
    </title>
    <link href="{{ asset('css/certificado.css') }}" rel="stylesheet">
    <style type="text/css">
        .style3 {
            height: 16px;
        }
        


        .styleletrapagina {
            font-size: 0.2px;
        }

    </style>
</head>

<body>
    <!--<form method="post" action="" id="form1">-->
        @foreach($datos as $key=>$temp)

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
                                            <div aling="center">INFORMACION PERSONA INGRESADO EN WASR </div><br>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#243f78">
                                        <td colspan="2" height="25px" ; class="subtitulo4">
                                            CABILDO INDIGENA DE GUAMBIA-ESPIRAL DE EDUCACION- NIT:817-000-162-9
                                        </td>
                                        <td colspan="2" height="25px" ;>
                                            <div aling="left">


                                                <span class="subtitulo4"><b>WASR-ESPIRAL DE EDUCACION </b></span>&nbsp;<font size="0.6px" , color="#fff" ;>-
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
                                            {{ $temp->documento_persona }}&nbsp;
                                        </td>
                                    </tr>
                                    <tr bgcolor="#FFFFFF">

                                        <td bgcolor="#ddd" class="style3"><strong>GÉNERO</strong></td>
                                        <td bgcolor="#FFF" class="style3">{{ $temp->sexo }}&nbsp;</td>
                                        <!--<td bgcolor="#ddd" class="style3"><strong>FECHA NACIMIENTO</strong></td>
                                        <td bgcolor="#FFF" class="style3"></td>-->

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
                                        <td bgcolor="#FFF" class="subtitulo2">{{ $temp->nombre_municipio }}&nbsp;</td>
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
                                        aqui --&nbsp;
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
                      <td colspan="4" class="tituloEtiqueta" align="center"> <div align="center">- </div></td>
                    </tr>

                <tr bgcolor="#FFFFFF">
                  <td colspan="4" class="subtitulo2">&nbsp;</td>
                </tr>
    
    
        <!--Aqui finaliza el codigo de tablas informacion trabajo-->
         

          <!--Aqui va el codigo de tablas persona encargada de registar al trabajador  -->
    
          <tr bgcolor="#849AC6">
                      <td colspan="4" class="tituloEtiqueta" align="center"> <div align="center">-</div></td>
                    </tr>

                    

               
                
                
                
              <!--Aqui finaliza el codigo de tablas direccion empleado-->

          <!--Aqui va el codigo de tablas informacion  trabajo -->
    
                    
             
             


            

                
                          
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
                                                        <a href="/Inicio/Talento-humano/{{($temp->persona_id)}}/Informacion "
                                    class="btn btn-sm btn-default" style="background-color:#1b9e1d;border: 0px !important;color:white;"> <i aria-hidden="true"></i>
                                      
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

                                                       
                                                            <div aling="center" class="contenedor1">
                                                           
                                </a>
                                                            </div>

                                                            <td>
                             
                            </td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <iframe 

                            src="{{ Storage::disk('public')->url($temp->docomento_pdf) }}">

                            </iframe>
                            
                          <style>
                              .contenedor1{
                                  margin-left:500px;
                              }
                          </style>
                            <p aling="left">
                                <span class="Estilo4 Estilo5 Estilo6 Estilo7">
                                    <span class="Estilo4 Estilo5 Estilo6  Estilo8 Estilo9">
                                        <span class="Estilo5 Estilo6 Estilo8 Estilo9  Estilo11">
                                            <span class="Estilo9 Estilo5">
                                                <span class="Estilo6 Estilo8 Estilo9 Estilo13 Estilo14">
                                                    <span style="font-size:10px">NOTA:
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </p>

                        </td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td colspan="3">
                            <div aling="center"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endforeach


    <!--</form>-->
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script>
        $('#btnSeguirProceso').click(()=>{
            let array=location.href.split('/');
            array.pop();
            array.pop();
            location.href=array.join("/");
        });
    </script>

</html>
