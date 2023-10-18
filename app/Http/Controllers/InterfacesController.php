<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Request;
use Illuminate\Http\Request;
use App\Personas;
use App\info_persona;
Use App\idiomas;
use App\hogar; 
use App\carnet_salud;
use App\Role;
Use App\limitaciones_fisinas;
use App\User;
use App\vivienda;
use DB;
use DataTables;

class InterfacesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


   
    public  function interfas_vivienda ()
    {
        return view('interfaces.vivienda');
    }
    
    public  function interfas_hogar_persona( Request $request)
    {  
        //$request->user()->authorizeRoles('administrador');
        return view('interfaces.hogar_persona');
    }
 
    
    public  function interfas_hogar ()
    {
        return view('interfaces.hogar');
    }

/// Agregar residentes y/o miembros del hogar
//Ingrese a las personas que conforman el hogar .
    public function CodigoHogar($id_Hogar)
    {
        try {
            $data = hogar::findOrFail($id_Hogar);
            return view('interfaces.Ingresar_personas',compact('id_Hogar'));
        } catch (\Throwable $th) {
            return ['validate'=>false,'msj'=>'El codigo del hogar no exixte'];
        }
    
}



    public  function interfas_personas ($id_hogar)
    {
     
         $datos = Personas::where('hogar_id',$id_hogar)->get();

       // $datos = DB:: table('info_persona')
        
        // ->join('personas', 'personas.id', '=', 'info_persona.persona_id')
        // ->where('personas.hogar_id',$id_hogar)->get();

        return view('interfaces.personas',compact('datos'));

    
}


/*
  public  function interfas_personas ($id_hogar)
    {
      
         $Personas = Personas::where('hogar_id',$id_hogar)->get();
         return Datatables::of($Personas);
         
         
        
        
      //de lo contrario retorna 
        return view('interfaces.personas');
    }
        // funcion cambiar estado  recibe dos parametros , idi y estado 
    /*public function cambiar_estado($id,$estado  ){
      // busco el oroducto 
      $Personas = Personas::find($id);
     
      if($Personas ==null){
        // hacer la notificacion que no se encontro el producto 
        return redirect('Ingresar_Person');
      }
     /// estado camvielo por estado que llego 

     // notificamos y redireccionamos a producto 
      $Personas->update(["estado"=>$estado]);

      return redirect('Informacion_Persona/');
    }
*/


    public  function interfas_informmacion_persona($id_persona)
    {
        $datos = Personas::findOrFail($id_persona);


        $profecion = DB::table("profecion")->pluck("nombre","id");

        $idiomas  =  idiomas::get();
        $limitaciones_fisinas  =  limitaciones_fisinas::get();
         
         $carnet_salud = DB::table("carnet_salud")->pluck("nombre","id");
         $enfermedades = DB::table("enfermedades")->pluck("nombre","id");
         $idiomasPersona=new \App\info_persona_idiomas();
         $limitacionesPersona=new \App\info_persona_limitaciones();
        if($datos->status==0){
            return view('interfaces.informmacion_persona',compact('limitacionesPersona','idiomasPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades'));
        }else{  
            $datosPersona=info_persona::where('persona_id',$id_persona)->first();
            $idiomasPersona=\App\info_persona_idiomas::where('info_persona_id',$datosPersona->id)->get('idiomas_id');
            $limitacionesPersona=\App\info_persona_limitaciones::where('info_persona_id',$datosPersona->id)->get('limitaciones_fisinas_id');
            return view('interfaces.informmacion_persona',compact('limitacionesPersona','idiomasPersona','datosPersona','datos','profecion','idiomas','limitaciones_fisinas','carnet_salud','enfermedades'));
        }
        
    }
    

    public function changeStatus(Request $request)
    {
        $user = Personas::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
      return response()->json(['success'=>'Status change successfully.']);
    }



    public  function interfas_menu_educacion_formal($id_persona)
    {
        $datos = info_persona::findOrFail($id_persona);
        return view('interfaces.menu_educacion_formal',compact('datos'));
        
    }


    
    public  function interfas_educacion_formal()
    {
       
    }
    

    
    public  function interfas_educacion_superior( $id_persona )
    { 
        $id_hogar = info_persona::findOrFail($id_persona);
        $datos = info_persona::findOrFail($id_persona);
       
        return view('interfaces.educacion_superior',compact('datos','id_hogar'));
    }



       /// resumn del censo porblacional por persona 
    public  function interfas_resomen_censo($id_persona)
    {
        $datos = Personas::select('personas.status','personas.id','personas.nombres','personas.apellidos',
        'personas.docomento_persona','personas.tipo_identificacion','info_persona.sexo','personas.fecha_nacimiento',
        'personas.estado_civil','info_persona.telefono','personas.nivel_academico','municipio.nombre_municipio',
        'resguardo.nombre_reguardo','zona.nombre_zona', 'vereda.nombre_vereda', 'sector.nombre_sector','resguardo.codigo_resguardo',
        'departamento.nombre_depatamento', 'hogar_p.id as hogar_id')       
        ->join('info_persona', 'info_persona.persona_id', '=', 'personas.id')        
        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('vivienda', 'vivienda.id', '=', 'hogar_p.vivienda_id')
        ->join('sector', 'vivienda.codigo_sector', '=', 'sector.codigo_sector')
        ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
       ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
       ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
       ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
       ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
       // ->where ('personas.docomento_persona')->get ();
        ->where('info_persona.id',$id_persona)->get();
       return view('interfaces.resumen_censo',compact('datos'));
    }

     /// Certificado censo familiar  
    public  function interfas_certifcado_censo_familiar($hogar_id)
    {
        $datos = DB:: table('info_persona')
       
        ->join('personas', 'info_persona.persona_id', '=', 'personas.id')
        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('sector', 'hogar_p.codigo_sector', '=', 'sector.codigo_sector')
        ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
       ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
       ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
       ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
       ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
       // ->where ('personas.docomento_persona')->get ();
        ->where('personas.hogar_id',$hogar_id)->get();

        //return view('interfaces.personas',compact('datos'));

       return  view('interfaces.certificado_censo_familiar',compact('datos'));
    }


