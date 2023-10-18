@extends('layouts.menu')

@section('content')

<link rel="stylesheet" href="css/estilos_pie_pagina.css">
<style>
  .enlace {
      display: inline;
      border: 0;
      padding: 0;
      margin: 0;
      text-decoration: underline;
      background: none;
      color: #000088;
      font-family: arial, sans-serif;
      font-size: 1em;
      line-height: 1em;
  }

  .enlace:hover {
      text-decoration: none;
      color: #0000cc;
      cursor: pointer;
  }

</style>

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>@lang('Contratos')</h1>
        <h2 class="">@lang('Informacion Empleado')</h2>
    </div>
    <!--
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">@lang('Inicio')</a></li>
            <li><a href="#">@lang('Actualización')</a></li>
            <li class="active">@lang('Actualización Información ')</li>
        </ol>
    </div>-->
</div>
<br>
<br>
<br>
<div class="color_informacion_modulo " style="margin-top: 15px;">
    <span class="color_infor  ">@lang('Usted se encuentra en:')' &nbsp;&nbsp;<font color="#060505"> @lang('Sistema de Información  talento humano | SITH') &gt; <font color="#060505">Actualización </font> &gt; <font color="#060505">
    @lang('Información  General')</font> </span>
</div>

<!---//////// CONTENEDOR  INFIRMACION DE USUARIO  Y CARACTERISTICAS  ETC///////////////////////////////------->
<div class="container clear_both padding_fix">
    <!--\\\\\\\ container  start \\\\\\-->
    <div class="page-content">
        <div class="row">


            <div class="col-md-4">
                  <div class="profile_bg">
                      <div class="user-profile-sidebar">
                          <div class="row">
                              <div class="col-md-8">
                                  <div class="user-identity">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="account-status-data" style="padding: 10px">
                          <h6>@lang('Ingresar documento de la persona')</h6>
                              <form id="searchPersona" class="form_cunsulta" name="form" method="POST" role="informacion-perosona" class="pocicion_formulario">
                                  @csrf
                                  <div class="row" id="consulta_externa">
                                      <div class="col-md-12">
                                          <input id="nuip" name="documento" class="form-control"
                                          placeholder="Digíte el número sin puntos ni comas"
                                          title="El nùmero de cèdula debe ser de 2 a 10 dígitos"
                                          value="{{ Auth::user()->id_persona}}" required>
                                      </div>
                                  </div>
                                  <div class="user-button">
                                      <div class="row">
                                          <button class="botonBuscar" type="submit" id="boton" name="enviar">@lang('Ver información')</button>
                                      </div>
                                  </div>
                              </form>
                      </div>
                  </div>
            </div>

            <!-- ESTYLE BOTONES -->
            <style>
            .botonBuscar {
                text-decoration: none;
                padding: 4px;
                font-weight: 600;
                font-size: 15px;
                color: #ffffff;
                background-color: #5cb85c;
                border-radius: 19px;
                border: 2px solid #5cb85c;
                margin-left: 27px;
            }

            .botonCancelar {
                text-decoration: none;
                padding: 4px;
                font-weight: 600;
                font-size: 20px;
                color: #ffffff;
                background-color: #e41b1a;
                border-radius: 16px;
                border: 2px solid #e41b1a;
                margin-left: 250px;
                margin-left: 20px;
            }

            .inputbuscar {
                text-decoration: none;
                padding: 4px;
                font-weight: 600;
                font-size: 20px;
                color: #130303;
                background-color: #ece9e9;
                border-radius: 16px;
                border: 2px solid #131111;
                margin-left: 250px;
                margin-left: 20px;
            }
            </style>



            <!--//////Meno de informacion de sistema ,  ingresar usuarios y ver usuarios en el sistema ///////////--->
            <!--/col-md-4-->
            <div class="col-md-8">
                <div class="ContenedorFormularioConsultasActualizacion" style="padding: 0;">
                    <div class="block-web full">
                        <ul class="nav nav-tabs nav-justified nav_bg">
                            <li class="active"><a href="#Informacion_del_sistema" data-toggle="tab"><i
                                        class="fa fa-laptop"></i>@lang('Información Empleado') </a></li>
                        </ul>
                        <div class="tab-content">
                            <!---/////Informacion del sistema de informacion poblacional////////---->
                            <div class="tab-pane animated fadeInRight active" id="Informacion_del_sistema">
                                <div class="user-profile-content">
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- <h5><strong>Ingresar Informacion</strong> --</h5>-->
                                            <div class="alert alert-success" role="alert">

                                                <div class="table-responsive">
                                                    <h1>{{Session::get('data')}}</h1>
                                                    <table id="persona" class="table table-bordered table-striped">
                                                      <thead>
                                                          <tr>
                                                              <th>@lang('N° CEDULA') </th>
                                                              <th>@lang('NOMBRES')</th>
                                                              <th>@lang('APELLIDO')</th>
                                                              <th>@lang('AGREGAR CONTRATOS')</th>
                                                              <th>@lang('VER CONTRATOS')</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>

                                                      </tbody>
                                                  </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
      
              </div>
              <!--/tab-content-->
                </div>
                <!--/platafoma-->
            </div>
            <!--/col-md-8-->
        </div>
    </div>
    <!--/row-->
