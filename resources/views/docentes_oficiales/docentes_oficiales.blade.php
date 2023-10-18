@extends('layouts.menu')

@section('content')
<!--\\\\\\\ estilos css \\\\\\-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="/js/sweetalert2@9.js"></script>
<link href="{{ asset('css/estilos_pie_pagina_menu.css') }}" rel="stylesheet">
 <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
 <link href="{{ asset('css/humano-el-estandar.css') }}" rel="stylesheet">
 

<link <!--\\\\\\\ contentpanel start\\\\\\-->

<main class="hg-bg-white">
    <div class="nano has-scrollbar">
        <div class="parallax nano-content" id="nano-content" tabindex="0" style="right: -17px;">
            <div class="pull-left breadcrumb_admin clear_both">
                <div class="pull-left page_title theme_color">
                    <h1> @lang('TALENTO HUMANO')</h1>
                    <h2 class=""> @lang('Menu')</h2>
                </div>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="#"> @lang('Inicio')</a></li>
                        <li><a href="#"> @lang('TALENTO HUMANO')</a></li>
                        <li class="active"> @lang('Menu')</li>
                    </ol>
                </div>
            </div>
            <div id="pnlInicio" class="container">

                <br>
                <br>
               <BR>
                <div class="color_informacion_modulo " style="margin-top: 15px;">
    <span class="color_infor  ">Usted se encuentra en: &nbsp;&nbsp;<font color="#060505"> Menu Talento humano &gt; <font color="#060505"> </font> &gt; <font color="#060505">
            </font> </span>
</div>
<br>
   
            <!--Informacion menu izquierda-->
            
		
                <div class="col-sm-8 col-sm-offset-2">
				<!--<div class="col-md-3 col-sm-4 col-xs-12 ">

                <iframe frameborder="0" width="100%" scrolling="no" height="245" src="/menu-lateral/20">

                </iframe>
            </div>-->
                    
                    <div class="row hg-menu-principal-contenedor">
                        <!--
                        <div id="PanelIzquierdoUC1_pnlConsultarLiquidacion"
                            class="hg-col col-sm-6 col-md-4 col-lg-3 text-center">

                            <div class="row">
                                <div class="hg-menu-opcion">
                                <i class="fas fa-list-ul"></i>
                                    <a href="{{ url('Menu-Usuarios') }}">
                                        <h1>
                                           
                                            <i class="far fa-file-alt"></i>
                                            <class="icon_consulta"> 
                                        </h1>
                                         @lang('USUARIOS DEL SISTEMA SIPEMP')
                                    </a>
                                </div>
                            </div>

                        </div>-->
                        <!--
                        <div id="PanelIzquierdoUC1_pnlConsultarLiquidacion"
                            class="hg-col col-sm-6 col-md-4 col-lg-3 text-center">

                            <div class="row">
                                <div class="hg-menu-opcion">
                                <i class="fas fa-list-ul"></i>
                                    <a class="circulo-consulta"
                            data-toggle="modal" data-target="#modal_buscar_codigo_familia">
                                        <h1>
                                        <img  width=30px; src="icon/misak.ico" >
                                        </h1>
                                         @lang('RENOVAR CONTRATO LAVORAL')
                                    </a>
                                </div>
                            </div>

                        </div>
                        -->
                        <div id="PanelIzquierdoUC1_pnlReportes" class="hg-col col-sm-6 col-md-4 col-lg-3 text-center">
                        
<!--
<div class="row">
    <div class="hg-menu-opcion">
        <i class="fas fa-list-ul"></i>
        <a href="{{ url('Informacion-Persona') }}" class="btn-menu-padre">
            <h1>
                <i class="far fa-file-alt"></i>
            </h1>
            @lang('CONSULTAR TALENTO HUMANO')
        </a>
        <div class="clear"></div>

    </div></div>-->
