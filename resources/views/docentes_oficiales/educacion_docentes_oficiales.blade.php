@extends('layouts.menu2')

@section('content')
<link type="text/css" rel="stylesheet" href="/css/form_ingreso_familia.css">

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>@lang('TALENTO HUMANO')</h1>
        <h2 class="">@lang('Talento Humano')</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">@lang('Inicio')</a></li>
            <li><a href="#">@lang('Talento Humano')</a></li>
            <li class="active">@lang('Educacion')</li>
        </ol>
    </div>
</div>


<!-- INICIO DE  CODIGO DE FORMULARIO -->


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
                                     

                            <td style="width:3px;"></td>
                            <td title="Miembros de la familia   Misak ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td><b href="">@lang('TALENTO HUMANO')</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td title="Información de la persona que viven dentro de la familia ">
                                <table class="active">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b href="">@lang('PERSONAS')</b> </b>
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
                                <table class="estatic">
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
                    <span class="color_infor  noPrint">@lang('Usted se encuentra en:') &nbsp;&nbsp;@lang('Talento Humano')&gt; <font color="#666666">@lang('Información Academica')</font></span>
                </div>
                <h1>@lang('Informació Academica') </h1>
            </div>
            <!--FIN titulo_infobasica-->
            <!-- FORMULARIO-->

            <form id="formFormal">
                <!--<form id="Hogar" method="post" action="Educacion_Formal/Guardado">-->
                {{ csrf_field() }}
                <input type="hidden" name="documento_id" value="{{ $datos->id }}">
                <input type="hidden" name="persona_id" value="{{ $datos->persona_id }}">

                <div class="col-md-12 col-sm-12 col-xs-12 educacion_primero">
                    <div class="form-group form-inline input-group-sm">
                        <label class="pull-left" for="ddSiEducacion"> <h7>{{$nombre->nombres}} -{{$nombre->apellidos}}::</h7> @lang('¿Tiene educación convencional?')</label>
                        {{-- {{ isset($educacion_media) }} --}}
                        <select name="" id="ddEducacion" class="form-control" onchange="showSiEducacion(this);"
                            class="form-control col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
                            <option value="">Seleccione</option>
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                        </select>
                    </div>
                </div>

                <br>
                <br>
                <div id="SiTieneEducacion" style="visibility: hidden; display: none;">
                    <div class="contenedor_informacion_persona">
                        <!--Contenedor informacion_persona --->
                        
                        <div class="recuadro_info_persona">@lang('INGRESE LA INSTITUCIÓN EDUCATIVA DONDE ESTUDIO(A)') {{$nombre->nombres}}-{{$nombre->apellidos}} </div>

                        <div class="contenedor_informacion_persona">

                            <div class="container">

                                <div class="row">
                                    <div class="col-md-12 form-group input-group-sm">
                                        <div class="etiqueta2">@lang('Recuerde que los campos con un asterisco (*) son obligatorios.')'
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group input-group-sm">
                                        <div class="etiqueta2 usuario">@lang('Seleccione departamento(*)')</div>

                                        <select id="departamento" name="departamento" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            @foreach($departamentos as $departamento)
                                                <option value="{{ $departamento->codigo_departamento }}">
                                                    {{ $departamento->nombre_depatamento }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-4 form-group input-group-sm">
                                        <div class="etiqueta2 usuario">@lang('Seleccione Municipio(*)')</div>

                                        <select id="municipio" name="municipio" class="form-control" required>
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group input-group-sm">
                                        <div class="etiqueta2 usuario">@lang('Seleccione colegio(*)')</div>

                                        <select id="colegio" name="codigo_colegio" class="form-control" required>
                                            <option value="">Seleccione</option>
                                        </select>

                                    </div>
                                </div>
                                <!--
                                <div class="row">
                                    <div class="col-md-4 form-group input-group-sm">
                                        <div class="etiqueta2">@lang('Seleccione sede Colegio(*)')</div>
                                        <select id="sede" name="sede" class="form-control text-center">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group input-group-sm">
                                        <div class="etiqueta2 usuario">@lang('Seleccione tipo de educación(*)')</div>
                                        <select id="tipo_educacion" name="tipo_educacion" class="form-control "
                                            required>
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>-->
                                    <div class="col-md-4 form-group input-group-sm">
                                        <div class="etiqueta2">@lang('Seleccione Estado(*)')</div>
                                        <select id="estado" name="estado" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            <option value="En Curso">En Curso</option>
                                            <option value="Incompleto">Incompleto</option>
                                            <option value="Graduado">Graduado</option>
                                            <option value="Retirado">Retirado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group input-group-sm">
                                        <div class="etiqueta2">@lang('Año que  termino el estudio(*)')</div>
                                        <input id='anio' name='anio'  placeholder="YYYY"
                                        type="number" maxlength="4" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                    <div class="col-md-4 form-group input-group-sm">
                                        <div class="etiqueta2">@lang('Modalidad del colegio (*)')</div>
                                        <input type="text" id="modalidad" name="modalidad"
                                            placeholder="Ingrese modalidad de estudio" class="form-control" required required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();" required autocomplete="off">
                                    </div>
                                    <div class="col-md-4 form-group input-group-sm">
                                        <div for="ddNoEstudiaResguardo" class="etiqueta2">@lang('Tiene estudios de Educacion')
                                            Superior(*)</div>
                                        <select name="nivel_academico" class=" form-control" id="ddNoEstudiaResguardo"
                                            onchange="showNoEstudiaResguardo(this);" autocomplete="of" required="">
                                            <option value="">Seleccione</option>
                                            <option value="1">SI</option>
                                            <option value="2">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                          
            </form>
            <div id="NoGustaQueEstudienGuambia" style="visibility: hidden; display: none;">
                <div class="container">
                    <div class="contenedor_informacion_person">
                        <!--Contenedor informacion_persona --->

                        <div class="recuadro_info_persona">@lang('Agregar los estudios de educación superior de:'){{$nombre->nombres}}-{{$nombre->apellidos}} </div>

                        <div class="contenedor_informacion_person">
                            <div class="container">
                                <form id="formSuperior">
                                    <div class="form-group input-group-sm col-md-4">
                                        <label><span class="asterisco">*</span>@lang('Tipo Educacion Superior')
                                        </label>
                                        <select id="tipo_educacion_superior" name="tipo_educacion_superior"
                                            class="form-control" required>
                                            <option value="">Seleccione</option>
                                            <option value="TL">Técnica Laboral</option>
                                            <option value="TC">Tecnológica</option>
                                            <option value="UN">Universitaria</option>
                                            <option value="EP">Especialización</option>
                                            <option value="ME">Maestria</option>
                                            <option value="DOC">Doctorado</option>
                                        </select>
                                    </div>

                                    <div class="form-group input-group-sm col-md-4">
                                        <label>
                                            <span class="asterisco">*</span>
                                            Estado</label>
                                        <select id="estado_actual" name="estado_actual" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            <option value="En Curso">En Curso</option>
                                            <option value="Incompleto">Incompleto</option>
                                            <option value="Graduado">Graduado</option>
                                            <option value="Retirado">Retirado</option>
                                        </select>
                                    </div>
                                    <div class="form-group input-group-sm col-md-4">
                                        <label><span class="asterisco">*</span>@lang('Nombre de la
                                            Carrera')</label>
                                        <input id="nombre_carrera" name="nombre_carrera" type="text"
                                            class="form-control" placeholder="Nombre carrera" required required style="text-transform:uppercase;"   onkeyup="javascript:this.value=this.value.toUpperCase();" required autocomplete="off">
                                    </div>
                                    <div class="form-group input-group-sm col-md-12">
                                        <input type="submit" class="Agregareducacion"
                                            value="Agregar educacion superior" id="agregarCarrera"
                                            class="btn btn-primary" data-index="-1">
                                        <button type="reset" class="btn btn-primary">Resetear</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="titulo_informacion">
                    <h1> @lang('Listado de Educación Superior')</h1>
                </div>
                <div class="table-container table-responsive-md">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>@lang('Tipo Educacion Superior')</th>
                            <th>@lang('Nombre de la Carrera')</th>
                            <th>@lang('Estado')</th>
                            <th>@lang('Acciones')</th>
                        </tr>
                    </thead>
                    <tbody id="bodyTable">
                    </tbody>
                </table>
                </div>
            </div>
            <!--<div class="pull-right">
                <button type="submit" style="background-color:#1b9e1d;color:white;" id="guardar">Guardar y Continuar</button>
            </div>-->
            <div class="pull-right">
                                <button type="submit" style="background-color:#1b9e1d;color:white;" id="guardar">@lang('GUARDAR Y CONTINUAR-')
                                    </button>
                            </div>
                            <br>
        </div>
        </div>
    </div>
</div>
</div>

</div>



<div class="clearfix"></div>
<!--Cierra el contenedor 2 . recuadro -->

</div>







</div>
</div>
<div id="botonSiguiente" class="col-md-12 col-sm-12 col-xs-12" style="display: none;">

    <div class="col-md-6 col-sm-12 col-xs-12">

        <div class="pull-right botones-pies">

            <button id="btnSiguiente" class="btn btn-sm btn-default"
                style="background-color:#1b9e1d;border: 0px !important;color:white;">@lang('GUARDAR Y CONTINUAR-a') </button>
        </div>

        <br>

        <div class="clearfix"></div>
    </div>
</div>

<div id="ConfirmAction" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">@lang('Confirmar información​​​ academica')</h5>
            </div>
            <div class="modal-body">
                <p>@lang('¿Esta seguro que desea guardar información​​​ academico?')</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Cancelar')</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">@lang('Confirmar')</button>
            </div>
        </div>
    </div>
</div>


<div class="clearfix"></div>
<!--Cierra el contenedor 2 . recuadro -->
</div>
<div class="clearfix"></div>
<!--Cierra el contenedor 2 . recuadro -->
</div>
</div>
</div>
<!--FIN ContenedorMenuHojaVida-->
</div>
<!--FIN col-md-9-->
</div>
<!--FIN container-->
<br>
<br>
<br>
<br>
<script type="text/javascript">
    //--Modificación para disminuir lentitud de la página y disminuir las peticiones al servidor.
    //PARA QUE APARESCAN LOS OBCIONES   CUANDO SELECCIONE SI O NO / EDUCACION SUPERIOR 


    function showSiEducacion() {
        var e = document.getElementById("ddEducacion");
        var strUser = e.options[e.selectedIndex].value;
        if (strUser == 1) {
            $('#botonSiguiente').hide();
            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#SiTieneEducacion').show();
            $('#SiTieneEducacion').css('visibility', 'visible');
            // $('#ddSiHaceArmonizacion').css('display', 'block');

        } else {
            $('#botonSiguiente').show();
            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#SiTieneEducacion :nth-child(1)').prop('selected', true);
            $('#SiTieneEducacion').hide();
            $('#SiTieneEducacion').css('visibility', 'hidden');
            //$('#ddSiHaceArmonizacion').css('display', 'none');

        }
    };

    
    //// SI TIENE EDUCACION SUPERIOR //////////////////
    function showNoEstudiaResguardo() {
        var e = document.getElementById("ddNoEstudiaResguardo");
        var strUser = e.options[e.selectedIndex].value;
        if (strUser == 1) {

            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#NoGustaQueEstudienGuambia').show();
            $('#NoGustaQueEstudienGuambia').css('visibility', 'visible');
            $('#ddNoEstudiaResguardoEscuela').css('display', 'block');

            //input ¿El problema de la deserción escolar    en nuestro pueblo Misak se debe a?
            $('#DesercionEscuela').show();
            $('#DesercionEscuela').css('visibility', 'visible');
            $('#ddNoEstudiaResguardoEscuela1').css('display', 'block');


        } else {

            //input ¿Por qué no le gusta que sus hijos estudien en las instituciones educativas del resguardo de Guambia?
            $('#ddNoEstudiaResguardoEscuela :nth-child(0)').prop('selected', true);
            $('#NoGustaQueEstudienGuambia').hide();
            $('#NoGustaQueEstudienGuambia').css('visibility', 'hidden');
            $('#ddNoEstudiaResguardoEscuela').css('display', 'none');
            //input ¿El problema de la deserción escolar    en nuestro pueblo Misak se debe a?
            $('#ddNoEstudiaResguardoEscuela1 :nth-child(0)').prop('selected', true);
            $('#DesercionEscuela').hide();
            $('#DesercionEscuela').css('visibility', 'hidden');
            $('#ddNoEstudiaResguardoEscuela1').css('display', 'none');
        }
    };

</script>

<script>
    let formEduFormal = $('#formFormal');
    let estidioSuperior = [];
    $(document).ready(() => {

        window.onbeforeunload = function () {
            return "Your work will be lost.";
        };

        $('#btnSiguiente').click(() => {
            $.ajax({
                type: "DELETE",
                url: location.href,
                data: formEduFormal.serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.validate) {
                        location.href = `resumen-docente-oficiales`;
                    } else {
                        Swal.fire(
                            'Error',
                            validate.mensaje,
                            'error'
                        );
                    }
                }
            });
        });

        $('#departamento').change(() => {
            if ($('#departamento').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultarmunicipios/${$('#departamento').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#municipio').empty();
                        $('#municipio').append('<option value="">Seleccione</option>');
                        $.map(response, (municipio, index) => {
                            $('#municipio').append(
                                `<option value="${municipio.codigo_muni}">${municipio.nombre_municipio}</option>`
                            );
                        });
                    });
            }
        });

        $('#municipio').change(() => {
            if ($('#municipio').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultarcolegios/${$('#municipio').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#colegio').empty();
                        $('#colegio').append('<option value="">Seleccione</option>');
                        $.map(response, (colegio, index) => {
                            $('#colegio').append(
                                `<option value="${colegio.codigo_colegio}">${colegio.nombre_colegio}</option>`
                            );
                        });
                    });
            }
        });

        $('#colegio').change(() => {
            if ($('#colegio').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultarsedes/${$('#colegio').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#sede').empty();
                        $('#sede').append('<option value="">Seleccione</option>');
                        $.map(response, (sede, index) => {
                            $('#sede').append(
                                `<option value="${sede.codigo_sede}">${sede.nombre_sede}</option>`
                            );
                        });
                    });
            }
        });

        $('#sede').change(() => {
            if ($('#sede').val() != '') {
                $.ajax({
                        url: `/educacion-formal/consultartiposeducacion/${$('#sede').val()}`,
                        type: "GET",
                        dataType: 'json',
                        cache: false
                    })
                    .done((response) => {
                        $('#tipo_educacion').empty();
                        $('#tipo_educacion').append('<option value="">Seleccione</option>');
                        $.map(response, (tipo, index) => {
                            $('#tipo_educacion').append(
                                `<option value="${tipo.codigo_tipo}">${tipo.tipo}</option>`
                            );
                        });
                    });
            }
        });
        let modalConfirm = $('#ConfirmAction');
        $('#btnConfirmar').click((e) => {
            e.preventDefault();
            $.ajax({
                url: location.href,
                type: 'POST',
                data: formEduFormal.serialize() +
                    `&superior=${JSON.stringify(estidioSuperior)}`,
                success: function (response) {
                    if (response.result) {
                        setTimeout(() => {
                            Swal.fire(
                                'Exito',
                                'Se ha guardado con éxito.',
                                'success'
                            );
                        }, 200);
                        setTimeout(function () {
                            location.href = `resumen-docente-oficiales`;
                        }, 2000);
                    } else {
                        if (response.validate) {
                            setTimeout(() => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.mensaje
                                });
                            }, 200);
                        } else {
                            let msg = '';
                            $.map(response.mensaje, (campo, index) => {
                                $.map(campo, (texto, index2) => {
                                    msg = msg + texto + '<br>';
                                });
                            });
                            setTimeout(() => {
                                Swal.fire(
                                    'Advertencia',
                                    msg,
                                    'warning'
                                );
                            }, 200);
                        }
                    }
                }
            }).always(() => {
                modalConfirm.modal('hide');
            });
        });
        formEduFormal.submit((e) => {
            e.preventDefault();
            modalConfirm.modal('show');
        });

        let formSuperior = $('#formSuperior');
        formSuperior.submit((e) => {
            e.preventDefault();
            var estudio = {};
            $.map(formSuperior.serializeArray(), function (element, index) {
                estudio[element['name']] = element['value'];
            });
            if ($('#agregarCarrera').data('index') == -1) {
                // Registrar Carrera
                estidioSuperior.push(estudio);
            } else {
                // Actualizar carrera
                estidioSuperior[$('#agregarCarrera').data('index')] = estudio;
            }

            $('#bodyTable').html(estructurarTablaDeCarreras());
            formSuperior[0].reset();
        });

        $("[type='reset']").closest('#formSuperior').on('reset', function () {
            $('#agregarCarrera').data('index', '-1');
        });

    });

    function estructurarTablaDeCarreras() {
        let html = '';
        $.each(estidioSuperior, function (index, element) {
            html += `<tr>
                        <td>${index + 1}</td>
                        <td>${element.tipo_educacion_superior}</td>
                        <td>${element.nombre_carrera}</td>
                        <td>${element.estado_actual}</td>
                        <td>
                            <button type="button"  class="borrar" onClick="editar('${index}')">Editar</button>
                            <button type="button"  class="borrar" onClick="borrar('${index}')">Eliminar</button>
                        </td>
                     </tr>`;
        });
        return html;
    }

    function borrar(index) {
        estidioSuperior.splice(index, 1);
        $('#bodyTable').html(estructurarTablaDeCarreras());
    }

    function editar(index) {
        $('#tipo_educacion_superior option').attr('selected', false);
        $('#estado_actual option').attr('selected', false);
        $('#tipo_educacion_superior').val(estidioSuperior[index].tipo_educacion_superior);
        $('#estado_actual').val(estidioSuperior[index].estado_actual);
        $('#nombre_carrera').val(estidioSuperior[index].nombre_carrera);
        $('#agregarCarrera').data('index', index); //-1 = Register, >=0 = Actualizar
    }

</script>



@endsection
