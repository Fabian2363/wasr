<?php

namespace App\Http\Controllers;

use App\Exports\ReporteCensoExport;
use App\idiomas;
use App\info_persona;
use App\limitaciones_fisinas;
use App\Novedad_retiro;
use App\Personas;
use App\contrato;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id_familia)
    {
       // $id_familia= base64_decode($id_familia);
        $datos = Personas::select('personas.*')
        //->join('hogar_p', 'hogar_p.id', '=', 'personas.hogar_id')
        ->where([['personas.id', $id_familia], ['personas.estado_persona', 1]])->get();

        if(count($datos) > 0){
            $personas_censadas = count(Personas::where([['id', $id_familia], ['status', 1], ['estado_persona', 1]])->get());
            return view('interfaces.personas',compact('datos', 'personas_censadas'));
        }
        abort(404);
    }

   


    public  function persol_enpreceso(Request $request)
    {   
        $datos=\App\ Personas::select('personas.hogar_id','personas.docomento_persona','personas.nombres','personas.apellidos','personas.hogar_id','personas.fecha_censo')
        ->where('personas.status',0)
        ->get();
        
        return view('/interfaces.personas_proceso', compact('datos'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
       // $mensaje='Hubo un problema inesperado, comuníquese con el administrador o Falta  campos  por ingresar información en el formulario. ';
       // DB::beginTransaction();

       // try {
            $validatedData = Validator::make($data->all(), [
            //'docomento_pdf' => 'mimes:pdf|max:1024',
            "genero" => "required|min:1|string",             
            "telefono" => "required|min:1|numeric",
            "telefono" => "required",
            "tipo_sangra" => "required",
            "carnet_salud_id" => "required",
            "carnet_salud_id" => "required",
            "profecion_id" => "required",
            "fechanacimieto" => "required",
            "id_municipio_expedicion" => "required",
            "fechaexpedicioncc" => "required",
            "codigo_municipio" => "required",
            "comunidad_indigena" => "required",
            ]);

            if ($validatedData->fails()) {
                return response()->json([
                    'errors' => $validatedData->errors(),
                    'status' => false
                ]);
            }

            $info_persona=null;
            if(\App\personas::find($data->persona_id)->status==0){
                $info_persona = new  info_persona();
            }else{
                $info_persona=info_persona::where('persona_id',$data->persona_id)->first();
                //\App\info_persona_idiomas::where('info_persona_id', $info_persona->id)->delete();
                \App\info_persona_limitaciones::where('info_persona_id', $info_persona->id)->delete();
            }

            if(isset($data->documento_pdf)){

                if(isset($info_persona->docomento_pdf)){
                    Storage::delete($info_persona->docomento_pdf); //elimiar documento
                }
                $namePDF = $data->file('documento_pdf')->store('public'); // Upload PDF
                $info_persona->docomento_pdf = $namePDF;
            }    
           // $info_persona->religion = $data['religion'];
            $info_persona->persona_id = $data['persona_id'];
            $info_persona->telefono = $data['telefono'];
            $info_persona->tipo_sangra = $data['tipo_sangra'];
            $info_persona->carnet_salud_id = $data[''];
            $info_persona->carnet_salud_id = $data['carnet_salud_id'];
            $info_persona->profecion_id = $data['profecion_id'];
            $info_persona->fechanacimieto = $data['fechanacimieto'];
            $info_persona->id_municipio_expedicion = $data['id_municipio_expedicion'];
            $info_persona->fechaexpedicioncc = $data['fechaexpedicioncc'];
            $info_persona->codigo_municipio = $data['codigo_municipio'];
            $info_persona->comunidad_indigena = $data['comunidad_indigena'];
            if(!$info_persona->save()){
                throw new Exception();
            }
            $persona=\App\personas::find($data['persona_id']);
            $persona->status=1;
            if(!$persona->save()){
                throw new Exception();
            }
           
            //DB::commit();
            return response()->json([
                'status' => true,
                'id'=>$info_persona->id
            ]);
            /*  } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'mensaje'=>$mensaje,
            ]);
        }*/
    }

    /**
     * Display the specified resource.
     *
     *
     * @param  int  $numero_documento
     * @return \Illuminate\Http\Response
     */
    public function show( $id_persona)
    {
        //$id_familia= base64_decode($id_familia);
        //$id_vivienda= base64_decode($id_vivienda); 
        $id_persona= ($id_persona);  
        $datos = Personas::findOrFail($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");
         $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $idiomasPersona=new \App\info_persona_idiomas();
        $limitacionesPersona=new \App\info_persona_limitaciones();
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $departamento_expedicion= DB::table("departamento_expedicion")->pluck("departamento_expedicion","codigo_departamento_expe");
        $departamento = DB::table("departamento_direccion")->pluck("nombre","id_departamento");
        if($datos->status==0){
            return view('interfaces.informmacion_persona', compact('limitacionesPersona','idiomasPersona','datos','profecion','carnet_salud','enfermedades','departamento_expedicion','departamento'));
        }else{   
            $datosPersona=info_persona::where('persona_id',$id_persona)->first(); 
            return view('interfaces.informmacion_persona', compact('limitacionesPersona','idiomasPersona','datosPersona','datos','carnet_salud','enfermedades','profecion','departamento','departamento_expedicion'));
        }
    }



       // municipio direccion persona js
      public function getmunicipio(Request $request)
      {
          $municipios = DB::table("municipios")
          ->where("codigo_departamento",$request->codigo_departamento)
           ->pluck("nombre_municipio","codigo_municipio");
            return response()->json($municipios);
      } 


           // llamar   municipio expedicion js
    public function getmunicipioexpe(Request $request)
    {
       $municipio_expedicion = DB::table("municipio_expedicion")
      ->where("codigo_departamento",$request->codigo_departamento)
       ->pluck("nombre_municipio","codigo_municipio_expe");
      return response()->json($municipio_expedicion);
   }
   public  function resumen_censo(  $id_persona)
   {

      // $id_familia= base64_decode($id_familia);
      // $id_vivienda= base64_decode($id_vivienda); 
      // $id_persona= base64_decode($id_persona); 
       $id_persona= ($id_persona); 
           
       $datos = DB:: table('personas')
        ->join('info_persona', 'info_persona.persona_id', '=', 'personas.id')        
      // ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
       //->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
      // ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo') 
     // ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
      //->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
     //->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
     // ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
     // ->join('departemento_lugar_trabajo', 'departemento_lugar_trabajo.codigo_departamento_trabajo', '=', 'municipio_lugar_trabajo.codigo_departamento_trabajo ')
     
        ->join('municipio_expedicion', 'municipio_expedicion.codigo_municipio_expe', '=', 'info_persona.id_municipio_expedicion') 
        ->join('departamento_expedicion', 'departamento_expedicion.codigo_departamento_expe', '=', 'municipio_expedicion.codigo_departamento')  

      ->where([['personas.id', $id_persona]])->get();
      return view('interfaces.resumen_censo', compact('datos'));
   }

   public function update_informacion_persona(Request $request)
   {
    if($request->ajax()){
     //    dd($request->all());
         // Validacion de los datos que llegan al request
         $request->validate([
             'docomento_pdf' => 'mimes:pdf|max:1024',
             //"hoga_id" => "required|min:1|numeric",
             "persona_id" => "required|min:1|numeric",
             "nombre" => "required|min:5|string",
             "apellido" => "required|min:5|string",
             "estado_civil" => "required|min:1|string",
             "tipo_identificacion" => "required|min:2|string",
             "documento_persona" => ["required",
                                     "min:1",
                                     "numeric", 
                                     Rule::unique('personas', 'documento_persona')->where(function ($query) use($request) {
                                         return $query->where('id', "!=", $request->persona_id);
                                     })], //consultar que este numero de documento no exista.
           /*  "fecha_nacimiento" => "required|date",
             "parentesco" => "required|min:2|string",
             "nivel_educativo" => "required|min:1|string",
             "genero" => "required|min:1|string",
             "empresa_asociativa" => "required|min:6|string",
             //"carnet_salud_id" => "required|min:1|numeric|exists:carnet_salud,id",
             "profecion_id" => "required|min:1|numeric|exists:profecion,id",
             "telefono" => "required|min:1|numeric",
             "religion" => "required|min:4|string",
             "enfemerma_recurre" => "required|min:1|string",
             "comunidad_indigena" => "required|min:1|string",
             "idiomas" => "array|nullable",
             "idiomas.*" => "required|numeric|min:1|distinct",
             "habla_namuy_wam" => "required|string",
             "escritura_namuy_wam" => "required|string",
             "habla_español" => "required|string",
             "escribe_español" => "required|string",
             "vestimenta_misak" => "required|string",
             "medico_tradicional" => "required|string",
             "conocimientos_empiricos" => "required|min:1|max:10|numeric",
             "deporte_constante" => "required|min:1|numeric", // este campo en la vista no esta bien espesificado
             "lugares_sagrados" => "required|string|min:2",
             //"juegos_tradicionales" => "required|string|min:2",
             "baños_etapas_vida" => "required|string",
             //"mestruacion" => "required|string|min:2",
             "enfermedades_id" => "required|min:1|numeric",
             "medicina_alternativa" => "required|string",
             "consumo_sustancias" => "required|min:1|max:4|numeric",
             "limitaciones_fisinas" => "array|nullable",
             "limitaciones_fisinas.*" => "required|min:1|numeric|distinct",
             "departamento" => "nullable",
             "municipio" => "nullable",
             "colegio" => "nullable",
             "sede" => "nullable",
             "tipo_educacion" => "nullable",
             "estado" => "nullable",
             "anio" => "nullable",
             "modalidad" => "nullable",
             "nivel_academico" => "nullable",*/
         ]);

         $mensaje="Error al guardar los cambios";

         DB::beginTransaction();
        // try {
             
             //Validar que la persona exista
             if(!Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->exists()){
                 $mensaje='La persona a la que trata de actualizar los datos no existe.';
                 throw new Exception();
             }
             
             $persona = Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->first();

             $persona->documento_persona = $request->documento_persona;
             $persona->tipo_identificacion = $request->tipo_identificacion;
             $persona->nombres = $request->nombre;
             $persona->apellidos  = $request->apellido;
             $persona->estado_civil  = $request->estado_civil;            
             $persona->fecha_nacimiento  = $request->fecha_nacimiento;
             $persona->nivel_academico  = $request->nivel_educativo;
             $persona->parentesco  = $request->parentesco;
             $persona->fecha_actualizacion = $request->fecha_actualizacion;

             $persona->hogar_id = $request->hoga_id;

             if(!$persona->save()){
                 throw new Exception();
             }

             $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();

             if(isset($request->documento_pdf)){

                 if(isset($info_persona->docomento_pdf)){
                     Storage::delete($info_persona->docomento_pdf); //elimiar documento
                 }
                 $namePDF = $request->file('documento_pdf')->store('public'); // Upload PDF
                 $info_persona->docomento_pdf = $namePDF;
             }
             
             $info_persona->religion = $request['religion'];
             $info_persona->persona_id = $request['persona_id'];
             $info_persona->sexo=$request['genero'];
             $info_persona->empresa_asociativa = $request['empresa_asociativa'];
             $info_persona->religion = $request['religion'];
             $info_persona->enfemerma_recurre = $request['enfemerma_recurre'];
             $info_persona->habla_namuy_wam = $request['habla_namuy_wam'];
             $info_persona->escritura_namuy_wam = $request['escritura_namuy_wam'];
             $info_persona->habla_español = $request['habla_español'];
             $info_persona->escribe_español  = $request['escribe_español'];
             $info_persona->vestimenta_misak = $request['vestimenta_misak'];
             $info_persona->medico_tradicional = $request['medico_tradicional'];
             $info_persona->conocimientos_empiricos = $request['conocimientos_empiricos'];
             $info_persona->deporte_constante = $request['deporte_constante'];
             $info_persona->lugares_sagrados = $request['lugares_sagrados'];
             $info_persona->juegos_tradicionales  = $request['juegos_tradicionales'];
             $info_persona->baños_etapas_vida = $request['baños_etapas_vida'];
             $info_persona->mestruacion = $request['mestruacion'];
             $info_persona->medicina_alternativa = $request['medicina_alternativa'];
             $info_persona->consumo_sustancias = $request['consumo_sustancias'];
             $info_persona->comunidad_indigena = $request['comunidad_indigena'];
             $info_persona->telefono = $request['telefono'];
            
             $info_persona->carnet_salud_id = $request['carnet_salud_id'];
             $info_persona->profecion_id = $request['profecion_id'];
             $info_persona->enfermedades_id = $request['enfermedades_id'];            
 
             if(!$info_persona->save()){
                 throw new Exception();
             }

             \App\info_persona_idiomas::where('info_persona_id', $info_persona->id)->delete();
             \App\info_persona_limitaciones::where('info_persona_id', $info_persona->id)->delete();

          
             
           

             //La persona cuenta con estudios basicos
             if(isset($request->tipo_educacion)){ 
                 \App\escuelacolegio::where('info_persona_id', $info_persona->id)->delete();
                 $educacionFormal=new \App\escuelacolegio();
                 $educacionFormal->estado= $request['estado'];
                 $educacionFormal->año_educacion= $request['anio'];
                 $educacionFormal->modalidad_colegio= $request['modalidad'];
                 $educacionFormal->codigo_tipo= $request['tipo_educacion'];
                 $educacionFormal->info_persona_id= $info_persona->id;

                 if(!$educacionFormal->save()){
                     throw new Exception();
                 }
             }
             
             DB::commit();
             return response()->json([
                 'result' => true,
                 'id'=>$info_persona->id
             ]);
         /* } catch (\Throwable $th) {
             DB::rollBack();
             return response()->json([
                 'mensaje' => $mensaje,
                 'result' => false
             ]);
         }*/
    }
}

   public  function vista_actualizacion_informacion_persona($id_persona)
   {
        $id_persona=($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");
        //$tipo_trabajo= DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
       // $departemento_lugar_trabajo = DB::table("departemento_lugar_trabajo")->pluck("nombre_depatamento_trabajo","codigo_departamento_trabajo");
        //$departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento");
       $departamentos=\App\departamento::all();
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $datos = Personas::findOrFail($id_persona);
        $datosPersona=info_persona::where('persona_id',$id_persona)->first();
        $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
        'colegio.nombre_colegio','sede.nombre_sede','tipoe.tipo','escuelacolegio.estado','escuelacolegio.año_educacion',
        'escuelacolegio.modalidad_colegio')
        ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
        ->join('sede','tipoe.codigo_sede','sede.codigo_sede')
        ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
        ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
        ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
        ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
        $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;
        $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;
       // $direccion_trabajodor=\App\info_persona::select('municipios.nombre_municipio','departamentos.nombre_depatamento','info_persona.direccion')
        //->join('municipios','municipios.codigo_municipio','info_persona.codigo_municipio')
        //->join('departamentos', 'departamentos.codigo_departamento', '=', 'municipios.codigo_departamento') 
        //->where('info_persona.id',$datosPersona->id)->get();
       // $direccion_trabajodor=count($direccion_trabajodor)==0?new \App\info_persona():$direccion_trabajodor;
       // $direcion_trabajo=\App\info_persona::select('departemento_lugar_trabajo.nombre_depatamento_trabajo','municipio_lugar_trabajo.nombre_municipio_trabajo','nombre_institucion.nombre_institucion_trabajo','tipo_institucion.nombre_tipo_institucion','sede_institucion.nombre_sede_institucion')
        //->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
        //->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
       ///->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
        //->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
        //->join('departemento_lugar_trabajo', 'municipio_lugar_trabajo.codigo_departamento_trabajo', '=', 'departemento_lugar_trabajo.codigo_departamento_trabajo')
        //>where('info_persona.id',$datosPersona->id)->get();
        //$direcion_trabajo=count($direcion_trabajo)==0?new \App\info_persona():$direcion_trabajo;
        return view('actualizaciones_censo.actualizacion_informacion_persona', compact('educacionSuperior','educacionFormal','datosPersona','datos','profecion','carnet_salud','enfermedades','departamentos'));
   }

   

   // municipio direccion persona  vista actualizar
   public function getmunicipio_direccion(Request $request)
   {
       $municipios = DB::table("municipio_direccion")
       ->where("codigo_departamento",$request->codigo_departamento)
        ->pluck("nombre_municipio","codigo_municipio");
         return response()->json($municipios);
   } 

   /// llamar tabla canasta  categoria_trabajo actualizar
   public function getcategoria_trabajoActualizar(Request $request)

   {
      $categoria_trabajo = DB::table("categoria_trabajo")
       ->where("id_tipo_trabajo",$request->id_tipo_trabajo)
       ->pluck("nombre_categoria_trabajo","id_categoria_trabajo");
        return response()->json($categoria_trabajo);

   }
    

  

   














































   
    /// llamar tabla categoria_trabajo canasta 
    public function getcategoria_trabajo(Request $request)

    {
       $categoria_trabajo = DB::table("categoria_trabajo")
        ->where("id_tipo_trabajo",$request->id_tipo_trabajo)
        ->pluck("nombre_categoria_trabajo","id_categoria_trabajo");
         return response()->json($categoria_trabajo);

    }

    /// llamar table area_desempeno -tipo_vinculacion
public function getarea_desempeno(Request $request)

{
    $area_desempeno = DB::table("area_desempeno")
    ->where("id_vinvulacion",$request->id_vinvulacion)
     ->pluck("nombre_esempeno","id_desempeno");
     return response()->json($area_desempeno);

}


      
/// llamar table direccion y lugar de trabajo
public function getmunicipio_lugar_trabajo(Request $request)

{
    $municipio_lugar_trabajo = DB::table("municipio_lugar_trabajo")
    ->where("codigo_departamento_trabajo",$request->codigo_departamento_trabajo)
     ->pluck("nombre_municipio_trabajo","codigo_municipio_trabajo");
     return response()->json($municipio_lugar_trabajo);

}

public function getnombre_institucion(Request $request)

{
    $nombre_institucion= DB::table("nombre_institucion")
   ->where("codigo_municipio_trabajo",$request->codigo_municipio_trabajo)
   ->pluck("nombre_institucion_trabajo","id_nombre_institucion");
 return response()->json($nombre_institucion);

}
    
/// llamar table tipo_institucion
public function getnombre_tipo_institucion(Request $request)

{
    $tipo_institucion= DB::table("tipo_institucion")
   ->where("id_nombre_institucion",$request->id_nombre_institucion)
   ->pluck("nombre_tipo_institucion","id_tipo_institucion");
    return response()->json($tipo_institucion);

}

/// llamar table sede_institucion
public function getnombre_sede_institucion(Request $request)
{
     $sede_institucion= DB::table("sede_institucion")
    ->where("id_tipo_institucion",$request->id_tipo_institucion)
     ->pluck("nombre_sede_institucion","id_sede_institucion");
    return response()->json($sede_institucion);

}


public  function informacion_talento_humano( $id_persona)
    {

         
        $id_persona= base64_decode($id_persona); 


        $datos = DB:: table('personas')
        ->join('info_persona', 'info_persona.persona_id', '=', 'personas.id')        
        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
        ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo') 
       ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
       ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
      ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
       ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
      // ->join('departemento_lugar_trabajo', 'departemento_lugar_trabajo.codigo_departamento_trabajo', '=', 'municipio_lugar_trabajo.codigo_departamento_trabajo ')
       ->join('municipio_expedicion', 'municipio_expedicion.codigo_municipio_expe', '=', 'info_persona.id_municipio_expedicion') 
      ->join('departamento_expedicion', 'departamento_expedicion.codigo_departamento_expe', '=', 'municipio_expedicion.codigo_departamento')  
       ->where([['personas.docomento_persona', $id_persona]])->get();
       
       

       return view('interfaces.resumen_censo', compact('datos'));
    }



 

    /**
     * Se encarga de verificar si todas las personas de estas familia ya fueron censadas correctamente para poder terminar el proceso del censo.
     *
     * @param  Request $request, ...$rest [0 => id_vivienda, 1 => id_familia]
     * @return \Illuminate\Http\Response
     */
    public function verificarEstadoCenso(Request $request, ...$rest)
    {
        if($request->ajax()){
          //  try {

               $personasCensadas = Personas::where([['hogar_id', base64_decode($rest[0])], ['status', "0"]])->get(['id'])->toArray();

                if(count($personasCensadas) == 0){
                    return response()->json([
                        "status" => true,
                    ]);
                }

                return response()->json([
                    "status" => false,
                    "mensaje" => "Todavia hay personas que faltan por completar el proceso de registro al sistema SITH."
                ]);

          //  } catch (\Throwable $th) {
              //  return response()->json([
                   // "status" => false,
                   // "mensaje" => "Ocurrio un error al terminar el censo, porfavor comuniquese con el administrador"
               // ]);
           // }
        }
    }

    public  function certificado_censo($id_familia)
    {

       
        $id_familia = base64_decode($id_familia);

        //Consultar integrantes de la familia.
        $miembros_familia = Personas::where('hogar_id', $id_familia)->get([
            'docomento_persona',
            'tipo_identificacion',
            'nombres',
            'apellidos',
            'estado_civil',
            'fecha_nacimiento'
            ]);

        //Consultar informacion de la vivienda.
      

        $fecha = Carbon::now();

       return  view('interfaces.certificado_censo_familiar', compact( 'miembros_familia', 'fecha'));
    }


    public function consultar_personal_persona(Request $request)
    {
       
        
            if($request->ajax()){
    
                $persona = Personas::where([['docomento_persona', $request->documento], ['estado_persona', 1], ['status', 1]])->first();
    
                if (isset($persona))
                    return response()->json([
                        'status' => true,
                        'result' => $persona
                    ]);
                  else
                    return response()->json([
                        'status' => false ,
                        'mensaje' => "No existe ninguna persona con esta identificación."
                    ]);
    
            }
        
       
    }
    

    public function actualizar_informacion_general_persona(Request $request){
        
        if($request->ajax()){

            $persona = Personas::where([['docomento_persona', $request->documento], ['estado_persona', 1], ['status', 1]])->first();

            if (isset($persona))
                return response()->json([
                    'status' => true,
                    'result' => $persona
                ]);
              else
                return response()->json([
                    'status' => false ,
                    'mensaje' => "No existe ninguna persona con esta identificación."
                ]);

        }
    
   }

   public  function vista_consulta_actualizacion_general()
   {
       return view('actualizaciones_censo.actualizacion');
   }



   public  function vista_actualizacion_datos_personales()
   {
        
        return view('actualizaciones_censo.edit_datos_persona');
   }



   

   public  function vista_actualizacion_direcion($id_persona)
   {
        $id_persona=base64_decode($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");

       
        $tipo_trabajo= DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
       // $departemento_lugar_trabajo = DB::table("departemento_lugar_trabajo")->pluck("nombre_depatamento_trabajo","codigo_departamento_trabajo");
        $departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento");
       
        $departamentos=\App\departamento::all();
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $datos = Personas::findOrFail($id_persona);
        $datosPersona=info_persona::where('persona_id',$id_persona)->first();
        
      
        $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
        'colegio.nombre_colegio','sede.nombre_sede','tipoe.tipo','escuelacolegio.estado','escuelacolegio.año_educacion',
        'escuelacolegio.modalidad_colegio')
        ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
        ->join('sede','tipoe.codigo_sede','sede.codigo_sede')
        ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
        ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
        ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
        ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
        $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;
        
        $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;

        $direccion_trabajodor=\App\info_persona::select('municipios.nombre_municipio','departamentos.nombre_depatamento','info_persona.direccion')
        ->join('municipios','municipios.codigo_municipio','info_persona.codigo_municipio')
        ->join('departamentos', 'departamentos.codigo_departamento', '=', 'municipios.codigo_departamento') 
        ->where('info_persona.id',$datosPersona->id)->get();
        $direccion_trabajodor=count($direccion_trabajodor)==0?new \App\info_persona():$direccion_trabajodor;



        $canasta_programa=\App\info_persona::select('categoria_trabajo.nombre_categoria_trabajo','tipo_trabajo.nombre_tipo_trabajo','info_persona.tipo_contrato','info_persona.pesiones')
        ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
        ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $canasta_programa=count($canasta_programa)==0?new \App\info_persona():$canasta_programa;

        $direcion_trabajo=\App\info_persona::select('departemento_lugar_trabajo.nombre_depatamento_trabajo','municipio_lugar_trabajo.nombre_municipio_trabajo','nombre_institucion.nombre_institucion_trabajo','tipo_institucion.nombre_tipo_institucion','sede_institucion.nombre_sede_institucion')
        ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
        ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
       ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
        ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
        ->join('departemento_lugar_trabajo', 'municipio_lugar_trabajo.codigo_departamento_trabajo', '=', 'departemento_lugar_trabajo.codigo_departamento_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $direcion_trabajo=count($direcion_trabajo)==0?new \App\info_persona():$direcion_trabajo;
        return view('actualizaciones_censo.actualizar_direccion', compact('educacionSuperior','educacionFormal','datosPersona','datos','profecion','carnet_salud','enfermedades', 'departamentos','departamento','tipo_trabajo','direccion_trabajodor','canasta_programa','direcion_trabajo'));
   }

   public  function vista_actualizacion_info_contrato($id_persona)
   {
        $id_persona=base64_decode($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");

       
        $tipo_trabajo= DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
        //$departemento_lugar_trabajo = DB::table("departemento_lugar_trabajo")->pluck("nombre_depatamento_trabajo","codigo_departamento_trabajo");
        $departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento");
       
        $departamentos=\App\departamento::all();
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $datos = Personas::findOrFail($id_persona);
        $datosPersona=info_persona::where('persona_id',$id_persona)->first();
       
      
        $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
        'colegio.nombre_colegio','sede.nombre_sede','tipoe.tipo','escuelacolegio.estado','escuelacolegio.año_educacion',
        'escuelacolegio.modalidad_colegio')
        ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
        ->join('sede','tipoe.codigo_sede','sede.codigo_sede')
        ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
        ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
        ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
        ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
        $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;
        
        $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;

        $direccion_trabajodor=\App\info_persona::select('municipios.nombre_municipio','departamentos.nombre_depatamento','info_persona.direccion')
        ->join('municipios','municipios.codigo_municipio','info_persona.codigo_municipio')
        ->join('departamentos', 'departamentos.codigo_departamento', '=', 'municipios.codigo_departamento') 
        ->where('info_persona.id',$datosPersona->id)->get();
        $direccion_trabajodor=count($direccion_trabajodor)==0?new \App\info_persona():$direccion_trabajodor;



        $canasta_programa=\App\info_persona::select('categoria_trabajo.nombre_categoria_trabajo','tipo_trabajo.nombre_tipo_trabajo','info_persona.tipo_contrato','info_persona.pesiones')
        ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
        ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $canasta_programa=count($canasta_programa)==0?new \App\info_persona():$canasta_programa;

        $direcion_trabajo=\App\info_persona::select('departemento_lugar_trabajo.nombre_depatamento_trabajo','municipio_lugar_trabajo.nombre_municipio_trabajo','nombre_institucion.nombre_institucion_trabajo','tipo_institucion.nombre_tipo_institucion','sede_institucion.nombre_sede_institucion')
        ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
        ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
       ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
        ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
        ->join('departemento_lugar_trabajo', 'municipio_lugar_trabajo.codigo_departamento_trabajo', '=', 'departemento_lugar_trabajo.codigo_departamento_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $direcion_trabajo=count($direcion_trabajo)==0?new \App\info_persona():$direcion_trabajo;
        return view('actualizaciones_censo.actualizar_info_contrato', compact('educacionSuperior','educacionFormal','datosPersona','datos','profecion','carnet_salud','enfermedades', 'departamentos','departamento','tipo_trabajo','direccion_trabajodor','canasta_programa','direcion_trabajo'));
   }

   public  function vista_actualizacion_direccion_trabajo($id_persona)
   {
        $id_persona=base64_decode($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");

       
        $tipo_trabajo= DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
       // $departemento_lugar_trabajo = DB::table("departemento_lugar_trabajo")->pluck("nombre_depatamento_trabajo","codigo_departamento_trabajo");
        $departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento");
       
        $departamentos=\App\departamento::all();
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $datos = Personas::findOrFail($id_persona);
          $datos = Personas::findOrFail($id_persona);
        $datosPersona=info_persona::where('persona_id',$id_persona)->first();
       
      
        $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
        'colegio.nombre_colegio','sede.nombre_sede','tipoe.tipo','escuelacolegio.estado','escuelacolegio.año_educacion',
        'escuelacolegio.modalidad_colegio')
        ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
        ->join('sede','tipoe.codigo_sede','sede.codigo_sede')
        ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
        ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
        ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
        ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
        $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;
        
        $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;

        $direccion_trabajodor=\App\info_persona::select('municipios.nombre_municipio','departamentos.nombre_depatamento','info_persona.direccion')
        ->join('municipios','municipios.codigo_municipio','info_persona.codigo_municipio')
        ->join('departamentos', 'departamentos.codigo_departamento', '=', 'municipios.codigo_departamento') 
        ->where('info_persona.id',$datosPersona->id)->get();
        $direccion_trabajodor=count($direccion_trabajodor)==0?new \App\info_persona():$direccion_trabajodor;

        $canasta_programa=\App\info_persona::select('categoria_trabajo.nombre_categoria_trabajo','tipo_trabajo.nombre_tipo_trabajo','info_persona.tipo_contrato','info_persona.pesiones')
        ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
        ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $canasta_programa=count($canasta_programa)==0?new \App\info_persona():$canasta_programa;

        $direcion_trabajo=\App\info_persona::select('departemento_lugar_trabajo.nombre_depatamento_trabajo','municipio_lugar_trabajo.nombre_municipio_trabajo','nombre_institucion.nombre_institucion_trabajo','tipo_institucion.nombre_tipo_institucion','sede_institucion.nombre_sede_institucion')
        ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
        ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
       ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
        ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
        ->join('departemento_lugar_trabajo', 'municipio_lugar_trabajo.codigo_departamento_trabajo', '=', 'departemento_lugar_trabajo.codigo_departamento_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $direcion_trabajo=count($direcion_trabajo)==0?new \App\info_persona():$direcion_trabajo;
        return view('actualizaciones_censo.actualizacion_direccion_trabajo', compact('educacionSuperior','educacionFormal','datosPersona','datos','profecion','carnet_salud','enfermedades', 'departamentos','departamento','tipo_trabajo','direccion_trabajodor','canasta_programa','direcion_trabajo'));
  
    }














   

   /// llamar table direccion y lugar de trabajo actualizar 
public function getmunicipio_lugar_trabajoactualizar(Request $request)

{
    $municipio_lugar_trabajo = DB::table("municipio_lugar_trabajo")
    ->where("codigo_departamento_trabajo",$request->codigo_departamento_trabajo)
     ->pluck("nombre_municipio_trabajo","codigo_municipio_trabajo");
     return response()->json($municipio_lugar_trabajo);

}
public function getnombre_institucionactualizar(Request $request)

{
    $nombre_institucion= DB::table("nombre_institucion")
   ->where("codigo_municipio_trabajo",$request->codigo_municipio_trabajo)
   ->pluck("nombre_institucion_trabajo","id_nombre_institucion");
 return response()->json($nombre_institucion);

}

/// llamar table tipo_institucion
public function getnombre_tipo_institucionMisak(Request $request)

{
    $tipo_institucion= DB::table("tipo_institucion")
   ->where("id_nombre_institucion",$request->id_nombre_institucion)
   ->pluck("nombre_tipo_institucion","id_tipo_institucion");
    return response()->json($tipo_institucion);

}

/// llamar table sede_institucion
public function getnombre_sede_institucionactualizar(Request $request)
{
     $sede_institucion= DB::table("sede_institucion")
    ->where("id_tipo_institucion",$request->id_tipo_institucion)
     ->pluck("nombre_sede_institucion","id_sede_institucion");
    return response()->json($sede_institucion);

}


   public function update(Request $request)
   {
       if($request->ajax()){
          dd($request->all());
            // Validacion de los datos que llegan al request
            $request->validate([
                'docomento_pdf' => 'mimes:pdf|max:1024',
                "hoga_id" => "required|min:1|numeric",
                "persona_id" => "required|min:1|numeric",
                "nombre" => "required|min:2|string",
                "apellido" => "required|min:2|string",
                "estado_civil" => "required|min:1|string",
                "tipo_identificacion" => "required|min:2|string",
                "documento_persona" => ["required",
                                        "min:1",
                                        "numeric", 
                                        Rule::unique('personas', 'docomento_persona')->where(function ($query) use($request) {
                                            return $query->where('id', "!=", $request->persona_id);
                                        })], //consultar que este numero de documento no exista.
                "fecha_nacimiento" => "required|date",
               
                "genero" => "required|min:1|string",
               // "empresa_asociativa" => "required|min:6|string",
                //"carnet_salud_id" => "required|min:1|numeric|exists:carnet_salud,id",
              //  "profecion_id" => "required|min:1|numeric|exists:profecion,id",
                "telefono" => "required|min:1|numeric",
              
               
                "comunidad_indigena" => "required|min:1|string",
                
                
                
               // "limitaciones_fisinas" => "array|nullable",
               // "limitaciones_fisinas.*" => "required|min:1|numeric|distinct",
                "departamento" => "nullable",
                "municipio" => "nullable",
                "colegio" => "nullable",
                "sede" => "nullable",
                "tipo_educacion" => "nullable",
                "estado" => "nullable",
                "anio" => "nullable",
                "modalidad" => "nullable",
                "nivel_academico" => "nullable",
            ]);

            $mensaje="Error al guardar los cambios";

            DB::beginTransaction();
          //  try {
                
                //Validar que la persona exista
                if(!Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->exists()){
                    $mensaje='La persona a la que trata de actualizar los datos no existe.';
                    throw new Exception();
                }
                
                $persona = Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->first();

                $persona->docomento_persona = $request->documento_persona;
                $persona->tipo_identificacion = $request->tipo_identificacion;
                $persona->nombres = $request->nombre;
                $persona->apellidos  = $request->apellido;
                $persona->estado_civil  = $request->estado_civil;            
                $persona->fecha_nacimiento  = $request->fecha_nacimiento;
                $persona->nivel_academico  = $request->nivel_educativo;
                $persona->parentesco  = $request->parentesco;
                $persona->hogar_id = $request->hoga_id;

                if(!$persona->save()){
                    throw new Exception();
                }

                $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();

                if(isset($request->documento_pdf)){

                    if(isset($info_persona->docomento_pdf)){
                        Storage::delete($info_persona->docomento_pdf); //elimiar documento
                    }
                    $namePDF = $request->file('documento_pdf')->store('public'); // Upload PDF
                    $info_persona->docomento_pdf = $namePDF;
                }

                
                $info_persona->religion = $request['religion'];
                $info_persona->persona_id = $request['persona_id'];
                $info_persona->sexo=$request['genero'];
                $info_persona->empresa_asociativa = $request['empresa_asociativa'];
                $info_persona->religion = $request['religion'];
                $info_persona->enfemerma_recurre = $request['enfemerma_recurre'];
                $info_persona->habla_namuy_wam = $request['habla_namuy_wam'];
                $info_persona->escritura_namuy_wam = $request['escritura_namuy_wam'];
                $info_persona->habla_español = $request['habla_español'];
                $info_persona->escribe_español  = $request['escribe_español'];
                $info_persona->vestimenta_misak = $request['vestimenta_misak'];
                $info_persona->medico_tradicional = $request['medico_tradicional'];
                $info_persona->conocimientos_empiricos = $request['conocimientos_empiricos'];
                $info_persona->deporte_constante = $request['deporte_constante'];
                $info_persona->lugares_sagrados = $request['lugares_sagrados'];
                $info_persona->juegos_tradicionales  = $request['juegos_tradicionales'];
                $info_persona->baños_etapas_vida = $request['baños_etapas_vida'];
                $info_persona->mestruacion = $request['mestruacion'];
                $info_persona->medicina_alternativa = $request['medicina_alternativa'];
                $info_persona->consumo_sustancias = $request['consumo_sustancias'];
                $info_persona->comunidad_indigena = $request['comunidad_indigena'];
                $info_persona->telefono = $request['telefono'];
               
                $info_persona->carnet_salud_id = $request['carnet_salud_id'];
                $info_persona->profecion_id = $request['profecion_id'];
                $info_persona->enfermedades_id = $request['enfermedades_id'];   
                
                
           $info_persona->id_categoria_trabajo = $request['id_categoria_trabajo'];   
            $info_persona->id_sede_institucion = $request['id_sede_institucion']; 
            $info_persona->email = $request['email']; 
            $info_persona->comunidad_indigena = $request['comunidad_indigena'];  
            $info_persona->comunidad_indigena_cual = $request['comunidad_indigena_cual'];
            $info_persona->id_municipio_expedicion = $request['id_municipio_expedicion'];
          
            $info_persona->tipo_contrato = $request['tipo_contrato'];
            $info_persona->pesiones = $request['pesiones'];
            $info_persona->salario = $request['salario'];
            $info_persona->inicio_contratacion = $request['inicio_contratacion'];
            $info_persona->fin_contrato = $request['fin_contrato'];  
            $info_persona->codigos_secretaria = $request['codigos_secretaria'];
            $info_persona->observaciones = $request['observaciones'];
            $info_persona->direccion = $request['direccion'];
             $info_persona->codigo_municipio = $request['codigo_municipio'];

            
    
                if(!$info_persona->save()){
                    throw new Exception();
                }

                \App\info_persona_idiomas::where('info_persona_id', $info_persona->id)->delete();
                \App\info_persona_limitaciones::where('info_persona_id', $info_persona->id)->delete();

              
               

                //La persona cuenta con estudios basicos
                if(isset($request->tipo_educacion)){ 
                    \App\escuelacolegio::where('info_persona_id', $info_persona->id)->delete();
                    $educacionFormal=new \App\escuelacolegio();
                    $educacionFormal->estado= $request['estado'];
                    $educacionFormal->año_educacion= $request['anio'];
                    $educacionFormal->modalidad_colegio= $request['modalidad'];
                    $educacionFormal->codigo_tipo= $request['tipo_educacion'];
                    $educacionFormal->info_persona_id= $info_persona->id;

                    if(!$educacionFormal->save()){
                        throw new Exception();
                    }


                }
                
                DB::commit();
                return response()->json([
                    'result' => true,
                    'id'=>$info_persona->id
                ]);
                /* } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => $mensaje,
                    'result' => false
                ]);
            }*/
       }
   }
 

   public  function vista_actualizacion_hoja_vida($id_persona)
   {
        $id_persona=base64_decode($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");
        $tipo_trabajo= DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
        //$departemento_lugar_trabajo = DB::table("departemento_lugar_trabajo")->pluck("nombre_depatamento_trabajo","codigo_departamento_trabajo");
        $departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento"); 
        $departamentos=\App\departamento::all();
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $datos = Personas::findOrFail($id_persona);
        $datosPersona=info_persona::where('persona_id',$id_persona)->first();
        $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
        'colegio.nombre_colegio','sede.nombre_sede','tipoe.tipo','escuelacolegio.estado','escuelacolegio.año_educacion',
        'escuelacolegio.modalidad_colegio')
        ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
        ->join('sede','tipoe.codigo_sede','sede.codigo_sede')
        ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
        ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
        ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
        ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
        $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;  
        $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;
        $direccion_trabajodor=\App\info_persona::select('municipios.nombre_municipio','departamentos.nombre_depatamento','info_persona.direccion')
        ->join('municipios','municipios.codigo_municipio','info_persona.codigo_municipio')
        ->join('departamentos', 'departamentos.codigo_departamento', '=', 'municipios.codigo_departamento') 
        ->where('info_persona.id',$datosPersona->id)->get();
        $direccion_trabajodor=count($direccion_trabajodor)==0?new \App\info_persona():$direccion_trabajodor;
        $canasta_programa=\App\info_persona::select('categoria_trabajo.nombre_categoria_trabajo','tipo_trabajo.nombre_tipo_trabajo','info_persona.tipo_contrato','info_persona.pesiones')
        ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
        ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $canasta_programa=count($canasta_programa)==0?new \App\info_persona():$canasta_programa;
        $direcion_trabajo=\App\info_persona::select('departemento_lugar_trabajo.nombre_depatamento_trabajo','municipio_lugar_trabajo.nombre_municipio_trabajo','nombre_institucion.nombre_institucion_trabajo','tipo_institucion.nombre_tipo_institucion','sede_institucion.nombre_sede_institucion')
        ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
        ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
       ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
        ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
        ->join('departemento_lugar_trabajo', 'municipio_lugar_trabajo.codigo_departamento_trabajo', '=', 'departemento_lugar_trabajo.codigo_departamento_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $direcion_trabajo=count($direcion_trabajo)==0?new \App\info_persona():$direcion_trabajo;
        return view('actualizaciones_censo.actualizar_hoja_vida', compact('educacionSuperior','educacionFormal','datosPersona','datos','profecion','carnet_salud','enfermedades', 'departamentos','departamento','tipo_trabajo','direccion_trabajodor','canasta_programa','direcion_trabajo'));
   }

   
   
   public function update_hoja_vida(Request $request)
   {
       if($request->ajax()){
        //    dd($request->all());
            // Validacion de los datos que llegan al request
            $request->validate([
                'hoja_vida_pdf' => 'mimes:pdf|max:1024',
              
            ]);

            $mensaje="Error al guardar los cambios";

            DB::beginTransaction();
          //  try {
                
                //Validar que la persona exista
                if(!Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->exists()){
                    $mensaje='La persona a la que trata de actualizar los datos no existe.';
                    throw new Exception();
                }
                
                $persona = Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->first();

               
                $persona->hogar_id = $request->hoga_id;

                if(!$persona->save()){
                    throw new Exception();
                }

                $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();

                if(isset($request->hoja_vida_pdf)){

                    if(isset($info_persona->hoja_vida_pdf)){
                        Storage::delete($info_persona->hoja_vida_pdf); //elimiar documento
                    }
                    $namePDF = $request->file('hoja_vida_pdf')->store('public'); // Upload PDF
                    $info_persona->hoja_vida_pdf = $namePDF;
                }
        
                $info_persona->observaciones_hoja_vida = $request['observaciones_hoja_vida'];
    
                if(!$info_persona->save()){
                    throw new Exception();
                }
 
                DB::commit();
                return response()->json([
                    'result' => true,
                    'id'=>$info_persona->id
                ]);
                /* } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => $mensaje,
                    'result' => false
                ]);
            }*/
       }
   }
   public  function vista_actualizacion_seguridad_trabajo($id_persona)
   {
        $id_persona=base64_decode($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");
        $tipo_trabajo= DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
        //$departemento_lugar_trabajo = DB::table("departemento_lugar_trabajo")->pluck("nombre_depatamento_trabajo","codigo_departamento_trabajo");
        $departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento"); 
        $departamentos=\App\departamento::all();
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $datos = Personas::findOrFail($id_persona);
        $datosPersona=info_persona::where('persona_id',$id_persona)->first();
        $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
        'colegio.nombre_colegio','sede.nombre_sede','tipoe.tipo','escuelacolegio.estado','escuelacolegio.año_educacion',
        'escuelacolegio.modalidad_colegio')
        ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
        ->join('sede','tipoe.codigo_sede','sede.codigo_sede')
        ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
        ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
        ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
        ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
        $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;  
        $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;
        $direccion_trabajodor=\App\info_persona::select('municipios.nombre_municipio','departamentos.nombre_depatamento','info_persona.direccion')
        ->join('municipios','municipios.codigo_municipio','info_persona.codigo_municipio')
        ->join('departamentos', 'departamentos.codigo_departamento', '=', 'municipios.codigo_departamento') 
        ->where('info_persona.id',$datosPersona->id)->get();
        $direccion_trabajodor=count($direccion_trabajodor)==0?new \App\info_persona():$direccion_trabajodor;
        $canasta_programa=\App\info_persona::select('categoria_trabajo.nombre_categoria_trabajo','tipo_trabajo.nombre_tipo_trabajo','info_persona.tipo_contrato','info_persona.pesiones')
        ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
        ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $canasta_programa=count($canasta_programa)==0?new \App\info_persona():$canasta_programa;
        $direcion_trabajo=\App\info_persona::select('departemento_lugar_trabajo.nombre_depatamento_trabajo','municipio_lugar_trabajo.nombre_municipio_trabajo','nombre_institucion.nombre_institucion_trabajo','tipo_institucion.nombre_tipo_institucion','sede_institucion.nombre_sede_institucion')
        ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
        ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
       ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
        ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
        ->join('departemento_lugar_trabajo', 'municipio_lugar_trabajo.codigo_departamento_trabajo', '=', 'departemento_lugar_trabajo.codigo_departamento_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $direcion_trabajo=count($direcion_trabajo)==0?new \App\info_persona():$direcion_trabajo;
        return view('actualizaciones_censo.actualizar_seguridad_trabajo', compact('educacionSuperior','educacionFormal','datosPersona','datos','profecion','carnet_salud','enfermedades', 'departamentos','departamento','tipo_trabajo','departemento_lugar_trabajo','direccion_trabajodor','canasta_programa','direcion_trabajo'));
   }


   public function update_seguridad_trabajo(Request $request)
   {
       if($request->ajax()){
        //    dd($request->all());
            // Validacion de los datos que llegan al request
            $request->validate([
                'hoja_vida_pdf' => 'mimes:pdf|max:1024',
              
            ]);

            $mensaje="Error al guardar los cambios";

            DB::beginTransaction();
          //  try {
                
                //Validar que la persona exista
                if(!Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->exists()){
                    $mensaje='La persona a la que trata de actualizar los datos no existe.';
                    throw new Exception();
                }
                
                $persona = Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->first();

               
                $persona->hogar_id = $request->hoga_id;

                if(!$persona->save()){
                    throw new Exception();
                }

                $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();

                if(isset($request->formula_medica_pdf)){

                    if(isset($info_persona->formula_medica_pdf)){
                        Storage::delete($info_persona->formula_medica_pdf); //elimiar documento
                    }
                    $namePDF = $request->file('formula_medica_pdf')->store('public'); // Upload PDF
                    $info_persona->formula_medica_pdf = $namePDF;
                }
        
                $info_persona->observaciones_formula_medica = $request['observaciones_formula_medica'];
    
                if(!$info_persona->save()){
                    throw new Exception();
                }
 
                DB::commit();
                return response()->json([
                    'result' => true,
                    'id'=>$info_persona->id
                ]);
                /* } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => $mensaje,
                    'result' => false
                ]);
            }*/
       }
   }


   public function update_direcion(Request $request)
   {
       if($request->ajax()){
        //    dd($request->all());
            // Validacion de los datos que llegan al request
            $request->validate([
                
               // "empresa_asociativa" => "required|min:6|string",
                //"carnet_salud_id" => "required|min:1|numeric|exists:carnet_salud,id",
              
              
               
               // "comunidad_indigena" => "required|min:1|string",
                
                
                
               // "limitaciones_fisinas" => "array|nullable",
               // "limitaciones_fisinas.*" => "required|min:1|numeric|distinct",
              
            ]);

            $mensaje="Error al guardar los cambios";

            DB::beginTransaction();
          //  try {
                
                //Validar que la persona exista
                if(!Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->exists()){
                    $mensaje='La persona a la que trata de actualizar los datos no existe.';
                    throw new Exception();
                }
                
                $persona = Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->first();

                
                $persona->hogar_id = $request->hoga_id;

                if(!$persona->save()){
                    throw new Exception();
                }

                $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();

                if(isset($request->documento_pdf)){

                    if(isset($info_persona->docomento_pdf)){
                        Storage::delete($info_persona->docomento_pdf); //elimiar documento
                    }
                    $namePDF = $request->file('documento_pdf')->store('public'); // Upload PDF
                    $info_persona->docomento_pdf = $namePDF;
                }

                
               
               
                
                
                

            $info_persona->direccion = $request['direccion'];
             $info_persona->codigo_municipio = $request['codigo_municipio'];
            // $info_persona->salario = $request['salario'];

            
    
                if(!$info_persona->save()){
                    throw new Exception();
                }

            
                
                DB::commit();
                return response()->json([
                    'result' => true,
                    'id'=>$info_persona->id
                ]);
                /* } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => $mensaje,
                    'result' => false
                ]);
            }*/
       }
   }

   public function update_info_contrato(Request $request)
   {
       if($request->ajax()){
        //    dd($request->all());
            // Validacion de los datos que llegan al request
            $request->validate([
                
               // "empresa_asociativa" => "required|min:6|string",
                //"carnet_salud_id" => "required|min:1|numeric|exists:carnet_salud,id",
              
              
               
               // "comunidad_indigena" => "required|min:1|string",
                
                
                
               // "limitaciones_fisinas" => "array|nullable",
               // "limitaciones_fisinas.*" => "required|min:1|numeric|distinct",
              
            ]);

            $mensaje="Error al guardar los cambios";

            DB::beginTransaction();
          //  try {
                
                //Validar que la persona exista
                if(!Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->exists()){
                    $mensaje='La persona a la que trata de actualizar los datos no existe.';
                    throw new Exception();
                }
                
                $persona = Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->first();

                
                $persona->hogar_id = $request->hoga_id;

                if(!$persona->save()){
                    throw new Exception();
                }

                $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();

                if(isset($request->documento_pdf)){

                    if(isset($info_persona->docomento_pdf)){
                        Storage::delete($info_persona->docomento_pdf); //elimiar documento
                    }
                    $namePDF = $request->file('documento_pdf')->store('public'); // Upload PDF
                    $info_persona->docomento_pdf = $namePDF;
                }

                
               
               
                
                
                
                $info_persona->id_categoria_trabajo = $request['id_categoria_trabajo'];  
                $info_persona->tipo_contrato = $request['tipo_contrato'];
                $info_persona->pesiones = $request['pesiones'];
                $info_persona->salario = $request['salario'];
                $info_persona->inicio_contratacion = $request['inicio_contratacion'];
                $info_persona->fin_contrato = $request['fin_contrato'];  
                $info_persona->codigos_secretaria = $request['codigos_secretaria'];
            // $info_persona->salario = $request['salario'];

            
    
                if(!$info_persona->save()){
                    throw new Exception();
                }

            
                
                DB::commit();
                return response()->json([
                    'result' => true,
                    'id'=>$info_persona->id
                ]);
                /* } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => $mensaje,
                    'result' => false
                ]);
            }*/
       }
   }
   
   public function update_direccion_trabajo(Request $request)
   {
       if($request->ajax()){
        //    dd($request->all());
            // Validacion de los datos que llegan al request
            $request->validate([
                
               // "empresa_asociativa" => "required|min:6|string",
                //"carnet_salud_id" => "required|min:1|numeric|exists:carnet_salud,id",
              
              
               
               // "comunidad_indigena" => "required|min:1|string",
                
                
                
               // "limitaciones_fisinas" => "array|nullable",
               // "limitaciones_fisinas.*" => "required|min:1|numeric|distinct",
              
            ]);

            $mensaje="Error al guardar los cambios";

            DB::beginTransaction();
          //  try {
                
                //Validar que la persona exista
                if(!Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->exists()){
                    $mensaje='La persona a la que trata de actualizar los datos no existe.';
                    throw new Exception();
                }
                
                $persona = Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->first();

                
                $persona->hogar_id = $request->hoga_id;

                if(!$persona->save()){
                    throw new Exception();
                }

                $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();

                if(isset($request->documento_pdf)){

                    if(isset($info_persona->docomento_pdf)){
                        Storage::delete($info_persona->docomento_pdf); //elimiar documento
                    }
                    $namePDF = $request->file('documento_pdf')->store('public'); // Upload PDF
                    $info_persona->docomento_pdf = $namePDF;
                }

                
               
               
                
            
                $info_persona->id_sede_institucion = $request['id_sede_institucion'];
            // $info_persona->salario = $request['salario'];

            
    
                if(!$info_persona->save()){
                    throw new Exception();
                }

            
                
                DB::commit();
                return response()->json([
                    'result' => true,
                    'id'=>$info_persona->id
                ]);
                /* } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => $mensaje,
                    'result' => false
                ]);
            }*/
       }
   }
   
   public function update_educacion_superior(Request $request)
   {
       if($request->ajax()){
           $mensaje = "Ocurrio un error al tratar de registrar la educación";
            // dd($request->id_info_persona);
            $request->estudioSuperior = json_decode($request->estudioSuperior);

            // Validacion de los campos
            $request->validate([
                'estudioSuperior' => 'required|json|min:1',
                'estudioSuperior.*.tipo_educacion_superior' => 'string|max:3',
                'estudioSuperior.*.nombre_carrera' => 'string|max:50',
                'estudioSuperior.*.estado_actual' => 'string|max:12',
            ]);

            DB::beginTransaction();
            try {

                \App\educacion_superior::where('persona_id', $request->id_info_persona)->delete();

                foreach ($request->estudioSuperior as $carrera) {
                    
                    $educacion_superior = new \App\educacion_superior();
                    $educacion_superior->tipo_educacion_superior = $carrera->tipo_educacion_superior;
                    $educacion_superior->nombre_carrera = $carrera->nombre_carrera;
                    $educacion_superior->estado_actual = $carrera->estado_actual;
                    $educacion_superior->persona_id = $request->id_info_persona;
                    $educacion_superior->save();

                }
                DB::commit();
                return response()->json([
                    'result' => true,
                ]);
            } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => $mensaje,
                    'result' => false
                ]);  
            }
       }
   }

   function descargarDocumento($id_persona){
        try {
            $persona=info_persona::where('persona_id',$id_persona)->first();
            $pdf = Storage::get($persona->docomento_pdf); 
            return response()->json(['result' => true, 'pdf'=>base64_encode($pdf)]);
        } catch (\Throwable $th) {
            return response()->json(['result' => false]);
        }
        
    }

    public  function descargar_reporte_censo(Request $request)
    {
        return Excel::download(new ReporteCensoExport, 'reporte_censo.xlsx');
    }


    public  function interfas_cunsulta_persona()
    {
        return view('consultas.informacion_persona');
    }
      
    public function buscar_informacion_general_persona(Request $request){
        
        if($request->ajax()){
           //
            $persona = Personas::where([['docomento_persona',"like",$request->documento], ['estado_persona', 1], ['status', 1]])->first();
           // $persona = Personas::where([["docomento_persona","like","%".$documento."%"],['estado_persona', 1], ['status', 1]])->get()->toArray();

           
            if (isset($persona))
                return response()->json([
                    'status' => true,
                    'result' => $persona
                ]);
              else
                return response()->json([
                    'status' => false ,
                    'mensaje' => "No existe ninguna persona con esta identificación."
                ]);

        }
    
   }
   
   public  function vista_informacion_total_personales($id_persona)
   {
        $id_persona=base64_decode($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");
       $hoja_vida =info_persona::find($id_persona);
        $departamentos=\App\departamento::all();
        
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");

        $datos = Personas::findOrFail($id_persona);
        $datosPersona=info_persona::where('persona_id',$id_persona)->first();
        
      
        $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
        'colegio.nombre_colegio','sede.nombre_sede','tipoe.tipo','escuelacolegio.estado','escuelacolegio.año_educacion',
        'escuelacolegio.modalidad_colegio')
        ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
        ->join('sede','tipoe.codigo_sede','sede.codigo_sede')
        ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
        ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
        ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
        ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
        $tipo_trabajo = DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
        $tipo_trabajo= DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
        $departemento_lugar_trabajo = DB::table("departemento_lugar_trabajo")->pluck("nombre_depatamento_trabajo","codigo_departamento_trabajo");
        $departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento");
       
        $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;
        $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;
        
        $direccion_trabajodor=\App\info_persona::select('municipios.nombre_municipio','departamentos.nombre_depatamento','info_persona.direccion')
        ->join('municipios','municipios.codigo_municipio','info_persona.codigo_municipio')
        ->join('departamentos', 'departamentos.codigo_departamento', '=', 'municipios.codigo_departamento') 
        ->where('info_persona.id',$datosPersona->id)->get();
        $direccion_trabajodor=count($direccion_trabajodor)==0?new \App\info_persona():$direccion_trabajodor;

        $canasta_programa=\App\info_persona::select('categoria_trabajo.nombre_categoria_trabajo','tipo_trabajo.nombre_tipo_trabajo','info_persona.tipo_contrato','info_persona.pesiones')
        ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
        ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $canasta_programa=count($canasta_programa)==0?new \App\info_persona():$canasta_programa;

        $direcion_trabajo=\App\info_persona::select('departemento_lugar_trabajo.nombre_depatamento_trabajo','municipio_lugar_trabajo.nombre_municipio_trabajo','nombre_institucion.nombre_institucion_trabajo','tipo_institucion.nombre_tipo_institucion','sede_institucion.nombre_sede_institucion')
        ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
        ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
       ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
        ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
        ->join('departemento_lugar_trabajo', 'municipio_lugar_trabajo.codigo_departamento_trabajo', '=', 'departemento_lugar_trabajo.codigo_departamento_trabajo')
        ->where('info_persona.id',$datosPersona->id)->get();
        $direcion_trabajo=count($direcion_trabajo)==0?new \App\info_persona():$direcion_trabajo;
        return view('consultas.informacion_total_persona', compact('educacionSuperior','educacionFormal','limitacionesPersona','idiomasPersona','datosPersona','datos','profecion','carnet_salud','enfermedades', 'departamentos','tipo_trabajo','departemento_lugar_trabajo','departamento','direccion_trabajodor','canasta_programa','direcion_trabajo'));
   }
   
   public  function interfas_cunsulta_hogar()
   {     
       return view('consultas.informacion_hogar');
   }

   public function buscar_informacion_hogar_persona(Request $request){
        
    if($request->ajax()){

        $persona = Personas::where([['docomento_persona', $request->documento], ['estado_persona', 1], ['status', 1]])->first();

        if (isset($persona))
            return response()->json([
                'status' => true,
                'result' => $persona
            ]);
          else
            return response()->json([
                'status' => false ,
                'mensaje' => "No existe un hogar  con esta identificación."
            ]);

    }

}

public  function total_personas_hogar ($id_hogar)
{
 
     $datos = Personas::where('hogar_id',$id_hogar)->get();
      return view('consultas.informacion_total_hogar',compact('datos'));
}
public  function interfas_cunsulta_vivienda()
{     
    return view('consultas.informacion_vivienda');
}

public function buscar_informacion_vivienda_persona(Request $request)
{
    if($request->ajax()){
        $data = $request->validate([
            'documento' => 'required|numeric|min:1'
        ]);
        
        try {
            $persona = personas::select(
                'personas.docomento_persona',
                'personas.nombres',
                'personas.tipo_identificacion',
                'personas.apellidos',
                'personas.parentesco',
                'vivienda.id',
                'hogar_p.vivienda_id',
                'hogar_p.id as id_familia'
                )
            ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
            ->join('vivienda', 'vivienda.id', '=', 'hogar_p.vivienda_id')
            ->where([['personas.docomento_persona', $data['documento']], ['personas.estado_persona', 1]])->first();

            if(isset($persona)){
                $id_vivienda =base64_encode($persona->id);
                $id_familia =base64_encode($persona->id_familia);
                $persona->id = 0;
                $persona->id_familia = 0;
                return response()->json([
                    'status' => true,
                    'result'=> $persona,
                    'id_vivienda'=> $id_vivienda,
                    'id_familia'=> $id_familia,
                ]);
            }

            return response()->json([
                'status' => false,
                'mensaje'=> 'Esta persona no existe.',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'mensaje'=> 'Ocurrior un error al realizar la consulta.',
            ]);

        }

    }
}

public  function total_personas_vivienda ($id_vivienda)
{
 
     $datos = DB:: table('vivienda')       
     ->join('servicio_energia', 'vivienda.servicio_energia_id', '=', 'servicio_energia.id')
     ->join('servicio_sanitario', 'vivienda.servicio_sanitario_id', '=', 'servicio_sanitario.id')
     ->join('suministro_agua', 'vivienda.suministro_agua_id', '=', 'suministro_agua.id')
     ->join('material_cocina', 'vivienda.material_cocina_id', '=', 'material_cocina.id')
     ->join('material_techo', 'vivienda.material_techo_id', '=', 'material_techo.id')
     ->join('material_paredes', 'vivienda.material_paredes_id', '=', 'material_paredes.id')
     ->join('material_piso', 'vivienda.material_piso_id', '=', 'material_piso.id')
     ->join('sector', 'vivienda.codigo_sector', '=', 'sector.codigo_sector')
     ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
    ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
    ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
    ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
    ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
    // ->where ('personas.docomento_persona')->get ();
     ->where('vivienda.id',$id_vivienda)->get();
     
    // vivienda::where('id',$id_vivienda)->get();
      return view('consultas.informacion_total_vivienda',compact('datos'));
}

public  function interfas_cunsulta_retiros()
    {
        return view('consultas.buscar_solicitud_retiro');
    }
      
    public function buscar_informacion_retiros(Request $request){
        
        if($request->ajax()){
            $persona = Personas::where([['docomento_persona', $request->documento], ['estado_persona', 0], ['status', 1]])->first();
            $persona = Personas::where([['docomento_persona', $request->documento], ['estado_persona', 2], ['status', 1]])->first();
           

            if (isset($persona))
                return response()->json([
                    'status' => true,
                    'result' => $persona
                ]);
              else
                return response()->json([
                    'status' => false ,
                    'mensaje' => "No hay solicitud de retiro del censo poblacional con este numero de identificacion."
                ]);

        }
    }

    public  function viewSolicitudes(Request $request,$id_persona)
    {   
        
        $novedades=\App\Novedad_retiro::select('novedades_retiros.id','novedades_retiros.id_persona','novedades_retiros.tipo_novedad',
        'novedades_retiros.motivo_retiro','novedades_retiros.estado', 'personas.nombres',
        'personas.apellidos','personas.docomento_persona','fecha_autorizacion','novedades_retiros.created_at')
        ->join('personas', 'personas.id', 'novedades_retiros.id_persona')
       // ->orderBy('novedades_retiros.estado')
        //->orderBy('novedades_retiros.created_at')
        ->where('personas.id',$id_persona)->get();        
        
        return view('consultas.estado_retiro', compact('novedades'));
    }

    public  function interfas_cunsulta_persona_certificado()
    {
        return view('reportes.buscar_persona');
    }

    public function buscar_informacion_persona(Request $request){
        
        if($request->ajax()){
    
            $persona = Personas::where([['docomento_persona', $request->documento], ['estado_persona', 1], ['status', 1]])->first();
    
            if (isset($persona))
                return response()->json([
                    'status' => true,
                    'result' => $persona
                ]);
              else
                return response()->json([
                    'status' => false ,
                    'mensaje' => "No existe un hogar  con esta identificación."
                ]);
    
        }
    
    }

    public  function interfas_cetificado_laboral()
    {
        return view('reportes.certificado_laboral');
    }

    public  function interfas_certificados_laborales($id_persona)
    {        
         
      $datos = DB:: table('personas')
      ->join('info_persona', 'info_persona.persona_id', '=', 'personas.id')  

      ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
      ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo') 
     ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
     ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
    ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
     ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
     ->join('municipio_expedicion', 'municipio_expedicion.codigo_municipio_expe', '=', 'info_persona.id_municipio_expedicion') 
    ->join('departamento_expedicion', 'departamento_expedicion.codigo_departamento_expe', '=', 'municipio_expedicion.codigo_departamento')  
      
      //->join('tipo_contrato', 'personas.id_tipo_contrato', '=', 'tipo_contrato.id_tipo_contrato')
      //->join('pensiones', 'personas.id_pesiones', '=', 'pensiones.id_pesiones')
     
      
      ->where('personas.id',$id_persona)->get();
        return view('reportes.certificado_laboral',compact('datos'));
    }
   

    
    public  function vista_informacion_persona_registrado($id_persona)
    {
         $id_persona=base64_decode($id_persona);
         $profecion = DB::table("profecion")->pluck("nombre","id");
 
        
        
         $departamentos=\App\departamento::all();
         
         $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
         $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
 
         $datos = Personas::findOrFail($id_persona);
         $datosPersona=info_persona::where('persona_id',$id_persona)->first();
         $idiomasPersona=\App\info_persona_idiomas::where('info_persona_id',$datosPersona->id)->get('idiomas_id');
       
         $educacionFormal=\App\escuelacolegio::select('departamento_colegio.nombre_depatamento','municipiocolegio.nombre_municipio',
         'colegio.nombre_colegio','sede.nombre_sede','tipoe.tipo','escuelacolegio.estado','escuelacolegio.año_educacion',
         'escuelacolegio.modalidad_colegio')
         ->join('tipoe','tipoe.codigo_tipo','escuelacolegio.codigo_tipo')
         ->join('sede','tipoe.codigo_sede','sede.codigo_sede')
         ->join('colegio','colegio.codigo_colegio','sede.codigo_colegio')
         ->join('municipiocolegio','municipiocolegio.codigo_muni','colegio.codigo_muni')
         ->join('departamento_colegio','departamento_colegio.codigo_departamento','municipiocolegio.codigo_departamento')
         ->where('escuelacolegio.info_persona_id',$datosPersona->id)->get();
         $tipo_trabajo = DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
         $tipo_trabajo= DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
         $departemento_lugar_trabajo = DB::table("departemento_lugar_trabajo")->pluck("nombre_depatamento_trabajo","codigo_departamento_trabajo");
         $departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento");
        
         $educacionFormal=count($educacionFormal)==0?new \App\escuelacolegio():$educacionFormal;
         $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
         $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;
         
         $direccion_trabajodor=\App\info_persona::select('municipios.nombre_municipio','departamentos.nombre_depatamento','info_persona.direccion')
         ->join('municipios','municipios.codigo_municipio','info_persona.codigo_municipio')
         ->join('departamentos', 'departamentos.codigo_departamento', '=', 'municipios.codigo_departamento') 
         ->where('info_persona.id',$datosPersona->id)->get();
         $direccion_trabajodor=count($direccion_trabajodor)==0?new \App\info_persona():$direccion_trabajodor;
 
         $canasta_programa=\App\info_persona::select('categoria_trabajo.nombre_categoria_trabajo','tipo_trabajo.nombre_tipo_trabajo','info_persona.tipo_contrato','info_persona.pesiones')
         ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
         ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo')
         ->where('info_persona.id',$datosPersona->id)->get();
         $canasta_programa=count($canasta_programa)==0?new \App\info_persona():$canasta_programa;
 
         $direcion_trabajo=\App\info_persona::select('departemento_lugar_trabajo.nombre_depatamento_trabajo','municipio_lugar_trabajo.nombre_municipio_trabajo','nombre_institucion.nombre_institucion_trabajo','tipo_institucion.nombre_tipo_institucion','sede_institucion.nombre_sede_institucion')
         ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
         ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
        ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
         ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
         ->join('departemento_lugar_trabajo', 'municipio_lugar_trabajo.codigo_departamento_trabajo', '=', 'departemento_lugar_trabajo.codigo_departamento_trabajo')
         ->where('info_persona.id',$datosPersona->id)->get();
         $direcion_trabajo=count($direcion_trabajo)==0?new \App\info_persona():$direcion_trabajo;
         return view('interfaces.renovar_contrato', compact('educacionSuperior','educacionFormal','limitacionesPersona','idiomasPersona','datosPersona','datos','profecion','carnet_salud','enfermedades', 'departamentos','tipo_trabajo','departamento','direccion_trabajodor','canasta_programa','direcion_trabajo'));
    }

    public  function viewdescargarContratos(Request $request)
    {   
        $novedades=\App\Novedad_retiro::select('novedades_retiros.id','novedades_retiros.id_persona','novedades_retiros.tipo_novedad',
        'novedades_retiros.motivo_retiro','novedades_retiros.estado', 'personas.nombres',
        'personas.apellidos','personas.docomento_persona','fecha_autorizacion','novedades_retiros.created_at')
        ->join('personas', 'personas.id', 'novedades_retiros.id_persona')
        ->orderBy('novedades_retiros.estado')
        ->orderBy('novedades_retiros.created_at')        
        ->get();
        return view('/novedad_retiro.validacion_retiro', compact('novedades'));
    }

    public function consultar_talentoHumano_persona(Request $request)
    {
        if($request->ajax()){
            $data = $request->validate([
                'documento' => 'required|numeric|min:1'
            ]);
            
            try {
                $persona = personas::select(
                    'personas.docomento_persona',
                    'personas.nombres',
                    'personas.apellidos'
                   
                    )
               
                ->where([['personas.docomento_persona', $data['documento']], ['personas.estado_persona', 1]])->first();

                if(isset($persona)){
                    $id_vivienda =base64_encode($persona->id);
                    $id_familia =base64_encode($persona->id_familia);
                    $persona->id = 0;
                    $persona->id_familia = 0;
                    return response()->json([
                        'status' => true,
                        'result'=> $persona,
                      
                    ]);
                }

                return response()->json([
                    'status' => false,
                    'mensaje'=> 'El numero de Identificación no se encuentra registrado.',
                ]);

            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'mensaje'=> 'Ocurrior un error al realizar la consulta.',
                ]);

            }
 
        }
        
    }
    public  function interfas_contratos ($id)
    {
        //$id=base64_decode($id);
        $id=($id);
         $datos = DB:: table('personas')
        
        ->join('contrato', 'personas.id', '=', 'contrato.persona_id')
        ->where('personas.documento_persona',$id)->get();
        return view('consultas.descargar_contratos',compact('datos'));

    
}
    
function descargarActas($id_persona){
   // try {
        $persona=\App\info_persona::where('persona_id',$id_persona)->first();
        $pdf = Storage::get($persona->docomento_pdf); 
        return response()->json(['result' => true, 'pdf'=>base64_encode($pdf)]);
   //  try} catch (\Throwable $th) {
      //  return response()->json(['result' => false]);
   /// }
    
}

function descargarDocumentos($id_persona){
    try {
        $novedad=\App\contrato::findOrFail($id_persona);
        $pdf = Storage::get($novedad->docomento_pdf); 
        return response()->json(['result' => true, 'pdf'=>base64_encode($pdf)]);
   } catch (\Throwable $th) {
        return response()->json(['result' => false]);
    }
    
}

 /////////// DOCENTES OFICIALES ---

 public  function interfas_ingresar_docentes_oficiales()
 {
     return view('docentes_oficiales.docentes_oficiales');
 }

  public  function informacionDocentes()
    {
        return view('docentes_oficiales.informacion_ingresado');
    }

    public function index_docentes( $id_familia)
    {
        $id_familia= base64_decode($id_familia);
        $datos = Personas::select('personas.*')
        ->join('hogar_p', 'hogar_p.id', '=', 'personas.hogar_id')
        ->where([['personas.hogar_id', $id_familia], ['personas.estado_persona', 1]])->get();

        if(count($datos) > 0){
            $personas_censadas = count(Personas::where([['hogar_id', $id_familia], ['status', 1], ['estado_persona', 1]])->get());
            return view('docentes_oficiales.persona',compact('datos', 'personas_censadas'));
        }
        abort(404);
    }


 

    public function show_docentes( $id_familia, $id_persona)
    {

        $id_familia= base64_decode($id_familia);
      
        $id_persona= base64_decode($id_persona); 

        $datos = Personas::findOrFail($id_persona);

        $profecion = DB::table("profecion")->pluck("nombre","id");
        $tipo_vinculacion= DB::table("tipo_vinculacion")->pluck("nombre_vinculacion","id_vinvulacion");
        $idiomas  =  idiomas::get();
        $limitaciones_fisinas  =  limitaciones_fisinas::get();
         
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $departamento_expedicion= DB::table("departamento_expedicion")->pluck("departamento_expedicion","codigo_departamento_expe");
        $tipo_trabajo = DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
        $tipo_trabajo= DB::table("tipo_trabajo")->pluck("nombre_tipo_trabajo","id_tipo_trabajo");
        //$departemento_lugar_trabajo = DB::table("departemento_lugar_trabajo")->pluck("nombre_depatamento_trabajo","codigo_departamento_trabajo");
        $departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento");

        $idiomasPersona=new \App\info_persona_idiomas();
        $limitacionesPersona=new \App\info_persona_limitaciones();

        if($datos->status==0){
            return view('docentes_oficiales.informacion_docentes', compact('limitacionesPersona','tipo_vinculacion','idiomasPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades','tipo_trabajo','departamento','departamento_expedicion'));
        }else{  
            $datosPersona=info_persona::where('persona_id',$id_persona)->first();
            $idiomasPersona=\App\info_persona_idiomas::where('info_persona_id',$datosPersona->id)->get('idiomas_id');
            $limitacionesPersona=\App\info_persona_limitaciones::where('info_persona_id',$datosPersona->id)->get('limitaciones_fisinas_id');
            return view('docentes_oficiales.informacion_docentes', compact('limitacionesPersona','tipo_vinculacion','idiomasPersona','datosPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades','tipo_trabajo','departemento_lugar_trabajo','departamento','departamento_expedicion'));
        }
    }

    public function store_docentes_oficales(Request $data)
    {
        $mensaje='Hubo un problema inesperado, comuníquese con el administrador o Falta  campos  por ingresar información en el formulario. ';
        DB::beginTransaction();

      //  try {
            $validatedData = Validator::make($data->all(), [
              /*  'docomento_pdf' => 'mimes:pdf|max:1024',
                "genero" => "required|min:1|string",
                "empresa_asociativa" => "required|min:6|string",
               // "carnet_salud_id" => "required|min:1|numeric|exists:carnet_salud,id",
               // "profecion_id" => "required|min:1|numeric|exists:profecion,id",
              /*  "telefono" => "required|min:1|numeric",
                "religion" => "required|min:4|string",
                "enfemerma_recurre" => "required|min:1|string",
                "comunidad_indigena" => "required|min:1|string",
                "idiomas" => "array|nullable",
                "idiomas.*" => "required|numeric|min:1|distinct",
                "habla_namuy_wam" => "required|string",
                "escritura_namuy_wam" => "required|string",
                "habla_español" => "required|string",
                "escribe_español" => "required|string",
                "vestimenta_misak" => "required|string",
                "medico_tradicional" => "required|string",
                "conocimientos_empiricos" => "required|min:1|max:10|numeric",
                "deporte_constante" => "required|min:1|numeric", // este campo en la vista no esta bien espesificado
                "lugares_sagrados" => "required|string|min:2",
                //"juegos_tradicionales" => "required|string|min:2",
                "baños_etapas_vida" => "required|string",
               // "mestruacion" => "required|string|min:2",
                "enfermedades_id" => "required|min:1|numeric",
                "medicina_alternativa" => "required|string",
                "consumo_sustancias" => "required|min:1|max:4|numeric",
                "limitaciones_fisinas" => "array|nullable",
                "limitaciones_fisinas.*" => "required|min:1|numeric|distinct",*/
            ]);

            if ($validatedData->fails()) {
                return response()->json([
                    'errors' => $validatedData->errors(),
                    'status' => false
                ]);
            }

            $info_persona=null;
            if(\App\personas::find($data->persona_id)->status==0){
                $info_persona = new  info_persona();
            }else{
                $info_persona=info_persona::where('persona_id',$data->persona_id)->first();
                \App\info_persona_idiomas::where('info_persona_id', $info_persona->id)->delete();
                \App\info_persona_limitaciones::where('info_persona_id', $info_persona->id)->delete();
            }

            if(isset($data->documento_pdf)){

                if(isset($info_persona->docomento_pdf)){
                    Storage::delete($info_persona->docomento_pdf); //elimiar documento
                }
                $namePDF = $data->file('documento_pdf')->store('public'); // Upload PDF
                $info_persona->docomento_pdf = $namePDF;
            }
            
            if(isset($data->hoja_vida_pdf)){

                if(isset($info_persona->hoja_vida_pdf)){
                    Storage::delete($info_persona->hoja_vida_pdf); //elimiar documento
                }
                $namePDF = $data->file('hoja_vida_pdf')->store('public'); // Upload PDF
                $info_persona->hoja_vida_pdf= $namePDF;
            }

            $info_persona->religion = $data['religion'];
            $info_persona->persona_id = $data['persona_id'];
            $info_persona->sexo=$data['genero'];
            $info_persona->empresa_asociativa = $data['empresa_asociativa'];
            $info_persona->religion = $data['religion'];
            $info_persona->enfemerma_recurre = $data['enfemerma_recurre'];
            $info_persona->habla_namuy_wam = $data['habla_namuy_wam'];
            $info_persona->escritura_namuy_wam = $data['escritura_namuy_wam'];
            $info_persona->habla_español = $data['habla_español'];
            $info_persona->escribe_español  = $data['escribe_español'];
            $info_persona->vestimenta_misak = $data['vestimenta_misak'];
            $info_persona->medico_tradicional = $data['medico_tradicional'];
            $info_persona->conocimientos_empiricos = $data['conocimientos_empiricos'];
            $info_persona->deporte_constante = $data['deporte_constante'];
            $info_persona->lugares_sagrados = $data['lugares_sagrados'];
            //$info_persona->juegos_tradicionales  = $data['juegos_tradicionales'];
            $info_persona->baños_etapas_vida = $data['baños_etapas_vida'];
            $info_persona->mestruacion = $data['mestruacion'];
            $info_persona->medicina_alternativa = $data['medicina_alternativa'];
            $info_persona->consumo_sustancias = $data['consumo_sustancias'];
            $info_persona->comunidad_indigena = $data['comunidad_indigena'];
            $info_persona->telefono = $data['telefono'];

            //$info_persona->nivel_atiende = $data['nivel_atiende'];
           
            $info_persona->carnet_salud_id = $data['carnet_salud_id'];
            $info_persona->profecion_id = $data['profecion_id'];
            $info_persona->enfermedades_id = $data['enfermedades_id'];            

            if(!$info_persona->save()){
                throw new Exception();
            }
            $persona=\App\personas::find($data['persona_id']);
            $persona->status=1;
            if(!$persona->save()){
                throw new Exception();
            }

            foreach ($data->idiomas as $value) {
                $info_persona_idiomas=new \App\info_persona_idiomas();
                $info_persona_idiomas->info_persona_id=$info_persona->id;
                $info_persona_idiomas->idiomas_id=$value;                
                if(!$info_persona_idiomas->save()){
                    $mensaje='Error al asociar idiomas a la persona.';
                    throw new Exception();
                }
            }
            

           
            DB::commit();
            return response()->json([
                'status' => true,
                'id'=>$info_persona->id
            ]);
      //  } catch (\Throwable $th) {
        //    DB::rollBack();
          //  return response()->json([
          //      'status' => false,
            //    'mensaje'=>$mensaje,
            //]);
        //}
    }
         
    
 ///////////  FIN DOCENTES OFICIALES ---//////////////////////////////////



///ACTUALIZACION DATOS - TALENTO HUMANO CONTRATADO ////////////////////

public  function vista_consultaCCTalentoHumano()
{
    return view('actualizacion_informacion_docentes.actualizacion');
}
public function BuscarCC_informacion_general_persona(Request $request){
        
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
                'mensaje' => "No existe ninguna persona con esta identificación."
            ]);

    }

}

