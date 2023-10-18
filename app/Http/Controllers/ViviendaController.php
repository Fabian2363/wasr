<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
//Use plataforma\App\Http\Requests\ViviendaRequest;
use App\Http\Requests\ViviendaRequest;
use App\vivienda;
use App\hogar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ViviendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $info['material_paredes'] = DB::table("material_paredes")->pluck("nombre_paredes","id");
        $info['material_cocina'] = DB::table("material_cocina")->pluck("nombre_cocina","id");
        $info['material_piso'] = DB::table("material_piso")->pluck("nombre_piso","id"); 
        $info['material_techo'] = DB::table("material_techo")->pluck("nombre_techo","id"); 
        $info['suministro_agua'] = DB::table("suministro_agua")->pluck("tipo_suministro","id"); 
        $info['servicio_energia'] = DB::table("servicio_energia")->pluck("tipo_servicio","id"); 
        $info['servicio_sanitario'] = DB::table("servicio_sanitario")->pluck("nombre_servicio","id");
        $info['departamento'] = DB::table("departamento")->pluck("nombre_depatamento","codigo_departamento"); 

        $vivienda=new vivienda();

        return view('interfaces.vivienda', $info, compact('vivienda'));
    }
    
    public function indexById($id_vivienda)
    {
        $vivienda=vivienda::select('vivienda.id','vivienda.ubicación_vivienda','vivienda.numero_hogares','vivienda.estado_conservacion',
        'vivienda.periodo_construccion','vivienda.forma_casa','vivienda.wetasphalt', 'vivienda.tamaño_casa',
        'vivienda.servicio_internet','vivienda.numero_cuertos','vivienda.cuartos_usados','vivienda.material_paredes_id',
        'vivienda.material_piso_id','vivienda.material_cocina_id','vivienda.material_techo_id','vivienda.suministro_agua_id','vivienda.servicio_energia_id',
        'vivienda.servicio_sanitario_id', 'sector.nombre_sector','vereda.nombre_vereda','zona.nombre_zona',
        'resguardo.nombre_reguardo','municipio.nombre_municipio','departamento.nombre_depatamento')
        ->join('sector','sector.codigo_sector','vivienda.codigo_sector')
        ->join('vereda','vereda.codigo_vereda','sector.codigo_vereda')
        ->join('zona','vereda.codigo_zona','zona.codigo_zona')
        ->join('resguardo','resguardo.codigo_resguardo','zona.codigo_resguardo')
        ->join('municipio','resguardo.codigo_municipio','municipio.codigo_municipio')
        ->join('departamento','departamento.codigo_departamento','municipio.codigo_departamento')
        ->where('vivienda.id', base64_decode($id_vivienda))->first();
        
        $info['material_paredes'] = DB::table("material_paredes")->pluck("nombre_paredes","id");
        $info['material_cocina'] = DB::table("material_cocina")->pluck("nombre_cocina","id");
        $info['material_piso'] = DB::table("material_piso")->pluck("nombre_piso","id"); 
        $info['material_techo'] = DB::table("material_techo")->pluck("nombre_techo","id"); 
        $info['suministro_agua'] = DB::table("suministro_agua")->pluck("tipo_suministro","id"); 
        $info['servicio_energia'] = DB::table("servicio_energia")->pluck("tipo_servicio","id"); 
        $info['servicio_sanitario'] = DB::table("servicio_sanitario")->pluck("nombre_servicio","id");
        $info['departamento'] = DB::table("departamento")->pluck("nombre_depatamento","codigo_departamento"); 

        return view('interfaces.vivienda', $info, compact('vivienda'));
    }



    public function store(Request $data){
        if($data->ajax()){
            try {
                $validateEducacion=["departamento" => "required|min:1|numeric",
                "municipio" => "required|min:1|numeric",
                "resguardo" => "required|min:1|numeric",
                "zona" => "required|min:1|numeric",
                "vereda" => "required|min:1|numeric",
                "sector" => "required|min:1|numeric"];
                if($data->id_vivienda!=0){
                    $validate=$data->all();
                    if($validate['departamento']==null && $validate['municipio']==null && $validate['resguardo']==null && $validate['zona']==null && $validate['vereda']==null && $validate['sector']==null){
                        $validateEducacion=[];
                    }
                }

            $validatedData = Validator::make($data->all(), array_merge([
                "wetasphalt" => "required|min:1|max:3|numeric",
                "numero_familias" => "required|min:1|numeric",
                "cuartos_usados" => "required|min:1|numeric",
                "numero_cuertos" => "required|min:1|numeric",
                "suministro_agua" => "required|min:1|numeric",
                "servicio_energia" => "required|min:1|numeric",
                "servicio_internet" => "required",
                "servicio_sanitario" => "required|min:1|numeric",
                "material_paredes" => "required|min:1|numeric",
                "material_piso" => "required|min:1|numeric",
                "estado_conservacion" => "required",
                "forma_casa" => "required",
                "material_cocina" => "required|min:1|numeric",
                "material_techo" => "required|min:1|numeric",
                "periodo_construccion" => "required",
                "tamaño_casa" => "required"
            ], $validateEducacion));

            if ($validatedData->fails()) {
                return response()->json([
                    'errors' => $validatedData->errors(),
                    'validate' => false
                ]);
            }

            // "wetasphalt" => "3"
            // "numero_familias" => "0"
            // "cuartos_usados" => "0"
            // "numero_cuertos" => "0"
            // "suministro_agua" => "1"
            // "servicio_energia" => "1"
            // "servicio_internet" => "SI"
            // "servicio_sanitario" => "1"
            // "material_paredes" => "1"
            // "material_piso" => "1"
            // "estado_conservacion" => "Excelente"
            // "forma_casa" => "Cuadrada"
            // "material_cocina" => "1"
            // "material_techo" => "1"
            // "periodo_construccion" => "10 años"
            // "tamaño_casa" => "Ingresar"
            // "departamento" => "100"
            // "municipio" => "200"
            // "resguardo" => "1167"
            // "zona" => "400"
            // "vereda" => "500"
            // "sector" => "600"
            //Validate data
            
                $validatedData = $validatedData->getData();
                $vivienda=null;
                if($validatedData['id_vivienda']!=0){
                    $vivienda = vivienda::find($validatedData['id_vivienda']);
                }else{
                    $vivienda = new  vivienda();
                }                
                $vivienda->material_paredes_id = $validatedData['material_paredes'];
                $vivienda->material_piso_id = $validatedData['material_piso'];
                $vivienda->material_cocina_id = $validatedData['material_cocina'];
                $vivienda->material_techo_id = $validatedData['material_techo'];
                $vivienda->suministro_agua_id = $validatedData['suministro_agua'];
                $vivienda->servicio_energia_id = $validatedData['servicio_energia'];
                $vivienda->servicio_sanitario_id = $validatedData['servicio_sanitario'];
                $vivienda->numero_hogares = $validatedData['numero_familias'];
                $vivienda->estado_conservacion = $validatedData['estado_conservacion'];
                $vivienda->periodo_construccion = $validatedData['periodo_construccion'];
                $vivienda->forma_casa = $validatedData['forma_casa'];
                $vivienda->tamaño_casa = $validatedData['tamaño_casa'];
                $vivienda->servicio_internet = $validatedData['servicio_internet'];
                $vivienda->numero_cuertos = $validatedData['numero_cuertos'];
                $vivienda->cuartos_usados = $validatedData['cuartos_usados'];
                $vivienda->wetasphalt = $validatedData['wetasphalt'];
                if(count($validateEducacion)>0){
                    $vivienda->codigo_sector = $validatedData['sector'];
                }                    
                if($vivienda->save()!=1){
                    return response()->json(['validate'=>false]);
                }    
                return response()->json(['validate'=>true,'id'=> base64_encode($vivienda->id)]);
            } catch (\Throwable $th) {
                return response()->json(['validate'=>false]);
            }
        }

    }

    function create_hogar_persona(Request $data){
        //try {
            $user = new  hogar();
            $user->vivienda_id = $data['vivienda_id'];
            $user->codigo_sector = $data['codigo_sector'];
            $user->save();
            return ['validate'=>true,'id'=>$user->id];
            //code...
       // } catch (\Throwable $th) {
           // return ['validate'=>false];
        //}
    }
    
     


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ /*


    /**
     * Display the specified resource.
     *
     * @param  \App\Vivienda  $vivienda
     * @return \Illuminate\Http\Response
     */
  
    public function show($id)
    {
        //$personas = vivienda::find($id);

        //return view('interfaces.informacion_general_persona', compact('personas'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vivienda  $vivienda
     * @return \Illuminate\Http\Response
     */
    public function edit(Vivienda $vivienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vivienda  $vivienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vivienda $vivienda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vivienda  $vivienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vivienda $vivienda)
    {
        //
    }
}