/*
    public function censo_informacion_general()
    {
        return view('interfaces.Ingresar_Habitante');
    }

    */

    


    public  function interfas_familia_hogar ()
    {
        return view('interfaces.familia_persona');
    }

    
    

    


    
    
    public  function interfas_nivel_educativo()
    {
        return view('interfaces.nivel_educativo');
    }
    

   

  
    
    public  function interfas_informacion_general_censo()
    {
        return view('interfaces.informacion_general_censo');
    }

   
 ///////////vistas  para realizar consultas //////////

   public  function interfas_menu_consulta()
    {   
        return view('consultas.menu_consultas');
    }

    public  function interfas_cunsulta_persona()
    {
        return view('consultas.informacion_persona');
    }
    

    

    public  function interfas_cunsulta_hogar(Request $request)
    {      ///para no mostrar  vista consultar hogar  por  la persona encargada del censo ////
        //$request->user()->authorizeRoles('administrador');
        return view('consultas.informacion_hogar');
    }

    

    public  function interfas_cunsulta_vivienda(Request $request)
    {     ///para no mostrar   interfas consultas   por  la persona encargada del censo ////
        //$request->user()->authorizeRoles('administrador');
        return view('consultas.informacion_vivienda');
    }


    //////actualizaciones informacion vivienda/////////

    public  function vista_actualizacion_general ()
    {
        return view('actualizaciones_censo.actualizacion');
    }

   // actualizacion  inf0rmacion persona--  //////////////////////////////
   ///////////////////////////////////
   /////////////////////////////////////7
    public  function  actualizacion_informacion_personas ($id_persona)
    {
        //$datos = Personas::findOrFail($id_persona);
        $datos = DB:: table('Personas')
        
      //  ->join('info_persona as com', 'educacion_superior.documento_id', '=', 'com.id')

        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('sector', 'hogar_p.codigo_sector', '=', 'sector.codigo_sector')
        ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
         ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
        ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
        ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
        ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
       
        
        ->where('Personas.id',$id_persona)->get();
      //  if (count ( $datos) > 0)
          //return view ( 'actualizaciones_censo.actualizacion',compact('Personas'))
        
        return view('actualizaciones_censo.actualizacion_informacion_persona',compact('datos'));
        
    }


    public  function vista_nuevo_hogar_nucleo_familiar ()
    {
        return view ('actualizaciones_censo.nuevo_hogar_familia_misak');
    }



    
    public function vista_nuevo_nucleo_familiar($id_Hogar)
    {
        try {
            $data = hogar::findOrFail($id_Hogar);
            return view('actualizaciones_censo.nuevo_nucleo_familiar',compact('id_Hogar'));
        } catch (\Throwable $th) {
            return ['validate'=>false,'msj'=>'El codigo del hogar no exixte'];
        }
    
}
    








    ///////////////////////////////////////
    ///////////////////////////////////////
    public  function vista_nemu_actualizacion (Request $request)

    {    ///para no mostrar  vista menu  actualizacion  por  la persona encargada del censo ////

        return view('actualizaciones_censo.menu_actualizacion');
    }


    public  function vista_nueva_persona_nucleo_familiar ()
    {
        return view('actualizaciones_censo.nueva_persona_nucleo_familiar');
    }


    
    
    ///////////Interfaces reporte  //////////

    public  function vista_menu_reporte ( Request $request)
    {    ///para no mostrar  vista menu  de reporte por  la persona encargada del censo ////
        //$request->user()->authorizeRoles('administrador');
        return  view('reportes.menu_reportes');
    }

    
    public  function vista_reportes_personas ()
    {
        return  view('reportes.reportes_personas');
    }


    public  function vista_censoGeneralVigencia ()
    {
        $Personas = info_persona::select(
            DB::raw('YEAR(CURRENT_DATE) AS vigencia'),
            'resguardo.codigo_resguardo as resguardo',
            'info_persona.comunidad_indigena',
            'hogar_p.id as familia',
            'personas.tipo_identificacion',
            'personas.docomento_persona',
            'personas.nombres',
            'personas.apellidos',
            'personas.fecha_nacimiento',
            'personas.parentesco',
            'info_persona.sexo',
            'personas.estado_civil',
            'info_persona.profecion_id as profesion',
            'personas.nivel_academico as escolaridad',
            'personas.n_integrantes as integrantes',
            'vereda.nombre_vereda as vereda',
            'sector.nombre_sector as sector',
            'info_persona.telefono'
        )
        ->join('personas', 'info_persona.persona_id', '=', 'personas.id')
        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('vivienda', 'hogar_p.vivienda_id', '=', 'vivienda.id')        
        ->join('sector', 'vivienda.codigo_sector', '=', 'sector.codigo_sector')
        ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
        ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
        ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
        ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
        ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
        ->orderBy('hogar_p.id')
        ->orderBy('personas.n_integrantes')  
        ->where('personas.estado_persona', 1)->get();

        // dd($Personas);

        return view('reportes.censo_general_vigencia', [
            'personas' => $Personas
        ]);
    }
    public  function vista_censoRetirados ()
    {
        $Personas = info_persona::select(
            DB::raw('YEAR(CURRENT_DATE) AS vigencia'),
            'resguardo.codigo_resguardo as resguardo',
            'info_persona.comunidad_indigena',
            'hogar_p.id as familia',
            'personas.tipo_identificacion',
            'personas.docomento_persona',
            'personas.nombres',
            'personas.apellidos',
            'personas.fecha_nacimiento',
            'personas.parentesco',
            'info_persona.sexo',
            'personas.estado_civil',
            'info_persona.profecion_id as profesion',
            'personas.nivel_academico as escolaridad',
            'personas.n_integrantes as integrantes',
            'vereda.nombre_vereda as vereda',
            'sector.nombre_sector as sector',
            'info_persona.telefono'
        )
        ->join('personas', 'info_persona.persona_id', '=', 'personas.id')
        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('vivienda', 'hogar_p.vivienda_id', '=', 'vivienda.id')        
        ->join('sector', 'vivienda.codigo_sector', '=', 'sector.codigo_sector')
        ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
        ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
        ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
        ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
        ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
        ->where('personas.estado_persona', 2)->get();

        // dd($Personas);

        return view('reportes.listado_retirados', [
            'personas' => $Personas
        ]);
    }
      
    public  function vista_censoFallecidos ()
    {
        $Personas = info_persona::select(
            DB::raw('YEAR(CURRENT_DATE) AS vigencia'),
            'resguardo.codigo_resguardo as resguardo',
            'info_persona.comunidad_indigena',
            'hogar_p.id as familia',
            'personas.tipo_identificacion',
            'personas.docomento_persona',
            'personas.nombres',
            'personas.apellidos',
            'personas.fecha_nacimiento',
            'personas.parentesco',
            'info_persona.sexo',
            'personas.estado_civil',
            'info_persona.profecion_id as profesion',
            'personas.nivel_academico as escolaridad',
            'personas.n_integrantes as integrantes',
            'vereda.nombre_vereda as vereda',
            'sector.nombre_sector as sector',
            'info_persona.telefono'
        )
        ->join('personas', 'info_persona.persona_id', '=', 'personas.id')
        ->join('hogar_p', 'personas.hogar_id', '=', 'hogar_p.id')
        ->join('vivienda', 'hogar_p.vivienda_id', '=', 'vivienda.id')        
        ->join('sector', 'vivienda.codigo_sector', '=', 'sector.codigo_sector')
        ->join('vereda', 'sector.codigo_vereda', '=', 'vereda.codigo_vereda')
        ->join('zona', 'vereda.codigo_zona', '=', 'zona.codigo_zona')
        ->join('resguardo', 'zona.codigo_resguardo', '=', 'resguardo.codigo_resguardo')
        ->join('municipio', 'resguardo.codigo_municipio', '=', 'municipio.codigo_municipio')
        ->join('departamento', 'municipio.codigo_departamento', '=', 'departamento.codigo_departamento')
        ->where('personas.estado_persona', 0)->get();

        // dd($Personas);

        return view('reportes.listado_fallecidos', [
            'personas' => $Personas
        ]);
    }

    
    public  function vista_reporte_educacion_propia ()

    {     //$data = carnet_salud::get();
        $data = carnet_salud::select( 'id', 'nombre', 'stock', 'precio')->get();
       // $data = carnet_salud::
       // select( 'id', 'nombre', 'stock', 'precio')
       //->from('postres');
        
       // $data = DB:: table('carnet_salud')  
             
       // ->join('info_persona_idiomas', 'info_persona_idiomas.idiomas_id', '=', 'idiomas.id')->get();
        
        //->join('info_persona', 'info_persona.carnet_salud_id', '=', 'carnet_salud.id')->get();
        
        //->where('vivienda.id',$id_vivienda)->get();
        //return response()->json($data);

        //$data =idiomas::
        //select('idiomas.nombre','info_persona_idiomas.info_persona_id','info_persona_idiomas.idiomas_id')
        //->join('info_persona_idiomas', 'info_persona_idiomas.idiomas_id', '=', 'idiomas.id')->get();
        return view('reportes.reporte_educacion_propia',['data'=>$data]);
    }

    public  function vista_reporte_salud_propio ()
    {
        return  view('reportes.reporteSaludPropia');
    }


    
    public  function interfas_reporte ()
    {
        return ('reportes.reporte');
    }
    

    /// VISTAS PARA NOVEDAD DE RETIRO //////////


    public  function vista_interfas_menu_novedad (Request $request)
    {
          
        //////$request->user()->authorizeRoles('administrador');
        return view('novedad_retiro.menu_noverdad');
    }


    public  function vista_interfas_buscar_persona_fallecida (Request $request)
    {
        //$request->user()->authorizeRoles('administrador');
        return view('novedad_retiro.buscar_persona_fallecido');
    }



    public  function vista_interfas_novedad_fallecimiento($id_persona)
    {  
        $datos = Personas::findOrFail($id_persona);
        return view('novedad_retiro.retiro_fallecimiento',compact('datos'));
    }


    public  function vista_interfas_buscar_persona_retito (Request $request)
    {
          
        //$request->user()->authorizeRoles('administrador');
        return view('novedad_retiro.buscar_persona_retiro',compact('datos'));
    }


   

