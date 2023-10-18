<?php

namespace App\Http\Controllers;

use App\educacion_superior;
use App\escuelacolegio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EducacionFormalController extends Controller
{
    public function index(  $id_persona){
        
        //$id_familia= base64_decode($id_familia);
        
        $id_persona= ($id_persona); 
        $nombre = \App\info_persona::select('personas.nombres','personas.apellidos')
        ->join('personas', 'personas.id', '=','info_persona.persona_id')->where('persona_id', $id_persona)->first();
        $datos = \App\info_persona::where('persona_id', $id_persona)->first();
        $departamentos=\App\departamento::all();
        return view('interfaces.menu_educacion_formal', compact('datos', 'departamentos','nombre'));
    } 

    public function ConsultarMunicipios($id_departamento){
        $municipio=\App\municipio::where('codigo_departamento',$id_departamento)->get();
        return response()->json($municipio);
    }

    public function ConsultarColegios($id_municipio){
        $colegios=\App\colegio::where('codigo_muni',$id_municipio)->get();
        return response()->json($colegios);
    }

    public function ConsultarSedes($id_colegio){
        $sede=\App\sede::where('codigo_colegio',$id_colegio)->get();
        return response()->json($sede);
    }

    public function ConsultarTiposEducacion($id_sede){
        $tipos=\App\tipo_educacion::where('codigo_sede',$id_sede)->get();
        return response()->json($tipos);
    }

    public function ConsultarAreaDesempeno($id_vinvulacion){
        $area_desempeno=\App\area_desempeno::where('id_desempeno',$id_vinvulacion)->get();
        return response()->json($area_desempeno);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->superior =json_decode($request->superior);
        
        $validator = Validator::make($request->all(), [
            'departamento' => 'required|min:1',
            'municipio' => 'required|min:1',
           //s 'colegio' => 'required|min:1',
           // 'sede' => 'required|min:1',
         //   'tipo_educacion' => 'required|min:1',
            'estado' => 'required',
            'anio'=>'required',
            'modalidad' => 'required',
            'nivel_academico' => 'required|min:1',
            'documento_id' => 'required',
            'superior' => 'json|nullable',
            'superior.*.tipo_educacion_superior' => 'string|max:3',
            'superior.*.nombre_carrera' => 'string|max:50',
            'superior.*.estado_actual' => 'string|max:12',
        ]);
        

        if($validator->fails()){
            return response()->json([
                'mensaje' => $validator->errors(),
                'result' => false,
                'validate' => false
            ]);
        }
        DB::beginTransaction();
    //    try {
            $data=$validator->getData();
            \App\escuelacolegio::where('info_persona_id', $data['documento_id'])->delete();
            $educacionFormal=new \App\escuelacolegio();
            $educacionFormal->estado=$data['estado'];
            $educacionFormal->año_educacion=$data['anio'];
            $educacionFormal->modalidad_colegio=$data['modalidad'];
            $educacionFormal->codigo_tipo=$data['tipo_educacion'];
            $educacionFormal-> colegio=$data['codigo_colegio'];
            $educacionFormal->info_persona_id=$data['documento_id'];
           
            if($educacionFormal->save()!=1){
                throw new Exception();
            }
            
            educacion_superior::where('persona_id', $data['documento_id'])->delete();

            foreach (json_decode($data['superior']) as $carrera) {
                
                $educacion_superior = new educacion_superior();
                $educacion_superior->tipo_educacion_superior = $carrera->tipo_educacion_superior;
                $educacion_superior->nombre_carrera = $carrera->nombre_carrera;
                $educacion_superior->estado_actual = $carrera->estado_actual;
                $educacion_superior->persona_id = $data['documento_id'];
                $educacion_superior->save();
            }

            DB::commit();
            return response()->json([
                'mensaje' => 'Se ha guardado con éxito.',
                'result' => true,
                'validate' => true
            ]);
            
       // } catch (\Throwable $th) {
            //throw $th;
        ///    DB::rollBack();
        //    return response()->json([
         //       'mensaje' => 'Hubo un error inesperado, comuniquese con el administrador.',
         //       'result' => false,
            //    'validate' => true
         //   ]);
       // }


    }


    /*//////////////////////////////////*/
     /*/////////EDUCACION  PARA DOCENTES OFICALES /////////////////////////*/

      /*//////////////////////////////////*/
      public function index_oficiales( $id_familia, $id_persona){
        
        $id_familia= base64_decode($id_familia);
        
        $id_persona= base64_decode($id_persona); 
        $nombre = \App\info_persona::select('personas.nombres','personas.apellidos')
        ->join('personas', 'personas.id', '=','info_persona.persona_id')->where('persona_id', $id_persona)->first();
        $datos = \App\info_persona::where('persona_id', $id_persona)->first();
        $departamentos=\App\departamento::all();
        return view('docentes_oficiales.educacion_docentes_oficiales', compact('datos', 'departamentos','nombre'));
    } 

    /*public function ConsultarMunicipios($id_departamento){
        $municipio=\App\municipio::where('codigo_departamento',$id_departamento)->get();
        return response()->json($municipio);
    }

    public function ConsultarColegios($id_municipio){
        $colegios=\App\colegio::where('codigo_muni',$id_municipio)->get();
        return response()->json($colegios);
    }

    public function ConsultarSedes($id_colegio){
        $sede=\App\sede::where('codigo_colegio',$id_colegio)->get();
        return response()->json($sede);
    }

    public function ConsultarTiposEducacion($id_sede){
        $tipos=\App\tipo_educacion::where('codigo_sede',$id_sede)->get();
        return response()->json($tipos);
    }
    */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store__oficiales(Request $request)
    {
        $request->superior =json_decode($request->superior);
        
        $validator = Validator::make($request->all(), [
            'departamento' => 'required|min:1',
            'municipio' => 'required|min:1',
           //s 'colegio' => 'required|min:1',
           // 'sede' => 'required|min:1',
         //   'tipo_educacion' => 'required|min:1',
            'estado' => 'required',
            'anio'=>'required',
            'modalidad' => 'required',
            'nivel_academico' => 'required|min:1',
            'documento_id' => 'required',
            'superior' => 'json|nullable',
            'superior.*.tipo_educacion_superior' => 'string|max:3',
            'superior.*.nombre_carrera' => 'string|max:50',
            'superior.*.estado_actual' => 'string|max:12',
        ]);
        

        if($validator->fails()){
            return response()->json([
                'mensaje' => $validator->errors(),
                'result' => false,
                'validate' => false
            ]);
        }
        DB::beginTransaction();
    //    try {
            $data=$validator->getData();
            \App\escuelacolegio::where('info_persona_id', $data['documento_id'])->delete();
            $educacionFormal=new \App\escuelacolegio();
            $educacionFormal->estado=$data['estado'];
            $educacionFormal->año_educacion=$data['anio'];
            $educacionFormal->modalidad_colegio=$data['modalidad'];
           // $educacionFormal->codigo_tipo=$data['tipo_educacion'];
            $educacionFormal-> colegio=$data['codigo_colegio'];
            $educacionFormal->info_persona_id=$data['documento_id'];
           
            if($educacionFormal->save()!=1){
                throw new Exception();
            }
            
            educacion_superior::where('persona_id', $data['documento_id'])->delete();

            foreach (json_decode($data['superior']) as $carrera) {
                
                $educacion_superior = new educacion_superior();
                $educacion_superior->tipo_educacion_superior = $carrera->tipo_educacion_superior;
                $educacion_superior->nombre_carrera = $carrera->nombre_carrera;
                $educacion_superior->estado_actual = $carrera->estado_actual;
                $educacion_superior->persona_id = $data['documento_id'];
                $educacion_superior->save();
            }

            DB::commit();
            return response()->json([
                'mensaje' => 'Se ha guardado con éxito.',
                'result' => true,
                'validate' => true
            ]);
            
       // } catch (\Throwable $th) {
            //throw $th;
        ///    DB::rollBack();
        //    return response()->json([
         //       'mensaje' => 'Hubo un error inesperado, comuniquese con el administrador.',
         //       'result' => false,
            //    'validate' => true
         //   ]);
       // }


    }



       /*//////////////////////////////////*/

        /*//////////////////////////////////*/

         /*//////////////////////////////////*/




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
    public function destroy(Request $request)
    {
        if($request->ajax()){
            $request->validate([
                'documento_id' => 'required|numeric|min:1'
            ]);
            DB::beginTransaction();
            try {

                \App\escuelacolegio::where('info_persona_id', $request->documento_id)->delete();
                educacion_superior::where('persona_id', $request->documento_id)->delete();

                DB::commit();
                return response()->json([
                    'validate' => true
                ]);

            } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Hubo un error inesperado, comuniquese con el administrador.',
                    'validate' => true
                ]);
            }

        }
    }
    public function destroy_oficial(Request $request)
    {
        if($request->ajax()){
            $request->validate([
                'documento_id' => 'required|numeric|min:1'
            ]);
            DB::beginTransaction();
            try {

                \App\escuelacolegio::where('info_persona_id', $request->documento_id)->delete();
                educacion_superior::where('persona_id', $request->documento_id)->delete();

                DB::commit();
                return response()->json([
                    'validate' => true
                ]);

            } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Hubo un error inesperado, comuniquese con el administrador.',
                    'validate' => true
                ]);
            }

        }
    }
    

}
