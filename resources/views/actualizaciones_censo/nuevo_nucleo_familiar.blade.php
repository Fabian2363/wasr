@extends('layouts.menu2')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="/js/sweetalert2@9.js"></script>

<!--\\\\\\\ estilos css \\\\\\-->
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<link type="text/css" rel="stylesheet" href="/css/form_ingreso_familia.css">
<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Administrador</h1>
        <h2 class="">Inicio</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Administrador</a></li>
            <li class="active">Administrador</li>
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
                                {{ csrf_field() }}
                                <div id="consulta_externa">
                                    <label>Ingresar el número de identificación de la persona </label><br>
                                    <input id="nuip" name="q" class="form-control" value="{{$id_Hogar}}"
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
        <!--			
                            <iframe  frameborder="0" width="100%"  height="245"   allow="fullscreen".
							
                            src="./menu-lateral">
							
							</iframe>   --->
    </div>
    <!-- Fin Informacion menu izquierda-->
    <div class="col-md-9 ">
        <div class="ContenedorFormularioCenso">
            <div class="titulo_informacion">

                <table>
                    <tbody>
                        <tr>
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

                            <td style="width:3px;"></td>
                            <td title="Miembros de la familia   Misak ">
                                <table class="estatic">
                                    <tbody>
                                        <tr>
                                            <td><b href="">FAMILIA MISAK</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="active">
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
                                                <b href="">NIVEL EDUCATIVO </b>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="color_infor noPrint" style="margin-top: 15px;">
                    <span class="color_infor  noPrint">Usted se encuentra en: &nbsp;&nbsp;Familia Misak &gt; <font
                            color="#666666">Conformacion del hogar</font></span>
                </div>
                <div class="well resume-module module-jobs">
                    <h2 class="module-title">
                        Agregar residentes y/o miembros del hogar
                    </h2>
                    <div class="js-box-laboral-experience" id="experiencia-laboral">
                        <h3 class="h4">Ingrese a las personas que conforman el hogar . </h3>
                        <div class="module-collapsible collapse in" aria-expanded="true">
                            <div class="module-summary-wrapper laboral-experience">
                                <p class="text-muted">
                                    El hogar lo conforman una, o un grupo de personas, que viven la mayor parte del
                                    tiempo en la vivienda que habita la familia, sean parentescos o no, Se trata de
                                    personas que generalmente comen juntos y atienden necesidades básicas como cargo de
                                    un presupuesto común.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIN titulo_infobasica-->
            <!-- FORMULARIO-->
            <form name="" method="post" action="Personas" id="miForm">

                <!--validar la solicitud. Puede usar el ayudante csrf_field para generar el campo de token:-->
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="titulo_informacion">

                        <!-- para visualisar el codigo del hogar -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <input type="submit" class="btn btn-warning"
                                    value="Buscar la persona que va conformar la familia " data-toggle="modal"
                                    data-target="#myModal_buscar_codigo_vivienda"
                                    onclick="location.href='{{ url('home') }}">
                                <br>
                                <br>
                                <h1>Información general del Hogar </h1>

                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group ">
                                    <div class="clearfix"></div>
                                    <div class="form-inline input-group-sm">
                                        <label><span class="asterisco">*</span>Codigo Hogar</label>
                                        <input name="hogar_id" type="text" value="{{$id_Hogar}}" tabindex="2"
                                            readonly=»readonly» class="form-control " style="width:60px" value="">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIN  visualisar el codigo del hogar -->
                        <br>
                        <br>
                        <br>

                    </div> <!-- fin titulo_informacion-->
                    <!--Inicio de formulario-->
                    <div class="container">



                        <!--<div class="jumbotron">-->

                        <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2"> Recuerde que los campos con un asterisco (*) son obligatorios.
                                </div>
                                <!-- <input type="text" name="txtDir" id="txtDir" maxlength="100" placeholder="Use los controles de la parte inferior para ingresar su dirección en este campo." class="form-control" readonly="readonly" autocomplete="on" required="">
       -->
                            </div>
                        </div>
                        <!--</div>-->
                        <form name="frm_atenUusario&quot;" method="POST" action="" enctype="multipart/form-data">

                            <div class="row separador">
                                <div class="col-md-12 form-group text-center">
                                    Información de la persona (*)
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Nombres.(*)</div>

                                    <input type="text" name="nombres" maxlength="50" placeholder="Ingrese sus Nombres"
                                        class="form-control" required="">

                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Apellidos.(*)</div>

                                    <input type="text" name="apellidos" maxlength="25"
                                        placeholder="Ingrese su Primer Apellido" class="form-control" required="">
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2 usuario">Estado civil.(*)</div>

                                    <select name="estado_civil" type="text" maxlength="20" autocomplete="of"
                                        class="form-control " required="">
                                        <option value="">Seleccione</option>
                                        <option value="SO">Soltero(a)</option>
                                        <option value="CA">Casado(a)</option>
                                        <option value="SE">Separado(a) o Divorciado(a)</option>
                                        <option value="VI">Viudo(a)</option>
                                        <option value="UN">Unión Libre</option>
                                    </select>
                                    </select>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Tipo Identificación.(*)</div>
                                    <div>
                                        <select name="tipo_identificacion" class="form-control text-center">
                                            <option value="">&lt;&lt; Seleccione &gt;&gt;</option>
                                            <option value="0">Cedula de Ciudadania</option>
                                            <option value="1">Tarjeta de Identidad</option>
                                            <option value="2">Cedula de Extranjeria</option>
                                            <option value="3">Pasaporte</option>



                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Numero Identificación.(*)</div>
                                    <input type="number" name="docomento_persona" maxlength="15"
                                        placeholder="Ingrese su Numero de identificación" class="form-control"
                                        onchange="verificaExistente(this.value)" min="0" required="">
                                </div>
                                <div class="col-md-4 form-group input-group-sm">
                                    <div class="etiqueta2">Fecha de nacimiento(*)</div>
                                    <input type="date" name="fecha_nacimiento" maxlength="50"
                                        placeholder="Ingrese el Lugar de Expedicion" class="form-control"
                                        onchange="validarEmail()" autocomplete="on" required="">
                                    <span id="spmMail" style="color: #FF0000; display:none">No es un correo electrónico
                                        válido, por favor verifiquelo</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group input-group-sm">
                                    <div class="etiqueta2">Parentesco. (*)</div>
                                    <select name="parentesco" type="text" tabindex="3" class="form-control "
                                        autocomplete="of" required="">
                                        <option value="">Selec</option>
                                        <option value="CF">Cabeza Hogar</option>
                                        <option value="PA">Padre</option>
                                        <option value="MA">Madre</option>
                                        <option value="HI">Hijo</option>
                                        <option value="NI">Nieto</option>

                                    </select>

                                </div>
                                <div class="col-md-6 form-group input-group-sm">
                                    <div class="etiqueta2">Nivel educativo(*)</div>
                                    <select name="nivel_academico" class=" form-control" autocomplete="of" required="">
                                        <option value="">Seleccione</option>
                                        <option value="NE">No tiene Estodio</option>
                                        <option value="PR">Preescolar</option>
                                        <option value="P">Básica Primaria(1-5)</option>
                                        <option value="BS">Básica Secundaria(6-9)</option>
                                        <option value="MD">Media(10-13)</option>
                                        <option value="TL">Técnica Laboral</option>
                                        <option value="TP">Técnica Profesional</option>
                                        <option value="T">Tecnológica</option>
                                        <option value="PG">Universitaria</option>
                                        <option value="E">Especialización</option>
                                        <option value="M">Maestría</option>
                                        <option value="D">Doctorado</option>

                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 text-center form-group input-group-sm">
                                    <input type="submit" class="Agregarpersona" value="Agregar persona en el Hogar"
                                        id="boton" class="btn btn-primary">
                                    &nbsp;&nbsp;
                                    <input type="button" onclick="limpiarFormulario()" value="Limpiar formulario">

                                </div>
                            </div>

                            <br>
                    </div>
                </div>

                <!--  
          
          <input type="submit" class="btn btn-success" value="Agregar persona en el Hogar" id="boton" class="btn btn-primary" >

          <input type="button" onclick="limpiarFormulario()" value="Limpiar formulario">-->


                <div class="titulo_informacion"> </div>
                <div class="titulo_informacion">

                    <div class="well resume-module module-jobs">
                        <h2 class="module-title">
                            Conformación del hogar
                        </h2>
                        <div class="js-box-laboral-experience" id="experiencia-laboral">
                            <h3 class="h4"> Listado de personas que conforman el hogar </h3>
                            <div class="module-collapsible collapse in" aria-expanded="true">
                                <div class="module-summary-wrapper laboral-experience">
                                    <p class="text-muted">
                                        Si, en este listado se encuentran toda las personas que conforman el hogar dar
                                        “GUARDAR Y CONTINUAR” , de lo contrario agregar otra persona, en el apartado
                                        “AGREGAR RESIDENTES Y/O MIEMBROS DEL HOGAR “
                                        Verificar si los datos ingresados en el listado del núcleo familia están
                                        correctos antes de dar “GUARDAR Y CONTINUAR” la información suministrada.

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N° integrantes</th>
                        <th>Parentesco</th>

                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>N° Cedula </th>
                        <th>Tipo Cedula </th>
                        <th>Fecha Nacimiento</th>
                        <th>Genero</th>
                        <th>N Academico</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="bodyTable">
                </tbody>
            </table>
            <!--<button  class="btn btn-danger btn-xs" id="guardar"   onclick="location.href='{{ url('Personas',$id_Hogar) }}'" >Cancelar</button>
	-->
            <button class="btn btn-success" id="guardar">Guardar y siguiente</button>

            <br>
            <br>
            <br>


            <!-- ///FORMULARIO////     --
  <form  id="f_nuevo_usuario"  method="post"  action="Ingresar_personas" class="form-horizontal form_entrada" >
  	  <!--validar la solicitud. Puede usar el ayudante csrf_field para generar el campo de token:--
       {{ csrf_field() }}
       <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
       <!---------------------->


        </div>


    </div>
