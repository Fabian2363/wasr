<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Personas;
use App\sector;
use App\educacion_superior;
use App\escuelacolegio;
use DB;



class InformacionGeneralController extends Controller
{
     

    public function consulta_infomacion_general_persona ()
    {    $q = Input::get ( 'q' );
         $Personas = DB:: table('escuelacolegio')

        
         
         
         ->join('tipoe', 'escuelacolegio.codigo_tipo', '=', 'tipoe.codigo_tipo')
         ->join('sede', 'tipoe.codigo_sede', '=', 'sede.codigo_sede')
         ->join('colegio', 'sede.codigo_colegio', '=', 'colegio.codigo_colegio')
         ->join('municipioColegio', 'colegio.codigo_muni', '=', 'municipioColegio.codigo_muni')
         ->join('info_persona', 'escuelacolegio.info_persona_id', '=', 'info_persona.id')
         ->join('personas', 'info_persona.persona_id', '=', 'personas.id')
       //  ->join('info_persona as com', 'educacion_superior.documento_id', '=', 'com.id')

         ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
         ->join('sector', 'hogar_p.codigo_sector', '=', 'sector.codigo_sector')
         ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
      	->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
     	->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
     	->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
     	->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
         ->where ( 'personas.docomento_persona', 'LIKE', '%' . $q . '%' )->get ();
         if (count ( $Personas) > 0)
           return view ( 'consultas.informacion_persona' )->withDetails ( $Personas)->withQuery ( $q );
           else
           
           return view ( 'consultas.informacion_persona' )->withMessage ( '¡La persona no se encuentra en el Censo Poblacional SIPEMP!!' );
    }

}