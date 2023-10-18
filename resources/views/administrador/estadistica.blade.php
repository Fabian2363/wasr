@extends('layouts.menu')

@section('content')

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>@lang('Información POBLACIONAL MISAK- SIPEMP')</h1>
        <h2 class="">@lang('Información poblacional')</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">@lang('Inicio')</a></li>
            <li><a href="#">@lang('Administrador')</a></li>
            <li class="active">@lang('Información poblacional')</li>
        </ol>
    </div>
</div>



<div class="contenedor_habitantes">
    <section style="padding: 10rem 0;" class="">
        <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
                <div class="information_inner">
                    <div class="info gray_symbols"><i class="fa fa-shopping-cart icon"></i></div>

                    <span>@lang('MUJERES-|-HOMBRES')</span>
                    <h1 class="bolded">{{$total_personas_m}} | {{$total_personas_f}}</h1>
                    <div class="infoprogress_blue">
                        <div class="blueprogress"></div>
                    </div>
                    <b class=""><small>@lang('MInformación total por genero')</small></b>
                    <div class="pull-right" id="work-progress2">
                        <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;"
                            width="47" height="25"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
                <div class="information_inner">
                    <div class="info blue_symbols">
                    <i class="fa fa-shopping-cart icon">
                    
                    </i></div>
                    <span>@lang('VIVIENDAS')</span>
                    <h1 class="bolded"> {{$total_vivienda}}</h1>
                    <div class="infoprogress_blue">
                        <div class="blueprogress"></div>
                    </div>
                    <b class=""><small>@lang('Información total de viviendas')</small></b>
                    <div class="pull-right" id="work-progress2">
                        <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;"
                            width="47" height="25"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-sm-6">
            <div class="information red_info">
                <div class="information_inner">
                    <div class="info red_symbols"><i class="fa fa-comments icon"></i></div>
                    <span> @lang('HOGARES')</span>
                    <h1 class="bolded">{{$total_hogar}}</h1>
                    <div class="infoprogress_red">
                        <div class="redprogress"></div>
                    </div>
                    <b class=""><small>@lang('Información total de Hogares')</small></b>
                    <div class="pull-right" id="work-progress3">
                        <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;"
                            width="47" height="25"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-sm-6">
            <div class="information gray_info">
                <div class="information_inner">
                    <div class="info gray_symbols"><i class="fa fa-money icon">
                    </i></div>
                    <span>@lang('HABITANTES') </span>
                    <h1 class="bolded"> {{$total_personas}}</h1>
                    <div class="infoprogress_gray">
                        <div class="grayprogress"></div>
                    </div>
                    <b class=""><small>@lang('Información total de habitantes') </small></b>
                    <div class="pull-right" id="work-progress4">
                        <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;"
                            width="47" height="25"></canvas>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<style>