public  function vista_actualizacion_datos_talento_humano($id_persona)
   {
        $id_persona=base64_decode($id_persona);
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
      
        return view('actualizacion_informacion_docentes.edit_datos_persona', compact('educacionSuperior','educacionFormal','limitacionesPersona','idiomasPersona','datosPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades'));
   }


public function update_talento_humano(Request $request)

{
   // dd($request->all());

    if($request->ajax()){
     //    dd($request->all());
         // Validacion de los datos que llegan al request
         $request->validate([

            "id_desempeno" => "required|string",
          /*   'docomento_pdf' => 'mimes:pdf|max:1024',
             "hoga_id" => "required|min:1|numeric",
             "persona_id" => "required|min:1|numeric",
             "nombre" => "required|min:5|string",
             "apellido" => "required|min:5|string",
             "estado_civil" => "required|min:1|string",
             "tipo_identificacion" => "required|min:2|string",
             "documento_persona" => ["required",
                                     "min:1",
                                     "numeric", 
                                     Rule::unique('personas', 'docomento_persona')->where(function ($query) use($request) {
                                         return $query->where('id', "!=", $request->persona_id);
                                     })], //consultar que este numero de documento no exista.
             "fecha_nacimiento" => "required|date",
             "parentesco" => "required|min:2|string",
             "nivel_educativo" => "required|min:1|string",
             "genero" => "required|min:1|string",
             "empresa_asociativa" => "required|min:6|string",
             //"carnet_salud_id" => "required|min:1|numeric|exists:carnet_salud,id",
          /*   "profecion_id" => "required|min:1|numeric|exists:profecion,id",
             "telefono" => "required|min:1|numeric",
             "religion" => "required|min:4|string",
             "enfemerma_recurre" => "required|min:1|string",
             "comunidad_indigena" => "required|min:1|string",
             "idiomas" => "array|nullable",
             "idiomas.*" => "required|numeric|min:1|distinct",
             "habla_namuy_wam" => "required|string",


             id_desempeno
             "escritura_namuy_wam" => "required|string",
             "habla_español" => "required|string",
             "escribe_español" => "required|string",
             "vestimenta_misak" => "required|string",
             "medico_tradicional" => "required|string",
             "conocimientos_empiricos" => "required|min:1|max:10|numeric",
             "deporte_constante" => "required|min:1|numeric", // este campo en la vista no esta bien espesificado
             "lugares_sagrados" => "required|string|min:2",*/
             //"juegos_tradicionales" => "required|string|min:2",
            // "baños_etapas_vida" => "required|string",
             //"mestruacion" => "required|string|min:2",
        
        
        
        /*     "enfermedades_id" => "required|min:1|numeric",
             "medicina_alternativa" => "required|string",
             "consumo_sustancias" => "required|min:1|max:4|numeric",
             "limitaciones_fisinas" => "array|nullable",
             "limitaciones_fisinas.*" => "required|min:1|numeric|distinct",
             "departamento" => "nullable",
             "municipio" => "nullable",
             "colegio" => "nullable",
             "sede" => "nullable",
             "tipo_educacion" => "nullable",
             "estado" => "nullable",
             "anio" => "nullable",
             "modalidad" => "nullable",
             "nivel_academico" => "nullable",*/
         ]);

         $mensaje="Error al guardar los cambios";

         DB::beginTransaction();
        // try {
             
             //Validar que la persona exista
             if(!Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->exists()){
                 $mensaje='La persona a la que trata de actualizar los datos no existe.';
                 throw new Exception();
             }
             
             $persona = Personas::where([['id', $request->persona_id], ['hogar_id', $request->hoga_id]])->first();

             $persona->docomento_persona = $request->documento_persona;
             $persona->tipo_identificacion = $request->tipo_identificacion;
             $persona->nombres = $request->nombre;
             $persona->apellidos  = $request->apellido;
             $persona->estado_civil  = $request->estado_civil;            
             $persona->fecha_nacimiento  = $request->fecha_nacimiento;
             $persona->nivel_academico  = $request->nivel_educativo;
             $persona->parentesco  = $request->parentesco;

             
             $persona->hogar_id = $request->hoga_id;

             if(!$persona->save()){
                 throw new Exception();
             }

            
             $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();

             if(isset($request->documento_pdf)){

                 if(isset($info_persona->docomento_pdf)){
                     Storage::delete($info_persona->docomento_pdf); //elimiar documento
                 }
                 $namePDF = $request->file('documento_pdf')->store('public'); // Upload PDF
                 $info_persona->docomento_pdf = $namePDF;
             }

           
      
             // documento en pdf  cedula ciudadania 
             

              // actualizacion  lugar de expedicion cc
             $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();
             if(isset($request->id_municipio_expedicion)){

                if(isset($info_persona->id_municipio_expedicion)){
                    Storage::delete($info_persona->id_municipio_expedicion); //elimiar datoingrezado
                }
                $info_persona->id_municipio_expedicion = $request['id_municipio_expedicion'];
            }

            
              // actualizacion   area desempeño trabajo de la persona
             /* $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();
              if(isset($request->id_desempeno)){
 
                 if(isset($info_persona->id_desempeno)){
                     Storage::delete($info_persona->id_desempeno); //elimiar documento
                 }
                 $info_persona->id_desempeno = $request['id_desempeno'];
             }
 */




            // actualizacion  direccion talento humano
            $info_persona=info_persona::where('persona_id',$request->persona_id)->firstOrFail();
            if(isset($request->codigo_municipio)){

               if(isset($info_persona->codigo_municipio)){
                   Storage::delete($info_persona->codigo_municipio); //elimiar documento
                   Storage::delete($info_persona->direccion); //elimiar documento
               }

               $info_persona->codigo_municipio = $request['codigo_municipio'];
               $info_persona->direccion = $request['direccion'];
           }
           
           $info_persona->postgradual= $request['postgradual'];
           $info_persona->fechaexpedicioncc= $request['fechaexpedicioncc'];
             
             $info_persona->religion = $request['religion'];
             $info_persona->persona_id = $request['persona_id'];
             $info_persona->sexo=$request['genero'];
             $info_persona->empresa_asociativa = $request['empresa_asociativa'];
             $info_persona->religion = $request['religion'];
             $info_persona->enfemerma_recurre = $request['enfemerma_recurre'];
             $info_persona->habla_namuy_wam = $request['habla_namuy_wam'];
             $info_persona->escritura_namuy_wam = $request['escritura_namuy_wam'];
             $info_persona->habla_español = $request['habla_español'];
             $info_persona->escribe_español  = $request['escribe_español'];
             $info_persona->vestimenta_misak = $request['vestimenta_misak'];
             $info_persona->medico_tradicional = $request['medico_tradicional'];
             $info_persona->conocimientos_empiricos = $request['conocimientos_empiricos'];
             $info_persona->deporte_constante = $request['deporte_constante'];
             $info_persona->lugares_sagrados = $request['lugares_sagrados'];
             $info_persona->juegos_tradicionales  = $request['juegos_tradicionales'];
             $info_persona->baños_etapas_vida = $request['baños_etapas_vida'];
            
             $info_persona->medicina_alternativa = $request['medicina_alternativa'];
             $info_persona->consumo_sustancias = $request['consumo_sustancias'];
            

             $info_persona->telefono = $request['telefono'];
             $info_persona->id_desempeno = $request['id_desempeno'];
             $info_persona->comunidad_indigena = $request['comunidad_indigena'];
             $info_persona->comunidad_indigena_cual = $request['comunidad_indigena_cual'];
            
             $info_persona->enfermedad_base = $request['enfermedad_base'];
             $info_persona->cual_enfermedad_base = $request['cual_enfermedad_base']; 
             $info_persona->cabeza_familia = $request['cabeza_familia'];
             $info_persona->n_acargos_familia = $request['n_acargos_familia'];


             $info_persona->carnet_salud_id = $request['carnet_salud_id'];
             $info_persona->profecion_id = $request['profecion_id'];
             $info_persona->enfermedades_id = $request['enfermedades_id'];  


             $info_persona->director_grado = $request['director_grado'];  
             $info_persona->n_estudiantes = $request['n_estudiantes'];  
             $info_persona->ne_misak = $request['ne_misak'];  
             $info_persona->ne_nasa = $request['ne_nasa'];  
             $info_persona->ne_yanacula = $request['ne_yanacula'];  
             $info_persona->n_envera = $request['n_envera'];  
             $info_persona->n_campesino = $request['n_campesino'];  
             $info_persona->ne_otro_etnia = $request['ne_otro_etnia']; 
             $info_persona->nombre_grado = $request['nombre_grado']; 

             $info_persona->id_municipio_expedicion = $request['id_municipio_expedicion']; 
             $info_persona->email = $request['email']; 

             $info_persona->fechaexpedicioncc = $request['fechaexpedicioncc']; 


             
             
             

 
             if(!$info_persona->save()){
                 throw new Exception();
             }

             \App\info_persona_idiomas::where('info_persona_id', $info_persona->id)->delete();
             \App\info_persona_limitaciones::where('info_persona_id', $info_persona->id)->delete();

             foreach ($request->idiomas as $value) {
                 $info_persona_idiomas=new \App\info_persona_idiomas();
                 $info_persona_idiomas->info_persona_id=$info_persona->id;
                 $info_persona_idiomas->idiomas_id=$value;                
                 if(!$info_persona_idiomas->save()){
                     $mensaje='Error al asociar idiomas a la persona.';
                     throw new Exception();
                 }
             }
             
            /* foreach ($request->limitaciones_fisinas as $value) {
                 $info_persona_limitaciones=new \App\info_persona_limitaciones();
                 $info_persona_limitaciones->info_persona_id=$info_persona->id;
                 $info_persona_limitaciones->limitaciones_fisinas_id=$value;
                 if(!$info_persona_limitaciones->save()){
                     $mensaje='Error al asociar limitaciones fisicas a la persona.';
                     throw new Exception();
                 }
             }*/

             

             //La persona cuenta con estudios basicos
             if(isset($request->colegio)){ 
                 \App\escuelacolegio::where('info_persona_id', $info_persona->id)->delete();
                 $educacionFormal=new \App\escuelacolegio();
                 $educacionFormal->estado= $request['estado'];
                 $educacionFormal->año_educacion= $request['anio'];

                 $educacionFormal->modalidad_colegio= $request['modalidad'];
                // $educacionFormal->codigo_tipo= $request['tipo_educacion'];
                // $educacionFormal->colegio= $request['tipo_educacion'];
                 $educacionFormal->colegio = $request['colegio'];
                 $educacionFormal->info_persona_id= $info_persona->id;

                 
                 if(!$educacionFormal->save()){
                     throw new Exception();
                 }
             }
             
             DB::commit();
             return response()->json([
                 'result' => true,
                 'id'=>$info_persona->id
             ]);
        
        //    } catch (\Throwable $th) {
          //   DB::rollBack();
            // return response()->json([
               //  'mensaje' => $mensaje,
              //   'result' => false
            // ]);
         //}
    }
}



