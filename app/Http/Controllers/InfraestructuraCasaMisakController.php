<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InfraestructuraCasaMisakController extends Controller
{
    public function  material_paredes()
    {

        $material_paredes = DB::table("material_paredes")->pluck("nombre","id");
        $material_cocina = DB::table("material_cocina")->pluck("nombre","id");
        $material_piso = DB::table("material_piso")->pluck("nombre","id"); 
        $material_techo = DB::table("material_techo")->pluck("nombre","id"); 
        $suministro_agua = DB::table("suministro_agua")->pluck("tipo_suministro","id"); 
        $servicio_energia = DB::table("servicio_energia")->pluck("tipo_servicio","id"); 
        $servicio_sanitario = DB::table("servicio_sanitario")->pluck("nombre_servicio","id"); 

       // return view('interfaces.hogar',compact('departamento','id_vivienda'));
       return view('interfaces.vivienda',compact('material_paredes','material_cocina','material_piso','material_techo','suministro_agua','servicio_energia','servicio_sanitario'));
    }

}
