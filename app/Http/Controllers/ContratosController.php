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

class ContratosController extends Controller{
/*
    public function contros_index($id_persona)
    {
       // $id_familia= base64_decode($id_familia);
       $info['id_persona'] = Personas::findOrFail(($id_persona));
       $hogar=new contrato();
       $datos = Personas::select('personas.*')
       //$contratos = contratos::all()
        //$datos = DB:: table('personas')
        // ->join('contrato', 'contrato.id_persona', '=', 'personas.id')
        ->where([['personas.id', $id_persona], ['personas.estado_persona', 1]])->get();

        if(count($datos) > 0){
            $personas_censadas = count(Personas::where([['id', $id_persona], ['status', 1], ['estado_persona', 1]])->get());
            return view('interfaces.contratos',$info,compact('datos', 'personas_censadas','hogar'));
        }
        abort(404);
    }*/
      
    
    public function contros_index( $id_persona)
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
        $datosPersona= new contrato();
        $info['tipo_contrato'] = DB::table("tipo_contrato")->pluck("nombre_tipcontrato","id_tipo_contrato");
        $info['tipo_dotacion'] = DB::table("tipo_dotacion")->pluck("nombretipodotacion","id_dotacion");
        $info['cajacompens'] = DB::table("cajacompens")->pluck("nombre","id_caja_compensacion");
        $info['riesgo'] = DB::table("riesgo")->pluck("nombre_risgo","id_riesgo");
        $info['eps'] = DB::table("eps")->pluck("nombre_eps","id_eps");
        $info['afp'] = DB::table("afp")->pluck("afp_nombre","id_afp");  
        $info['item_canasta'] = DB::table("item_canasta")->pluck("nombre_canasta","id_canasta");       
        $datosPersona= new contrato();
        $info['categoria_item'] = DB::table("categoria_item")->pluck("id_categoria_canasta","nombre_categoria");
        $info['departamento_institucion'] = DB::table("departamento_institucion")->pluck("nombre_intitucion","id_departamento");

