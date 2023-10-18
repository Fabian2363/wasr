<?php

namespace App\Http\Controllers;

use App\comidas_propias;
use App\economia_familia;
use App\hogar;
use App\Hogar_Comida;
use App\Hogar_Economia;
use App\Hogar_plantaCondimentaria;
use App\Hogar_plantasAromatica;
use App\Hogar_plantasEspirituales;
use App\Hogar_plantasMedicinales;
use App\Hogar_plantasNutricional;
use App\Personas;
use App\plancondiaroma;
use App\plantaAromaticas;
use App\plantaEspirituales;
use App\plantaMedicinal;
use App\plantaNutricional;
use App\vivienda;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $info['id_vivienda'] = vivienda::findOrFail(base64_decode($id_vivienda));
        $info['economia']  = economia_familia::get();
        $info['comida']  = comidas_propias::get();
        $info['plancondiaroma']  =  plancondiaroma::get();
        $info['plantaAromaticas']  =  plantaAromaticas::get();
        $info['plantaMedicinal']  =  plantaMedicinal::get(); 
        $info['plantaNutricional']  =  plantaNutricional::get();
        $info['plantaEspirituales'] =  plantaEspirituales::get();
        $hogar=new hogar();
        $economias= new Hogar_Economia();
        $comidas= new Hogar_Comida();
        $condimentarias= new Hogar_plantaCondimentaria();
        $aromaticas= new Hogar_plantasAromatica();
        $medicinales= new Hogar_plantasMedicinales();
        $nutricionales= new Hogar_plantasNutricional();
        $espirituales= new Hogar_plantasEspirituales();
        return view('interfaces.familia', $info, compact('hogar','economias','comidas','condimentarias','aromaticas','medicinales','nutricionales','espirituales'));
    
    }

    public function indexById( $id_hogar){
       
        $info['economia']  = economia_familia::get();
        $info['comida']  = comidas_propias::get();
        $info['plancondiaroma']  =  plancondiaroma::get();
        $info['plantaAromaticas']  =  plantaAromaticas::get();
        $info['plantaMedicinal']  =  plantaMedicinal::get(); 
        $info['plantaNutricional']  =  plantaNutricional::get();
        $info['plantaEspirituales'] =  plantaEspirituales::get();

        $id_hogar =($id_hogar);

        $hogar= hogar::find($id_hogar);
        $economias= Hogar_Economia::where('hogar_id',$id_hogar)->get('economia_familia_id');
        $comidas= Hogar_Comida::where('hogar_id',$id_hogar)->get('comidas_propias_id');
        $condimentarias= Hogar_plantaCondimentaria::where('hogar_id',$id_hogar)->get('id_codimentarias');
        $aromaticas= Hogar_plantasAromatica::where('hogar_id',$id_hogar)->get('id_aromaticas');
        $medicinales= Hogar_plantasMedicinales::where('hogar_id',$id_hogar)->get('id_medicinales');
        $nutricionales= Hogar_plantasNutricional::where('hogar_id',$id_hogar)->get('id_nutricionales');
        $espirituales= Hogar_plantasEspirituales::where('hogar_id',$id_hogar)->get('id_espirituales');

        return view('interfaces.familia', $info, compact('hogar','economias','comidas','condimentarias','aromaticas','medicinales','nutricionales','espirituales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function create_personal(Request $data){
        if($data->ajax()){
           // try {
        
            $validatedData = Validator::make($data->all(), array_merge([
               
                 //"docomento_persona" => "required|min:1|numeric",

                 // Valida si el documento  no se encuentra registrado en sistema 
                "documento_persona" => ['required', 'unique:personas,documento_persona'],
             /*  'documento_persona' => ["required",
                                        "min:1",
                                        "numeric", 
                                        Personas::unique('personas', 'docomento_persona')->where(function ($query) use($request) {
                                            return $query->where('id', "!=", $request->id_usuario);
                                        })], //consultar que este numero de documento no exista.
               */
           
            ], ));
    
            if ($validatedData->fails()) {
                return response()->json([
                    'errors' => $validatedData->errors(),
                    'validate' => false
                ]);
            }
            
                $validatedData = $validatedData->getData();
                $persona=null;
             {
                    $persona = new personas();
                    $persona->status=0;
                }    
                
               
                $persona->documento_persona = $validatedData['documento_persona'];
                $persona->tipo_identificacion = $validatedData['tipo_identificacion'];
                $persona->nombres = $validatedData['nombres'];
                $persona->apellidos  = $validatedData['apellidos'];
                $persona->estado_civil  = $validatedData['estado_civil'];  
                
                 
                              
                if($persona->save()!=1){
                    return response()->json(['validate'=>false]);
                }    
                  return response()->json(['validate'=>true,'id'=> ($persona->id)]);
               // } catch (\Throwable $th) {
                 //   return response()->json(['validate'=>false]);
               // }
            }
    }

    
    
    public function store(Request $request)
    {
        if($request->ajax()){

            DB::beginTransaction();
            try {

                $validatedData = Validator::make($request->all(),[
                    "id_hogar" => "required",
                   
                   // "vivienda_id" => "required|min:1|numeric",
                   
                
                ]);

                if ($validatedData->fails()) {
                    return response()->json([
                        'errors' => $validatedData->errors(),
                        'validate' => false
                    ]);
                }

                $validatedData = $request->all();

                $familia=null;
                if($validatedData['id_hogar']!=0){
                    $familia = hogar::find($validatedData['id_hogar']);
                }else{
                    $familia = new hogar();
                }  
                
               
               
            
               // $familia->vivienda_id = base64_decode($id_vivienda);
                $familia->save();

            
              //  $id = $familia->id;
                DB::commit();
                return response()->json([
                    'result' => true,
                    'hogar_id'=>base64_encode($id_familia)
                ]);
                
                
            } catch (\Throwable $th) {
                dd($th);
                DB::rollBack();
                return response()->json(['validate'=>false]);
            }

        }
    }

    

    public function miembros_familia()
    {
        
       
        
            $vivienda=new personas();

            return view('interfaces.Ingresar_personas',compact('vivienda'));
      
    }

         




    public function create_grupo_familiar(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'personas.*.0' => 'required',
            'personas.*.1' => 'required',
            'personas.*.2' => 'required',
            'personas.*.3' => 'required',
            'personas.*.4' => 'required|numeric',
            'personas.*.5' => 'required',
            
            
           
            'personas' => 'required|array|min:1',
        ]);
        // dd($request);
        if($validator->fails()){
            return response()->json([
                'mensaje' => 'Es posible que le falten datos a algunas personas, vuelve a intentar.',
                'result' => false
            ]);
        }

        $id_familia= new personas();
      
    
        $mensaje='Hubo un problema inesperado, comuníquese con el administrador.';
        DB::beginTransaction();
       // try {
            $personas = $request->personas;

            //Eliminar unicamente las personas
            Personas::where([['id'], ['status', 0]])->delete();

            foreach ($personas as $item) 
            { 
                //Actualziar el ID de la familia a las personas que hacen parte de ella hoy.
                $persona = Personas::where('id', $item[4])->first();

                if($persona != null){
                    //La persona existe
                    if($persona->id != $id_familia){
                    
                        // Actualizar solo el ID de la nueva familia
                        $persona->id = $id_familia;
                         
                        $persona = $id_familia->id;
                        if(!$persona->save()){
                            throw new Exception();
                        }
                    }
                }else{

                    //Registrar la nueva persona o actualizar la informacin si ya existe

                    //Validar que la persona exista
                    if(Personas::where([['docomento_persona', $item[4]], ['id', '!=', $id_familia]])->exists()){
                        $mensaje='La persona con el documento '.$item[4].' ya está registrado en el sistema.';
                        throw new Exception();
                    }
                    
                   // $persona = Personas::where([['docomento_persona', $item[4]], ['id', $id_familia]])->first();

                    if(!isset($persona)){
                        //Crear Nueva Perosona
                        $persona = new Personas;
                        $persona->status=0;
                    }

                }

                
                $persona->docomento_persona = $item[4];
                $persona->tipo_identificacion = $item[3];
                $persona->nombres = $item[0];
                $persona->apellidos  = $item[1];
                $persona->estado_civil  = $item[2];            
               
                //$persona->hogar_id = $id_familia;
                
            
                if(!$persona->save()){
                    throw new Exception();
                }

            }
            $id = $persona->id;
            DB::commit();
            return response()->json([
                'result' => true,
                'id'=>($id_familia)
            ]);
      //  } catch (\Throwable $th) {
           // DB::rollBack();
           // return response()->json([
           //     'mensaje' => $mensaje,
           //     'result' => false
          //  ]);
       // }
    }

    public function validarExistenciaPersona(Request $request)
    {
        if($request->ajax()){
            //Valida que el documento exista en otro nucleos familiares exeptuando en el que estoy.
            if(Personas::where([['docomento_persona', $request->documento], ['docomento_persona', '!=',]])->exists()){
                $mensaje='La persona con el documento '.$request->documento.' ya está registrado en el sistema, si continua con el proceso se procedara a registrar un nuevo contrato laboral';
                return response()->json([
                    'status' => false,
                    'mensaje' => $mensaje
                ]);
            }else{
                return response()->json([
                    'status' => true
                ]);
            }
        }

    }

    /////////////////////ingreso docentes ofiales ////////////////////
      public function index_docentes_oficiales()
    {        
       // $info['id_vivienda'] = vivienda::findOrFail(base64_decode($id_vivienda));
     
       
        $hogar=new hogar();
       
        return view('docentes_oficiales.docentes_oficiales',compact('hogar'));
    
    }

    
    public function informacionDocentes1 ( $id_familia)
    {
        
      //  try {
        
            
            $id_familia = base64_decode($id_familia);
            $departamento_expedicion= DB::table("departamento_expedicion")->pluck("departamento_expedicion","codigo_departamento_expe");
       
            $data = hogar::where([['id', $id_familia]])->firstOrFail();

            // Consultar miembros familia de la familia
            $miembros_familia = Personas::where([['hogar_id', $id_familia], ['estado_persona', 1], ['status', 0]])->get(['id',
                                                                    'tipo_identificacion',
                                                                    'docomento_persona', 
                                                                    'nombres', 
                                                                    'apellidos', 
                                                                    'estado_civil',
                                                                    'fecha_nacimiento',
                                                                    'nivel_academico',
                                                                   
                                                                    'parentesco']);

            return view('docentes_oficiales.informacion_ingresado',compact('id_familia', 'miembros_familia','departamento_expedicion'));
           // return view('docentes_oficiales.informacion_ingresado');
       // } catch (\Throwable $th) {
            //return ['validate' => false,'msj' => 'El codigo del hogar no exixte'];
    //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
