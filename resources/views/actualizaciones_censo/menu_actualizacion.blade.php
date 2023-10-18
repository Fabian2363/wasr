@extends('layouts.menu')

@section('content')
<link rel="stylesheet" href="css/estilos_pie_pagina_menu.css">
<!--\\\\\\\ contentpanel start\\\\\\-->



<link rel="stylesheet" href="css/estilos_pie_pagina.css">

<link href="./css/all.min.css" rel="stylesheet">
<link href="./css/humano-el-estandar.css" rel="stylesheet">
<link <!--\\\\\\\ contentpanel start\\\\\\-->

<main class="hg-bg-white">
    <div class="nano has-scrollbar">
        <div class="parallax nano-content" id="nano-content" tabindex="0" style="right: -17px;">
            <div class="pull-left breadcrumb_admin clear_both">
                <div class="pull-left page_title theme_color">
                    <h1> @lang('Actualizacion')</h1>
                    <h2 class=""> @lang('Menu')</h2>
                </div>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="#"> @lang('Inicio')</a></li>
                        <li><a href="#"> @lang('Actualizacion')</a></li>
                        <li class="active"> @lang('Consultas')</li>
                    </ol>
                </div>
            </div>
            <div id="pnlInicio" class="container">

                <br>
                <br>
               <BR>
               <BR>
                <div class="color_informacion_modulo " style="margin-top: 15px;">
    <span class="color_infor  ">@lang('Usted se encuentra en:')' &nbsp;&nbsp;<font color="#060505"> @lang('Menu Actualizacion') &gt; <font color="#060505"> </font> &gt; <font color="#060505">
            </font> </span>
</div>
                <div class="col-sm-8 col-sm-offset-2">
                    
                    <div class="row hg-menu-principal-contenedor">
                        
                        <div id="PanelIzquierdoUC1_pnlConsultarLiquidacion"
                            class="hg-col col-sm-6 col-md-4 col-lg-3 text-center">

                            <div class="row">
                                <div class="hg-menu-opcion">
                                <i class="fas fa-list-ul"></i>
                                    <a href="{{ url('Actualizacion-informacion-general') }}">
                                        <h1>
                                        <img width=30px; src="icon/actualizar.png" >
                                        </h1>
                                         @lang('ACTUALIZAR DATOS PERSONALES')
                                    </a>
                                </div>
                            </div>

                        </div>
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
                                         @lang('INGRESAR PERSONA EN EL NÚCLEO FAMILIAR')
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div id="PanelIzquierdoUC1_pnlReportes" class="hg-col col-sm-6 col-md-4 col-lg-3 text-center">

                            <div class="row">
                                <div class="hg-menu-opcion">
                                    <i class="fas fa-list-ul"></i>
                                    <a href="{{ url('censo-poblacional') }}" class="btn-menu-padre">
                                        <h1>
                                        <img  width=30px; src="icon/persona.jpg" >
                                        </h1>
                                         @lang('INGRESAR NUEVO NÚCLEO FAMILIAR')
                                    </a>
                                    <div class="clear"></div>

                                </div>
                            </div>
--->
                        </div>
                    </div>

                </div>
            </div>

            </section>




            <br>
            <br>
            <br>
            <br>
            
            



        



    <br>
    <br>
    <br>
       <div class="modal fade" id="modal_buscar_codigo_familia" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
              <div class="modal-content  ">
                    <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                    <h4 class="modal-title">@lang('Consultar la información de código de la familia, ingresado el número de identificación de la persona que está a cargo de la casa') </h4>
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
    
    </section>

</div>

<script>

    $(document).ready(function () {
        
        let formSearchPersona = $('#searchPersona');

        formSearchPersona.submit((e) => {
            e.preventDefault();
            $.ajax({
                    type: "POST",
                    url: "{{ route('persona.vivienda') }}",
                    data: formSearchPersona.serialize(),
                    success: (response) => {
                        if(!response.status){
                                Swal.fire(
                                    'Error',
                                    response.mensaje,
                                    'error',
                                );
                        }else{
                                let row = `<tr>
                                                <td>${response.result.docomento_persona}</td>
                                                <td>${response.result.nombres}</td>
                                                <td>${response.result.apellidos}</td>
                                                <td><a href="censo-poblacional/vivienda/${response.id_vivienda}/familia/${response.id_familia}/miembros">Ir al nucleo</a></td>
                                            </tr>`;
                                
                                $('#persona>tbody').html(row);
                        }
                    }
            });
        });

    });

</script>

@endsection