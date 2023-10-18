<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;
use App\info_persona;
class ColeEscueDireccionController extends Controller

{

        public function direccion_escue_cole($id_persona)

        {
            $id_hogar = info_persona::findOrFail($id_persona);
        // para leseccionar los municipios en la vista  
          $municipioColegio = DB::table("municipioColegio")->pluck("nombre_municipio","codigo_muni");
          //el codigo de persona para ver en vista educacion formal
          $datos = info_persona::findOrFail($id_persona);
            return view('interfaces.educacion_formal',compact('municipioColegio','datos','id_hogar'));

           
            

            //return view('interfaces.educacion_formal',compact('departamento'));

        }
 

           

       




        public function getcolegio(Request $request)

        {

            $colegio = DB::table("colegio")

            ->where("codigo_muni",$request->codigo_muni)

            ->pluck("nombre_colegio","codigo_colegio");

            return response()->json($colegio);

        }



        public function getsede(Request $request)

        {

            $sede = DB::table("sede")

            ->where("codigo_colegio",$request->codigo_colegio)

            ->pluck("nombre_sede","codigo_sede");

            return response()->json($sede);

        }



        public function gettipoE(Request $request)                                                                                                                                   

        {

            $tipoE = DB::table("tipoE")

            ->where("codigo_sede",$request->codigo_sede)

            ->pluck("tipo","codigo_tipo");

            return response()->json($tipoE);

        }
}

