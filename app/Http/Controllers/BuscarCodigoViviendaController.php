<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\economia_familia ;
Use App\comidas_propias;
Use App\plancondiaroma ;
Use App\plantaAromaticas;  
Use App\plantaMedicinal;  

Use App\plantaNutricional;  
Use App\plantaEspirituales;

use DB;
class BuscarCodigoViviendaController extends Controller
{
    public function buscar_codigo_vivienda(){   
        
        $q = Input::get ( 'q' );
       $Personas = DB:: table('personas')
    
        ->where ('personas.docomento_persona', 'LIKE', '%' . $q . '%' )->get ();
        if (count ( $Personas) > 0)
          return view ( 'interfaces.hogar',compact('Personas'))->withDetails ( $Personas)->withQuery ( $q );
          else
          
          return view ( 'interfaces.hogar' )->withMessage ( '¡La persona no se encuentra en el censo Poblaciona Misak!!' );
   }

}