public function update_educacion_superior_talento_humano(Request $request)
{
    if($request->ajax()){
        $mensaje = "Ocurrio un error al tratar de registrar la educación";
         // dd($request->id_info_persona);
         $request->estudioSuperior = json_decode($request->estudioSuperior);

         // Validacion de los campos
         $request->validate([
             'estudioSuperior' => 'required|json|min:1',
             'estudioSuperior.*.tipo_educacion_superior' => 'string|max:3',
             'estudioSuperior.*.nombre_carrera' => 'string|max:50',
             'estudioSuperior.*.estado_actual' => 'string|max:12',
         ]);

         DB::beginTransaction();
         try {

             \App\educacion_superior::where('persona_id', $request->id_info_persona)->delete();

             foreach ($request->estudioSuperior as $carrera) {
                 
                 $educacion_superior = new \App\educacion_superior();
                 $educacion_superior->tipo_educacion_superior = $carrera->tipo_educacion_superior;
                 $educacion_superior->nombre_carrera = $carrera->nombre_carrera;
                 $educacion_superior->estado_actual = $carrera->estado_actual;
                 $educacion_superior->persona_id = $request->id_info_persona;
                 $educacion_superior->save();

             }
             DB::commit();
             return response()->json([
                 'result' => true,
             ]);
         } catch (\Throwable $th) {
             DB::rollBack();
             return response()->json([
                 'mensaje' => $mensaje,
                 'result' => false
             ]);  
         }
    }
}




