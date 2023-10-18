
<!doctype html>
<html lang="en">
  <head>
<meta name="csrf-token" content="{{ csrf_token() }}">
 

 <title>{{ config('menu2.name', 'SISTEMA DE INFORMACION POBLACIONAL MISAK-SIPEMP') }}</title>
  


<link href="{{ asset('css/certificado.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


 <form method="post" action="" id="form1">
              <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Certificado Laboral</title>

    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">


  <br>
  <br>
  <style type="text/css">
        .style3
        {
            height: 16px;
        }


        .styleletrapagina
        {
            font-size:0.2px;
        }


    </style>



</head>

<body>
@foreach($novedades as $key=>$temp)
<table width="800" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tbody>
 
 

     
      
       
          <tr bgcolor="#FFFFFF">
            <td colspan="4"><div align="justify">
              <!-- INGESAR INFORMACION, NORMAR LEGALES --->
			  
			  
                 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
	
	 <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row featurette">
      <div class="contenedorLogo">
      <div class="col-2">
		<img class="d-block mx-auto mb-1" src="{{ asset('images/logo_misak.png') }}" alt="" width="120" height="120">
      </div><!-- /.col-lg-4 --> 
    </div>

	  <div class="contenedorTitulo">
      <div class="col-12">
        <h5  class="container text-center">CABILDO INDIGENA DEL RESGUARDO DE GUAMBIA
			<p>E-mail:cabildoguambia@yahoo.es</p>
			<P>Merrap srenkurri mante kentreincha eshkaikuan wentewai asik isua kusrekun</P>
            
            <P>NIT: 817.000.162-9</P>
		</h5>
      </div><!-- /.col-lg-4 -->
    </div>

    </div><!-- /.row -->
</div>
	<style>
        .contenedorTitulo{
            margin-top:-50px;
        }
        .contenedorLogo{
            margin-top:-50px;
        }
    </style>

  <!--<nav class="my-2 my-md-0 mr-md-3">
    
  </nav>-->
</div>
<br><br><br>
<div class="container text-center">
	<h4 class="lead text-justify">
    LA AUTORIDAD ANCESTRAL DEL PUEBLO MISAK, FUNDAMENTADO EN NUESTRO DEBERES Y DERECHO MAYOR DE ORIGEN – LEY MISAK, LA LEY 89 DE 1890 LA CONSTITUCIÓN POLÍTICA DE COLOMBIA DE 1991 Y EL CONVENIO  169 DE LA OIT, EL AUTO  004 Y LA DECLARACIONES UNIVERSAL DE LOS DERECHOS DE LOS PUEBLOS INDÍGENAS DE LA ONU.    
	</h4>
   <br><br><br>
  <h1 class="display-8"><b>CERTIFICA CENSO POBLACIONAL  </B></h1>
  <br><br><br>         
 
  <p class="lead text-justify">
	Que: <b>
	{{$temp->nombres}} {{$temp->apellidos}} </b> identificado  con  {{$temp->tipo_identificacion}}:  Nº {{$temp->docomento_persona}} pertenece  a la etnia Misak(Guambiano), conserva  su identidad  cultural ,  fue residente  en la zona “{{$temp->nombre_zona}} ” vereda “{{$temp->nombre_vereda}}  {{$temp->nombre_sector}}” dentro del Territorio  Ancestral  Misak , municipio  de Silvia , Departamento de Cauca, Actualmente el Habitante   se encuentra  en  estado: @if($temp->estado == 1) <span class="badge badge-success">Retirado</span> @else <span class="badge badge-danger"> Pendiente de Retirar  </span>@endif   en el CENSO POBLACIONAL del Cabildo  Indígena  de Resguardo de Guambia .. 
  </p>
  
  <br>
  <p class="lead text-justify">
  Estado actual  del censo: @if($temp->estado == 1) <span class="badge badge-success">Retirado del Censo Poblacional-Cabildo de Guambia</span> @else <span class="badge badge-danger">Pendiente  del Retirar del Censo Poblacional-Cabildo de Guambia</span>@endif
   </p>
   <p class="lead text-justify">
   Fecha solicitud de retiro:-{{$temp->created_at}}
   </p>
   <p class="lead text-justify">
   Fecha retirado:-{{$temp->fecha_autorizacion}}
   </p>
  
   <p class="lead text-justify">
   Motivo retiro: {{$temp->motivo_retiro}}
   </p>
  
  
  <br><br>
  <p class="lead text-justify">
  Para constancia se firma en la oficina  de  la Autoridad  Ancestral  del Territorio  Wampia  del Pueblo Misak de Silvia Cauca , a los  25 dias del mes   febrero  del 2020
   </p>
 
</div>
<br><br>
 <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="">
      
      <div class="col-4">
		<h3 class="text-center">_______________________</h3>
        <h6 class="pricing-card-title text-center">---------</h6>
        <ul class="list-unstyled mt-6 mb-6">
          <li class="text-center">Coordinador Administrativo</li>
          <li class="text-center">Espiral Educativo</li>
          <li class="text-center">C.C.: 10.723.233 de Silvia</li>
        </ul>
      </div><!-- /.col-lg-4 -->
      <div class="col-4">
        <h3 class="text-center">______________________</h3>
        <h6 class=" text-center">----------</h6>
        <ul class="list-unstyled mt-6 mb-6">
          <li class="text-center">Secretaria General </li>
          <li class="text-center">Espiral Educación</li>
          <li class="text-center">C.C.: 1.061.742.802 de Popayán</li>
        </ul>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>
 <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12">
	      
		<small class="d-block mb-2 text-center">Carrera 2 No. 11-21 Telefax (092)  8251296 Silvia Cauca A.A. 1234 Popayán, Cauca Colombia</small>
        <small class="d-block mb-2 text-center">eduguambia@yahoo. com</small>
		 <small class="d-block mb-2 text-center">
		 <p align="left"><span class="Estilo4 Estilo5 Estilo6 Estilo7"><span class="Estilo4 Estilo5 Estilo6  Estilo8 Estilo9"><span class="Estilo5 Estilo6 Estilo8 Estilo9  Estilo11"><span class="Estilo9 Estilo5"><span class="Estilo6 Estilo8 Estilo9 Estilo13 Estilo14"><span style="font-size:10px">NOTA: Certificado valido  con las   firmas  de la autoridad ancestral  del pueblo Wambia - Generado por, sistema de información poblacional Misak- SIPEMP..</span></span></span></span></span></span></p>
         </small>
      </div>
    </div>
  </footer>

               <!--  FIN INGESAR INFORMACION, NORMAR LEGALES --->
              
            </div></td>  
          </tr>
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
        <td width="55%"><div align="center" class="subtitulo3"><a href="javascript:window.print();">IMPRIMIR</a></div></td>
             
      
      @endforeach
     
      </td>
  </tr>
  
</tbody></table>
<br>
<br>


</form>
    </html>
     