</div>
</div>
</div>
</div>
</div>
</div>

<br>
<br>
<br>
</div>
</div>
</div>

<!--PIE DE PAGINA --->
<footer>

    <div class="container-footer-all">

        <div class="container-body">

            <div class="colum1">
                <h1>SISTEMA DE INFORMACIÓN POBLACIONAL MISAK - SIPEMP</h1>

                <img src="{{ asset('images/logo.png') }}" alt="">

            </div>



            <div class="colum2">

                <h1>Contacto</h1>

                <div class="row2">
                    <img src="{{ asset('icon/smartphone.png') }}">
                    <label>3217452529</label>
                </div>

                <div class="row2">
                    <img src="{{asset('icon/contact.png')}}">
                    <label>CabildoGuambia@gmail.com</label>
                </div>




            </div>

            <div class="colum3">

                <h1>Direccion</h1>

                <div class="row2">
                    <img src="{{ asset('icon/house.png') }}">
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



<script>
function limpiarFormulario() {
    document.getElementById("miForm").reset();
}
</script>



<script type="text/javascript">
var personas = [];
$(function() {
    function verTabla() {
        var form = {};
        $.map($('form').serializeArray(), function(n, i) {
            form[n['name']] = n['value'];
        });
        personas.push(form);
        var html = '';
        $.each(personas, function(index, value) {
            personas[index].integrantes = index + 1;
            html = html + '<tr>';

            html = html + '<td>' + personas[index].integrantes + '</td>';
            html = html + '<td>' + value.parentesco + '</td>';
            html = html + '<td>' + value.nombres + '</td>';
            html = html + '<td>' + value.apellidos + '</td>';
            html = html + '<td>' + value.docomento_persona + '</td>';
            html = html + '<td>' + value.tipo_identificacion + '</td>';
            html = html + '<td>' + value.fecha_nacimiento + '</td>';

            html = html + '<td>' + value.sexo + '</td>';
            html = html + '<td>' + value.nivel_academico + '</td>';




            html = html + '<td><button  class="borrar" click="borrar(' + index +
                ')">Eliminar</button></td>';

            html = html + '</tr>';
        });
        $('#bodyTable').html(html);
    }
    $('form').submit(function(e) {
        e.preventDefault(); //Evita que se envie el formulario
        verTabla();
    })
})


function borrar(idx) {
    borrar();
    personas.pop();
    personas.splice(idx, 1);
    verTabla();
}

$('#guardar').click(function() {
    if (personas.length > 0) {
        $.ajax({
            url: base + '/Ingresar_personas',
            type: 'POST',
            data: {
                personas
            },
            success: function(response) {

                Swal.fire(
                    'Exito',
                    'Se ha guardado con éxito ss',
                    'success'
                )
                setTimeout(function() {
                    location.href = base + "/Personas/" + response.hogar_id;
                }, 2000);


            }

        });

    } else {
        alert('Debe ingresar personas en el Hogar')
    }
})
</script>

@endsection