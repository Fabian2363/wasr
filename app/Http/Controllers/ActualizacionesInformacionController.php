<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\User;
use App\Personas;
use App\info_persona;
use App\sector;
use App\educacion_superior;
class ActualizacionesInformacionController extends Controller
{
    public function actualizar_informacion_general_persona(){   
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
           return view ( 'actualizaciones_censo.actualizacion',compact('Personas'))->withDetails ( $Personas)->withQuery ( $q );
           else
           
           return view ( 'actualizaciones_censo.actualizacion' )->withMessage ( '¡La persona no se encuentra en el censo Poblaciona Misak!!' );
    }

                  
            



     
    
}
