@extends('layouts.menu2')

@section('styles')
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<link type="text/css" rel="stylesheet" href="/css/form_ingreso_familia.css">
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<!--\\\\\\\ estilos css \\\\\\-->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/estilos_pie_pagina.css">

<style>
    .Agregarpersona {
                text-decoration: none;
                padding: 4px;
                font-weight: 600;
                font-size: 10px;
                color: #ffffff;
                background-color: #5cb85c;
                border-radius: 6px;
                border: 2px solid #5cb85c;
                margin-left: 90px;
            }

            .boton_green {
                text-decoration: none;
                padding: 4px;
                font-weight: 600;
                font-size: 10px;
                color: #ffffff;
                background-color: #5cb85c;
                border-radius: 6px;
                border: 2px solid #5cb85c;
                margin-left: 250px;
                margin-left: -150px;
            }
</style>
@endsection

@section('content')

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>@lang('TALENTO HUMANO')</h1>
        <h2 class="">@lang('Ingresar Talento Humano-Docentes Oficales')</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">@lang('Inicio')</a></li>
            <li><a href="#">@lang('Talento Humano')</a></li>
            <li class="active">@lang('Ingresar talento  humano')</li> 
        </ol>
    </div>
</div>

<!---///////////FORMULARIO DE ENCUENTA POBLACIONAL////////////////7777----
  -----------
  ------------
  ------------>

<!-- Modal -- Codigo  obtenido desde bootstrapp Modalhttps://getbootstrap.com/docs/4.0/components/modal/-->

<!--  modal Informacion de Moduli -->

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            Informacion de modulo
            -
            -
            -
            -
        </div>

    </div>
</div>
<!--///////fin de modal /////7-//--->

<!-- FIN-->



<!-- MODAL BUSCAR  CODIGO  DE VIVIENDA -->
<strong>
    <div class="modal fade" id="myModal_buscar_codigo_vivienda" data-keyboard="false" data-backdrop="static">
</strong>
<div class="modal-dialog modal-lg">
    <div class="modal-content  ">
        <img src="icon/Advertencia.png" width="200px" align="center">
        <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
            <h4 class="modal-title">Consultar la información de código de la vivienda, ingresado el número de
                identificación de la persona que está a cargo de la casa </h4>
        </div>
        <div class="modal-body">

            <div id="contenido_modal_confirm_alumno_matriculado">


                <!----------------=========================0--------------------->

                <!----BUSCAR CODIGO VIVIENDA POR DOCUMENTO DE INDENTIDAD -------------------->


                <div class="subir_informacion_general">
                    <div class="container clearfix">
                        <div class="col-sm-4 topmargin-sm">

                            <form id="" class="form_cunsulta" name="form" action="/hogar" method="POST"
                                role="Informacion_General" class="pocicion_formulario">
                                @csrf
                                <div id="consulta_externa">
                                    <label>Ingresar el número de identificación de la persona </label><br>
                                    <input id="nuip" name="q" class="form-control" value="{{$id_familia}}"
                                        placeholder="Digíte el número sin puntos ni comas"
                                        title="El nùmero de cèdula debe ser de 2 a 10 dígitos" value="" style="">
                                    <span class="animated fadeIn"></span>


                                </div>

                                <br>
                                <div class="nobottommargin tright">
                                    <input type="submit" id="boton" name="enviar" value="Buscar "
                                        class="boton tab-linker btn-block" style="">
                                </div>
                            </form>

                        </div>

                        <br>
                        <br>
                        <br>




                        <div class="col-sm-5 topmargin-sm text-center">
                            <h2>Detalle Del codigo </h2>

                        </div>


                        <div id="success" class="col-sm-5 well text-justify">


                            <div class="table-responsive">
                                @if(isset($details))
                                Los Datos ingresados del estudiante : <b> {{ $query }} </b> Es :
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>DEPARTAMENTO</th>
                                            <th>MUNICIPIO</th>
                                            <th>RESGUARDO</th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($details as $persona)
                                        <tr>
                                            <<td>
                                                </td>
                                                <td></td>-->
                                                <td>{{$persona-> resguardo }}</td>
                                                <td> </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                @elseif(isset($message))
                                <h3> {{$message}}</h3>
                                @endif
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
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- FIN DEL MODAL  BUSCAR CODIGO DEL HOGAR-->

