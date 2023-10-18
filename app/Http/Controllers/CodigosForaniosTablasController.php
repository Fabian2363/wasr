<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\hogar;
use App\info_persona;
class CodigosForaniosTablasController extends Controller
{
    public function CodigoHogar($id)
        {
            
                $data = info_persona::findOrFail($id);
                return view('reportes.reporte_educacion_propia',compact('data'));
             
        }
}
