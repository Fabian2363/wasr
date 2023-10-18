<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Personas;
use App\info_persona;
use App\sector;
use App\educacion_superior;

class BuscarPersonaFallecidaController extends Controller
{
    public function persona_fallecida_buscar(){   
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
          return view ( 'novedad_retiro.buscar_persona_fallecido',compact('Personas'))->withDetails ( $Personas)->withQuery ( $q );
          else
          
          return view ( 'novedad_retiro.buscar_persona_fallecido' )->withMessage ( '¡La persona no se encuentra en el censo Poblaciona Misak!!' );
   }
}