<!-- INICIO DE  CODIGO DE FORMULARIO -->


<div class="container">
    <!--Informacion menu izquierda-->
    <div class="col-md-3 col-sm-4 col-xs-12 ">
    <iframe frameborder="0" width="100%" scrolling="no" height="245" src="/menu-lateral/0">

</iframe>  
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
                                            <td><b href="">@lang('VIVIENDA MISAK')</b></td>
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
                                                <b href="">@lang('HOGAR MISAK') </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>
-->
                            <td style="width:3px;"></td>
                            <td title="Miembros de la familia   Misak ">
                                <table class="estatic">
                                    <tbody>
                                        <tr>
                                            <td><b href="">@lang('TALENTO HUMANO-DOCENTE OFICIALES')</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href="">@lang('PERSONAS')</b>
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
                                                <b href="">@lang('INFORMACIÓN PERSONA') </b>
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
                                                <b href="">@lang('EDUCACION') </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>

                <div class="color_infor noPrint" style="margin-top: 15px;">
                    <span class="color_infor  noPrint">@lang('Usted se encuentra en:')' &nbsp;&nbsp;@lang('Talento humano') &gt; <font
                            color="#666666">@lang('Ingreso Talento Humano')</font></span>
                </div>
            
                <div class="well resume-module module-jobs">
                    <h2 class="module-title">
                    @lang('Ingresar información')
                    </h2>
                    <div class="js-box-laboral-experience" id="experiencia-laboral">
                        <h3 class="h4">@lang('
Ingresar información personal del docente oficial 
- talento Huamano.') </h3>
                        <div class="module-collapsible collapse in" aria-expanded="true">
                          <!--  <div class="module-summary-wrapper laboral-experience">
                                <p class="text-muted">
                                @lang('El hogar lo conforman una, o un grupo de personas, que viven la mayor parte del tiempo en la vivienda que habita la familia, sean parentescos o no, Se trata de personas que generalmente comen juntos y atienden necesidades básicas como cargo de un presupuesto común.')
                            </div>-->
                        </div>
                    </div>
                </div>
                <!---------------------->
                <div class="row">
                      <div class="col-md-12">

                          <div class="pull-right botones-pies">


                          <button id="editarHogarAnterior" class="btn btn-warning">@lang('CANCELAR')</button>

                          </div>

                      </div>
                  </div>
 <!-------------------------------------->
            </div>
            <!--FIN titulo_infobasica-->
            <!-- FORMULARIO-->   
            

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- fin titulo_informacion-->
                    <!--Inicio de formulario-->


                    <div class="container">

                        <!--<div class="jumbotron">-->

                        <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2"> @lang('Recuerde que los campos con un asterisco (*) son obligatorios.')
                                </div>
                                
                            </div>
                        </div>
                        <!--</div>-->
                        <form id="miForm" action="">

                            <div class="row separador">
                                <div class="col-md-12 form-group text-center">
                                @lang('Información de la persona (*)')
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Nombres.(*)')</div>
                                    <input type="text" id="nombre" name="nombre" maxlength="50" placeholder="Ingrese nombre"
                                        class="form-control" required  style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                        

                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Apellidos.(*)')</div>
                                    <input type="text" id="apellido" name="apellido" maxlength="50"
                                        placeholder="Ingrese apellido" class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">@lang('Estado civil.(*)')</div>
                                    <select id="estado_civil" name="estado_civil" class="form-control" required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <option value="">Seleccione</option>
                                        <option value="S">Soltero(a)</option>
                                        <option value="C">Casado(a)</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Tipo de Identificación.(*)')</div>
                                    <div>
                                        <select id="tipo_identificacion" id="tipo_identificacion" name="tipo_identificacion" class="form-control" style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();" required >
                                            <option value="">Seleccione</option>
                                            <option value="RC">Registro Civil</option>
                                            <option value="TI">Tarjeta de Identidad</option>
                                            <option value="CC">Cedula de Ciudadania</option>
                                            <option value="CE">Cedula de Extranjeria</option>
                                            <option value="PA">Pasaporte</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Numero de Identificación.(*)')</div>
                                    <input type="number" id="documento_persona" name="documento_persona" type="number" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        placeholder="Ingrese identificación" class="form-control" required autocomplete="off" >
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Fecha de nacimiento(*)')</div>
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingrese fecha de nacimiento" class="form-control" required >
                                </div>
                            </div>

                            <div class="row">

                                 
                            <!--
                                <div class="col-md-6 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Departamento Expedicion CC (*)')</div>
                                    <select name="departamento" id="departamentoexp" class="form-control" style="width:"
                                    required="">
                                    <option value="" selected disabled>Selecione Departamento</option>
                                    @foreach($departamento_expedicion as $key => $departamento_expedicion)
                                    <option value="{{$key}}"> {{$departamento_expedicion}}</option>
                                    @endforeach
                                </select>

                                </div>
                                <div class="col-md-6 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Municipio de Expedicion CC(*)')</div>
                                    <select name="id_municipio_expedicion" id="municipio_expedicion" class="form-control" style="width:" required="">
                                </select>
                                </div>-->
                        
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2"> @lang('')
                                </div>
                           <!--     <BR>
                                <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Departamento.(*)')</div>
                                    <div>
                                    

                                </select>
                                    </div>
                                </div>
<!--
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">@lang('Municipio.(*)')</div>
                                    <select name="codigo_municipio" id="municipios" class="form-control" style="width:" required="">
                                </select>--                              </div>
                                <div class="col-md-4 form-group input-group-sm">
                                <div class="etiqueta2">Barrio / Vereda.(*)</div>
                                <input type="text" name="direccion" id="txtBarrio" onchange="Bus();" maxlength="50"
                                    placeholder="Ingrese su Direccion" onkeypress="return validar(event)"
                                    class="form-control" autocomplete="on" required="" width="50px">
                            </div>
                            </div>-->


                            <!------------------>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12 text-center form-group input-group-sm">
                                    <button style="height:30px; class="boton_green" id="btnAgregarPersona" type="submit" class="btn btn-primary">@lang('INGRESAR A LA PERSONA')</button>
                                    &nbsp;&nbsp;
                                    -
                                    <button onclick="limpiarFormulario()">@lang('LIMPIAR')</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>

                    <!--------------------------------------->
                </div>

                <div class="titulo_informacion">

                    <div class="well resume-module module-jobs">
                        <h2 class="module-title">
                        @lang('Talento Humano')
                        </h2>
                        <div class="js-box-laboral-experience" id="experiencia-laboral">
                            <h3 class="h4"> @lang('Información  del Docente a ingresar al sistema ') </h3>
                            <div class="module-collapsible collapse in" aria-expanded="true">
                              <!--  <div class="module-summary-wrapper laboral-experience">
                                    <p class="text-muted">
                                    @lang('Si, en este listado se encuentran todaS las personas que conforman el hogar dar “GUARDAR Y CONTINUAR” , de lo contrario agregar otra persona, en el apartado  “AGREGAR RESIDENTES Y/O MIEMBROS DEL HOGAR “Verificar si los datos ingresados en el listado del núcleo familia estáncorrectos antes de dar “GUARDAR Y CONTINUAR” la información suministrada.')'

                                </div>-->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="table-container table-responsive-md">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">@lang('N°')</th>
                        <th scope="col">@lang('N° Identificación')</th>
                        <th scope="col">@lang('Nombres')</th>
                        <th scope="col">@lang('Apellidos')</th>
                       
                        <th scope="col">@lang('Tipo Iden')</th>
                        <th scope="col">@lang('Fecha Nacimiento')</th>
                        <!--<th scope="col">@lang('Parentesco')</th>-->
                     
                        <th scope="col">@lang('E Civil')</th>
                      
                        <th scope="col">@lang('Acciones')</th>
                    </tr>
                </thead>
                <tbody id="bodyTable">

                </tbody>
            </table>
            </div>
            {{--<button  class="btn btn-danger btn-xs" id="guardar"   onclick="location.href='{{ url('Personas',$id_familia) }}'" >Cancelar</button>
	--}}
            <br>
            
            <div>

                <!--<form method="post" action="Personas">-->
                    <div>
                        <div class="pull-left">
                            <div class="clearfix"></div>
                            <div class="form-inline input-group-sm">
                               {{-- <label ><span class="asterisco">*</span>Codigo Hogar</label>--}}
                            <input id="hogar_id" name="hogar_id" type="hidden"  value="{{$id_familia}}" tabindex="2"  class="form-control btn-warning" style="width:60px">
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="botones_censo_poblacional" id="guardar">@lang('GUARDAR Y CONTINUAR')</button>
                        </div>
                    </div>
                <!--</form>-->
            </div> 

            

            <br>
            <br>
       <!---------------------->
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
<div id="ConfirmAction" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">@lang('Confirmar información  de  las personas que conforman el talento humano')</h5>
            </div>
            <div class="modal-body">
                <p>@lang('¿Está seguro de guardar información  de  las personas que conforman el talento humano?')</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Cancelar')</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">@lang('Confirmar')</button>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
@endsection

@section('scripts')

<script type="text/javascript">
    
    let personas = [];
    
    
    $(document).ready(()=>{  

        window.onbeforeunload = function() { return "Your work will be lost."; };

        $.map({!! $miembros_familia !!}, (persona, index) => {
            let arrayPersona =[];
            arrayPersona[0] = persona.nombres;
            arrayPersona[1] = persona.apellidos;
            arrayPersona[2] = persona.estado_civil;
            arrayPersona[3] = persona.tipo_identificacion;
            arrayPersona[4] = persona.docomento_persona;
           arrayPersona[5] = persona.fecha_nacimiento;
          
            arrayPersona[8] = index+1;
            personas.push(arrayPersona);
        });

        if(personas.length > 0){
            cargarTabla();
        }

        $('#editarHogarAnterior').click(()=>{
            window.location.href=window.location.href.replace('/Personal','');
        });
    
        $('#miForm').on('submit', (event) => {
            event.preventDefault();
            //Validar si la persona ya existe dentro de este nucleo familiar, si es así que no se permita ingresar ya que para modificar la informacion de la persona tiene que ir al formulario de actualizar datos
            if(validarDocumento($('#documento_persona').val())){
                let persona=[];
                $.map($('#miForm').serializeArray(), function(n, i) {
                    persona[i] = n['value'];      
                });

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').val()
                    },
                    url: "Personal/validar-existencia",
                    data: {
                        documento: persona[4]
                    } ,
                    dataType: "json",
                    success: (response) => {
                        if(!response.status){
                            Swal.fire({
                                title: '¿Está seguro?',
                                text: response.mensaje,
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Seguro'
                            }).then((result) => {
                                if(result.value){
                                    personas.push(persona);
                                    // console.log(personas);
                                    cargarTabla();
                                    limpiarFormulario();
                                }
                            });
                        }else{
                            personas.push(persona);
                            // console.log(personas);
                            cargarTabla();
                            limpiarFormulario();
                        }
                    }
                });
            }else{
                setTimeout(() => {
                    Swal.fire(
                        'Advertencia',
                        'Esta persona ya fue añadida a la tabla.',
                        'warning'
                        )
                }, 200);
            }
        });
        
        let modalConfirm = $('#ConfirmAction');
        $('#btnConfirmar').click((e) => { 
            e.preventDefault();
            $.ajax({
                url: `Personal`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                },
                data: {
                    personas:personas,
                    hogar_id:$('#hogar_id').val()
                    },
                success: (response) => {
                    if(response.result){
                            setTimeout(() => {
                                
                                Swal.fire({
                             title: 'GUARDADO INFORMACIÓN!',
                             html: 'I will close in <b></b> milliseconds.',
                           timer: 2000,
                          timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                             timerInterval = setInterval(() => {
                               const content = Swal.getContent()
                               if (content) {
                           const b = content.querySelector('b')
                          if (b) {
                                b.textContent = Swal.getTimerLeft()
                          }
                       }
                       }, 100)
                   },
               willClose: () => {
             clearInterval(timerInterval)
              }
               }).then((result) => {
              /* Read more about handling dismissals below */
             if (result.dismiss === Swal.DismissReason.timer) {
                  console.log('I was closed by the timer')
                  }
               })  
                                
                            });
                            setTimeout(function() {
                        location.href = `Informacion-docentes`;
                           // /censo-poblacional/Personal/{id_familia}/Informacion',

                            //location.href = '/censo-poblacional/Personal'+response.id+'/Informacion';
                            }, 2000);
                        }else{
                            setTimeout(() => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.mensaje
                                })    
                            }, 200);                            
                        }    
                },
            }).always(() => {
                modalConfirm.modal('hide');
            });
        });

        $('#guardar').click(function() {
            if (personas.length > 0) {
                modalConfirm.modal('show');    
            } else {
                setTimeout(() => {
                    Swal.fire(
                        'Advertencia',
                        'Debe ingresar personas en el Hogar.',
                        'warning'
                    );
                }, 200);
            }
        });
    });
    
    function limpiarFormulario() {
        $('#miForm')[0].reset();
    }
    
    
    function cargarTabla() {            
            var html = '';
            $.each(personas, function(index, value) {
                personas[index][8] = index + 1;
                html = html+'<tr>'+
                '<td>' + personas[index][8] + '</td>'+
                '<td>' + value[4] + '</td>' +
                '<td>' + value[0] + '</td>' + 
                '<td>' + value[1] + '</td>' + 
               
                '<td>' + value[3] + '</td>'+
                '<td>' + value[5] + '</td>'+ 
              
                //'<td>' + value[7] + '</td>' + 
                '<td>' + value[2] + '</td>' + 
                //'<td>' + value[6] + '</td>' +
                '<td><button style="margin:3px;" class="btn btn-warning" onclick="editar(' + index +')">@lang('Editar')</button><button class="btn btn-danger" onclick="borrar(' + index +')">@lang('Eliminar')</button></td>'+ 
                '</tr>';
            });
            $('#bodyTable').empty();
            $('#bodyTable').html(html);
        }
    
    function borrar(index) {
        personas.splice(index, 1);
        cargarTabla();
    }
    function validarDocumento(documento){
        let validate=true;
        personas.forEach(function(persona,index){
            if(persona[4]==documento){
                validate= false;
                return false;
            }
        });
        return validate;
    }

    function editar(index){
        limpiarFormulario();
        $('#nombre').val(personas[index][0]);
        $('#apellido').val(personas[index][1]);
        $('#estado_civil').val(personas[index][2]);
        $('#tipo_identificacion').val(personas[index][3]);
        $('#documento_persona').val(personas[index][4]);
        $('#fecha_nacimiento').val(personas[index][5]);
       // $('#id_municipio_expedicion').val(personas[index][6]);
       
        window.scrollTo(200, screen.height/2 );
        borrar(index);
    }

    
    
    {{--selector de municipio de expedicion de cedula  --}}

$('#departamentoexp').change(function() {
    var departamentoexpID = $(this).val();
    if (departamentoexpID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-municipioexpe-list')}}?codigo_departamento=" + departamentoexpID,
            success: function(res) {
                if (res) {
                    $("#municipio_expedicion").empty();
                    $("#municipio_expedicion").append('<option>Seleccione Municipio</option>');
                    $.each(res, function(key, value) {
                        $("#municipio_expedicion").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#municipio_expedicion").empty();
                }
            }
        });
    } else {
        $("#municipio_expedicion").empty();

    }
});


    
    </script>
@endsection