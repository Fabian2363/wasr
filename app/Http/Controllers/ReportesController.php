<?php

namespace App\Http\Controllers;
use App\Personas;
use App\hogar;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index()
    {
        
        $pastel = hogar::
                  select('hogar_p.numero_dormitorio','personas.sexo')
                  
                  ->join('personas', 'personas.hogar_id', '=', 'hogar_p.id') ->get();
                  
                  

             return view('reportes.reportes_personas',['pastel'=>$pastel]);


        

    }
}
