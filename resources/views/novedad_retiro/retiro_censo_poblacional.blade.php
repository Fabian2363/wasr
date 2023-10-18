@extends('layouts.menu')

@section('content')



<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>NOVEDADES </h1>
        <h2 class="">Cancelar Contrato Laboral</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#"></a></li>
            <li class="active">Cancelar Contrato Laboral</li>
        </ol>
    </div>
</div>
<!---//////// CONTENEDOR  INFIRMACION DE USUARIO  Y CARACTERISTICAS  ETC///////////////////////////////------->
<div class="container clear_both padding_fix">

    <br>
    <br>




    <!--//////Meno de informacion de sistema ,  ingresar usuarios y ver usuarios en el sistema ///////////--->
    <!--/col-md-4-->
    <div class="col-md-8">
        <div class="ContenedorActualizaciones">
            <div class="block-web full">
                <ul class="nav nav-tabs nav-justified nav_bg">
                    <li class="active"><a href="#Informacion_del_sistema" data-toggle="tab"><i
                                class="fa fa-laptop"></i>Información general de la persona que va  ser Cancelado el  Contrato Laboral </a></li>
                    <!--  <li class="active"><a href="#ingresar_usuarios" data-toggle="tab"><i class="fa fa-user"></i> -</a></li>
				  <li class="active"><a href="#roles" data-toggle="tab"><i class="fa  fa-users"></i> Información sociocultural </a></li>-->

                </ul>
                <div class="tab-content">
                    <!---/////Informacion del sistema de informacion poblacional////////---->
                    <div class="tab-pane animated fadeInRight active" id="Informacion_del_sistema">
                        <div class="user-profile-content">
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">

                                    <h5><strong>Informacion General</strong> -</h5>
                                    <address>

                                        <div class="alert alert-success" role="alert">

                                            <div class="table-responsive">
                                                <div class="form-group input-group-sm">
                                                    <label><span class="asterisco">*</span>Numero
                                                        Identificacion</label>
                                                    <input name="id" type="text" readonly=»readonly»
                                                        value="{{ $datos->docomento_persona }}" class="form-control"
                                                        style="">

                                                </div>
                                                <div class="form-group input-group-sm">
                                                    <label><span class="asterisco">*</span>Nombres</label>
                                                    <input name="id" type="text" readonly=»readonly»
                                                        value="{{ $datos->nombres }}" class="form-control">

                                                </div>
                                                <div class="form-group input-group-sm">
                                                    <label><span class="asterisco">*</span>Apellidos</label>
                                                    <input name="id" type="text" readonly=»readonly»
                                                        value="{{ $datos->apellidos }}" class="form-control">

                                                </div>
                                            </div>

                                        </div>
                                    </address>
                                </div>
                                <div class="col-sm-6">
                                    <form id='formRetiro' enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_persona" value="{{$datos->id}}">
                                        <h5><strong>Ingresar observación </strong></h5>
                                        <div class="alert alert-success" role="alert">
                                            <div class="table-responsive">

                                                <div class="form-group input-group-sm">
                                                    <label><span class="asterisco">*</span>Motivos del cancelación de contrato  </label>
                                                    <input class="form-control" id="motivos" name="motivos"
                                                        placeholder="Ingrese motivos de retiro" type="text" required>
                                                </div>
                                                <div class="form-group input-group-sm">
                                                    <label style="width:300px" for="title">Cargar documento  soporte de cancelación de contrato - formato -PDF</label>
                                                    <input type="file" name="acta_novedad" class="btn-danger" required> 
                                                </div>

                                            </div>

                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>


                                        <div class="pull-right botones-pies">
                                            <a href="/Buscar-Persona-Retirar" class="btn btn-success btn-xs">Cancelar
                                            </a>
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
<div id="ConfirmAction" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Confirmar el retiro del censo poblacional Misak</h5>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro  de realizar el retiro del censo poblacional Misak< a: {{ $datos->nombres }}- {{ $datos->apellidos }} ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
            </div>
        </div>
    </div>
  </div>
  
  <!--PIE DE PAGINA --->
  <footer>
  
      <div class="container-footer-all">
  
          <div class="container-body">
  
              <div class="colum1">
                  <h1>SISTEMA DE INFORMACIÓN POBLACIONAL MISAK - SIPEMP</h1>
  
                  <img src="images/logo.png" alt="">
  
              </div>
  
              <div class="colum2">
  
                  <h1>Contacto</h1>
  
                  <div class="row2">
                      <img src="icon/smartphone.png">
                      <label>3217452529</label>
                  </div>
                  <div class="row2">
                      <img src="icon/contact.png">
                      <label>CabildoGuambia@gmail.com</label>
                  </div>
  
  
  
  
              </div>
  
              <div class="colum3">
  
                  <h1>Direccion</h1>
  
                  <div class="row2">
                      <img src="icon/house.png">
                      <label>CARRERA 2 12 25-Silvia Cauca
                      </label>
                  </div>
  
                  <!-- <div class="row2">
                          <img src="icon/smartphone.png">
                          <label>+1-829-395-2064</label>
                      </div>-->
  
  
  
              </div>
  
          </div>
  
      </div>
  
      <div class="container-footer">
          <div class="footer">
              <div class="copyright">
                  &copy;2020 Todos los Derechos Reservados | <a href="">Cabido de Guambia</a>
              </div>
  
              <div class="informacion1">
                  <!-- <a href="">Informacion Compañia</a>--| <a href="">Privacion y Politica</a>--> | <a href="">©
                      Desarrollado: Ingeniero Fabian Aranda T - |Cabildo de Guambia</a>
              </div>
          </div>
  
      </div>
  
  </footer>
@endsection

@section('script')
<script>
    $(document).ready(() => {
      let formRetiro = $('#formRetiro');
      let modalConfirm = $('#ConfirmAction');
      formRetiro.submit((e) => { 
          e.preventDefault();
          modalConfirm.modal('show');
      });

      $('#btnConfirmar').click((e) => { 
          e.preventDefault();
          let data = new FormData(formRetiro[0]);
          $.ajax({
              type: 'POST',
              url:  '/Novedad-Persona-Retirado',
              data: data,
              dataType: 'json',
              contentType: false,
                processData: false,
              success: (response) => {
                  if (response.result) {

                      Swal.fire('Exito', 'Se ha enviado la solicitud retiro del censo poblacional Misak al administrador.', 'success');

                      setTimeout(function() {
                          location.href = '/Buscar-Persona-Retirar';
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
