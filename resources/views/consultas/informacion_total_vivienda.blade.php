@extends('layouts.menu')

@section('content')
<link rel="stylesheet" href="css/estilos_pie_pagina.css">
<link href="{{ asset('css/certificado.css') }}" rel="stylesheet">
<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>CONSULTAS</h1>
        <h2 class="">Informacion Vivienda</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Consultas</a></li>
            <li class="active">Informacion Vivienda</li>
        </ol>
    </div>
</div>

<br>
<br>
<br>
<div class="color_informacion_modulo " style="margin-top: 15px;">
    <span class="color_infor  ">Usted se encuentra en: &nbsp;&nbsp;<font color="#060505"> Sistema de Informacion
            Poblacional Misak -SIPEMP &gt; <font color="#060505">Consultas </font> &gt; <font color="#060505">
                Informacion Vivienda </font> </span>
</div>


<!---//////// CONTENEDOR  INFIRMACION DE USUARIO  Y CARACTERISTICAS  ETC///////////////////////////////------->
<div class="container clear_both padding_fix">
    <!--\\\\\\\ container  start \\\\\\-->
    



            <!--//////Meno de informacion de sistema ,  ingresar usuarios y ver usuarios en el sistema ///////////--->
            <!--/col-md-4-->
            

               
                            <!---/////Informacion del sistema de informacion poblacional////////---->
                          

                                            <!-- <h5><strong>Ingresar Informacion</strong> -</h5>---->
                                            <address>
                                              
                                                @foreach($datos as $persona)
                                                <table width="800" border="0" align="center" cellpadding="0"
                                                    cellspacing="1" bgcolor="#CCCCCC">
                                                    <tbody>

                                                        <tr bgcolor="#F4F7FB">
                                                            <td colspan="3">
                                                                <!--<p>&nbsp;</p>-->
                                                                <table width="95%" border="0" align="center"
                                                                    cellpadding="0" cellspacing="1" bgcolor="#999999">
                                                                    <tbody>
                                                                        <tr bgcolor="#8398C5">
                                                                            <td colspan="4" class="tituloEtiqueta"
                                                                                align="center">
                                                                                <div align="center">INFIRMACÌON  DE LA VIVIENDA
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    
                                                                        <tr bgcolor="#FFFFFF">
                                                                            <td colspan="4" class="subtitulo2">&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                            <!--Aqui va el codigo de tablas  informacion del trabajador-->
                                                                            

                                                                        <tr bgcolor="#849AC6">
                                                                            <td colspan="4" class="tituloEtiqueta"
                                                                                align="center">
                                                                                <div align="center">DIRECCIÓN VIVIENDA
                                                                                </div>
                                                                            </td>
                                                                        </tr>


                                                                        <tr bgcolor="#FFFFFF">
                                                                            <td width="25%" bgcolor="#ddd"
                                                                                class="subtitulo2">
                                                                                <strong>DEPARTAMENTO</strong></td>
                                                                            <td width="23%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona->  nombre_depatamento}}&nbsp;
                                                                            </td>
                                                                            <td width="26%" bgcolor="#ddd"
                                                                                class="subtitulo2">
                                                                                <strong>MUNICIPIO</strong></td>
                                                                            <td width="26%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona->  nombre_municipio}}&nbsp;</td>
                                                                        </tr>
																		 <tr bgcolor="#FFFFFF">
                                                                            <td width="25%" bgcolor="#ddd"
                                                                                class="subtitulo2">
                                                                                <strong>RESGUARDO</strong></td>
                                                                            <td width="23%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona->  nombre_reguardo  }}&nbsp;
                                                                            </td>
                                                                            <td width="26%" bgcolor="#ddd"
                                                                                class="subtitulo2">
                                                                                <strong>ZONA</strong></td>
                                                                            <td width="26%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona->   nombre_zona}}&nbsp;</td>
                                                                        </tr>
																		 <tr bgcolor="#FFFFFF">
                                                                            <td width="25%" bgcolor="#ddd"
                                                                                class="subtitulo2">
                                                                                <strong>VEREDA</strong></td>
                                                                            <td width="23%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona->   nombre_vereda}}&nbsp;
                                                                            </td>
                                                                            <td width="26%" bgcolor="#ddd"
                                                                                class="subtitulo2">
                                                                                <strong>SECTOR</strong></td>
                                                                            <td width="26%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona->   nombre_sector}}&nbsp;</td>
                                                                        </tr>
                                                                        <tr bgcolor="#FFFFFF">
                                                                            <td colspan="4" class="subtitulo2">&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr bgcolor="#8398C5">
                                                                            <td colspan="4" class="tituloEtiqueta"
                                                                                align="center">
                                                                                <div align="center">INFIRMACÌON  DE SERVICIOS
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                        <!--Aqui finaliza el codigo de tablas direccion empleado-->



                                                                    

                                                                        <tr bgcolor="#FFFFFF">
                                                                            <td width="25%" bgcolor="#ddd"
                                                                                class="subtitulo2"><strong> PERIDO CONSTRUCCION</strong></td>
                                                                            <td width="23%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona-> periodo_construccion}}&nbsp;
                                                                            </td>
                                                                            <td width="26%" bgcolor="#ddd"
                                                                                class="subtitulo2"><strong>SISTEMA DE SUMINISTRO DE AGUA</strong></td>
                                                                            <td width="26%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona-> tipo_suministro}}&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr bgcolor="#FFFFFF">

                                                                            <td bgcolor="#ddd" class="style3">
                                                                                <strong>SERVICIO DE ENERGÍA</strong></td>
                                                                            <td bgcolor="#FFF" class="style3">
                                                                            {{$persona-> tipo_servicio}}&nbsp;</td>
                                                                            <td bgcolor="#ddd" class="style3">
                                                                                <strong>SERVICIO SANITARIO</strong></td>
                                                                            <td bgcolor="#FFF" class="style3">
                                                                            {{$persona-> nombre_servicio}} </td>

                                                                        </tr>

                                                                        <tr bgcolor="#FFFFFF">
                                                                            <td bgcolor="#ddd" class="subtitulo2">
                                                                                <strong>SERVICIO DE INTERNET (FIJOMÓVIL)</strong></td>
                                                                            <td bgcolor="#FFF" class="subtitulo2">
                                                                            {{$persona-> servicio_internet}}  &nbsp;</td>
                                                                            
                                                                        </tr>
                                                                      

                                                                        <tr bgcolor="#FFFFFF">
                                                                            <td colspan="4" class="subtitulo2">&nbsp;
                                                                            </td>
                                                                        </tr>


                                                                      
                                                                        <!--Aqui va el codigo de tablas informacion  trabajo -->
                                                                      
                                                                        <tr bgcolor="#849AC6">
                                                                            <td colspan="4" class="tituloEtiqueta"
                                                                                align="center">
                                                                                <div align="center">INFORMACIÓN DE LA INFRAESTRUCTURA 
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <tr bgcolor="#327bb2">
                                                                            <td colspan="4" class="subtitulo4"
                                                                                align="center">
                                                                                <span class="subtitulo2"><b>
                                                                                        <font size="0.6px"></font>
                                                                                    </b></span>
                                                                            </td>
                                                                        </tr>

                                                                          <tr bgcolor="#FFFFFF">
                                                                            <td width="25%" bgcolor="#ddd"
                                                                                class="subtitulo2"><strong> MATERIAL PAREDES                                              </strong></td>
                                                                            <td width="23%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona-> nombre_paredes }}&nbsp;</td>
                                                                            <td width="26%" bgcolor="#ddd"
                                                                                class="subtitulo2"><strong>
                                                                                MATERIAL COCINA </strong></td>
                                                                            <td width="26%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona-> nombre_cocina}}&&nbsp;</td>
                                                                        </tr>
                                                                  

                                                                        <tr bgcolor="#FFFFFF">
                                                                            <td width="25%" bgcolor="#ddd"
                                                                                class="subtitulo2"><strong> FORMA DE LA CASA                                  </strong></td>
                                                                            <td width="23%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona-> forma_casa }}&&nbsp;</td>
                                                                            <td width="26%" bgcolor="#ddd"
                                                                                class="subtitulo2"><strong>MATERIAL PISOS                                                                    </strong></td>
                                                                            <td width="26%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona-> nombre_piso  }}&nbsp;</td>
                                                                        </tr>
																		 <tr bgcolor="#FFFFFF">
                                                                            <td width="25%" bgcolor="#ddd"
                                                                                class="subtitulo2"><strong> MATERIAL TECHO                                              </strong></td>
                                                                            <td width="23%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona-> nombre_techo  }}&nbsp;</td>
                                                                            <td width="26%" bgcolor="#ddd"
                                                                                class="subtitulo2"><strong>ESTADO DE CONSERVACIÓN                                                                       </strong></td>
                                                                            <td width="26%" bgcolor="#FFF"
                                                                                class="subtitulo2">
                                                                                {{$persona-> estado_conservacion }}
																				
																				
																				&nbsp;</td>
                                                                        </tr>




                                                                        <tr bgcolor="#FFFFFF">
                                                                            <td bgcolor="#ddd" class="subtitulo2">
                                                                                <strong></strong></td>
                                                                            <td bgcolor="#FFF" class="subtitulo2">&nbsp;
                                                                            </td>
                                                                            <td bgcolor="#ddd" class="subtitulo2">
                                                                                <strong></strong></td>
                                                                            <td bgcolor="#FFF" class="subtitulo2"> </td>
                                                                        </tr>

                                                                        <tr bgcolor="#FFFFFF">
                                                                            <td colspan="4" class="subtitulo2">&nbsp;
                                                                            </td>
                                                                        </tr>


                                                                        <!--Aqui finaliza el codigo de tablas informacion trabajo-->


                                                                        <!--Aqui va el codigo de tablas persona encargada de registar al trabajador  -->

                                                                      

                                                                        
                                                                       
                                                                        

                                                                        
                                                                            


                                                                        
                                                                        


                                                                        <!--Aqui finaliza el codigo de tablas informacion trabajo-->






                                                                        <!--
        <tr bgcolor="#FFFFFF">
          <td colspan="4"><div align="right"></div>            <div align="right"></div>
            <div align="left">
              <p>&nbsp;</p>
              <p align="center">________________________________
              </p>
            </div>            <div align="center" class="subtitulo3">
              <div align="center">
                <p><strong>Firma.</strong>  NºDocumento : CEDULA DE CIUDADANIA No.</p>
              </div>
          </div></td>
        </tr>-->


                                                                    </tbody>
                                                                </table>
                                                                <p align="left"><span
                                                                        class="Estilo4 Estilo5 Estilo6 Estilo7"><span
                                                                            class="Estilo4 Estilo5 Estilo6  Estilo8 Estilo9"><span
                                                                                class="Estilo5 Estilo6 Estilo8 Estilo9  Estilo11"><span
                                                                                    class="Estilo9 Estilo5"><span
                                                                                       
                                                                </p>

                                                </table>
                                                @endforeach
                                               

                                            </address>
                                       
                                       
                            </div>

                            <!------/////////Ingresar usuarios y roles en el sistema //////////////////-------------->



                           
                       
                       
        <!--/row-->
    </div>
</div>
<!--\\\\\\\ container  end \\\\\\-->
</div>
</div>



<br>
<br>
<br>
<br>
<!--PIE DE PAGINA --->







@endsection