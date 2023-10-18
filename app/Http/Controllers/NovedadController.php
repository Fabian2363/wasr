<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class NovedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFallecido()
    {
        return view('novedad_retiro.buscar_persona_fallecido');
    }

    public function indexRetirado()
    {
        return view('novedad_retiro.buscar_persona_retiro');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFallecido(Request $request)
    {
        //try {
            
            $request->validate([
                'id_persona'=>'required',
                'acta_novedad' => 'mimes:pdf|max:1024'
            ]);
            $novedad=\App\Novedad_retiro::where([['id_persona',$request->id_persona],['tipo_novedad',0]])->first();
            if($novedad==null){
                $novedad=new \App\Novedad_retiro();
            }else{
                Storage::delete($novedad->acta_novedad);
            }      
            
            $namePDF = $request->file('acta_novedad')->store('public/novedades'); // Upload PDF
            $novedad->acta_novedad = $namePDF;
            $novedad->tipo_novedad='0'; //0=fallecido, 2=retirado
            $novedad->id_persona=$request->id_persona;
            $novedad->estado='0';
            if($novedad->save()!=1){
                throw new Exception();
            }
            return response()->json([
                'result' => true
            ]);
      ////  } catch (\Throwable $th) {
          /////  return response()->json([
           //     'result' => false
           // ]);
      //  }       

    }

    public function storeRetirado(Request $request)
    {
       // try {            
            $request->validate([
                'id_persona'=>'required',
                'acta_novedad' => 'mimes:pdf|max:1024',
                'motivos'=>'required'
            ]);
            $novedad=\App\Novedad_retiro::where([['id_persona',$request->id_persona],['tipo_novedad',2]])->first();
            if($novedad==null){
                $novedad=new \App\Novedad_retiro();
            }else{
                Storage::delete($novedad->acta_novedad);
            }
            $namePDF = $request->file('acta_novedad')->store('public/novedades'); // Upload PDF
            $novedad->acta_novedad = $namePDF;
            $novedad->tipo_novedad='2'; //0=fallecido, 2=retirado
            $novedad->id_persona=$request->id_persona;
            $novedad->motivo_retiro=$request->motivos;
            $novedad->estado='0';
            if($novedad->save()!=1){
                throw new Exception();
            }            
            
            return response()->json([
                'result' => true
            ]);
      //  } catch (\Throwable $th) {            
          // try  return response()->json([
             //   'result' => false
           // ]);
        //}       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFallecido($documento)
    {
        //try {            
            $personas=\App\personas::select('personas.docomento_persona','personas.tipo_identificacion','resguardo.nombre_reguardo',
            'personas.nombres','personas.apellidos','personas.id')
            ->join('hogar_p','hogar_p.id','personas.hogar_id')
            ->join('vivienda','vivienda.id','hogar_p.vivienda_id')
            ->join('sector','sector.codigo_sector','vivienda.codigo_sector')
            ->join('vereda','vereda.codigo_vereda','sector.codigo_vereda')
            ->join('zona','vereda.codigo_zona','zona.codigo_zona')
            ->join('resguardo','resguardo.codigo_resguardo','zona.codigo_resguardo')
            ->where([["docomento_persona","like","%".$documento."%"],['estado_persona','=','1']])->get()->toArray();
            return response()->json(['result'=>true,'personas'=>$personas]);
      //  } catch (\Throwable $th) {
          //  return response()->json(['result'=>false]);
       // }
        
    }

    public function showRetirado($documento)
    {
        //try {            
            $personas=\App\personas::select('personas.docomento_persona','personas.tipo_identificacion','personas.nombres','personas.apellidos','personas.id')
            ->join('hogar_p','hogar_p.id','personas.hogar_id')
          
            ->where([["docomento_persona","like","%".$documento."%"], ['estado_persona', 1], ['status', 1]])->get()->toArray();
            return response()->json(['result'=>true,'personas'=>$personas]);
      //  } catch (\Throwable $th) {
            return response()->json(['result'=>false]);
      //  }
        
    }

    public  function viewNovedadFallecido($id_persona)
    { 
        $datos = \App\Personas::findOrFail(base64_decode($id_persona));
        return view('novedad_retiro.retiro_fallecimiento',compact('datos'));
    }

    public  function viewNovedadRetirado($id_persona)
    { 
        $datos = \App\Personas::findOrFail(base64_decode($id_persona));
        return view('novedad_retiro.retiro_censo_poblacional',compact('datos'));
    }

    public  function viewSolicitudes(Request $request)
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

    
    function cambiarEstadoSolicitud($id_novedad){
        DB::beginTransaction();
        try {
            $novedad=\App\Novedad_retiro::findOrFail($id_novedad);
            $novedad->fecha_autorizacion=$novedad->estado==1?null:Carbon::now()->toDateTimeString();
            $novedad->estado=$novedad->estado==1?0:1;            
            if($novedad->save()!=1){
                throw new Exception();
            }
            $persona=\App\personas::findOrFail($novedad->id_persona);
            if($novedad->tipo_novedad==0){
                $persona->estado_persona=$novedad->estado==1?0:1;
            }else{
                $persona->estado_persona=$novedad->estado==1?2:1;;
            }            
            if($persona->save()!=1){
                throw new Exception();
            }           
            DB::commit();
            return response()->json(['result' => true]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['result' => false]);
        }
    }

    function descargarActa($id_novedad){
        try {
            $novedad=\App\Novedad_retiro::findOrFail($id_novedad);
            $pdf = Storage::get($novedad->acta_novedad); 
            return response()->json(['result' => true, 'pdf'=>base64_encode($pdf)]);
        } catch (\Throwable $th) {
            return response()->json(['result' => false]);
        }
        
    }

    public function interfaz_certificado_retiro($id_persona){
        $novedades=DB:: table('novedades_retiros')
        ->join('personas', 'personas.id', 'novedades_retiros.id_persona')
        
        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('vivienda', 'hogar_p.vivienda_id', '=', 'vivienda.id')        
        ->join('sector', 'vivienda.codigo_sector', '=', 'sector.codigo_sector')
        ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
        ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
        ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
        ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
        ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
        ->where('personas.id',$id_persona)->get();
        return view('/novedad_retiro.certificado_retiro', compact('novedades'));    

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
