@extends('layouts.menu2')
@section('content')

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Talento humano</h1>
        <h2 class="">Personas</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Talento humano</a></li>
            <li class="active">Personas</li>
        </ol>
    </div>
</div>


<div class="container">
    <!--Informacion menu izquierda-->
    <div class="col-md-3 col-sm-4 col-xs-12 ">
       
    </div>
    <!-- Fin Informacion menu izquierda-->
    <div class="col-md-9 ">
        <div class="ContenedorFormularioCenso">
            <div class="titulo_informacion">
            <div class="table-container table-responsive-md">
                <table>
                    <tbody>
                        <tr>
                        <!--
                            <td style="width:3px;"></td>
                            <td title="Censo vivienda de familia Misak">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td><b href="">VIVIENDA MISAK</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td style="width:3px;"></td>
                            <td title="Censo del Hogar Misak  ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href="">HOGAR MISAK </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>
-->
                            <td style="width:3px;"></td>
                            <td title="Miembros de la familia   Misak ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td><b href="">TALENTO HUMANO</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td style="width:3px;"></td>
                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="estatic">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href="">PERSONAS </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>

                            <td style="width:3px;"></td>
                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href="">INFORMACIÓN PERSONA </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>

                            <td style="width:3px;"></td>
                            <td title="Nivel educativo  que tiene  la persona que vive en la familia">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href="">EDUCACION </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </DIV>
                <div class="color_infor noPrint" style="margin-top: 15px;">
                    <span class="color_infor  noPrint">Usted se encuentra en:&nbsp;&nbsp;Talento Humano 
                        &gt; <font color="#666666">Personas</font></span>
                </div>

                <!--  <h1  class="btn btn-sm btn-default" >Residentes y/o miembros del hogar </h1>-->
               
                
                      <!---------------------->
                      <div class="row">
                      
                      <div class="col-md-12">
                      <span class="badge badge-warning">Personas registrados en el sistema </span>
                          <div class="pull-right botones-pies">

<!--
                          <button id="editarMiembrosHogar" class="btn btn-warning">Editar Personal Ingresado</button>-->
                          </div>

                      </div>
                  </div>
 <!-------------------------------------->
            </div>
            <!--FIN titulo_infobasica-->
            <!-- FORMULARIO-->

            
            <div class="table-container table-responsive-md">
            <table class="table table-striped table-bordered table-hover" id="solicitudinfo"
                data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Documento ID </th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th> # Paquete  de ingreso</th>
                        <th>Fecha Ingreso</th>
                        <th>Estado</th>
                       
                        <th> Proceso de Ingreso</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $key=>$temp)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $temp->docomento_persona }}</td>
                            <td>{{ $temp->nombres }}</td>
                            <td>{{ $temp->apellidos }}</td>
                            <td>{{ $temp->hogar_id }}</td>
                            <td>{{ $temp->fecha_censo }}</td>
                            @if($temp->status == 1)
                            <td class="text-center">
                                <span class="badge badge-success">Registrado</span>
                            </td>
                            <td>
                            
                                <a href="/Actualizacion-informacion-general/{{ base64_encode($temp->id) }}/actualizar" class="btn btn-sm btn-default" style="background-color:#FFA400;border: 0px !important;color:white;"> <i
                                        class="fa fa-eye" aria-hidden="true"></i>
                                    Editar Informacion Personal
                                </a>
                            </td>
                            @else
                            <td class="text-center">
                                <span class="badge badge-danger">En proceso</span>
                            </td>    
                            <td>
                            <a href="/Inicio/Talento-humano/{{ base64_encode($temp->hogar_id) }}/Informacion" class="btn btn-sm btn-default" style="background-color:#FFA400;border: 0px !important;color:white;"> <i
                                        class="fa fa-eye" aria-hidden="true"></i>
                                    Ir al Personal
                                </a>
                            </td>
                            @endif
                            
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
          </div>
           <!-- <button id="terminarCenso" class="btn btn-primary" style="border: none;">
                Terminar Proceso del  ingreso Talento humano
            </button>-->

        </div>
        <!--FIN ContenedorFormularioCenso-->
    </div>
    <!--FIN col-md-9-->
</div>
<!--FIN container-->

<br>
<br>
<br>
</div>
</div>
</div>

<script>
    $(document).ready(() => {
        
        window.onbeforeunload = function() { return "Your work will be lost."; };

        let btnTerminarCenso = $("#terminarCenso");
        let modalConfirm = $('#ConfirmAction');

        btnTerminarCenso.click((e) => {     
            e.preventDefault();
            modalConfirm.modal('show');
        });
        
        $('#btnConfirmar').click((e) => { 
            e.preventDefault();
            $.ajax({
                type: "POST",
                headers: {"X-CSRF-TOKEN": $('[name="_token"]').val()},
                url: "verificar-estado",
                // data: ,
                dataType: "json",
                success: (response) => {
                    if(response.status){
                        setTimeout(() => {
                            Swal.fire(
                                'Exitoso!!',
                                'El ingreso de personal al sistema fue terminado exitosamente',
                                'success'
                            );
                        }, 200);
                        setTimeout(() => {
                            location.href =  `certificado-censo`;
                        }, 1000);
                    }else{
                        setTimeout(() => {
                            Swal.fire(
                                'Error',
                                response.mensaje,
                                'error'
                            );
                        }, 200);
                    }
                }
            }).always(() => {
                modalConfirm.modal('hide');
            });
        });

        $('#editarMiembrosHogar').click(()=>{
            window.location.href= 'Personal';
        });

    });
</script>

@endsection