.contenedor_habitantes {
    margin-top: 10px;
    margin-inline-start: 10px;
}
</style>
<div class="row">
<div class="col-sm-12">
    <div class="panel-group  accordion accordion-color" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading ">

                <h4 class="panel-title ">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        <i class="fa fa-angle-right"></i>
                        @lang(' Ver Información estadistica del censo poblacional Misak -SIPEMP')
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapse4" class="panel-collapse collapse">
                <div class="panel-body help_color">
            
             <div class="titulo_sociocultural">
             <h4 class="panel-title ">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        
                        @lang('Información  estadistica sociocultural en relacion a educación y salud propia del Resguardo de Guambia -SIPEMP')
                    </a>
                </h4>
              
            </div>
            <style>
            .titulo_sociocultural{
                margin-top: 20px;
              margin-left: 300px;
            }
            </style>

                    {{---foRmulario datos estadisticos ---}}
                    <section style="padding: 5rem 0;">

                        <div class="container text-center">
                            <div class="row">





                                <div class="col-md-3">
                                    <p>@lang('Plantas Utilizado')</p>
                                    <canvas id="plantas" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-1"></div>

                                <div class="col-md-3">
                                    <h5>@lang('Personas')</h5>
                                    <canvas id="categoria_personas" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-1"></div>

                                <div class="col-md-3">
                                    <h5>@lang('Hablan Namuy Wam')</h5>
                                    <canvas id="hablan_namuy_wam" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-1"></div>

                            </div>

                            <div class="row">

                                <div class="col-md-3">
                                    <h5>@lang('Escriben Namuy Wam')</h5>
                                    <canvas id="escriben_namuy_wam" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-1"></div>

                                <div class="col-md-3">
                                    <h5>@lang('Medico Tradicional')</h5>
                                    <canvas id="medico_tradicional" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-1"></div>

                                <div class="col-md-3">
                                    <h5>@lang('Comidad Propias')</h5>
                                    <canvas id="consumo_comidad_propias" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-1"></div>

                            </div>

                            <div class="row">

                                <div class="col-md-3">
                                    <h5>@lang('Educación')</h5>
                                    <canvas id="educacion_misak" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-1"></div>

                                <div class="col-md-3">
                                    <h5>@lang('Sostenimiento Economico')</h5>
                                    <canvas id="sostenimiento_economico" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-1"></div>

                                <div class="col-md-3">
                                    <h5>@lang('Habla Español')</h5>
                                    <canvas id="habla_español" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-1"></div>

                            </div>
                            
                            <div class="row">

                                <div class="col-md-3">
                                    <h5>@lang('Escribe Español')</h5>
                                    <canvas id="escribe_español" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
            <h5>@lang('Vestido Misak')</h5>
            <canvas id="vestimenta" width="200" height="200"></canvas>
			<div class="col-md-1"></div>
        </div>
        <div class="col-md-3">
            <h5>@lang('¿Como está fortaleciendo la educación propia en su familia?')</h5>
            <canvas id="fortalecimiento_educacion_propia" width="200" height="200"></canvas>
        </div>


 
        <div class="col-md-1"></div>
                            </div>
							
							<div class="row">

                                <div class="col-md-3">
                                    <h5>@lang('¿Cómo le gustaría que fuera la educación en el pueblo Misak?')</h5>
                                    <canvas id="como_gustaria_educación_Misak" width="200" height="200"></canvas>
                                </div>

                                <div class="col-md-3">
                                    <h5>@lang('¿La educación que brindan las instituciones educativas del resguardo de Guambia es?')</h5>
                                    <canvas id="calidad_educacion" width="200" height="200"></canvas>
                                </div>
                                <div class="col-md-3">
                                    <h5>@lang('¿Tiene  hijos estudiando en las Instituciones Educativas del Resguardo de Guambía?')</h5>
                                    <canvas id="hijos_estudiando_instituciones" width="200" height="200"></canvas>
                                </div>
                               
							   <div class="col-md-3">
                                    <h5>@lang('¿Consumo de alimentos propios desde la familia?')</h5>
                                    <canvas id="consumo_alimentos_propio" width="200" height="200"></canvas>
                                </div>
                               <!-- <div class="col-md-6">
            <h5>@lang('¿Que debilidades ha visto hasta el momento, de la educación en el pueblo Misak?')</h5>
            <canvas id="debilidades_educación_Misak" width="200" height="200"></canvas>
        </div>-->
       
        <div class="col-md-1"></div>
                            </div>
							---
							<div class="row">

                                <div class="col-md-3">
                                    <h5>@lang('Hace rituales de armonización y de equilibrio como familia')</h5>
                                    <canvas id="rituales_armonizacion_misak" width="200" height="200"></canvas>
                                </div>

                                
                                <div class="col-md-3">
                                    <h5>@lang('¿Ha dónde recurre si se enferma?')</h5>
                                    <canvas id="estadistica_cuando_enferma_recurre" width="200" height="200"></canvas>
                                </div>
								
								<div class="col-md-3">
                                    <h5>@lang('Religión dentro del resguado de Guambia')</h5>
                                    <canvas id="religion_guambia" width="200" height="200"></canvas>
                                </div>
                               
							   <div class="col-md-3">
                                    <h5>@lang('baños en los diferentes etapas de la vida')</h5>
                                    <canvas id="baños_etapas_vida" width="200" height="200"></canvas>
                                </div>
                               <!-- <div class="col-md-6">
            <h5>@lang('¿Que debilidades ha visto hasta el momento, de la educación en el pueblo Misak?')</h5>
            <canvas id="debilidades_educación_Misak" width="200" height="200"></canvas>
        </div>-->
       
        <div class="col-md-1"></div>
                            </div>
							--
							---
							<div class="row">

                                <div class="col-md-3">
                                    <h5>@lang('Conocimientos empíricos “Saberes locales"')</h5>
                                    <canvas id="saberes_propio" width="200" height="200"></canvas>
                                </div>

                                
                                <div class="col-md-3">
                                    <h5>@lang('Consumo sustancia psicoactiva')</h5>
                                    <canvas id="consomo_sustancias" width="200" height="200"></canvas>
                                </div>
								{{--
								<div class="col-md-3">
                                    <h5>@lang('Religión dentro del resguado de Guambia')</h5>
                                    <canvas id="religion_guambia" width="200" height="200"></canvas>
                                </div>
                               
							   <div class="col-md-3">
                                    <h5>@lang('baños en los diferentes etapas de la vida')</h5>
                                    <canvas id="baños_etapas_vida" width="200" height="200"></canvas>
                                </div>--}}
                               <!-- <div class="col-md-6">
            <h5>@lang('¿Que debilidades ha visto hasta el momento, de la educación en el pueblo Misak?')</h5>
            <canvas id="debilidades_educación_Misak" width="200" height="200"></canvas>
        </div>-->
        
       
        <div class="col-md-1"></div>
                            </div>
							--

                            <div class="titulo_vivienda">
             <h4 class="panel-title ">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        
                        @lang('Información  estadistica vivienda del Resguardo de Guambia -SIPEMP')
                    </a>
                </h4>
              
            </div>
            <style>
            .titulo_vivienda{
                margin-top: 40px;
              margin-left: 300px;
            }
            </style>
            ---------
            
                        </div>

                    </section>
                </div>
            </div>
        </div>


    </div>
