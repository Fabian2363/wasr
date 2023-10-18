<?php

namespace App\Http\Controllers;
use\App\escuelacolegio;
use Illuminate\Http\Request;

class EducacionPersonaController extends Controller
{
    ///
    
    function create_educacion_escuale_colegio(Request $data){
        //try {
            $user = new  escuelacolegio();
            $user->codigo_tipo = $data['codigo_tipo'];
            $user->info_persona_id = $data['info_persona_id'];
            $user->estado = $data['estado'];
            $user->modalidad_colegio = $data['modalidad_colegio'];
            $user->año_educacion1 = $data['año_educacion1'];
            $user->persona_id  = $data['persona_id'];
        
            $user->save();
            return ['validate'=>true,'persona_id'=>$user->persona_id];
            //code...
       // } catch (\Throwable $th) {
           // return ['validate'=>false];
        //}
    }
}
