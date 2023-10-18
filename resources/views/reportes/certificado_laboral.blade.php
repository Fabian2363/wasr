<!doctype html>
<html lang="en">
  <head>
<meta name="csrf-token" content="{{ csrf_token() }}">
 

 <title>{{ config('menu2.name', 'Experiencia laboral generado por sistema PECG') }}</title>
  


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
@foreach($datos as $key=>$temp)
<table width="800" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tbody>
 
 

     
      
       
          <tr bgcolor="#FFFFFF">
            <td colspan="4"><div align="justify">
              <!-- INGESAR INFORMACION, NORMAR LEGALES --->
			  
			  
                 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
	
	 <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row featurette">
      
      <div class="col-2">
		<img class="d-block mx-auto mb-1" src="{{ asset('images/logoMisak.png') }}" alt="" width="150" height="150">
      </div><!-- /.col-lg-4 --> 
	  
      <div class="col-8">
        <h6 class="my-0 mr-md-auto font-weight-normal text-center">CABILDO INDIGENA DEL RESGUARDO DE GUAMBIA
			<P>NIT 817000162-9</P>
			<P>Metrap srөnkutri mantө kөntraincha eshkaikuan wentөwai asik isua kusrekun</P>
			
		</h6>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>
	

  <!--<nav class="my-2 my-md-0 mr-md-3">
    
  </nav>-->
</div>
<br><br><br>
<div class="container text-center">
	<p class="lead text-center">
EL PROGRAMA DE EDUCACION DEL CABILDO INDIGENA DEL RESGUARDO DE GUAMBIA, IDENTIFICADOS TAL COMO APARECEN AL FINAL DE LAS CORRESPONDIENTES FIRMAS   
	</p>
   <br><br><br>
  <h1 class="display-8"><b>CERTIFICA</B></h1>
  <br><br><br>
  <p class="lead text-justify">
	Que: <b>
  {{$temp->nombres}} {{$temp->apellidos}}</b> identificado con la cedula de ciudadanía No. {{$temp->docomento_persona}} de {{$temp->municipio_expedin}}-{{$temp->departamento_expedicion}}, laboró como {{$temp->nombre_tipo_trabajo}}-{{$temp->nombre_categoria_trabajo}}  en {{$temp->nombre_institucion_trabajo }} {{$temp->nombre_tipo_institucion}}   sede {{$temp->nombre_sede_institucion}}, Municipio de {{$temp->nombre_municipio_trabajo}}  desde  {{ Carbon\Carbon::parse($temp->inicio_contratacion)->toFormattedDateString()}} hasta {{ Carbon\Carbon::parse($temp->fin_contrato)->toFormattedDateString()}} trabajó mediante modalidad de contratación a {{$temp->	tipo_contrato}}, en desarrollo de contrato No {{$temp->codigos_secretaria }} de {{ Carbon\Carbon::parse($temp->inicio_contratacion)->format('Y') }}, suscrito entre el Cabildo Indígena de Guambia y la Secretaria de Educación del Departamento del Cauca.
  </p>
  <br><br><br><br><br><br>
  <p class="lead text-justify">
	Esta constancia se expide a petición del mencionado a efectos de constar experiencia laboral 
   </p>
   <br><br><br><br>
   <p class="lead text-justify">
	Para constancia se firma en Silvia, en las oficinas del Programa de Educación, a los {{old('scheduled_time',date('d')) }} días del mes {{old('scheduled_time',date('M')) }} del {{old('scheduled_time',date('Y')) }}.
   </p>
</div>

<br><br><br><br><br><br>
 <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->
  <div class="container marketing">

<!-- Three columns of text below the carousel -->
<div class="row featurette">
  
  <div class="col-6">
<h3 class="text-center">_____________________</h3>
    <h6 class="pricing-card-title text-center">JAIME ANTONIO MORALES</h3>
    <ul class="list-unstyled mt-6 mb-6">
      <li class="text-center">Coordinador Administrativo</li>
      <li class="text-center">Espiral Educativo</li>
      <li class="text-center">C.C.: 10.723.233 de Silvia</li>
    </ul>
  </div><!-- /.col-lg-4 -->
  <div class="col-6">
    <h3 class="text-center">_______________________</h3>
    <h6 class="pricing-card-title text-center">DAYANA TOMBÉ MANQUILLO</h3>
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
		 <p align="left"><span class="Estilo4 Estilo5 Estilo6 Estilo7"><span class="Estilo4 Estilo5 Estilo6  Estilo8 Estilo9"><span class="Estilo5 Estilo6 Estilo8 Estilo9  Estilo11"><span class="Estilo9 Estilo5"><span class="Estilo6 Estilo8 Estilo9 Estilo13 Estilo14"><span style="font-size:10px">NOTA: Certificado valido con las firmas de coordinadores.</span></span></span></span></span></span></p>
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
     

    