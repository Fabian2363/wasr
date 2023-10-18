<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
class consultaviviendacontroller extends Controller
{
    public function consulta_infomacion_vivienda_persona()
    {    $q = Input::get ( 'q' );
    	$Personas = DB:: table('info_persona')
        
        //->join('vivienda', 'hogar_p.vivienda_id', '=', 'vivienda.id')

         ->join('personas', 'info_persona.persona_id', '=', 'personas.id')
         ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
         ->join('vivienda', 'hogar_p.vivienda_id', '=', 'vivienda.id')
         ->join('servicio_energia', 'vivienda.servicio_energia_id', '=', 'servicio_energia.id')
         ->join('servicio_sanitario', 'vivienda.servicio_sanitario_id', '=', 'servicio_sanitario.id')
         ->join('suministro_agua', 'vivienda.suministro_agua_id', '=', 'suministro_agua.id')
         ->join('material_cocina', 'vivienda.material_cocina_id', '=', 'material_cocina.id')
         ->join('material_techo', 'vivienda.material_techo_id', '=', 'material_techo.id')
         ->join('material_paredes', 'vivienda.material_paredes_id', '=', 'material_paredes.id')
         ->join('material_piso', 'vivienda.material_piso_id', '=', 'material_piso.id')
         ->join('sector', 'hogar_p.codigo_sector', '=', 'sector.codigo_sector')
         ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
    	 ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
    	 ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
    	 ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
    	 ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
        ->where ('personas.docomento_persona', 'LIKE', '%'  . $q . '%' )->get ();
        
         // ->where ( 'hogar_p.id', 'LIKE', '%' . $q . '%' )->orWhere ( 'personas.docomento_persona', 'LIKE', '%' . $q . '%' )->get ();
         if (count ( $Personas) > 0)
           return view ( 'consultas.informacion_vivienda' )->withDetails ( $Personas)->withQuery ( $q );
           else
           
           return view ( 'consultas.informacion_vivienda' )->withMessage ( '!El habitante no tiene Vivenda Dentro del Territorio' );
    }
}
