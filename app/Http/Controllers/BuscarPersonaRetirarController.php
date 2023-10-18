<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use DB;

class BuscarPersonaRetirarController extends Controller
{
    public function buscar_persona_retirar(){   
        $q = Input::get ( 'q' );
       $Personas = DB:: table('info_persona')
       
        ->join('personas', 'info_persona.persona_id', '=', 'personas.id')
        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('sector', 'hogar_p.codigo_sector', '=', 'sector.codigo_sector')
        ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
       ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
       ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
       ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
       ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
        ->where ('personas.docomento_persona', 'LIKE', '%' . $q . '%' )->get ();
        if (count ( $Personas) > 0)
          return view ( 'novedad_retiro.buscar_persona_retiro',compact('Personas'))->withDetails ( $Personas)->withQuery ( $q );
          else
          
          return view ( 'novedad_retiro.buscar_persona_retiro' )->withMessage ( '¡La persona no se encuentra en el censo Poblaciona Misak!!' );
   }
}