</div>


              
                        <div id="PanelIzquierdoUC1_pnlConsultarLiquidacion"
                            class="hg-col col-sm-6 col-md-4 col-lg-3 text-center">

                            <div class="row">
                                <div class="hg-menu-opcion">
                                <i class="fas fa-list-ul"></i>
                                    <a href="{{ url('Actualizacion-informacion-general') }}">
                                        <h1>
                                        <img width=30px; src="/icon/actualizar.png" >
                                        </h1>
                                         @lang('ACTUALIZAR DATOS INGRESADOS')
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div id="PanelIzquierdoUC1_pnlConsultarLiquidacion"
                            class="hg-col col-sm-6 col-md-4 col-lg-3 text-center">

                            <div class="row">
                                <div class="hg-menu-opcion">
                                <i class="fas fa-list-ul"></i>
                                    <a href="{{ url('/Inicio/Personal-en-proceso') }}">
                                        <h1>
                                        <img width=30px; src="/icon/admin.png" >
                                        </h1>
                                         @lang('INFORMACIÓN EN PROCESO DE INGRESO')
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div id="PanelIzquierdoUC1_pnlReportes" class="hg-col col-sm-6 col-md-4 col-lg-3 text-center">

                            <div class="row">
                                <div class="hg-menu-opcion">
                                    
							  <form id="familia" method="post" action="/Inicio/Talento-humano">
                                @csrf
                                <input type="hidden" id="id_hogar" name="id_hogar" value="0">
                                <div class="container">
                                    <div class="row">
                                        
                                        
                                     
                                
									
									<i class="fas fa-list-ul"></i>
                                    <a >
                                        <h1>
                                        <img  width=30px; src="/icon/marketing.png" >
                                        </h1>
                                          <button type="submit" class="btn btn-success" id="boton">INGRESAR INFORMACIÓN </button>
                                    </a>
                                    <div class="clear"></div>
									
                                
                            </form>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal fade" id="modal_buscar_codigo_familia" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
              <div class="modal-content  ">
                    <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                    <h4 class="modal-title">@lang('Informacion de la persona  que  va renovar contrato laboral.') </h4>
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
                                                  <label>@lang('Ingresar el número de identificación de la persona') </label><br>
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
    
                                      <div class="col-sm-8 topmargin-sm text-center">
                                            <h5>@lang('Detalle de la persona')</h5>
                                            <div class="table-responsive-md">
                                                  <table class="table text-center" id="persona">
                                                        <thead>
                                                              <tr>
                                                                <th>@lang('Documento')</th>
                                                                <th>@lang('Nombres')</th>
                                                                <th>@lang('Apellidos')</th>
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
            </div>
            </section>
			
                         

        <!-- INICIO DE  CODIGO DE FORMULARIO -->


     
            <!-- Fin Informacion menu izquierda-->
            
                <!-- FORMULARIO-->
                

                   
                          <!---------------------->
             
 <!-------------------------------------->
                    

    <div id="ConfirmAction" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">INGRESAR INFORMACIÓN  </h5>
                </div>
                <div class="modal-body">
                    <p>¿ESTA SEGUDO DE  INGRESAR  INFORMACIÓN AL SISTEMA?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '1783414faba44cd77ebe5a49ad721e3d80260b9b';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>


    <script type="text/javascript">
    //--Modificación para disminuir lentitud de la página y disminuir las peticiones al servidor.
    //PARA QUE APARESCAN LOS OBCIONES  CUANDO SELECCIONE  NO TENGO HIJOS ESTUDIANDO  EN LAS INSTITUICONES EDUCATIVAS DEL RESGUARDO
    


   
    </script>




    <script>
    function pageLoad() {
        //--Modificación para disminuir lentitud de la página y disminuir las peticiones al servidor.

        showNoEstudiaResguardo();

    }
    </script>





    <script type="text/javascript">
        let hogar = {!!($hogar)!!}; 

        $(document).ready(() => {

            window.onbeforeunload = function() { return "Your work will be lost."; };

            if(hogar.length!=0){
                $('#id_hogar').val(hogar.id);
                cargarFormulario();
            }  

            let formFamilia = $('#familia');
            let modalConfirm = $('#ConfirmAction');
            formFamilia.submit((e) => { 
                e.preventDefault();
                modalConfirm.modal('show');
            });

            $('#btnConfirmar').click((e) => {
                var url = formFamilia.attr('action');
                var type = formFamilia.attr('method');
                $.ajax({
                    type: type,
                    url: url,
                    data: formFamilia.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.validate) {
                            setTimeout(() => {
                                Swal.fire(
                                    'TALENTO HUMANO',
                                    'Se procede a ingresar el talento humano al sistema',
                                    'success'
                                );
                            }, 200);

                            setTimeout(function() {
                               // location.href =  hogar.length==0?`familia/${response.id}/miembros`:`${response.id}/miembros`;
                               // location.href = '/censo-poblacional/familia/'+response.id+'/miembros';
                                
                                location.href = '/Docentes-Oficiales/Talento-humano/'+response.id+'/Personal';
                                
                            }, 2000);
                        } else {
                            let mensaje='';
                            if(response.errors){
                                $.map(response.errors, (value, index)=>{
                                    mensaje+=value+'\n';
                                });
                            }else{
                                mensaje = "Ocurrio un error al procesar la información, Comuniquese con el administrador."
                            }
                            setTimeout(() => {
                                Swal.fire('Advertencia', mensaje, 'warning');
                            }, 200);
                        }
                    },
                }).always(() => {
                    modalConfirm.modal('hide');
                });
            });

        });
       

           
    </script>
    

    
    @endsection