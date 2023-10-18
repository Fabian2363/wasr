@extends('layouts.menu2')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="/js/sweetalert2@9.js"></script>
<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Censo Poblacional </h1>
        <h2 class="">Educacion Superior</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Censo Poblacional</a></li>
            <li class="active">Educacion Superior</li>
        </ol>
    </div>
</div>


<!-- INICIO DE  CODIGO DE FORMULARIO -->


<div class="container">
    <!--Informacion menu izquierda-->
    <div class="col-md-3 col-sm-4 col-xs-12 ">

        <iframe frameborder="0" width="100%" scrolling="no" height="245" src="">

        </iframe>
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
                                <table class="active">
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
                                                <b href=" ">PERSONAS </b>
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
                                <table class="estatic">
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
                    <span class="color_infor  noPrint">Usted se encuentra en: &nbsp;&nbsp;Censo Poblacional Misak
                        SIPEMP&gt; <font color="#666666">Educacion Superior</font></span>
                </div>

                {{$id_hogar->hoga_id}}

            </div>
            <!--FIN titulo_infobasica-->
            <!-- FORMULARIO-->


            <!--    <div  class="col-md-12 col-sm-12 col-xs-12 educacion_primero">
                                           <div class="form-group form-inline input-group-sm">
                                              <label class="pull-left" for="ddSiEducacion">¿Tiene alguna educación formal? </label>
                                                <select name="" id="ddSiEducacion" tabindex="51"  onchange="showSiEducacion(this);"   class="form-control col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
		                                        <option value="">Seleccione</option>
		                                        <option value="1">Si</option>
		                                        <option  value="0">No</option>

	                                           </select>
                                               
					                        </div>
                
                                      </div>
                        
								   
								 <br>
								 <br>
								  <br>
	-->












            <!-- FORMULARIO-->



            <!------------------>
            <!------------------>



            <!-- ///FORMULARIO////     -->
            <!-- ///FORMULARIO////     -->


            <form id="Hogar" method="post" action="Educacion_Superior/Guardado">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


                <!--<div id="SiEducacion" style="visibility: hidden; display: none;">	-->





                <!--  <div class="form-group input-group-sm">
                                            <label><span class="asterisco" class="pull-left" for="ddSiEducacion">*</span>Nivel Académico escolar <label>
                                            <select name="" class=" form-control" id="ddnoEducacion" onchange="showNOEducacion(this);" >
				                             
				                              <option value="0">Preescolar,Básica Primaria(1-5),Básica Secundaria(6-9),Media(10-13)</option>
				                              
				                               <option value="1">Técnica Laboral,Técnica Profesional,Tecnológica,UniversitariaEspecializaciónm,Espec,Docto</option>
				                               

			                              </select>
                                        </div>-->









                <div class="contenedor_informacion_persona">
                    <!--Contenedor informacion_persona --->

                    <div class="recuadro_info_persona">Agregar el Nivel de Educacion superior</div>


                    <form name="" method="post" action="Ingresar_personas" enctype="multipart/form-data">

                        <!--validar la solicitud. Puede usar el ayudante csrf_field para generar el campo de token:--
                  {{ csrf_field() }}
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  -->

                        <div class="col-md-12 col-sm-12 col-xs-12">


                            <!--Inicio de formulario-->
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <div class="form-group input-group-sm">
                                        <label><span class="asterisco">*</span>Tipo Educacion Superior </label>
                                        <select name="tipo_educacion_superior" type="text" maxlength="20"
                                            id="txtPrimerNombre" tabindex="3" class="form-control ">
                                            <option value="">Selec</option>
                                            <option value="TL">Técnica Laboral</option>
                                            <option value="TC">Tecnológica</option>
                                            <option value="UN">,Universitaria</option>
                                            <option value="EP">Especialización</option>
                                            <option value="ME">Maestria</option>
                                            <option value="DOC">Doctorado</option>
                                        </select>
                                    </div>



                                    <!--
		     <div class="form-group input-group-sm">
                  <label ><span class="asterisco">*</span>Nombre de la Institución </label>
                   <input name="nombre_ies" type="text"   tabindex="2" class="form-control" style="" autocomplete="on"  value=""   >
         
               </div>
		        
				<div class="form-group input-group-sm">
                  <label ><span class="asterisco">*</span>Ciudad donde esta  el IES </label>
                   <input name="ciudad_ies" type="text"   tabindex="2" class="form-control" style="" autocomplete="on"  value=""   >
         
               </div>-->
                                    <div class="form-group input-group-sm">
                                        <label>
                                            <span class="asterisco">*</span>
                                            Estado</label>
                                        <select name="estado_actual" class="form-control">
                                            <option value="">Seleccione</option>
                                            <option value="En Curso">En Curso</option>
                                            <option value="Incompleto">Incompleto</option>
                                            <option value="Graduado">Graduado</option>
                                            <option value="Retirado">Retirado</option>

                                        </select>
                                    </div>






                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <div class="form-group input-group-sm">
                                        <label><span class="asterisco">*</span>Nombre de la Carrera</label>
                                        <input name="nombre_carrera" type="text" value="" tabindex="2"
                                            class="form-control" style="" autocomplete="on" value="">

                                    </div>


                                    <input name="documento_id" type="text" style="visibility:hidden"
                                        value="{{$datos->id}}" tabindex="2" class="form-control btn-warning"
                                        style="width:60px" value="">


                                    <input name="persona_id" type="text" style="visibility:hidden"
                                        value="{{$datos->persona_id}}" tabindex="2" class="form-control btn-warning"
                                        style="width:60px" value="">

                                </div>
                            </div>
                        </div>






                        <input type="submit" class="Agregareducacion" value="Agregar carrera de educacion superior"
                            id="boton" class="btn btn-primary">

                        <button type="button" class="btn btn-danger"
                            onclick="location.href='{{ url('familia_persona') }}'">LIMPIAR</button>




                        <div class="titulo_informacion"> </div>

                    </form>



                    <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->




                </div>

                <div class="titulo_informacion">
                    <h1>Cantidad de carrerar de educación superior optendios </h1>

                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Tipo Educacion Superior</th>
                            <th>Nombre de la Carrera</th>
                            <th>Nombre de la IES</th>
                            <th>Ciudad donde esta el IES</th>
                            <th>Estado</th>
                            <th>Año de Ingreso</th>
                            <th>Año Finalizado</ </th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="bodyTable">
                    </tbody>
                </table>
                <div class="pull-right ">
                    <button class="boton_guardarContinuar" id="guardar">Guardar y Continuar</button>
                </div>

                <br>
                <br>
                <br>



        </div>
    </div>
