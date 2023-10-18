<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="{{ asset('/images/logo_misak.png') }}" type="image/ico" />

  

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('menu2.name', 'SISTEMA DE INFORMACIÓN  TALENTO HUMANO-SITH') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <link href="./css/fonts/style.css" rel="stylesheet">
 
  <!-- Custom fonts for this template -->
 
  <link href="./css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="./css/coming-soon.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>

<script src="{{ asset('js/sweetalert2@9.js') }}" defer></script>


<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
 
<link rel="stylesheet" href="css/estilos_pie_pagina_menu.css">
<!--\\\\\\\ contentpanel start\\\\\\-->

<link rel="stylesheet" href="css/estilos_pie_pagina.css">

<link href="./css/all.min.css" rel="stylesheet">
<link href="./css/humano-el-estandar.css" rel="stylesheet">
<link <!--\\\\\\\ contentpanel start\\\\\\-->






</head>
<body>
    
   
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
  <source src=" {{ asset('mp4/aranda.mp4') }}" type="video/mp4">
  </video>
<main class="hg-bg-white">
    <div class="nano has-scrollbar">
        <div class="parallax nano-content" id="nano-content" tabindex="0" style="right: -17px;">
            <div class="pull-left breadcrumb_admin clear_both">
                <div class="pull-left page_title theme_color">
                    <h1> @lang('ESPIRAL DE Educación')</h1>
                    <h2 class=""> @lang('Menu')</h2>
                </div>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="#"> @lang(' Espiral de Educación')</a></li>
                        <li><a href="http://misak-colombia.org/"> @lang('Misak Colombia')</a></li>
                        <li class="active"> @lang('')</li>
                    </ol>
                </div>
            </div>
            <div id="pnlInicio" class="container">

              ---

               <div class="container">
        <div id="login" class="text-center" style="">
           <!-- <img id="logoimagen" src="./¡Bienvenido a DataWifi!_files/Logo.pn" alt="" data-pagespeed-lsc-url="">-->
                
            <form role="form" action="" method="post">
                <input type="hidden" name="_csrf_token" value="xLdbuV65M3UT_oIspSrPduWOuoXGeMSO4zNZh-ZXsV0">

                <div class="input-group campos">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control test" type="text" id="username" placeholder="Usuario..." name="_username"
                        value="" required="required">
                </div>

                <div class="input-group campos">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control test" type="password" id="password" placeholder="Contraseña..."
                        name="_password" required="required" autocomplete="off">
                </div>

                <br>
                <p><input type="checkbox" id="remember_me" name="_remember_me"> Recordarme</p>

                <div class="text-center" style="width:304px;margin:auto;margin-top:10px;">
                    <div class="g-recaptcha" data-sitekey="6LfhACIUAAAAANm-Axx-gtqq3z6VjFenBfZEqgsB"
                        data-callback="callback_captcha" data-expired-callback="callback_captch_expired"
                        style="margin:auto">
                       
                </div>

                <button style="width:220px;height:35px;font-size:1em;margin-top:15px;" type="submit" class="btn"
                    id="_submit" name="_submit">
                    <span class="glyphicon glyphicon-ok"></span> Iniciar sesión
                </button>
                <!--
                <input style="width:200px;" type="submit" class="btn btn-primary" id="_submit" name="_submit" value="Ingresar" disabled/>
                -->
            </form>
            <div id="informacion">
                <p><span class="glyphicon glyphicon-envelope"></span> <a
                        href="mailto:wifi@datawifi.co">wifi@datawifi.co</a></p>
                <p><span class="glyphicon glyphicon-link"></span><a href="https://www.datawifi.co/" target="_BLANK">
                        https://www.datawifi.co</a></p>
                <p><span class="glyphicon glyphicon-earphone"></span> +57 301 6604857</p>
                <p><span class="glyphicon glyphicon-map-marker"></span> Calle 101b # 45a - 41, Bogotá </p>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
<style>
    @font-face {
    font-family: Shapiro;
    src: url(../FONTS/shapiro-light.otf);
}
/*
*/
#myVideo {
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    position: fixed;    
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%); 
    z-index: -100;
    background-size: cover;
}

#login{
    width: 326px;
    height: auto;
    margin: auto;
    background-color: white;
    margin-top: 80px;
    font-family: Shapiro;
    color: #221c35;
    padding: 10px;
    -webkit-box-shadow: 0px 0px 15px 1px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 15px 1px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 15px 1px rgba(0,0,0,0.75);
}

#logoimagen{
    width: 300px;
    margin: auto;
    margin-bottom: 20px;
}

#login form{
    text-align: center; 
}

#login .campos{
    width: 98%;
    text-align: center; 
    border:none;
    color: gray;
    text-align: center;
    margin:auto;
    margin-top: 6px;
    margin-bottom: 6px;
    border:none;
}

#login .campos:focus{
    border:1px solid #e10098;
}

#_submit {
    margin-top: 10px;
    margin-bottom: 10px;
    color: white;
}

#mensajeerror{
    color:#e10098;
    text-align: center;
}

#informacion{
    text-align: left;
    font-size: 12px;
    padding-left: 17px;
    padding-bottom: 11px;
    margin-top: 10px;
    margin-bottom: 10px;
}

#informacion p{
    margin-top: 0px;
    margin-bottom: 0px;
}

