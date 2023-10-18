<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\idiomas;
use App\info_persona;
use App\limitaciones_fisinas;
use App\Personas;
use App\contrato;
use App\archivo_file;
use App\tipo_contrato;
use App\tipo_dotacion;
use App\cajacompens;
use App\riesgo;
use App\eps;
use App\afp;
use App\item_canasta;
use App\categoria_item;
use App\departamento_institucion;
use App\municipio_institucion;
use App\resguardo_istitucion;
use App\institucio_educativa;
use App\sede_institucion;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class HojaVidaController extends Controller
{
    
    public function menu_hoja_vida(){



        return view('Hoja_Vida.menu_hoja_vida');
    } 
    public function consulta_personal(Request $request){
        
        if($request->ajax()){

            $persona = Personas::where([['documento_persona', $request->documento], ['estado_persona', 1], ['status', 1]])->first();

            if (isset($persona))
                return response()->json([
                    'status' => true,
                    'result' => $persona
                ]);
              else
                return response()->json([
                    'status' => false ,
                    'mensaje' => "La persona con este número de Identificación No está Registrado En Espiral de Educación."
                ]);

        }
    
   }
/// es el mismo codigo que se ecuentra en personascontroller , actualizar personas al momento de ingresar contratos
   public  function actualizar_datos_personales($id_persona)
   {
        $id_persona=($id_persona);
       // $id_persona=base64_decode($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");

        $idiomas  =  idiomas::get();
        $limitaciones_fisinas  =  limitaciones_fisinas::get();
       //$departamentos=\App\departamento::all();
      //  $tipo_vinculacion= DB::table("tipo_vinculacion")->pluck("nombre_vinculacion","id_vinvulacion");
        
      //  $departamento_expedicion= DB::table("departamento_expedicion")->pluck("departamento_expedicion","codigo_departamento_expe");
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        //$departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento");
        $datos = Personas::findOrFail($id_persona);
        $datosPersona=info_persona::where('persona_id',$id_persona)->first();
        $idiomasPersona=\App\info_persona_idiomas::where('info_persona_id',$datosPersona->id)->get('idiomas_id');
        $limitacionesPersona=\App\info_persona_limitaciones::where('info_persona_id',$datosPersona->id)->get('limitaciones_fisinas_id');
        $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
        'colegio.nombre_colegio','escuelacolegio.estado','escuelacolegio.año_educacion',
        'escuelacolegio.modalidad_colegio')

       // ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
        //->join('sede','tipoe.codigo_sede','sede.codigo_sede')
        ->join('colegio','colegio.codigo_colegio','escuelacolegio.colegio')
       // ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
        ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
        ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
        ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
        $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;
        $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();

           //$direccion_cc_expedicion1=\App\info_persona::select('municipio_expedicion.municipio_expedin','departamento_expedicion.departamento_expedicion')
       // ->join('municipio_expedicion', 'municipio_expedicion.codigo_municipio_expe', '=', 'info_persona.id_municipio_expedicion') 
        //->join('departamento_expedicion', 'departamento_expedicion.codigo_departamento_expe', '=', 'municipio_expedicion.codigo_departamento')  
       // ->where('info_persona.id',$datosPersona->id)->get();
       // $direccion_cc_expedicion1=count($direccion_cc_expedicion1)==0?new \App\info_persona():$direccion_cc_expedicion1;

        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;
        return view('hoja_vida.datos_personal', compact('educacionSuperior','educacionFormal','limitacionesPersona','idiomasPersona','datosPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades'));
   }


}
