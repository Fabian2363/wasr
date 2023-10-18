<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
class ConsultaHogarController extends Controller
{
    public function consulta_infomacion_hogar_persona()
    {    $q = Input::get ( 'q' );
    	$Personas = DB:: table('info_persona')
        
         ->join('personas', 'info_persona.persona_id', '=', 'personas.id')
         ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
         ->join('sector', 'hogar_p.codigo_sector', '=', 'sector.codigo_sector')
         ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
    	->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
    	->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
    	->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
    	->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
        ->where ('hogar_p.id', 'LIKE', '%'  . $q . '%' )->get ();
        
         // ->where ( 'hogar_p.id', 'LIKE', '%' . $q . '%' )->orWhere ( 'personas.docomento_persona', 'LIKE', '%' . $q . '%' )->get ();
         if (count ( $Personas) > 0)
           return view ( 'consultas.informacion_hogar' )->withDetails ( $Personas)->withQuery ( $q );
           else
           
           return view ( 'consultas.informacion_hogar' )->withMessage ( 'Error codigo de hogar.' );
    }
}
