<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\educacion_superior;

class EducacionSuperiorController extends Controller
{
    function create_educacion_superior1 (Request $data){
        //try {
            $user = new  educacion_superior();
            $user-> tipo_educacion_superior = $data['tipo_educacion_superior'];
            //$user->nombre_carrera = $data['nombre_carrera'];
            // $user->nombre_ies = $data['nombre_ies'];
            // $user->ciudad_ies = $data['ciudad_ies'];
           //$user->estado_actual = $data['estado_actual'];
            // $user->año_ingreso = $data['año_ingreso'];
             
           
            
            $user->save();
            return ['validate'=>true,'id'=>$user->id];
            //code...
       // } catch (\Throwable $th) {
           // return ['validate'=>false];
        //}
    }

    public function create_educacion_superior(Request $request)
    {
        $personas = $request->personas;
        foreach ($personas as $key => $data) 
        {           
            //$data=request::all();
            $hogar = new educacion_superior;
            //$hogar -> estado = $data["estado "];
            $hogar -> tipo_educacion_superior = $data['tipo_educacion_superior'];
            $hogar -> nombre_carrera = $data['nombre_carrera'];

           
            $hogar -> documento_id  = $data['documento_id'];
            $hogar-> persona_id = $data['persona_id'];
           
            
            $hogar->save();
        }
        if (true /*$resul*/)
        {
        
           //return view("mensajes.msj_correcto")->with("msj","Informacion de la vivienda Guardado");   
         return ['validate'=>true,'persona_id'=>$hogar->persona_id];
        
        }  else
        {
          return back()->with("errormsj","Datos no Guardado");
        }
    }
    
}
