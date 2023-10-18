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
                    <h1> @lang('Mi Hoja Devida')</h1>
                    <h2 class=""> @lang('Menu')</h2>
                </div>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="#"> @lang('Inicio')</a></li>
                        <li><a href="#"> @lang('Mi Hoja Devida')</a></li>
                        
                    </ol>
                </div>
            </div>
            <div id="pnlInicio" class="container">

                <br>
                <br>
               <BR>
               <BR>
                <div class="color_informacion_modulo " style="margin-top: 15px;">
    <span class="color_infor  ">@lang('Usted se encuentra en:')' &nbsp;&nbsp;<font color="#060505"> @lang('Mi Hoja Devida') &gt; <font color="#060505"> </font> &gt; <font color="#060505">
            </font> </span>
</div>
<br>
<br>
           <form id="searchPersona" class="form_cunsulta" name="form" method="POST" role="informacion-perosona" class="pocicion_formulario">
                                  @csrf
                                  
                                         <input id="nuip" name="documento" class="form-control"
                                          placeholder="Digíte el número sin puntos ni comas"
                                          title="El nùmero de cèdula debe ser de 2 a 10 dígitos"
                                          value="{{ Auth::user()->cedula}}"  type="hidden" required>
                                     
                                
                </form>
                <div class="col-sm-12 col-sm-offset-2">
                    
                    <div class="row hg-menu-principal-contenedor">
                        
                        <div id="PanelIzquierdoUC1_pnlConsultarLiquidacion"
                            class="hg-col col-sm-12 col-md-12 col-lg-8 text-center">

                            <div class="row">
                                <div class="hg-menu-opcion">
                                 <div class="alert alert-succes" role="alert">

                                                <div class="table-responsive">
                                                    <h1>{{Session::get('data')}}</h1>
                                                    <table id="persona"     class="table table-bordered table-striped table-vertical">
                                                      <thead>
                                                          <tr>
                                                              <th>@lang('N° CEDULA') </th>
                                                              <th>@lang('NOMBRES')</th>
                                                              <th>@lang('APELLIDO')</th>
                                                            <!--  <th>@lang('AGREGAR CONTRATOS')</th>
                                                              <th>@lang('VER CONTRATOS')</th>-->
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

            </section>




            <br>
            <br>
            <br>
            <br>
            
            



        



    <br>
    <br>
    <br>
      
    
    </section>

</div>




<script>
 $(document).ready(function () {
  let formPersona = $('#searchPersona');
  let documento = formPersona.find('input[name="documento"]').val();

  // Realiza la consulta AJAX
  $.ajax({
    type: "POST",
    url: "/Hoja-Vida",
    data: {
      documento: documento,
    },
    dataType: "json",
    success: (response) => {
      // Si la consulta es exitosa, muestra los resultados
      if (response.status) {
        let row = `<tr>
                          <td>${response.result.documento_persona}</td>
                          <td>${response.result.nombres}</td>
                          <td>${response.result.apellidos}</td>

                          <td><a   class="btn btn-primary" href="Hoja-Vida/${(response.result.id)}/Informacion">Actualizar Mi Hoja De vida </a></td>
                          <td><a  class="btn btn-info" href="/Contratos-Empleado/${(response.result.documento_persona)}">Ver Mi Hoja de Vida  </a></td>
                      </tr>`;

        $('#persona>tbody').html(row);
      } else {
        // Si la consulta no es exitosa, muestra un mensaje de error
        Swal.fire(
          'Error',
          response.mensaje,
          'error',
        );
      }
    }
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