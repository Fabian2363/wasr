<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\economia_familia ;
Use App\comidas_propias;
Use App\plancondiaroma ;
Use App\plantaAromaticas;  
Use App\plantaMedicinal;  

Use App\plantaNutricional;  
Use App\plantaEspirituales;
use  App\vivienda;
class DireccionViviendaHogarController extends Controller
{
    public function direccion_Hogar_Vivienda_persona($id_persona)
        {
           // try{
                  $departamento = DB::table("departamento")->pluck("nombre_depatamento","codigo_departamento");
                     ///leer los datos comidad propias y economia  de la familia misak, desde BD  tabla  comidas propias y tabla economia misak 
                   
                   //codigo del hogar
                    $id_vivienda = vivienda::findOrFail($id_persona);
                    $economia  = economia_familia::get();
                    $comida  = comidas_propias::get();
                    $plancondiaroma  =  plancondiaroma::get();
                    $plantaAromaticas  =  plantaAromaticas::get();
                    $plantaMedicinal  =  plantaMedicinal::get(); 
                    $plantaNutricional  =  plantaNutricional::get();
                    $plantaEspirituales =  plantaEspirituales::get();
                 return view('interfaces.familia',compact('departamento','id_vivienda','economia','comida','plancondiaroma','plantaAromaticas','plantaMedicinal','plantaNutricional','plantaEspirituales'));
                  //variables  de la tabalas, deprtamento, economia, comida
               // return view('interfaces.hogar_persona',compact('departamento','id_vivienda','economia','comida','plancondiaroma','plantaAromaticas','plantaMedicinal','plantaNutricional','plantaEspirituales'));
              
                
            //} catch(\Throwable $ht)
           // {
                ['validate'=>false];
            //}
        }



        public function getmunicipio(Request $request)

        {

            $municipio = DB::table("municipio")

            ->where("codigo_departamento",$request->codigo_departamento)

            ->pluck("nombre_municipio","codigo_municipio");

            return response()->json($municipio);

        }



        public function getresguardo(Request $request)

        {

            $resguardo = DB::table("resguardo")

            ->where("codigo_municipio",$request->codigo_municipio)

            ->pluck("nombre_reguardo","codigo_resguardo");

            return response()->json($resguardo);

        }



        public function getzona(Request $request)                                                                                                                                   

        {

            $zona = DB::table("zona")

            ->where("codigo_resguardo",$request->codigo_resguardo)

            ->pluck("nombre_zona","codigo_zona");

            return response()->json($zona);

        }



        public function getvereda(Request $request)

        {

            $vereda = DB::table("vereda")

            ->where("codigo_zona",$request->codigo_zona)

            ->pluck("nombre_vereda","codigo_vereda");

            return response()->json($vereda);

        }



         public function getsector(Request $request)

        {

            $sector = DB::table("sector")

            ->where("codigo_vereda",$request->codigo_vereda)

            ->pluck("nombre_sector","codigo_sector");

            return response()->json($sector);

        }
}

