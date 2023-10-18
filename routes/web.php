<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::post('/','PersonasController@consultar_talentoHumano_persona')->name('espiral-educacion');

Auth::routes();


// Authentication Routes... admistrativos 
Route::get('login_admi-X7S9XXXX9S-DJSI3YSNZSG3UAJ-JSHHS', 'Auth\LoginController@showLoginFormadmin')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



// Authentication Routes... talento humano


Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

 // Registration Routes...
 
 Route::post('/register', 'Auth\RegisterController@register');
 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

 //Route::get('register/{id_persona}', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/set_language/{lang}', 'Controller@set_language')->name('set_language');

Route::middleware(['auth'])->group(function () {
	

/* 
|--------------------------------------------------------------------------
|              MENU LATERIAL DE LAS VISTAS DE CENSO POBLACIONAL
|
*/

		//Route menu lateral de los furmulario del censo poblacional ////
	 
	   Route:: get('/menu-lateral2',function(){
		return view('menu_lateral.menu_lateral_informacion');
   });
 
	   		 

/*
|--------------------------------------------------------------------------
|                            CENSO VIVIENDA  
|
*/

Route:: get("/menu-lateral/{porcentaje}", function ($porcentaje)
{
   return view('menu_lateral.MenuIzquierdoCensoSIPESM', [
	   'porcentaje' => $porcentaje
   ]);
});
/*
|--------------------------------------------------------------------------
|                            mudulo talento humano
|
*/



Route::middleware(['Autorizar:1'])->group(function () {
	// ingresar informacion empleado, solo por univa ves 
    Route::get('/Inicio/Talento-humano/Personal', 'FamiliaController@miembros_familia')->name('vivienda.store'); 
    Route::post('/Inicio/Talento-humano/Personal', 'FamiliaController@create_personal')->name('Talento-humano.Personal.store');
    Route::post('/Inicio/Talento-humano/Personal/validar-existencia', 'FamiliaController@validarExistenciaPersona')->name('Talento-humano.Personal.store');
   // informacion de  registrado 50%
    Route::get('/Inicio/Talento-humano/{id_familia}/Informacion', 'PersonasController@index')->name('Talento-humano.Informacion');
   //Route::get('/{id_familia}/Informacion', 'PersonasController@index')->name('Inicio.Talento-humano.censo');
   //Route::get('/Inicio/Personal-en-proceso', 'PersonasController@persol_enpreceso');
    Route::post('/Talento-humano/{id_familia}/verificar-estado', 'PersonasController@verificarEstadoCenso')->name('Inicio.Talento-humano.verificar');
   //registro informacion personal empleado// informacion personal
    Route::get('/Inicio/Talento-humano/Informacion/{id_persona}', 'PersonasController@show')->name('vivienda.mimbros.censo.persona');  
    Route::post('/Inicio/Talento-humano/Informacion/{id_persona}', 'PersonasController@store')->name('vivienda.mimbros.censo.persona.store');
	// municipio de expedicion del documento 
	Route::get('get-municipioexpe-list','PersonasController@getmunicipioexpe');
	//direccion municipio del empleado js
	Route::get('/get-municipio-lists','PersonasController@getmunicipio_direccion');
	//Modulos De la Educación de las personas
    Route::get('/Inicio/Talento-humano/Informacion/{id_persona}/educacion-formal', 'EducacionFormalController@index');
	Route::post('/Inicio/Talento-humano/Informacion/{id_persona}/educacion-formal', 'EducacionFormalController@store');
	Route::delete('/Inicio/Talento-humano/Informacion/{id_persona}/educacion-formal', 'EducacionFormalController@destroy');
    Route::get('/educacion-formal/consultarmunicipios/{id_departamento}','EducacionFormalController@ConsultarMunicipios');
	Route::get('/educacion-formal/consultarcolegios/{id_municipio}','EducacionFormalController@ConsultarColegios');
	Route::get('/educacion-formal/consultarsedes/{id_colegio}','EducacionFormalController@ConsultarSedes');
	Route::get('/educacion-formal/consultartiposeducacion/{id_sede}','EducacionFormalController@ConsultarTiposEducacion');
	//Modulos Informativo del personal  certificado
	Route::get('/Inicio/Talento-humano/Informacion/{id_persona}/resumen', 'PersonasController@resumen_censo');
     // actualizar  informacion persona  e informacion superior 
	 Route::get('/Inicio/Talento-humano/{id}/actualizar','PersonasController@vista_actualizacion_informacion_persona');
	Route::post('/Inicio/Talento-humano/{id}/actualizar','PersonasController@update_informacion_persona');
	Route::post('Inicio/Talento-humano/{id}/educacion-superior','PersonasController@update_educacion_superior');
	 //Mudulo contratacio, documento contrato 
	////// Contrataciones   
    Route::get('/contratos/{id_persona}','ContratosController@contros_index');
    Route::post('/contratos/{id_persona}', 'ContratosController@storecontratos')->name('contrato.store');
    Route::get('/get-categoria_item-list','ContratosController@getcategoria_item');
    Route::get('/get-genmunicipioie-list','ContratosController@genmunicipioie');
	Route::get('/get-getresguardo-direccion-list','ContratosController@getresguardo_direccion');
	Route::get('/get-getinstitucio_educativa-list','ContratosController@getinstitucio_educativa');
    Route::get('/get-getsede_institucion-list','ContratosController@getsede_institucion');
	//// Nudulos  contrataciones  
});

	 /*
|--------------------------------------------------------------------------
|               MODULO CONTRATACIONES   , INGRESAR CONTRATO CUANDO
                EL PERSONAL ESTA REGISTRADO EN SISTEMA   
*/

Route::middleware(['Autorizar:2'])->group(function () {
    Route::get('/Cunsultas-Personal','ContratosController@vista_contratos_personal_ingresado')->name('Actualizacion-datos');
	Route::post('/Cunsultas-Personal', 'ContratosController@consulta_persona_contrato');
	//Route::post('/Actualizacion-informacion-general/{id}/actualizar','PersonasController@update');
  
    Route::get('/Contratos-Empleado/{id}','ContratosController@interfas_contratos_empleado');
    Route::get('/descargar-contrato/{id_persona}','ContratosController@descargarContrato');
	Route::get('/verdocumento/{id_persona}','ContratosController@verdocumento');
    Route::get('/ver_info_contrato/{id_persona}','ContratosController@ver_info_contrato');
	//modulo actualizar contrato. 
	Route::post('Actualizar-Contrato/{id_persona}','ContratosController@updatecontratos');
	Route::get('Actualizar-Contrato/{id_persona}','ContratosController@actualizar_contrato');

});

	 /*
|--------------------------------------------------------------------------
|               MODULO  HOJA DE VIDA, PERSONAL  TALENTO HUMANO - ESPIRAL EDUCACION 
*/
Route::middleware(['Autorizar:3'])->group(function () {


	Route::get('/Hoja-Vida','HojaVidaController@menu_hoja_vida');
    Route::post('/Hoja-Vida', 'HojaVidaController@consulta_personal');

    Route::get('/Hoja-Vida/{id_persona}/Informacion','HojaVidaController@actualizar_datos_personales');


	
});





	


	 

 


 




   
 // Seleccion de departamentos  por js
  Route::get('get-categoria_trabajo-list','PersonasController@getcategoria_trabajo');
  
  Route::get('get-municipio_lugar_trabajo-list','PersonasController@getmunicipio_lugar_trabajo');
  Route::get('get-nombre-instituciono-list','PersonasController@getnombre_institucion');
  Route::get('get-tipo-institucion-list','PersonasController@getnombre_tipo_institucion');
  Route::get('get-sede_institucion-list','PersonasController@getnombre_sede_institucion');
  //Route::get('/get-municipio-lists','PersonasController@getmunicipio');





	

	
	



	Route::get('/Inicio/Talento-humano/{id_familia}/certificado-censo','PersonasController@certificado_censo')->name('certificado-Censo');
	Route::post('/consultar-vivienda-persona','PersonasController@consultar_vivienda_persona')->name('persona.vivienda');

	/// actualizacion de datos 

	//Modulo de actualizacion de datos
	/*Route::post('/Actualizacion-informacion-general', 'PersonasController@actualizar_informacion_general_persona');
	Route::post('/Actualizacion-informacion-general/{id}/actualizar','PersonasController@update');
	Route::post('/Actualizacion-informacion-general/{id}/educacion-superior','PersonasController@update_educacion_superior');
	Route::get('/Actualizacion-informacion-general/{id}/actualizar','PersonasController@vista_actualizacion_datos_personales');
	Route::get('/Actualizacion-informacion-general','PersonasController@vista_consulta_actualizacion_general')->name('Actualizacion-datos');
	*/
	/// 
	// actualizar direccion
	//Route::post('/Actualizacion-informacion-general/{id}/actualizar-direcion','PersonasController@update_direcion');
	//Route::get('/Actualizacion-informacion-general/{id}/actualizar-direcion','PersonasController@vista_actualizacion_direcion');
	

	// actualizar informacion contrato 
	Route::post('/Actualizacion-informacion-general/{id}/actualizar-info-contrato','PersonasController@update_info_contrato');
	Route::get('/Actualizacion-informacion-general/{id}/actualizar-info-contrato','PersonasController@vista_actualizacion_info_contrato');
	
	//// actualizacion hoja de vida 


//Route::post('/Actualizacion-informacion-general/{id}/actualizar-hoja_vida','PersonasController@update_hoja_vida');
//Route::get('/Actualizacion-informacion-general/{id}/actualizar-hoja_vida','PersonasController@vista_actualizacion_hoja_vida');
// actualizar segurida_entrabajo

//Route::post('/Actualizacion-informacion-general/{id}/actualizar-seguridad_trabajo','PersonasController@update_seguridad_trabajo');
//Route::get('/Actualizacion-informacion-general/{id}/actualizar-seguridad_trabajo','PersonasController@vista_actualizacion_seguridad_trabajo');








	///////////////
	/// 
	// actualizar  direccion trabajo 
	//Route::post('/Actualizacion-informacion-general/{id}/actualizar-direccion-trabajo','PersonasController@update_direccion_trabajo');
	//Route::get('/Actualizacion-informacion-general/{id}/actualizar-direccion-trabajo','PersonasController@vista_actualizacion_direccion_trabajo');
	
	
	
	///////////////
	Route::get('/descargar-documento/{id_persona}','PersonasController@descargarDocumento');
    
	Route::get('get-categoria_trabajo-list','PersonasController@getcategoria_trabajoActualizar');
	Route::get('get-municipio_lugar_trabajo-list','PersonasController@getmunicipio_lugar_trabajoactualizar');
	Route::get('get-nombre-instituciono-list','PersonasController@getnombre_institucionactualizar');
    Route::get('get-tipo-institucion-list','PersonasController@getnombre_tipo_institucionMisak');
	Route::get('get-sede_institucion-list','PersonasController@getnombre_sede_institucionactualizar');
	
	//Modulo CONSULTAR
	Route::post('/Informacion-Persona', 'PersonasController@buscar_informacion_general_persona');
Route::get('/Informacion-Persona/{id}','PersonasController@vista_informacion_total_personales')->name('Informacion-Persona');
Route::get('Informacion-Persona','PersonasController@interfas_cunsulta_persona')->name('Informacion-Persona');
Route::get('informacion_talento_humano/{id_persona}','PersonasController@informacion_talento_humano')->name('informacion_talento_humano');





Route::middleware(['Autorizar:4'])->group(function () {
	//Modulo de novedad contrato 
	Route::get('Menu-Novedad','InterfacesController@vista_interfas_menu_novedad')->name('Menu-Novedad');
	// buscar persona fallecida 
	Route::get('Buscar-Persona-Fallecido/{documento}', 'NovedadController@showFallecido');
	Route::get('Buscar-Persona-Fallecido','NovedadController@indexFallecido')->name('Buscar-Persona-Fallecido');

	/// retiro  persona  fallecida 
	Route::get('Novedad-Persona-Fallecido/{id_persona}','NovedadController@viewNovedadFallecido')->name('Novedad-Persona-Fallecido');
	Route::post('/Novedad-Persona-Fallecido','NovedadController@storeFallecido');
	/// buscar retiro del censo, por traslado. 
	Route::get('Buscar-Persona-Retirar/{id_persona}', 'NovedadController@showRetirado');
	Route::get('Buscar-Persona-Retirar','NovedadController@indexRetirado')->name('Buscar-Persona-Retirar');
	Route::get('Novedad-Persona-Retirada/{id_persona}','NovedadController@viewNovedadRetirado')->name('Retiro-Censo-Poblacional');
	Route::post('/Novedad-Persona-Retirado','NovedadController@storeRetirado');
	
});

 



Route::get('Vivienda-Hogar_persona/{id_persona}','DireccionViviendaHogarController@direccion_Hogar_Vivienda_persona')->name('Vivienda-Hogar_persona');
Route::get('get-municipio-list','DireccionViviendaHogarController@getmunicipio');
Route::get('get-resguardo-list','DireccionViviendaHogarController@getresguardo');
Route::get('get-zona-list','DireccionViviendaHogarController@getzona');
Route::get('get-vereda-list','DireccionViviendaHogarController@getvereda');
Route::get('get-sector-list','DireccionViviendaHogarController@getsector');

/*

|--------------------------------------------------------------------------
|                            CENSO HOGAR    
|
*/


/*
|--------------------------------------------------------------------------
|                        CENSO    PERSONAS DENTRO DE LA FAMILIA  Misak     
|
*/

Route::get('Personas', function () {
    return view('interfaces.personas');
});



 /*
|--------------------------------------------------------------------------
|                               MENU DE certificados  
*/
/*
Route::middleware(['Autorizar:2'])->group(function () {

	Route::get('Menu-Reportes','InterfacesController@vista_menu_reporte')->name('Menu-Reportes');
	Route::get('Reportes-Personas','InterfacesController@vista_reportes_personas')->name('Reportes-Personas');
	route::resource('Reportes-Personas','ReportesController');
	Route::post('/Informacion-hogar', 'PersonasController@buscar_informacion_persona');
	Route::get('Censo-general','InterfacesController@vista_censoGeneralVigencia')->name('Censo-general');
	//Route::any('Censo_general', 'InformacionCensoControlador@consulta_censo_ministerio');
	Route::get('Censo_general/download', 'PersonasController@descargar_reporte_censo');
	Route::get('Listado-personas-retirados','InterfacesController@vista_censoRetirados')->name('Listado-personas-retirados');
	Route::get('Listado-personas-fallecidos','InterfacesController@vista_censoFallecidos')->name('Listado-personas-fallecidos');
	Route::get('Buscar-Persona','PersonasController@interfas_cunsulta_persona_certificado')->name('Buscar-Persona');
	Route::get('Certificados-Laborales','PersonasController@interfas_cetificado_laboral')->name('Certificado-Laboral');
	Route::get('Certificados-Laborales/{id_persona}','PersonasController@interfas_certificados_laborales')->name ('Certificados-Laborales');

}); */
   


/*
|--------------------------------------------------------------------------
|                              VISTA  ACTUALIZACION MENU 
*/







/*
|--------------------------------------------------------------------------
|                            
*/
Route::middleware(['Autorizar:3'])->group(function () {
	
	
																																				
	
});
/*
|--------------------------------------------------------------------------
|                              MODULO DOCENTES OFICIALES 
*/
Route::middleware(['Autorizar:5'])->group(function () {
	
Route::get('/Docentes-Oficiales','PersonasController@interfas_ingresar_docentes_oficiales');

////////
Route::get('/Docentes-Oficiales','FamiliaController@index_docentes_oficiales')->name('vivienda.familia');
Route::post('/Docentes-Oficiales','FamiliaController@store')->name('vivienda.familia.store');
Route::get('/Docentes-Oficiales/{id_hogar}','FamiliaController@indexById')->name('vivienda.familia');


	// Modulo ingresar informacion persona  docente oficial 
	Route::get('/Docentes-Oficiales/Talento-humano/{id_familia}/Personal', 'FamiliaController@informacionDocentes1')->name('Talento-humano.Personal');
	Route::post('/Docentes-Oficiales/Talento-humano/{id_familia}/Personal', 'FamiliaController@create_grupo_familiar')->name('Talento-humano.Personal.store');
	Route::post('/Docentes-Oficiales/Talento-humano/{id_familia}/Personal/validar-existencia', 'FamiliaController@validarExistenciaPersona')->name('Talento-humano.Personal.store');
	
	
	////personas 

	//Modulo   de personas ingresados = informacion personal 
	//Route::get('/Inicio/Personal-en-proceso', 'PersonasController@persol_enpreceso');
      /////
	Route::get('/Docentes-Oficiales/Talento-humano/{id_familia}/Informacion-docentes', 'PersonasController@index_docentes')->name('Talento-humano.censo');
	Route::post('/Docentes-Oficiales/Talento-humano/{id_familia}/Informacion-docentes', 'PersonasController@verificarEstadoCenso')->name('Inicio.Talento-humano.verificar');
	////
 
	Route::get('/Docentes-Oficiales/Talento-humano/{id_familia}/Informaciones/{id_persona}', 'PersonasController@show_docentes')->name('vivienda.familia.mimbros.censo.persona');
	Route::post('/Docentes-Oficiales/Talento-humano/{id_familia}/Informaciones/{id_persona}', 'PersonasController@store_docentes_oficales')->name('vivienda.familia.mimbros.censo.persona.store');
	
	 
	//Modulos De la Educación de las personas
	Route::get('/Docentes-Oficiales/Talento-humano/{id_familia}/Informaciones/{id_persona}/educacion-formal-Docentes-Oficiales', 'EducacionFormalController@index_oficiales');
	Route::post('/Docentes-Oficiales/Talento-humano/{id_familia}/Informaciones/{id_persona}/educacion-formal-Docentes-Oficiales', 'EducacionFormalController@store__oficiales');
	Route::delete('Docentes-Oficiales/Talento-humano/{id_familia}/Informaciones/{id_persona}/educacion-formal-Docentes-Oficiales', 'EducacionFormalController@destroy_oficial');
	Route::get('/educacion-formal/consultarmunicipios/{id_departamento}','EducacionFormalController@ConsultarMunicipios');
	Route::get('/educacion-formal/consultarcolegios/{id_municipio}','EducacionFormalController@ConsultarColegios');
	Route::get('/educacion-formal/consultarsedes/{id_colegio}','EducacionFormalController@ConsultarSedes');
	Route::get('/educacion-formal/consultartiposeducacion/{id_sede}','EducacionFormalController@ConsultarTiposEducacion');
	Route::get('/Docentes-Oficiales/Talento-humano/{id_familia}/Informaciones/{id_persona}/resumen-docente-oficiales', 'PersonasController@resumen_docente_actualizado');

});



   	/*
|--------------------------------------------------------------------------
|                      

       ///ACTUALIZACION  DATOS TALENTO HUMANO 
 	//Modulo de actualizacion de datos 
*/

Route::middleware(['Autorizar:7'])->group(function () {
	
Route::get('/Menu-contratos', function () {
    return view('consultas.buscar_contrato_laborar');
 });

 Route::post('/Consultar_Contratos', 'PersonasController@buscar_informacion_general_persona');
 Route::get('/Informacion-Persona/{id}','PersonasController@vista_informacion_total_personales')->name('Informacion-Persona');
 
 Route::get('/Consultar_Contratos', function () {
    return view('consultas.buscar_contrato_info');
 });
 Route::get('/descargar-documento/{id_persona}','PersonasController@descargarDocumento');
 Route::get('/Descargar-contratos/{id}','PersonasController@interfas_contratos');
 Route::get('/descargar-actas/{id_persona}','PersonasController@descargarDocumentos');

       ///ACTUALIZACION  DATOS TALENTO HUMANO  MODULO A UTILIZAR  PARA REALIZAR ESTUDIO DE NOMBRAMIENDO DOCENTE  OPERADOR GUAMBIA
 	//Modulo de actualizacion de datos
	Route::post('/Actualizacion-informacion-talento-humano', 'PersonasController@BuscarCC_informacion_general_persona');
	 Route::get('/Actualizacion-informacion-talento-humano','PersonasController@vista_consultaCCTalentoHumano')->name('Actualizacion-datos');
 
            ///actualizar informacion 
	 Route::post('/Actualizacion-informacion-general/{id}/actualizar','PersonasController@update_talento_humano');

	 Route::post('/Actualizacion-informacion-general/{id}/educacion-superior','PersonasController@update_educacion_superior_talento_humano'); 
	 Route::get('/Actualizacion-informacion-general/{id}/actualizar','PersonasController@vista_actualizacion_datos_talento_humano');
	 
	 
	 Route::get('/descargar-documento/{id_persona}','PersonasController@descargarDocumento');
 
	//Modulos Informativos docente 
	//Route::get('/Actualizacion-informacion-general/{id_persona}/resumen-docente', 'PersonasController@resumen_docente_actualizado');

	//Modulo CONSULTAR informacion talento humano
	Route::post('/Informacion_talento_humano', 'PersonasController@BuscarCC_informacion_general_persona_talento_humano');
	Route::get('/Informacion_talento_humano','PersonasController@vista_consultaTalentoHumano')->name('Actualizacion-datos');
	Route::get('/Informacion_talento_humano/{id}/informacion_registrado','PersonasController@informacion_personal_talento_humano');
	





	// Route::get('Hogar','InterfacesController@interfas_hogar')->name ('Hogar');
Route::POST('Vivienda-Hogar/Guardado', 'HogarController@create_hogar');
Route::get('get-municipio-list','DireccionHogarController@getmunicipio');
Route::get('get-resguardo-list','DireccionHogarController@getresguardo');
Route::get('get-zona-list','DireccionHogarController@getzona');
Route::get('get-vereda-list','DireccionHogarController@getvereda');
Route::get('get-sector-list','DireccionHogarController@getsector');
//Route::get('get-municipioexpe-list','FamiliaController@getmunicipioexpe');
Route::get('get-municipio_lugar_trabajo-list','PersonasController@getmunicipio_lugar_trabajo');
Route::get('get-nombre-instituciono-list','PersonasController@getnombre_institucion');
Route::get('get-tipo-institucion-list','PersonasController@getnombre_tipo_institucion');
Route::get('get-sede_institucion-list','PersonasController@getnombre_sede_institucion');
//Route::get('/get-municipio-lists','PersonasController@getmunicipio');
Route::get('/educacion-formal/consultarmunicipios/{id_departamento}','EducacionFormalController@ConsultarMunicipios');
	Route::get('/educacion-formal/consultarcolegios/{id_municipio}','EducacionFormalController@ConsultarColegios');
	Route::get('/educacion-formal/consultarsedes/{id_colegio}','EducacionFormalController@ConsultarSedes');
	Route::get('/educacion-formal/consultartiposeducacion/{id_sede}','EducacionFormalController@ConsultarTiposEducacion');

  Route::get('get-nombre_desempeno-list','PersonasController@getarea_desempeno');


  Route::get('actualizacion-hoja-vida','PersonasController@actualizacion_doc');

  Route::get('actualizacion-hoja-vida/{id}/documentos','PersonasController@actualizacion_doc_hoja_vida');

  Route::get('actualizacion-hoja-vida/{id}/documentos-hoja-vida','PersonasController@actualizacion_hoja_vida');


});



   	/*
|--------------------------------------------------------------------------
|                       VISTA  MENU   ADMINISTRADOR    
*/
Route::middleware(['Autorizar:6'])->group(function () {
	Route::get('/Menu-administrador','InterfacesController@Vista_interfas_menuAdminsitrador')->name('Menu-administrador');
	Route::get('/Validacion','NovedadController@viewSolicitudes')->name('Validacion');
	Route::get('/estadistica-censo','EstadisticaController@index')->name('estadistica');
	
	Route::get('/cambiar-estado-solicitud/{id_novedad}','NovedadController@cambiarEstadoSolicitud');
	Route::get('/descargar-acta/{id_novedad}','NovedadController@descargarActa');
	
	
	//Users
	Route::POST('users', 'UserController@store')->name('Ingresar_Usuarios.create');
	Route::get('Menu-Usuarios', 'UserController@index')->name('users.index');
	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

	///firma sertificados por


});





});