</div>

<!------------------>
<!------------------>




<!-- FORMULARIO-->


</div>
<!------------------>
<!------------------>









<!-----------
								   <!-----------
								    <!-----------
									 <!------------>















<!-- FIN FORMULARIO-->
</div>
<!--FIN ContenedorMenuHojaVida-->
</div>
<!--FIN col-md-9-->
</div>
<!--FIN container-->



</div>
</section>
</div>
</div>

<br>
<br>
<br>
<!--Estilos para botones GUARDAR Y CONTINUAR Y AGREGAR PERSONAS EN GRUPO FAMILIAR-->
<style>
.Agregareducacion {
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

.boton_guardarContinuar {
    text-decoration: none;
    padding: 4px;
    font-weight: 600;
    font-size: 10px;
    color: #ffffff;
    background-color: #5cb85c;
    border-radius: 6px;
    border: 2px solid #5cb85c;
    margin-left: 250px;
    margin-left: -130px;
}
</style>

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
            html = html + '<td>' + value.tipo_educacion_superior + '</td>';
            html = html + '<td>' + value.nombre_carrera + '</td>';
            html = html + '<td>' + value.nombre_ies + '</td>';
            html = html + '<td>' + value.ciudad_ies + '</td>';
            html = html + '<td>' + value.estado_actual + '</td>';
            html = html + '<td>' + value.año_ingreso + '</td>';

            html = html + '<td>' + value.fecha_finalizado + '</td>';




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
            url: base + '/Educacion_Superior',
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
                    location.href = base + "/Resumen-Censo-Personal/" + response.persona_id;
                }, 2000);

            }

        });

    } else {
        alert('Debe ingresar informacion academica ')
    }
})
</script>

@endsection