public  function resumen_docente_actualizado (  $id_persona)
{

   
   // $id_familia= base64_decode($id_familia);
   // $id_vivienda= base64_decode($id_vivienda); 
    $id_persona= base64_decode($id_persona);     
    $datos = DB:: table('personas')
    ->join('info_persona', 'info_persona.persona_id', '=', 'personas.id')        
    ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
    ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
    ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo') 
    ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
    ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
    ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
    ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
  // ->join('departemento_lugar_trabajo', 'departemento_lugar_trabajo.codigo_departamento_trabajo', '=', 'municipio_lugar_trabajo.codigo_departamento_trabajo ')
    ->join('municipio_expedicion', 'municipio_expedicion.codigo_municipio_expe', '=', 'info_persona.id_municipio_expedicion') 
    ->join('departamento_expedicion', 'departamento_expedicion.codigo_departamento_expe', '=', 'municipio_expedicion.codigo_departamento')  
   ->where([['personas.id', $id_persona]])->get();
   
  return view('actualizacion_informacion_docentes.resumen_actualizacion', compact('datos'));
}


public  function vista_consultaTalentoHumano()
{
    return view('actualizacion_informacion_docentes.informacion_talento_humano');
}

public function BuscarCC_informacion_general_persona_talento_humano(Request $request){
        
    if($request->ajax()){

        $persona = Personas::where([['docomento_persona', $request->documento], ['estado_persona', 1], ['status', 1]])->first();

        if (isset($persona))
            return response()->json([
                'status' => true,
                'result' => $persona
            ]);
          else
            return response()->json([
                'status' => false ,
                'mensaje' => "No existe ninguna persona con esta identificación."
            ]);

    }

}




