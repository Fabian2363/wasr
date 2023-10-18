<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Personas;
use App\info_persona;
use App\sector;
use App\educacion_superior;
use DB;



class InformacionCensoControlador extends Controller
{
     

    public function consulta_censo_ministerio ()
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
         ->where ( 'personas.fecha_censo', 'LIKE', '%' . $q . '%' )->get ();
         if (count ( $Personas) > 0)
           return view ( 'reportes.censo_general_vigencia' )->withDetails ( $Personas)->withQuery ( $q );
           else
           
           return view ( 'reportes.censo_general_vigencia' )->withMessage ( '¡Los datos    que desea exportar , no están registrados en sistema de información Poblacional Misak!!' );
    }

}