//// vista formulario de tetiro ////
    public  function vista_interfas_novedad_retiro_censo ($id_persona)
    {   $datos = Personas::findOrFail($id_persona);
        return view('novedad_retiro.retiro_censo_poblacional',compact('datos'));
    }


    public  function vista_interfas_validacionretiro (Request $request)
    {     //$request->user()->authorizeRoles('administrador');
        return view('/novedad_retiro.validacion_retiro
        ');
    }

   //////////VISTAS ADMINISTRADOR /////////////

   public  function vista_interfas_menuAdminsitrador (Request $request ) 
   {
        ///para mostrar  vista menu   por  la persona encargada del censo ////
        // //$request->user()->authorizeRoles('administrador');
      
       return view('/administrador.nemuAdministrador');

   }

 



   public  function vista_interfas_ingrezar_usuarios(){        
        $datos = Role::get();
        $users = User::paginate(15);

        return view('/administrador.ingresar_usuarios',compact('datos', 'users'));
   }

   public  function vista_interfas_menu_usuarios (Request $request ) 
   {
        ///para mostrar  vista menu   por  la persona encargada del censo ////
        //$request->user()->authorizeRoles('administrador');

       return view('/administrador.menu_usuarios');

   }

  

    /////////////////////interfaces  educacion salud propio/////////////////////////////

    public  function educacion_salud_propia ()
    {
        return view('educacion_salud_propia.educacion_salud');
    }

    public  function interfas_informacion_general_persona()
    {
        return view('interfaces.informacion_general_persona');
    }
}