/*nuevo*/
.input-group {
    color: #221c35;
    border:none;
    font-size: 1.1em;
    border-bottom: 1px solid black;
}

.input-group-addon{
    background-color: white;
    border:none;
    border-radius: 0px;
    box-shadow: none;
}
.input-group .form-control{
    border-radius: 0px;
    box-shadow: none;
    border:none;
}

.btn{
    background-color: #e10098;
    border-radius: 0px;
}

.btn .glyphicon{
    color: white;
}

.glyphicon{
    color: #221c35;
}

.test{
    border: none;
    box-shadow: none;
    border-radius: 0px;
}
    </style>

               



            <br>
            <br>
            <br>
            <br>
            
            
            <div class="social-icons">
 
  


<div class="informacion1">
    <!-- <a href="">Informacion Compañia</a>--| <a href="">Privacion y Politica</a>--> | <a href=""> 
    @lang('@lang('&copy;2021 Todos los Derechos Reservados |Sistema de Información de Talento Humano -Espiral de Educación')</a>


</div>

<div class="informacion1">
    <!-- <a href="">Informacion Compañia</a>--| <a href="">Privacion y Politica</a>--> | <a href=""> 
    @lang('|©|Cabildo  Indigena del Resguardo de Guambía-Silvia-Cauca-Colombia|')</a>


</div>
<div class="informacion1">
    <!-- <a href="">Informacion Compañia</a>--| <a href="">Privacion y Politica</a>--> | <a href=""> 
    @lang('|© |Desarrollado:Ing: Fabian Aranda T |©Espiral Educación|')</a>


</div>

<!-- Código de instalación Cliengo para estadistica.sistemas.edu@misak-colombia.org --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/611ebdde8241d4002ac7b8e5/611ebde18241d4002ac7b8ea.js?platform=registration'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
</div>



   
    <br>
    <br>
       <div class="modal fade" id="modal_buscar_codigo_familia" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
              <div class="modal-content  ">
                    <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                    <h4 class="modal-title">@lang('Verificar si se encuentra registrado en el Sistema Talento Humano -SITH') </h4>
                    </div>
                    <div class="modal-body">
    
                    <div id="contenido_modal_confirm_alumno_matriculado">
    
    
                          <!----------------=========================0--------------------->
    
                          <!----BUSCAR CODIGO VIVIENDA POR DOCUMENTO DE INDENTIDAD -------------------->
    
                          <div class="subir_informacion_general">
                                <div class="container clearfix">
                                      <div class="col-sm-4 topmargin-sm">
    
                                            <form id="searchPersona" class="form_cunsulta" method="POST" role="Informacion_General">
                                                  @csrf
                                                  <div id="consulta_externa">
                                                  <label>@lang('Ingresar el número de identificació') </label><br>
                                                  <input id="nuip" name="documento" class="form-control"
                                                        placeholder="Digíte el número sin puntos ni comas"
                                                        title="El nùmero de cèdula debe ser de 2 a 10 dígitos" autocomplete="off" type="number" required>
                                                  <span class="animated fadeIn"></span>
                                                  </div>
                                                  <br>
                                                  <div class="nobottommargin tright">
                                                  <input type="submit" id="boton" name="enviar" value="Buscar"
                                                        class="boton tab-linker btn-block">
                                                  </div>
                                            </form>
                                      </div>
    
                                      <div class="col-sm-12 topmargin-sm text-center">
                                            <h5>@lang('Detalle de la persona')</h5>
                                            <div class="table-responsive-md">
                                                  <table class="table text-center" id="persona">
                                                        <thead>
                                                              <tr>
                                                                <th>@lang('Documento')</th>
                                                                <th>@lang('Nombres')</th>
                                                                <th>@lang('Apellidos')</th>
                                                                <th>@lang('Acción')</th>
                                                                <th>@lang('Acción')</th>
                                                              </tr>
                                                            </thead>
                                                        <tbody>
    
                                                        </tbody>
                                                  </table>
                                            </div> 
                                      </div>
                                </div>
                          </div>
                    </div><!-- FIN DEL contenido_modal_confirm_alumno_matriculado-->
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <!---->
                    </div>
              </div><!-- /.modal-content -->
        </div>
    </div>
    
    </section>

</div>

<script>

    $(document).ready(function () {
        
        let formSearchPersona = $('#searchPersona');

        formSearchPersona.submit((e) => {
            e.preventDefault();
            $.ajax({
                    type: "POST",
                    url: "{{ route('espiral-educacion') }}",
                    data: formSearchPersona.serialize(),
                    success: (response) => {
                        if(!response.status){
                                Swal.fire(
                                    '-',
                                    response.mensaje,
                                    'warning',
                                );
                        }else{
                                let row = `<tr>
                                                <td>${response.result.docomento_persona}</td>
                                                <td>${response.result.nombres}</td>
                                                <td>${response.result.apellidos}</td>
                                                <td><a href="/login_admi-X7S9XXXX9S-DJSI3YSNZSG3UAJ-JSHHS">Ingresar al sistema </a></td>
                                                <td><a href="/register">Registrar en el sistema </a></td>

                                            </tr>`;
                                
                                $('#persona>tbody').html(row);
                        }
                    }
            });
        });

    });

</script>

    
</body>
</html>


