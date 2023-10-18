@extends('layouts.menu')

@section('content')
    
<link rel="stylesheet" href="/css/estilos_pie_pagina.css">

<link type="text/css" rel="stylesheet" href="/css/form_ingreso_familia.css">

    
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>Actualizacion</h1>
            <h2 class="">Actualizacion Informacion </h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Actualizacion</a></li>
                <li class="active">Actualizacion Informacion </li>
            </ol>
        </div>
    </div>
    <br>
    <br>
    <div class="color_informacion_modulo " style="margin-top: 15px;">
        <span class="color_infor  ">Usted se encuentra en: &nbsp;&nbsp;<font color="#060505"> Sistema de Informacion Talento Humano- SITH &gt; <font color="#060505">Actualizacion </font> &gt; <font color="#060505">
                    Informacion </font> </span>
    </div>


    {{-- Formulario --}}
    
    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="etiqueta2"> Actualizar direcion de trabajo
                </div>
    
                <form id="formInfoPersonal" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <!-- Codigos foraneos tabla personas -->
                    <input name="hoga_id" type="hidden" value="{{ $datos->hogar_id }}">

                    <input name="persona_id" type="hidden" value="{{ $datos->id }}">
                    <!---- fin codigos foraneos -->

                    {{-- Informacion basica de la persona --}}
                    <div class="row separador">
                        <div class="col-md-12 form-group text-center">
                            Información de la persona (*)
                        </div>
                    </div>
					
					
					
					
					
					
                  
        
                
        
                  