</div>
</div>
<!--\\\\\\\ container  end \\\\\\-->


<script>
  $(document).ready(function () {
      let formPersona = $('#searchPersona');
      formPersona.submit((e) => { 
          e.preventDefault();
          
          $.ajax({
              type: "POST",
              url: "/Cunsultas-Personal",
              data: formPersona.serialize(),
              dataType: "json",
              success: (response) => {

                  if(!response.status){
                          Swal.fire(
                              'Error',
                              response.mensaje,
                              'error',
                          );
                  }else{    
                          let row = `<tr>
                                          <td>${response.result.documento_persona}</td>
                                          <td>${response.result.nombres}</td>
                                          <td>${response.result.apellidos}</td>
                                          <td><a href="/Inicio/Talento-humano/${(response.result.id)}/Informacion">Agregar  Nuevo Contrato</a></td>
                                          <td><a href="/Contratos-Empleado/${(response.result.documento_persona)}">Contratos </a></td>
                                      </tr>`;
                                      
                          
                          $('#persona>tbody').html(row);
                  }
              }
          });
      });
  });
  function decargarDoc(id_persona){
          $.ajax({
              type: 'GET',
              url: '/descargar-documento/' + id_persona,
              dataType: 'json',
              contentType: false,
              processData: false,
          }).done((response) => {
              if (response.result) {

                  var a = document.createElement("a");
                  a.href = 'data:application/pdf;base64,' + response.pdf;
                  a.download = "documento.pdf"; //update for filename
                  a.target = '_blank';
                  document.body.appendChild(a);
                  a.click();

              } else {

                  Swal.fire('Error',
                      'Se genero un problema, comuniquese con el administrador.',
                      'error');

              }

          });            
      }

      function decargarDocVida(id_persona){
          $.ajax({
              type: 'GET',
              url: '/descargar-documento_hoja_vida/' + id_persona,
              dataType: 'json',
              contentType: false,
              processData: false,
          }).done((response) => {
              if (response.result) {

                  var a = document.createElement("a");
                  a.href = 'data:application/pdf;base64,' + response.pdf;
                  a.download = "hoja_vida_pdf"; //update for filename
                  a.target = '_blank';
                  document.body.appendChild(a);
                  a.click();

              } else {

                  Swal.fire('Error',
                      'Se genero un problema, comuniquese con el administrador.',
                      'error');

              }

          });            
      }

      function decargarFormulaMedica(id_persona){
          $.ajax({
              type: 'GET',
              url: '/descargar-documento_formula_medica/' + id_persona,
              dataType: 'json',
              contentType: false,
              processData: false,
          }).done((response) => {
              if (response.result) {

                  var a = document.createElement("a");
                  a.href = 'data:application/pdf;base64,' + response.pdf;
                  a.download = "formula_medica_pdf"; //update for filename
                  a.target = '_blank';
                  document.body.appendChild(a);
                  a.click();

              } else {

                  Swal.fire('Error',
                      'Se genero un problema, comuniquese con el administrador.',
                      'error');

              }

          });            
      }
</script>

@endsection