public  function informacion_personal_talento_humano($id_persona)
   {
       // $id_persona=base64_decode($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");

        $idiomas  =  idiomas::get();
        $limitaciones_fisinas  =  limitaciones_fisinas::get();
        $departamentos=\App\departamento::all();
        $tipo_vinculacion= DB::table("tipo_vinculacion")->pluck("nombre_vinculacion","id_vinvulacion");
        
        $departamento_expedicion= DB::table("departamento_expedicion")->pluck("departamento_expedicion","codigo_departamento_expe");
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento");
        $datos_persona = DB:: table('personas')
        ->join('info_persona', 'info_persona.persona_id', '=', 'personas.id')
        ->join('area_desempeno', 'info_persona.id_desempeno', '=', 'area_desempeno.id_desempeno')        
        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
        ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo') 
       ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
       ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
      ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
       ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
      // ->join('departemento_lugar_trabajo', 'departemento_lugar_trabajo.codigo_departamento_trabajo', '=', 'municipio_lugar_trabajo.codigo_departamento_trabajo ')
      
       ->join('municipio_expedicion', 'municipio_expedicion.codigo_municipio_expe', '=', 'info_persona.id_municipio_expedicion') 
      ->join('departamento_expedicion', 'departamento_expedicion.codigo_departamento_expe', '=', 'municipio_expedicion.codigo_departamento')  

       ->where([['personas.id', $id_persona]])->get();
      
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

           $direccion_cc_expedicion1=\App\info_persona::select('municipio_expedicion.municipio_expedin','departamento_expedicion.departamento_expedicion')
        ->join('municipio_expedicion', 'municipio_expedicion.codigo_municipio_expe', '=', 'info_persona.id_municipio_expedicion') 
        ->join('departamento_expedicion', 'departamento_expedicion.codigo_departamento_expe', '=', 'municipio_expedicion.codigo_departamento')  
        ->where('info_persona.id',$datosPersona->id)->get();
        $direccion_cc_expedicion1=count($direccion_cc_expedicion1)==0?new \App\info_persona():$direccion_cc_expedicion1;

        $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;
        return view('actualizacion_informacion_docentes.ver_informacion_talento_humano', compact('educacionSuperior','direccion_cc_expedicion1','educacionFormal','limitacionesPersona','departamento_expedicion','idiomasPersona','datosPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades', 'departamentos','departamento','tipo_vinculacion','datos_persona'));
   }


   public  function actualizacion_doc()
   {

    return view('actualizacion_doc_hoja_vida.actualizar_documentos');

  }






  public  function actualizacion_doc_hoja_vida($id_persona)
   {
            
    $id_persona=base64_decode($id_persona);
    
    $datos = Personas::findOrFail($id_persona);
     
    $datosPersona=info_persona::where('persona_id',$id_persona)->first();

    $educacionSuperior=\App\educacion_superior::where('persona_id',$datosPersona->id)->get();
    $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;

    return view('actualizacion_doc_hoja_vida.doc_actualizar', compact('educacionSuperior','datosPersona','datos'));
           
   }


   public  function actualizacion_hoja_vida($id_persona)
   {
    $id_persona=base64_decode($id_persona);
    $profecion = DB::table("profecion")->pluck("nombre","id");
    $idiomas  =  idiomas::get();
    $limitaciones_fisinas  =  limitaciones_fisinas::get();
    $departamentos=\App\departamento::all();
    $tipo_vinculacion= DB::table("tipo_vinculacion")->pluck("nombre_vinculacion","id_vinvulacion");
    $departamento_expedicion= DB::table("departamento_expedicion")->pluck("departamento_expedicion","codigo_departamento_expe");
    $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
    $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
    $departamento = DB::table("departamentos")->pluck("nombre_depatamento","codigo_departamento");
    $datos_persona = DB:: table('personas')
    ->join('info_persona', 'info_persona.persona_id', '=', 'personas.id')        
    ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
    ->join('categoria_trabajo', 'info_persona.id_categoria_trabajo', '=', 'categoria_trabajo.id_categoria_trabajo')
    ->join('tipo_trabajo', 'categoria_trabajo.id_tipo_trabajo', '=', 'tipo_trabajo.id_tipo_trabajo') 
   ->join('sede_institucion', 'info_persona.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
   ->join('tipo_institucion', 'sede_institucion.id_tipo_institucion', '=', 'tipo_institucion.id_tipo_institucion')
  ->join('nombre_institucion', 'tipo_institucion.id_nombre_institucion', '=', 'nombre_institucion.id_nombre_institucion')
   ->join('municipio_lugar_trabajo', 'nombre_institucion.codigo_municipio_trabajo', '=', 'municipio_lugar_trabajo.codigo_municipio_trabajo')
  // ->join('departemento_lugar_trabajo', 'departemento_lugar_trabajo.codigo_departamento_trabajo', '=', 'municipio_lugar_trabajo.codigo_departamento_trabajo ')
  
   ->join('municipio_expedicion', 'municipio_expedicion.codigo_municipio_expe', '=', 'info_persona.id_municipio_expedicion') 
  ->join('departamento_expedicion', 'departamento_expedicion.codigo_departamento_expe', '=', 'municipio_expedicion.codigo_departamento')  

   ->where([['personas.id', $id_persona]])->get();
  
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

       $direccion_cc_expedicion1=\App\info_persona::select('municipio_expedicion.municipio_expedin','departamento_expedicion.departamento_expedicion')
    ->join('municipio_expedicion', 'municipio_expedicion.codigo_municipio_expe', '=', 'info_persona.id_municipio_expedicion') 
    ->join('departamento_expedicion', 'departamento_expedicion.codigo_departamento_expe', '=', 'municipio_expedicion.codigo_departamento')  
    ->where('info_persona.id',$datosPersona->id)->get();

    $direccion_cc_expedicion1=count($direccion_cc_expedicion1)==0?new \App\info_persona():$direccion_cc_expedicion1;

    $educacionSuperior=count($educacionSuperior)==0?new \App\educacion_superior():$educacionSuperior;
    return view('actualizacion_doc_hoja_vida.doc_hoja_vida', compact('educacionSuperior','direccion_cc_expedicion1','educacionFormal','limitacionesPersona','departamento_expedicion','idiomasPersona','datosPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades', 'departamentos','departamento','tipo_vinculacion','datos_persona'));      
  

   
           
   }


///  FIN  ACTUALIZACION DATOS - TALENTO HUMANO CONTRATADO ////////////////////


}