-------------------------------
<div class="contenedor_informacion_persona">
						 <div class="row separador">
                            <div class="col-md-12 form-group text-center">
                                Actualizar Información de la institución y dirección donde va laborar : {{ $datos->nombres }}
                        {{ $datos->apellidos }} CC N° {{ $datos->docomento_persona }}
                            </div>
                        </div>
						  <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <div class="etiqueta2">- </div>
                                <input type="text" name="txtDir" id="txtDir" maxlength="100" placeholder="-"
                                    class="form-control" readonly="readonly" autocomplete="on" =""  >
                            </div>
                        </div>
						
						 <div id="lugartrabajotaDiv" class="col-md-12 form-group" style="display: none;">
                                <input class="form-control" id="lugartrabajoInput" type="text" style="text-align: center;" disabled>                                            
                            </div>
							
						   <div class="row">
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Departamento donde va laboral</div>
                                <select name="departamento" id="departemento_lugar_trabajo" class="form-control"
                                    style="width:" =""  require="" >
                                    <option value="" selected disabled>Selecione Departamento</option>
                                    @foreach($departemento_lugar_trabajo as $key => $departemento_lugar_trabajo)
                                    <option value="{{$key}}"> {{$departemento_lugar_trabajo}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">*Municipio donde va laboral</div>
                                <select name="municipio" id="municipio_lugar_trabajo" class="form-control" style="width:" =""  require="" >
                              </select>
                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Institucion donde va laboral</div>
                                <select name="municipio" id="nombre_institucion" class="form-control" style="width:" =""  require="" >
                                </select>
                            </div>
                            <div class="col-md-3 form-group input-group-sm pull-left">
                                <div class="etiqueta2">Tipo institucion donde va laboral</div>
                                <select name="municipio" id="tipo_institucion" class="form-control" style="width:" ="" require="" >
                               </select>
                            </div>


                        </div>
						   <div class="row">
                            <div class="col-md-4 form-group input-group-sm">
                                <div class="etiqueta2 usuario">Sede de la institucion donde va laboral.(*)</div>
                                <div class="etiqueta2 empresa" style="display: none">Nombre de la Empresa.(*)</div>
                                
                                <select name="id_sede_institucion" id="sede_institucion" class="form-control" style="width:" ="" require="" >
                                </select>
                            </div>
                            <!--
                    <div class="col-md-4 form-group input-group-sm">                        
                        <div class="etiqueta2 usuario">Primer Apellido.(*)</div>
                        <div class="etiqueta2 empresa" style="display: none">Sigla de la Empresa.(*)</div>
                        <input type="text" name="txtApe1" id="txtApe1" placeholder="Ingrese su Primer Apellido" class="form-control" ="">                                
                    </div>
                    <div class="col-md-4 form-group input-group-sm">                                     
                        <div class="etiqueta2 usuario">Segundo Apellido.</div>
                        <div class="etiqueta2 empresa" style="display: none">Representante Legal</div>
                        <input type="text" name="txtApe2" id="txtApe2" placeholder="Ingrese su Segundo Apellido" class="form-control">
                    </div>-->
                        </div>
						  <div class="clearfix"></div>
                    <!--Cierra el contenedor 2 . recuadro -->
                </div>
						
						
						
				

<!--------------------------------------------------------->
              

                
				
------------------------------
                    {{-- Informacion academica --}}

                    
                        

                   
                    {{-- Informacion de educación formal --}}
                    <div id="SiTieneEducacion">
                     
                           
                        <div class="container">
   
                            <div class="row">
                                
                               
                                <div class="col-md-4 form-group input-group-sm">
                                    <div for="ddNoEstudiaResguardo" >
                                        </div>
                                    <select name="" class=" form-control"  style="visibility:hidden" id="ddNoEstudiaResguardo"
                                        onchange="showNoEstudiaResguardo(this);" autocomplete="of">
                                        <option value="">Seleccione</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    {{-- BOTON SUBMIT --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                            
                            <a href="/Actualizacion-informacion-general" class="btn btn-sm btn-default" style="background-color:#FFA400;border: 0px !important;color:white;"> <i
                                        class="fa fa-eye" aria-hidden="true"></i>
                                    Ir al Personal
                                </a>
                                
                                <button type="submit" class="btn btn-success" style="background-color:#1b9e1d;color:white;" id="guardar">Guardar</button>
                            </div>
                        </div>
                    </div>
                    <br>
                </form>

                {{-- Informacion de educación superior --}}
               

            </div>

        </div>
    </div>


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

<script type="text/javascript">
    //--Modificación para disminuir lentitud de la página y disminuir las peticiones al servidor.
    //PARA QUE APARESCAN LOS OBCIONES   CUANDO SELECCIONE SI O NO / EDUCACION SUPERIOR 

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
    let datosPersona = {!!($datos->status==0?0:$datosPersona)!!};
    let formEduFormal=$('#formFormal');
    let estidioSuperior = [];
    $(document).ready(() => {
        
        window.onbeforeunload = function() { return "Your work will be lost."; };

        if(datosPersona!=0){
            cargarFormulario();
        }

        $('#btnSiguiente').click(()=>{
            $.ajax({
                type: "DELETE",
                url: location.href,
                data: formEduFormal.serialize(),
                dataType: "json",
                success: function (response) {
                    if(response.validate){
                        location.href = `resumen`;
                    }else{
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

        formEduFormal.submit((e)=> {
            e.preventDefault();
        });

        let formSuperior = $('#formSuperior');
        formSuperior.submit((e) => {
            e.preventDefault();
            var estudio = {};
            $.map(formSuperior.serializeArray(), function (element, index) {
                estudio[element['name']] = element['value'];
            });
            if($('#agregarCarrera').data('index') == -1){
                // Registrar Carrera
                estidioSuperior.push(estudio);
            }else{
                // Actualizar carrera
                estidioSuperior[$('#agregarCarrera').data('index')] = estudio;
            }

            $('#bodyTable').html(estructurarTablaDeCarreras());
            formSuperior[0].reset();
        });

        $("[type='reset']").closest('#formSuperior').on('reset', function () {
            $('#agregarCarrera').data('index', '-1');
        });

        let formInfoPersonal = $('#formInfoPersonal');
        formInfoPersonal.on('submit', (event)=> {
            event.preventDefault();
            modalConfirm.modal('show');
        }); 

        $('#btnConfirmar').click((e) => { 
            e.preventDefault();
            let data = new FormData($('#formInfoPersonal')[0]);

            $.ajax({
                type: 'POST',
                headers: {"X-CSRF-TOKEN": $('[name=_token]').val()},
                url: location.href,
                data: data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.result) {
                        if(estidioSuperior.length > 0){
                            $.ajax({
                                url: 'educacion-superior',
                                type: 'POST',
                                data: { 
                                    estudioSuperior: JSON.stringify(estidioSuperior),
                                    id_info_persona: response.id,
                                },
                                success: function (response) {
                                    if(response.result){
                                        setTimeout(() => {
                                            Swal.fire(
                                                'Exito',
                                                'Se ha actualizado exitosamente',
                                                'success'
                                            );
                                        }, 200);

                                        setTimeout(function () {
                                            location.href = `/Actualizacion-informacion-general`;
                                           // location.href = `Informacion`;
                                        }, 2000);

                                    }else{
                                        setTimeout(() => {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: response.mensaje,
                                            });
                                        }, 200);
                                    }     
                                }
                            });
                        }else{
                            setTimeout(() => {
                                Swal.fire(
                                    'Exito',
                                    'Se ha actualizado exitosamente',
                                    'success'
                                );
                            }, 200);

                            setTimeout(function () {
                               

                                location.href = `/Actualizacion-informacion-general`;

                            }, 2000);
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.mensaje,
                        })
                    }
                }
            }).fail((error) => {
                // console.log(e.responseJSON.errors);
                let mensaje='';
                $.map(error.responseJSON.errors, function (elementOrValue, indexOrKey) {
                    // console.log(elementOrValue);
                    mensaje+= elementOrValue[0]+"  ";
                });
                setTimeout(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: mensaje,
                    });
                }, 200);

            }).always(() => {
                modalConfirm.modal('hide');
            });

        });


    });

    function cargarFormulario(){
        $('#genero').val(datosPersona.sexo);
       
        $('#codigo_municipio').val(datosPersona.codigo_municipio);
        $('#enfemerma_recurre').val(datosPersona.enfemerma_recurre);
        $('#carnet_salud_id').val(datosPersona.carnet_salud_id);
        $('#profecion_id').val(datosPersona.profecion_id);
        $('#comunidad_indigena').val(datosPersona.comunidad_indigena);
        $('#telefono').val(datosPersona.telefono);
        $('#email').val(datosPersona.email);
        $('#direccion').val(datosPersona.direccion);
        $('#tipo_contrato').val(datosPersona.tipo_contrato);
       $('#pesiones').val(datosPersona.pesiones);
      $('#salario').val(datosPersona.salario);
      $('#inicio_contratacion').val(datosPersona.inicio_contratacion);
    $('#fin_contrato').val(datosPersona.fin_contrato);
    $('#codigos_secretaria').val(datosPersona.codigos_secretaria);
      $('#codigo_municipio').val(datosPersona.codigo_municipio);

        let inputNamuyHabla=$('#namuy_wam :input[value="'+datosPersona.habla_namuy_wam+'"]');
        inputNamuyHabla.prop('checked', true);
        inputNamuyHabla.parent().addClass('active');
        let inputNamuyEscribe=$('#namuy_wam :input[value="'+datosPersona.escritura_namuy_wam+'"]');
        inputNamuyEscribe.prop('checked', true);
        inputNamuyEscribe.parent().addClass('active');

        let inputEspañolHabla=$('#español :input[value="'+datosPersona.habla_español+'"]');
        inputEspañolHabla.prop('checked', true);
        inputEspañolHabla.parent().addClass('active');
        let inputEspañolEscribe=$('#español :input[value="'+datosPersona.escribe_español+'"]');
        inputEspañolEscribe.prop('checked', true);
        inputEspañolEscribe.parent().addClass('active');   

        let inputVestimenta=$('#vestimenta :input[value="'+datosPersona.vestimenta_misak+'"]');
        inputVestimenta.prop('checked', true);
        inputVestimenta.parent().addClass('active');
        
        $('#medico_tradicional').val(datosPersona.medico_tradicional);
        $('#conocimientos_empiricos').val(datosPersona.conocimientos_empiricos);
        $('#deporte_constante').val(datosPersona.deporte_constante);
        $('#juegos_tradicionales').val(datosPersona.juegos_tradicionales);
        $('#lugares_sagrados').val(datosPersona.lugares_sagrados);
        $('#baños_etapas_vida').val(datosPersona.baños_etapas_vida);
        $('#mestruacion').val(datosPersona.mestruacion);
        $('#enfermedades_id').val(datosPersona.enfermedades_id);
        $('#consumo_sustancias').val(datosPersona.consumo_sustancias);
        $('#medicina_alternativa').val(datosPersona.medicina_alternativa);

      

        let educacionFormal={!!($educacionFormal)!!};
        if(educacionFormal.length>0){
            $('#educacionDiv').show();
            $('#educacionInput').val(educacionFormal[0].nombre_depatamento+' - '+
            educacionFormal[0].nombre_municipio+' - '+educacionFormal[0].nombre_colegio+' - '+
            educacionFormal[0].nombre_sede+' - '+educacionFormal[0].tipo+' - '+educacionFormal[0].estado+' - '+
            educacionFormal[0].año_educacion+' - '+educacionFormal[0].modalidad_colegio);
        }
		
		
		let direccion_trabajodor={!!($direccion_trabajodor)!!};
        if(direccion_trabajodor.length>0){
            $('#direcionempleadoDiv').show();
            $('#direcionempleadoInput').val(direccion_trabajodor[0].nombre_depatamento+'- MUNICIPIO DE: '+
            direccion_trabajodor[0].nombre_municipio+' -DIRECION: '+direccion_trabajodor[0].direccion);
        }
		
		let canasta_programa={!!($canasta_programa)!!};
        if(canasta_programa.length>0){
            $('#canastaDiv').show();
            $('#canastaInput').val(canasta_programa[0].nombre_tipo_trabajo+'-'+
            canasta_programa[0].nombre_categoria_trabajo+'--'+canasta_programa[0].tipo_contrato+'-'+canasta_programa[0].pesiones);
        }
        
		
		let direcion_trabajo={!!($direcion_trabajo)!!};
        if(direcion_trabajo.length>0){
            $('#lugartrabajotaDiv').show();
            $('#lugartrabajoInput').val(direcion_trabajo[0].nombre_depatamento_trabajo+'-'+
            direcion_trabajo[0].nombre_municipio_trabajo+'--'+direcion_trabajo[0].nombre_institucion_trabajo+'-'+direcion_trabajo[0].nombre_tipo_institucion+'-'+direcion_trabajo[0].nombre_sede_institucion);
        }
        
		
        
        estidioSuperior={!!($educacionSuperior)!!};
        if(estidioSuperior.length>0){
            $('#ddNoEstudiaResguardo').val('1');
            showNoEstudiaResguardo($('#ddNoEstudiaResguardo'));
            $('#bodyTable').html(estructurarTablaDeCarreras());
        }
        
    }

    function estructurarTablaDeCarreras(){
        let html = '';
            $.each(estidioSuperior, function (index, element) {
                html+=`<tr>
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
<!-- selector  categoria_trabajo -->
<script type="text/javascript">
$('#tipo_trabajo').change(function() {
    var tipo_trabajoID = $(this).val();
    if (tipo_trabajoID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-categoria_trabajo-list')}}?id_tipo_trabajo=" + tipo_trabajoID,
            success: function(res) {
                if (res) {
                    $("#categoria_trabajo").empty();
                    $("#categoria_trabajo").append('<option>Seleccione Categoria</option>');
                    $.each(res, function(key, value) {
                        $("#categoria_trabajo").append('<option value="' + key + '">' +
                            value + '</option>');
                    });

                } else {
                    $("#categoria_trabajo").empty();
                }
            }
        });
    } else {
        $("#categoria_trabajo").empty();

    }
});


</script>
<script type="text/javascript">
$('#departemento_lugar_trabajo').change(function() {
    var lugar_trabajoID = $(this).val();
    if (lugar_trabajoID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-municipio_lugar_trabajo-list')}}?codigo_departamento_trabajo=" +
                lugar_trabajoID,
            success: function(res) {
                if (res) {
                    $("#municipio_lugar_trabajo").empty();
                    $("#municipio_lugar_trabajo").append('<option>Seleccione Categoria</option>');
                    $.each(res, function(key, value) {
                        $("#municipio_lugar_trabajo").append('<option value="' + key +
                            '">' + value + '</option>');
                    });

                } else {
                    $("#municipio_lugar_trabajo").empty();
                }
            }
        });
    } else {
        $("#municipio_lugar_trabajo").empty();
        $("#nombre_institucion").empty();
    }
});
</script>
{{--selector de direccion  del trabajador --}}
<script type="text/javascript">
$('#departamentos').change(function() {
    var departamentoID = $(this).val();
    if (departamentoID) {
        $.ajax({
            type: "GET",
            url: "{{url('/get-municipio-lists')}}?codigo_departamento=" + departamentoID,
            success: function(res) {
                if (res) {
                    $("#codigo_municipio").empty();
                    $("#codigo_municipio").append('<option>Seleccione Municipio</option>');
                    $.each(res, function(key, value) {
                        $("#codigo_municipio").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#codigo_municipio").empty();
                }
            }
        });
    } else {
        $("#codigo_municipio").empty();

    }
});
</script>
    
<script type="text/javascript">
$('#municipio_lugar_trabajo').on('change', function() {
    var municipioID = $(this).val();
    if (municipioID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-nombre-instituciono-list')}}?codigo_municipio_trabajo=" + municipioID,
            success: function(res) {
                if (res) {
                    $("#nombre_institucion").empty();
                    $("#nombre_institucion").append('<option>Seleccione Resguardo </option>');
                    $.each(res, function(key, value) {
                        $("#nombre_institucion").append('<option value="' + key + '">' +
                            value + '</option>');
                    });

                } else {
                    $("#nombre_institucion").empty();
                }
            }
        });
    } else {
        $("#nombre_institucion").empty();
        $("#tipo_institucion").empty();
    }

});

$('#nombre_institucion').on('change', function() {
    var municipioID = $(this).val();
    if (municipioID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-tipo-institucion-list')}}?id_nombre_institucion=" + municipioID,
            success: function(res) {
                if (res) {
                    $("#tipo_institucion").empty();
                    $("#tipo_institucion").append('<option>Seleccione Tipo Institucion </option>');
                    $.each(res, function(key, value) {
                        $("#tipo_institucion").append('<option value="' + key + '">' +
                            value + '</option>');
                    });

                } else {
                    $("#tipo_institucion").empty();
                }
            }
        });
    } else {
        $("#tipo_institucion").empty();
        $("#sede_institucion").empty();
    }

});


$('#tipo_institucion').on('change', function() {
    var municipioID = $(this).val();
    if (municipioID) {
        $.ajax({
            type: "GET",
            url: "{{url('get-sede_institucion-list')}}?id_tipo_institucion=" + municipioID,
            success: function(res) {
                if (res) {
                    $("#sede_institucion").empty();
                    $("#sede_institucion").append('<option>Seleccione Tipo Institucion </option>');
                    $.each(res, function(key, value) {
                        $("#sede_institucion").append('<option value="' + key + '">' +
                            value + '</option>');
                    });

                } else {
                    $("#sede_institucion").empty();
                }
            }
        });
    } else {
        $("#sede_institucion").empty();

    }

});



</script>

@endsection