</div>
</div>



<br> 
<br>
<br>
<br> 
<br>
<br>
@endsection

@section('script')

{{-- Chart.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" integrity="sha512-QEiC894KVkN9Tsoi6+mKf8HaCLJvyA6QIRzY5KrfINXYuP9NxdIkRQhGq3BZi0J4I7V5SidGM3XUQ5wFiMDuWg==" crossorigin="anonymous"></script>
<script>
    let plantas = $('#plantas');
    let categoria_personas = $('#categoria_personas');
    let hablan_namuy_wam = $('#hablan_namuy_wam');
    let escriben_namuy_wam = $('#escriben_namuy_wam');
    let medico_tradicional = $('#medico_tradicional');
    let consumo_comidad_propias = $('#consumo_comidad_propias');
    let educacion = $('#educacion');
    let sostenimiento_economico = $('#sostenimiento_economico');
    let habla_español = $('#habla_español');
    let escribe_español = $('#escribe_español');
    let educacion_misak = $('#educacion_misak');
    let vestimenta = $('#vestimenta');
    let como_gustaria_educación_Misak = $('#como_gustaria_educación_Misak');
    let fortalecimiento_educacion_propia = $('#fortalecimiento_educacion_propia');
    let debilidades_educación_Misak = $('#debilidades_educación_Misak');
    let hijos_estudiando_instituciones = $('#hijos_estudiando_instituciones');
    let consumo_alimentos_propio = $('#consumo_alimentos_propio');
    let rituales_armonizacion_misak = $('#rituales_armonizacion_misak');
    let estadistica_cuando_enferma_recurre = $('#estadistica_cuando_enferma_recurre');
    let religion_guambia = $('#religion_guambia');
    let  baños_etapas_vida = $('#baños_etapas_vida');
    let  saberes_propio = $('#saberes_propio');  
    let  consomo_sustancias = $('#consomo_sustancias');
    
    let plantasData = @json($plantas);
    let categoria_personasData = @json($categoria_personas);
    let quienes_hablan_namuy_wamData = @json($quienes_hablan_namuy_wam);
    let quienes_escriben_namuy_wamData = @json($quienes_escriben_namuy_wam);
    let medico_tradicionalData = @json($medico_tradicional);
    let consumo_comidad_propiasData = @json($consumo_comidas_propias);
    let educacionData = @json($educacion);
    let sostenimiento_economicoData = @json($sostenimiento_economico);
    let habla_españolData = @json($habla_español);
    let escribe_españolData = @json($escribe_español);
    let educacion_misakData = @json($educacion_misak);
    //let calidad_educacionData = @json($calidad_educacion);
    let vestimentaData = @json($vestimenta);
    let calidad_educacionData = @json($calidad_educacion);
    let como_gustaria_educación_MisakData = @json($como_gustaria_educación_Misak);
    let fortalecimiento_educacion_propiaData = @json($fortalecimiento_educacion_propia);
    let debilidades_educación_MisakData = @json($debilidades_educación_Misak);
    let hijos_estudiando_institucionesData = @json($hijos_estudiando_instituciones);
    let consumo_alimentos_propioData = @json($consumo_alimentos_propio);
    let rituales_armonizacion_misakData = @json($rituales_armonizacion_misak);
    let estadistica_cuando_enferma_recurreData = @json($estadistica_cuando_enferma_recurre);
    let religion_guambiaData = @json($religion_guambia);
    let baños_etapas_vidaData = @json($baños_etapas_vida);
    let saberes_propioData = @json($saberes_propio);  
    let consomo_sustanciasData = @json($consomo_sustancias);   

    console.log(consomo_sustanciasData);
    console.log(saberes_propioData);
    console.log(baños_etapas_vidaData);
    console.log(religion_guambiaData);
    console.log(estadistica_cuando_enferma_recurreData);
    console.log(rituales_armonizacion_misakData);
    console.log(consumo_alimentos_propioData);
    console.log(hijos_estudiando_institucionesData);
    console.log(calidad_educacionData);
    console.log(como_gustaria_educación_MisakData);
    console.log(fortalecimiento_educacion_propiaData);
    console.log(debilidades_educación_MisakData);
    console.log(habla_españolData);
    console.log(escribe_españolData);
    console.log(educacion_misakData);
    console.log(vestimentaData);
    let labelAxuliar = [];
    let DataAxuliar = [];

    $(document).ready(function () {


        consomo_sustancias
        //CONSUMO DE SUSTANCIAS psicutivas 
        crear_diagramas_pie(consomo_sustancias, Object.values(consomo_sustanciasData), Object.keys(consomo_sustanciasData));

        //¿saberes empiricos
        crear_diagramas_pie(saberes_propio, Object.values(saberes_propioData), Object.keys(saberes_propioData));

        
        //¿Que debilidades ha visto hasta el momento, de la educación en el pueblo Misak?
        crear_diagramas_pie(debilidades_educación_Misak, Object.values(debilidades_educación_MisakData), Object.keys(debilidades_educación_MisakData));
        //fortalecimiento_educacion_propia
        crear_diagramas_pie(como_gustaria_educación_Misak, Object.values(como_gustaria_educación_MisakData), Object.keys(como_gustaria_educación_MisakData));
          //fortalecimiento_educacion_propia
         crear_diagramas_pie(fortalecimiento_educacion_propia, Object.values(fortalecimiento_educacion_propiaData), Object.keys(fortalecimiento_educacion_propiaData));
           //calidad educacion  guambia 
         crear_diagramas_pie(calidad_educacion, Object.values(calidad_educacionData), Object.keys(calidad_educacionData));
             // HIJOS ESTUDIANDO GUAMBIA 
             crear_diagramas_pie(hijos_estudiando_instituciones, Object.values(hijos_estudiando_institucionesData), Object.keys(hijos_estudiando_institucionesData));
         // cada cuento comensume alientos porpios 
         crear_diagramas_pie(consumo_alimentos_propio,Object.values(consumo_alimentos_propioData),Object.keys(consumo_alimentos_propioData));
         // rituales de armonización
         crear_diagramas_pie(rituales_armonizacion_misak,Object.values(rituales_armonizacion_misakData),Object.keys(rituales_armonizacion_misakData));
        // recurre cuando se enferma
        crear_diagramas_pie(estadistica_cuando_enferma_recurre,Object.values(estadistica_cuando_enferma_recurreData),Object.keys(estadistica_cuando_enferma_recurreData));
         // religion gumbia
        
         crear_diagramas_pie( religion_guambia,Object.values(religion_guambiaData),Object.keys(religion_guambiaData));
        // baños etapas de la vida 
        
        crear_diagramas_pie(baños_etapas_vida,Object.values(baños_etapas_vidaData),Object.keys(baños_etapas_vidaData));
        // Estadisticas De tipo de plantas
        crear_diagramas_pie(plantas, Object.values(plantasData), Object.keys(plantasData));

        // Estadistica Categorias de personas que hay en el sistema
        masterisar_datos(categoria_personasData);
        crear_diagramas_pie(categoria_personas, DataAxuliar, labelAxuliar);

        // Estadistica Cantidad de personas que hablan namuy Wam
        masterisar_datos(quienes_hablan_namuy_wamData);
        crear_diagramas_pie(hablan_namuy_wam, DataAxuliar, labelAxuliar);

        // Estadistica Nivel que escribe Namu Wam
        crear_diagramas_pie(escriben_namuy_wam, Object.values(quienes_escriben_namuy_wamData), Object.keys(quienes_escriben_namuy_wamData));

        // Estadistica Medico tradicional
        crear_diagramas_pie(medico_tradicional, Object.values(medico_tradicionalData), Object.keys(medico_tradicionalData));

        // Estadistica Consumo Comidas Propias
        crear_diagramas_pie(consumo_comidad_propias, Object.values(consumo_comidad_propiasData), Object.keys(consumo_comidad_propiasData));

        // Estadistica Nivel de educacion
        crear_diagramas_pie(educacion, Object.values(educacionData), Object.keys(educacionData));

        // Estadistica sostenimiento econocmico
        masterisar_datos(sostenimiento_economicoData);
        crear_diagramas_pie(sostenimiento_economico, DataAxuliar, labelAxuliar);
        
        // Estadstica Quienes Hablan Español
        crear_diagramas_pie(habla_español, Object.values(habla_españolData), Object.keys(habla_españolData));

        // Estadstica Quienes Escriben Español
        crear_diagramas_pie(escribe_español, Object.values(escribe_españolData), Object.keys(escribe_españolData));


        // educacion  primaria, secundaria, superior,  no tiene
        crear_diagramas_pie(educacion_misak, Object.values(educacion_misakData), Object.keys(educacion_misakData));

         // vestimenta 
         crear_diagramas_pie(vestimenta, Object.values(vestimentaData), Object.keys(vestimentaData));

        

    });

    function masterisar_datos(ArrayData = []){
        if(ArrayData.length > 0){
            labelAxuliar = [];
            DataAxuliar = [];
            $.map(ArrayData, (elemento, index) => {
                labelAxuliar.push(elemento.label);
                DataAxuliar.push(elemento.total);
            });
        }
    }

    function crear_diagramas_pie(lienzo ,data, labels){
        var myChart = new Chart(lienzo, {
        type: 'pie',
        data: {
            labels: labels ,
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(56, 122, 157)',  
                     'rgba(255, 206, 86, 0.2)',
                    'rgba(219, 64, 14)',
                    'rgba(27, 16, 230)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 71)',
                    'rgba(0, 168, 255)',
                    'rgba(55, 217, 96 )'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
    });
    }

</script>

@endsection