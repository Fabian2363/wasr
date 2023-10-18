<?php

namespace App\Http\Controllers;
use App\hogar;
use App\Personas;

use App\economia_familia ;

use Illuminate\Http\Request;
use DB;
//use Request;
class HogarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    function create_hogar(Request $data){
        $user = new  hogar();
        $user->vivienda_id = $data['vivienda_id'];
        $user->codigo_sector = $data['codigo_sector'];
        $user->total_personas_hogar = $data['total_personas_hogar'];
        $user->numero_dormitorio  = $data['numero_dormitorio'];
        $user->dormitorio_usado = $data['dormitorio_usado'];
        $user->donde_preparan_alimento = $data['donde_preparan_alimento'];
        $user->num_personas_estudiando  = $data['num_personas_estudiando'];
        $user->forta_educacion_propia = $data['forta_educacion_propia'];
        $user->gustar_edu_propia = $data['gustar_edu_propia'];
        $user->calidad_ie_guambia = $data['calidad_ie_guambia'];
        $user->debilidades_ie_guambia = $data['debilidades_ie_guambia'];
        $user->hijos_estudiando_guambia = $data['hijos_estudiando_guambia'];
        $user->no_estudia_guambia = $data['no_estudia_guambia'];
        $user->deserción_guambia = $data['deserción_guambia'];
        $user->tiempo_comida_propia = $data['tiempo_comida_propia'];
        $user->alimenta_producto_propio = $data['alimenta_producto_propio'];
        $user->aliemnta_semillas_propio = $data['aliemnta_semillas_propio'];
        $user->aliemnta_cultivos_propios = $data['aliemnta_cultivos_propios'];
        $user->rituales_armonizacion = $data['rituales_armonizacion'];
        $user->tiempo_rituales = $data['tiempo_rituales'];
        
        





        $user->save();
        $user->id;
        //llamar tabla intermedio, muchos a muchos 
       /* foreach($economia->economia as $temp)
       {
        
            $economia = new economia_familia;
            $economia->hogar_id=$user->id;
            $economia->comidas_propias_id = $temp;
            $economia->save();
        
        }*/
        //return redirect()->route('interfaces.hogar');
       // return redirect()->route('interfaces.Ingresar_personas', ['id_Hogar' => $user->id]);
       return ['validate'=>true,'id'=>$user->id];
        //return view('interfaces.hogar');
    }
   

    function create_hogar_persona(Request $data){
        try {
            $user = new  hogar();
            $user->vivienda_id = $data['vivienda_id'];
            $user->codigo_sector = $data['codigo_sector'];
            
            $user->total_personas_hogar = $data['total_personas_hogar'];
            $user->numero_dormitorio  = $data['numero_dormitorio'];
            $user->dormitorio_usado = $data['dormitorio_usado'];
            $user->donde_preparan_alimento = $data['donde_preparan_alimento'];
            $user->num_personas_estudiando  = $data['num_personas_estudiando'];
            $user->forta_educacion_propia = $data['forta_educacion_propia'];
            $user->gustar_edu_propia = $data['gustar_edu_propia'];
            $user->calidad_ie_guambia = $data['calidad_ie_guambia'];
            $user->debilidades_ie_guambia = $data['debilidades_ie_guambia'];
            $user->hijos_estudiando_guambia = $data['hijos_estudiando_guambia'];
            $user->no_estudia_guambia = $data['no_estudia_guambia'];
            $user->deserción_guambia = $data['deserción_guambia'];
            $user->tiempo_comida_propia = $data['tiempo_comida_propia'];
            $user->alimenta_producto_propio = $data['alimenta_producto_propio'];
            $user->aliemnta_semillas_propio = $data['aliemnta_semillas_propio'];
            $user->aliemnta_cultivos_propios = $data['aliemnta_cultivos_propios'];
            $user->rituales_armonizacion = $data['rituales_armonizacion'];
            $user->tiempo_rituales = $data['tiempo_rituales'];



            $user->save();
            return ['validate'=>true,'id'=>$user->id];
            //code...
        } catch (\Throwable $th) {
           return ['validate'=>false];
        }
    }
   




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function create(Request $request)
    {
        $data=Request::all();

        $vivienda = new hogar;

       
        $vivienda -> codigo_vivienda = $data["codigo_vivienda"];
        $vivienda -> codigo_sector = $data["codigo_sector"];
        $vivienda -> documento_cabeza_hogar = $data["documento_cabeza_hogar"];  
        $vivienda -> tipo_documento = $data["tipo_documento"];  
        $vivienda -> numero_dormitorio  = $data["numero_dormitorio"];  
        $vivienda -> donde_preparan_alimento = $data["donde_preparan_alimento"];  
        $vivienda -> total_personas_hogar = $data["total_personas_hogar"]; 
        $vivienda -> tipo_vivienda = $data["tipo_vivienda"];  
        $vivienda -> fecha_encuesta = $data["fecha_encuesta"]; 
        $vivienda -> fecha_actualizacion = $data["fecha_actualizacion"];  
        
       
        $resul = $vivienda->save();

        if ($resul)
            {
            
                return view("mensajes.msj_correcto")->with("msj","Informacion de la vivienda Guardado");   
             }  else
            {
              return back()->with("errormsj","Datos no Guardado");
		    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hogar  $hogar
     * @return \Illuminate\Http\Response
     */
    public function show(hogar $hogar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hogar  $hogar
     * @return \Illuminate\Http\Response
     */
    public function edit(hogar $hogar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hogar  $hogar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hogar $hogar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hogar  $hogar
     * @return \Illuminate\Http\Response
     */
    public function destroy(hogar $hogar)
    {
        //
    }
}
