@extends('layouts.menu')

@section('content')


<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>NOVEDADES </h1>
        <h2 class="">Retiro del Censo por fallecimento</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Novedades</a></li>
            <li class="active">Menu Nuvedades</li>
        </ol>
    </div>
</div>
<br>
<br>
<br>
<div class="color_informacion_modulo " style="margin-top: 15px;">
    <span class="color_infor  ">Usted se encuentra en: &nbsp;&nbsp;<font color="#060505"> Sistema de Información Poblacional Misak | SIPEMP &gt; <font color="#060505">Novedad Retiro </font> &gt; <font color="#060505">
                Buscar Persona Fallecida</font>&gt;<font color="#060505">Retiro Por Fallecimiento</font> </span>
</div>

<div class="col-md-8">
    <div class="ContenedorActualizaciones">
        <div class="block-web full">
            <ul class="nav nav-tabs nav-justified nav_bg">
                <li class="active"><a href="#Informacion_del_sistema" data-toggle="tab"><i
                            class="fa fa-laptop"></i>Información general de la persona fallecida </a></li>
                <li class="active"><a href="#ingresar_usuarios" data-toggle="tab"><i class="fa fa-user"></i> -</a></li>
                <!--<li class="active"><a href="#roles" data-toggle="tab"><i class="fa  fa-users"></i> Información sociocultural </a></li>-->

            </ul>
            <div class="tab-content">
                <!---/////Informacion del sistema de informacion poblacional////////---->
                <div class="tab-pane animated fadeInRight active" id="Informacion_del_sistema">
                    <div class="user-profile-content">
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">

                                <h5><strong>Ingresar Informacion</strong></h5>
                                <address>

                                    <div class="alert alert-success" role="alert">

                                        <div class="table-responsive">
                                            <div class="form-group input-group-sm">
                                                <label><span class="asterisco">*</span>Numero Indentificacion</label>


                                                <input name="id" type="text" readonly=»readonly»
                                                    value="{{ $datos->docomento_persona }}" class="form-control">

                                            </div>
                                            <div class="form-group input-group-sm">
                                                <label><span class="asterisco">*</span>Nombres</label>
                                                <input name="id" type="text" value="{{ $datos->nombres }}"
                                                    readonly=»readonly» class="form-control">

                                            </div>
                                            <div class="form-group input-group-sm">
                                                <label><span class="asterisco">*</span>Apellidos</label>
                                                <input name="id" type="text" value="{{ $datos->apellidos }}"
                                                    readonly=»readonly» class="form-control">

                                            </div>
                                        </div>

                                    </div>
                                </address>
                            </div>
                            <div class="col-sm-6">
                                <form id="formRetiroFallecimiento" enctype="multipart/form-data">
                                  @csrf
                                    <input type="hidden" name="id_persona" value="{{$datos->id}}">
                                    <h5><strong>Ingresar Informacion</strong></h5>
                                    <div class="alert alert-success" role="alert">
                                        <div class="table-responsive">
                                            <div class="form-group input-group-sm">

                                                <label style="width:300px" for="title">Cargar documento ________
                                                    PDF</label>
                                                    <input type="file" id="acta_novedad" name="acta_novedad" class="btn-danger" accept=".pdf" required>

                                            </div>

                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>

                                    <div class="pull-right botones-pies">
                                        <a class="btn btn-success btn-xs" href="/Buscar-Persona-Fallecido">Cancelar </a>
                                        <button type="submit" class="btn btn-success btn-xs">Guardar novedad</button>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>






                    <!------/////////Ingresar usuarios y roles en el sistema //////////////////-------------->




                    <!--------//////// informacion de usuarios ingresados en el sistema//////////////////////---------------------->

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


<br>
<br>
<br>
<br>

<div id="ConfirmAction" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h5 class="modal-title">Confirmar Acción</h5>
          </div>
          <div class="modal-body">
              <p>¿Esta seguro que desea realizar esta acción?</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
          </div>
      </div>
  </div>
</div>


@endsection

@section('script')
<script>
    $(document).ready(() => {
      let formRetiroFallecimiento = $('#formRetiroFallecimiento');
      let modalConfirm = $('#ConfirmAction');
      formRetiroFallecimiento.submit((e) => { 
          e.preventDefault();
          modalConfirm.modal('show');
      });

      $('#btnConfirmar').click((e) => { 
          e.preventDefault();
          let data = new FormData(formRetiroFallecimiento[0]);
          $.ajax({
              type: 'POST',
              url:  '/Novedad-Persona-Fallecido',
              data: data,
              dataType: 'json',
              contentType: false,
                processData: false,
              success: (response) => {
                  if (response.result) {

                      Swal.fire('Exito', 'Se ha guardado con éxito.', 'success');

                      setTimeout(function() {
                          location.href = '/Buscar-Persona-Fallecido';
                      }, 2000);
                  } else {

                      Swal.fire('Error', 'Se genero un problema a la hora de guardar', 'error');

                  }
              },
          }).always(() => {
              modalConfirm.modal('hide');
          });
      });
    });

</script>

@endsection