        return view('interfaces.contratos',$info, compact('limitacionesPersona','idiomasPersona','datosPersona','datos','carnet_salud','enfermedades','profecion','departamento','departamento_expedicion'));
        
    }
    
     /// llamar  item canasta  contratacion 
    public function getcategoria_item(Request $request)
    {
        $categoria_item = DB::table("categoria_item")
        ->where("id_canasta",$request->id_canasta)
         ->pluck("nombre_categoria","id_categoria_canasta");
          return response()->json($categoria_item);
    } 

    ///seleccionar direccion donde va trabajar el empleado o provedor 
    public function genmunicipioie(Request $request)
    {
        $municipio_institucion = DB::table("municipio_institucion")
        ->where ("id_departamento", $request->id_departamento)
        ->pluck("nombre_municipioi","id_municipio");
           return response()->json($municipio_institucion);
    }

    public function getresguardo_direccion(Request $request)
    {
        $resguardo_istitucion = DB::table("resguardo_istitucion")
        ->where("id_municipio",$request->id_municipio)
         ->pluck("nombre_resguardoi","id_resguardo");
          return response()->json($resguardo_istitucion);
    } 

    public function getinstitucio_educativa(Request $request)
    {
        $institucio_educativa = DB::table("institucio_educativa")
        ->where("id_resguardo",$request->id_resguardo)
         ->pluck("nombreie","id_institucio");
          return response()->json($institucio_educativa);
    } 

    public function getsede_institucion(Request $request)
    {
        $sede_institucion = DB::table("sede_institucion")
        ->where("id_institucio",$request->id_institucio)
         ->pluck("nombresi","id_sede_institucion");
          return response()->json($sede_institucion);
    } 




    public function storecontratos(Request $data, $request)
    {
       // $mensaje='Hubo un problema inesperado, comuníquese con el administrador o Falta  campos  por ingresar información en el formulario. ';
      //  DB::beginTransaction();

       // try {
            $validatedData = Validator::make($data->all(), [
            'docomento_pdf' => 'mimes:pdf|max:1024',
          //  "" => "required|min:1|string", 
          "num_contrato" => "required|min:1|numeric",
          "num_sedcauca" => "required|min:1|numeric",            
          "salario" => "required|min:1|numeric",
          "razon_social" => "required|min:1|string",
          "fecha_ingreso" => "required|min:1|string",
          "fecha_vencimiento" => "required|min:1|string",
         // "docomento_pdf" => "required|min:1|string",
          "id_tipo_contrato" => "required|min:1|numeric",
          //"id_persona" => "required|min:1|numeric",
          "id_tipo_dotacion" => "required|min:1|numeric",
          "id_caja_compensacion" => "required|min:1|numeric",
          "id_riesgo" => "required|min:1|numeric",
          "id_eps" => "required|min:1|numeric",
          "id_afp" => "required|min:1|numeric",
          "id_categoria_canasta" => "required|min:1|numeric",
          "id_sede_institucion" => "required|min:1|numeric",
          //"" => "required|min:1|string",
          //"" => "required|min:1|string",
           
            ]);

            if ($validatedData->fails()) {
                return response()->json([
                    'errors' => $validatedData->errors(),
                    'status' => false
                ]);
            }

            $info_persona=null;
            if(\App\personas::find($data->persona_id)->estado_contrato==1){
                $info_persona = new contrato();
            }else{
                $info_persona= contrato::where('persona_id',$data->persona_id)->first();
            }
            /*          
            if(isset($data->documento_pdf)){
               $namePDF = $data->file('documento_pdf')->store('public'); // Upload PDF
                $info_persona->docomento_pdf = $namePDF;
            }  */
            if(isset($data->documento_pdf)){
                $namePDF = $data->file('documento_pdf')->store('public'); // Upload PDF
                 $info_persona->docomento_pdf = pathinfo($namePDF, PATHINFO_BASENAME); // Obtener el nombre del archivo sin la ruta
             }  
              
           // $info_persona->religion = $data['religion'];
               $info_persona->persona_id = $data['persona_id'];
               $info_persona->num_contrato = $data['num_contrato'];
               $info_persona->num_sedcauca  = $data['num_sedcauca'];
               $info_persona->salario = $data['salario'];
               $info_persona->razon_social = $data['razon_social'];
               $info_persona->fecha_ingreso = $data['fecha_ingreso'];
               $info_persona->fecha_vencimiento = $data['fecha_vencimiento'];
               $info_persona->observaciones = $data['observaciones'];
               $info_persona->id_tipo_contrato = $data['id_tipo_contrato'];
               $info_persona->id_tipo_dotacion = $data['id_tipo_dotacion'];
               $info_persona->id_caja_compensacion  = $data['id_caja_compensacion'];
               $info_persona->id_riesgo = $data['id_riesgo'];
               $info_persona->id_eps = $data['id_eps'];
               $info_persona->id_afp = $data['id_afp'];
               $info_persona->id_categoria_canasta = $data['id_categoria_canasta'];
               $info_persona->id_sede_institucion = $data['id_sede_institucion'];
            if(!$info_persona->save()){
                throw new Exception();
            }
          $persona=\App\personas::find($data['persona_id']);
           $persona->estado_contrato=1;
        if(!$persona->save()){
            throw new Exception();
           }
           
            DB::commit();
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

    
    public  function vista_contratos_personal_ingresado()
    {
        return view('contratos.consulta');
    }
    
    public function consulta_persona_contrato(Request $request){
        
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

   public  function interfas_contratos_empleado ($id)
    {
        //$id=base64_decode($id);
        $id=($id);
         $datos = DB:: table('personas')
        ->join('contrato', 'personas.id', '=', 'contrato.persona_id')
        ->where('personas.documento_persona',$id)->get();
        return view('contratos.contratos',compact('datos'));
    }


    function descargarContrato($id_persona){
        try {
            $novedad=\App\contrato::findOrFail($id_persona);
            $pdf = Storage::get($novedad->docomento_pdf); 
            return response()->json(['result' => true, 'pdf'=>base64_encode($pdf)]);
       } catch (\Throwable $th) {
            return response()->json(['result' => false]);
        }   
    }
    
    public function verdocumento($id_persona){
        $file = contrato::where('id',$id_persona)->first();
        //$file = contrato::findOrFail($id_persona);
        return response()->json(['response' => [
            'docomento_pdf' => $file->docomento_pdf,
             'name' => $file->name,
            ]
        ], 201);
    }

    public function ver_info_contrato($id_persona){
        //$info['id_persona'] = Personas::findOrFail(($id_persona));
        $datos = contrato::select(
            'personas.documento_persona',
            'personas.nombres',
            'personas.apellidos',
            'personas.tipo_identificacion',
            'contrato.id as id_contrato',
            'contrato.num_contrato',
            'contrato.num_sedcauca',
            'contrato.salario',
            'contrato.fecha_registro',
            'contrato.razon_social',
            'contrato.fecha_ingreso',
            'contrato.fecha_vencimiento',
            'contrato.observaciones',
            'tipo_contrato.nombre_tipcontrato',
            'tipo_dotacion.nombretipodotacion',
            'cajacompens.nombre',
            'riesgo.nombre_risgo',
            'eps.nombre_eps',
            'afp.afp_nombre',
            'item_canasta.nombre_canasta',
            'categoria_item.nombre_categoria',
            'departamento_institucion.nombre_intitucion',
            'municipio_institucion.nombre_municipioi',
            'resguardo_istitucion.nombre_resguardoi',
            'institucio_educativa.nombreie',
            'sede_institucion.nombresi'
      
            )
        ->join('personas', 'contrato.persona_id', '=', 'personas.id')
        ->join('tipo_contrato', 'contrato.id_tipo_contrato', '=', 'tipo_contrato.id_tipo_contrato')
        ->join('tipo_dotacion', 'contrato.id_tipo_dotacion', '=', 'tipo_dotacion.id_dotacion')
        ->join('cajacompens', 'contrato.id_caja_compensacion', '=', 'cajacompens.id_caja_compensacion')
        ->join('riesgo', 'contrato.id_riesgo', '=', 'riesgo.id_riesgo')
        ->join('eps', 'contrato.id_eps', '=', 'eps.id_eps')
        ->join('afp', 'contrato.id_afp', '=', 'afp.id_afp')
        ->join('categoria_item', 'contrato.id_categoria_canasta', '=', 'categoria_item.id_categoria_canasta')
        ->join('item_canasta', 'categoria_item.id_canasta', '=', 'item_canasta.id_canasta')
        ->join('sede_institucion', 'contrato.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
        ->join('institucio_educativa', 'sede_institucion.id_institucio', '=', 'institucio_educativa.id_institucio')
        ->join('resguardo_istitucion', 'institucio_educativa.id_resguardo', '=', 'resguardo_istitucion.id_resguardo')
        ->join('municipio_institucion', 'resguardo_istitucion.id_municipio', '=', 'municipio_institucion.id_municipio')
        ->join('departamento_institucion', 'municipio_institucion.id_departamento', '=', 'departamento_institucion.id_departamento')
        ->where([['contrato.id', $id_persona]])->get();
        return view('contratos.info_contrato',compact('datos'));
    }

      

         public function actualizar_contrato( $id_persona)
        {
        //$id_persona= base64_decode($id_persona); 
        $id_persona= ($id_persona);
        $datos = contrato::findOrFail($id_persona);
        $profecion = DB::table("profecion")->pluck("nombre","id");
        $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
        $idiomasPersona=new \App\info_persona_idiomas();
        $limitacionesPersona=new \App\info_persona_limitaciones();
        $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
        $departamento_expedicion= DB::table("departamento_expedicion")->pluck("departamento_expedicion","codigo_departamento_expe");
        $departamento = DB::table("departamento_direccion")->pluck("nombre","id_departamento");
        $info['tipo_contrato'] = DB::table("tipo_contrato")->pluck("nombre_tipcontrato","id_tipo_contrato");
        $info['tipo_dotacion'] = DB::table("tipo_dotacion")->pluck("nombretipodotacion","id_dotacion");
        $info['cajacompens'] = DB::table("cajacompens")->pluck("nombre","id_caja_compensacion");
        $info['riesgo'] = DB::table("riesgo")->pluck("nombre_risgo","id_riesgo");
        $info['eps'] = DB::table("eps")->pluck("nombre_eps","id_eps");
        $info['afp'] = DB::table("afp")->pluck("afp_nombre","id_afp");  
        $info['item_canasta'] = DB::table("item_canasta")->pluck("nombre_canasta","id_canasta");       
        $info['categoria_item'] = DB::table("categoria_item")->pluck("id_categoria_canasta","nombre_categoria");
        $info['departamento_institucion'] = DB::table("departamento_institucion")->pluck("nombre_intitucion","id_departamento");
        $profecion = DB::table("profecion")->pluck("nombre","id");
        $datoscontrato = contrato::select(
            'personas.documento_persona',
            'personas.nombres',
            'personas.apellidos',
            'personas.tipo_identificacion',
            'contrato.id as id_contrato',
            'contrato.num_contrato',
            'contrato.num_sedcauca',
            'contrato.salario',
            'contrato.fecha_registro',
            'contrato.razon_social',
            'contrato.fecha_ingreso',
            'contrato.fecha_vencimiento',
            'contrato.observaciones',
            'tipo_contrato.nombre_tipcontrato',
            'tipo_dotacion.nombretipodotacion',
            'cajacompens.nombre',
            'riesgo.nombre_risgo',
            'eps.nombre_eps',
            'afp.afp_nombre',
            'item_canasta.nombre_canasta',
            'categoria_item.nombre_categoria',
            'departamento_institucion.nombre_intitucion',
            'municipio_institucion.nombre_municipioi',
            'resguardo_istitucion.nombre_resguardoi',
            'institucio_educativa.nombreie',
            'sede_institucion.nombresi'
      
            )
        ->join('personas', 'contrato.persona_id', '=', 'personas.id')
        ->join('tipo_contrato', 'contrato.id_tipo_contrato', '=', 'tipo_contrato.id_tipo_contrato')
        ->join('tipo_dotacion', 'contrato.id_tipo_dotacion', '=', 'tipo_dotacion.id_dotacion')
        ->join('cajacompens', 'contrato.id_caja_compensacion', '=', 'cajacompens.id_caja_compensacion')
        ->join('riesgo', 'contrato.id_riesgo', '=', 'riesgo.id_riesgo')
        ->join('eps', 'contrato.id_eps', '=', 'eps.id_eps')
        ->join('afp', 'contrato.id_afp', '=', 'afp.id_afp')
        ->join('categoria_item', 'contrato.id_categoria_canasta', '=', 'categoria_item.id_categoria_canasta')
        ->join('item_canasta', 'categoria_item.id_canasta', '=', 'item_canasta.id_canasta')
        ->join('sede_institucion', 'contrato.id_sede_institucion', '=', 'sede_institucion.id_sede_institucion')
        ->join('institucio_educativa', 'sede_institucion.id_institucio', '=', 'institucio_educativa.id_institucio')
        ->join('resguardo_istitucion', 'institucio_educativa.id_resguardo', '=', 'resguardo_istitucion.id_resguardo')
        ->join('municipio_institucion', 'resguardo_istitucion.id_municipio', '=', 'municipio_institucion.id_municipio')
        ->join('departamento_institucion', 'municipio_institucion.id_departamento', '=', 'departamento_institucion.id_departamento')
        ->where([['contrato.id', $id_persona]])->get();
    
        if($datos->status==0){
            return view('contratos.actualizar_contrato',$info,compact('datosPersona','datos','limitacionesPersona','idiomasPersona','datosPersona','carnet_salud','enfermedades','profecion','departamento','departamento_expedicion','datoscontrato'));
        }else{  
            $datosPersona=contrato::where('id',$id_persona)->first();
           
            return view('contratos.actualizar_contrato',$info,compact('datosPersona','datos','limitacionesPersona','idiomasPersona','datosPersona','carnet_salud','enfermedades','profecion','departamento','departamento_expedicion','datoscontrato'));
        }
    }

    // actualizar contrato 
    public function updatecontratos(Request $data, $id)
      {
    // Validar los datos
    $validatedData = Validator::make($data->all(), [
        // ...
    ]);

    if ($validatedData->fails()) {
        return response()->json([
            'errors' => $validatedData->errors(),
            'status' => false
        ]);
    }

    // Actualizar los datos
    $contrato = contrato::find($id);
    // Actualizar los campos
    $contrato->num_contrato = $data['num_contrato'];
    $contrato->num_sedcauca = $data['num_sedcauca'];
    $contrato->salario = $data['salario'];
    $contrato->razon_social = $data['razon_social'];
    $contrato->fecha_ingreso = $data['fecha_ingreso'];
    $contrato->fecha_vencimiento = $data['fecha_vencimiento'];
    $contrato->observaciones = $data['observaciones'];
    $contrato->id_tipo_contrato = $data['id_tipo_contrato'];
    $contrato->id_tipo_dotacion = $data['id_tipo_dotacion'];
    $contrato->id_caja_compensacion = $data['id_caja_compensacion'];
    $contrato->id_riesgo = $data['id_riesgo'];
    $contrato->id_eps = $data['id_eps'];
    $contrato->id_afp = $data['id_afp'];
    $contrato->id_categoria_canasta = $data['id_categoria_canasta'];
    $contrato->id_sede_institucion = $data['id_sede_institucion'];

     // Actualizar el archivo PDF
     if (isset($data['documento_pdf'])) {
        $namePDF = $data->file('documento_pdf')->store('public');
        $contrato->docomento_pdf = pathinfo($namePDF, PATHINFO_BASENAME);
    }

    // Guardar los cambios
    if (!$contrato->save()) {
        return response()->json([
            'status' => false
        ]);
    }

    return response()->json([
        'status' => true
    ]);
   }

  }