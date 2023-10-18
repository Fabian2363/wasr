<?php

namespace App\Http\Controllers;
use App\material_paredes;
use App\Hogar_Economia;
use App\info_persona;
use App\Personas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    public function index()
    {

        // dd($this->estadistica_quienes_hablan_namuy_wam());
        return view("administrador.estadistica", [
            'plantas' => $this->estadistica_plantas(),
            'categoria_personas' => $this->estaditica_categorias_personas(),
            'quienes_hablan_namuy_wam' => $this->estadistica_quienes_hablan_namuy_wam(),
            'quienes_escriben_namuy_wam' => $this->estadistica_escribeNamuyWam(),
            'medico_tradicional' => $this->estadistica_medicoTradicional(),
            'consumo_comidas_propias' => $this->estadistica_comidasPropias(),
            'educacion' => $this->estadistica_educacion(),
            'sostenimiento_economico' => $this->estadistica_sostenimiento_economico(),
            'habla_español' => $this->estadistica_hablaEspanol(),
            'escribe_español' => $this->estadistica_escribeEspanol(),
            'educacion_misak'=> $this->estadistica_educacion_misak(),
            'escribeEspanol' => $this->estadistica_educacion_misak(),
            'vestimenta' => $this->estadistica_vestimenta(),
			'total_personas' => $this->total_personas(),
            'total_personas_m' => $this->total_personas_m(),  
            'total_personas_f' => $this->total_personas_f(),
            'total_hogar' => $this->total_hogar(),
            'total_vivienda' => $this->total_vivienda(),
            'fortalecimiento_educacion_propia' => $this->fortalecimiento_educacion_propia(),
            'como_gustaria_educación_Misak' => $this->como_gustaria_educación_Misak(),
            'debilidades_educación_Misak' => $this->debilidades_educación_Misak(),
            'calidad_educacion'=> $this->calidad_educacion(),
            'hijos_estudiando_instituciones'=> $this->hijos_estudiando_instituciones(),
            'consumo_alimentos_propio'=> $this->consumo_alimentos_propio(),
            'rituales_armonizacion_misak'=> $this->rituales_armonizacion_misak(),
            'estadistica_cuando_enferma_recurre'=> $this->estadistica_cuando_enferma_recurre(),
            'religion_guambia'=> $this->religion_guambia(), 
            'baños_etapas_vida'=> $this->baños_etapas_vida(),
            'saberes_propio'=> $this->saberes_propio(), 
            'consomo_sustancias'=> $this->consomo_sustancias(),  
        ]);
    }


    



    private function consomo_sustancias(){
        $sustancias['Alcohol']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['consumo_sustancias','1']])->count();
        $sustancias['Cigarrillo']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['consumo_sustancias','2']])->count();
        $sustancias['Sustancias psicoactivas']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['consumo_sustancias','3']])->count();
        $sustancias['No consume']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['consumo_sustancias','4']])->count();
        return $sustancias;
    }



    private function saberes_propio(){
        $saberes_propio_misak['Ninguno']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['conocimientos_empiricos','1']])->count();
       $saberes_propio_misak['Artesano/a']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['conocimientos_empiricos','1']])->count();
       $saberes_propio_misak['músico']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['conocimientos_empiricos','2']])->count();
       $saberes_propio_misak['deportistas']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['conocimientos_empiricos','3']])->count();
       $saberes_propio_misak['consejeros (wachip, kᶿrᶿshᶿp)']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['conocimientos_empiricos','4']])->count();
       $saberes_propio_misak['constructor/a']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['conocimientos_empiricos','5']])->count();
       $saberes_propio_misak['pintor/a']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['conocimientos_empiricos','8']])->count();
       $saberes_propio_misak['mecanico/a']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['conocimientos_empiricos','9']])->count();
       $saberes_propio_misak['constructor/a']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['conocimientos_empiricos','10']])->count();
        
       return $saberes_propio_misak;
    }

   
    private function baños_etapas_vida(){
        $baños_etapa_vida_misak['Vientre (preconcepción)']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['baños_etapas_vida','Vientre (preconcepción)']])->count();
       $baños_etapa_vida_misak['Concepción']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['baños_etapas_vida','Concepción']])->count();
       $baños_etapa_vida_misak['Niñez']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['baños_etapas_vida','Niñez']])->count();
       $baños_etapa_vida_misak['Juventud']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['baños_etapas_vida','Juventud']])->count();
       $baños_etapa_vida_misak['Adulto mayor']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['baños_etapas_vida','Adulto mayor']])->count();
       $baños_etapa_vida_misak['Ninguno']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['baños_etapas_vida','Ninguno']])->count();
        return $baños_etapa_vida_misak;
    }


    private function religion_guambia(){
        $religion_guambia_misak['Propia']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['religion','Propia']])->count();
       $religion_guambia_misak['Católica']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['religion','Católica']])->count();
       $religion_guambia_misak['Cristiana']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['religion','Cristiana']])->count();
       $religion_guambia_misak['Ateo']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['religion','Ateo']])->count();
       $religion_guambia_misak['Otros']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['religion','Otrod']])->count();
        return $religion_guambia_misak;
    }





    private function estadistica_cuando_enferma_recurre(){
        $medicoTradicional['Medicina ocidental']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['enfemerma_recurre','Católica']])->count();
        $medicoTradicional['Medicina Tradicional']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['enfemerma_recurre','Propia']])->count();
        return $medicoTradicional;
    }






    private function rituales_armonizacion_misak(){
        $rituales_armonizacion['SI']=DB::table('hogar_p')->where([['rituales_armonizacion','1']])->count();
       $rituales_armonizacion['NO']=DB::table('hogar_p')->where([['rituales_armonizacion','0']])->count();
       
       return $rituales_armonizacion; 
    }


    private function consumo_alimentos_propio(){
        $alimentos_propios['Reunion familiar']=DB::table('hogar_p')->where([['tiempo_comida_propia','1']])->count();
       $alimentos_propios['Todo los dias']=DB::table('hogar_p')->where([['tiempo_comida_propia','2']])->count();
       $alimentos_propios['Cada semana']=DB::table('hogar_p')->where([['tiempo_comida_propia','3']])->count();
       $alimentos_propios['Cada mes']=DB::table('hogar_p')->where([['tiempo_comida_propia','4']])->count();
       $alimentos_propios['Nunca']=DB::table('hogar_p')->where([['tiempo_comida_propia','5']])->count();

       return $alimentos_propios; 
    }

    private function hijos_estudiando_instituciones(){
        $instituciones_educacion_misak['SI']=DB::table('hogar_p')->where([['hijos_estudiando_guambia','1']])->count();
       $instituciones_educacion_misak['NO']=DB::table('hogar_p')->where([['hijos_estudiando_guambia','0']])->count();
       return $instituciones_educacion_misak; 
    }


    
    private function calidad_educacion(){
        $calidad_educacion_misak['Excelente']=DB::table('hogar_p')->where([['calidad_ie_guambia','1']])->count();
       $calidad_educacion_misak['Bueno']=DB::table('hogar_p')->where([['calidad_ie_guambia','2']])->count();
       $calidad_educacion_misak['Regular']=DB::table('hogar_p')->where([['calidad_ie_guambia','3']])->count();
       $calidad_educacion_misak['Malo']=DB::table('hogar_p')->where([['debilidades_ie_guambia','4']])->count();
       return $calidad_educacion_misak; 
    }

    
    private function debilidades_educación_Misak(){
        $debilidades_educacion['No hay modalidades que requieran los estudiantes']=DB::table('hogar_p')->where([['debilidades_ie_guambia','1']])->count();
       $debilidades_educacion['Falta de motivación por parte de los padres de familia']=DB::table('hogar_p')->where([['debilidades_ie_guambia','2']])->count();
       $debilidades_educacion['Falta de medios de transporte para dirigir a las instituciones donde se requiera']=DB::table('hogar_p')->where([['debilidades_ie_guambia','3']])->count();
       $debilidades_educacion['Docentes que no contextualizan desde el pensamiento holístico']=DB::table('hogar_p')->where([['debilidades_ie_guambia','4']])->count();
       $debilidades_educacion['La educación en Guambia, si cumple las necesidades de la comunidad Misak']=DB::table('hogar_p')->where([['debilidades_ie_guambia','5']])->count();
       $debilidades_educacion['Otros']=DB::table('hogar_p')->where([['debilidades_ie_guambia','6']])->count();
       return $debilidades_educacion;
    
    }

    private function como_gustaria_educación_Misak(){
        $gustaria_educacion_propia['Desde la nachak']=DB::table('hogar_p')->where([['gustar_edu_propia','1']])->count();
       $gustaria_educacion_propia['Tener en cuenta los saberes previos']=DB::table('hogar_p')->where([['gustar_edu_propia','2']])->count();
       $gustaria_educacion_propia['Desde la educación convencional']=DB::table('hogar_p')->where([['gustar_edu_propia','3']])->count();
       $gustaria_educacion_propia['Otros']=DB::table('hogar_p')->where([['gustar_edu_propia','4']])->count();
        return $gustaria_educacion_propia;
    }

    private function fortalecimiento_educacion_propia(){
        $fort_educacion_propia['Desde la tradición oral']=DB::table('hogar_p')->where([['forta_educacion_propia','1']])->count();
       $fort_educacion_propia['Desde la identidad cultural']=DB::table('hogar_p')->where([['forta_educacion_propia','2']])->count();
       $fort_educacion_propia['Respetando el derecho mayor']=DB::table('hogar_p')->where([['forta_educacion_propia','3']])->count();
       $fort_educacion_propia['No perdiendo el pensamiento como misak']=DB::table('hogar_p')->where([['forta_educacion_propia','4']])->count();
       $fort_educacion_propia['Otros']=DB::table('hogar_p')->where([['forta_educacion_propia','5']])->count();
        return $fort_educacion_propia;
    }

	
	private function total_vivienda()
    {
      $estadistica = DB::table('vivienda')
      ->count();
      return $estadistica;
      
    }

    private function total_hogar()
    {
      $estadistica = DB::table('hogar_p')
     // ->where('personas.estado_persona',1)
      ->count();
      return $estadistica;
      
    }
    
    private function total_personas()
      {
          
        $estadistica = info_persona::select('personas.estado_persona')
        ->join('personas', 'personas.id', '=','info_persona.persona_id')
        ->where('personas.estado_persona',1)
        ->count();
        return $estadistica;
        
      }

      private function total_personas_m()
      {
        $estadistica = info_persona::select('personas.estado_persona','info_persona.sexo')
       // ->where('personas.estado_persona',1)
       ->join('personas', 'personas.id', '=','info_persona.persona_id')
       ->where('personas.estado_persona',1)
       ->where('info_persona.sexo','=','F')
      ->count();
        return $estadistica;
        
      }

      private function total_personas_f()
      {
        $estadistica = info_persona::select('personas.estado_persona','info_persona.sexo')
        
         ->join('personas', 'personas.id', '=','info_persona.persona_id')
         ->where('personas.estado_persona',1)
         ->where('info_persona.sexo','=','M')
         ->count();
        return $estadistica;
        
      }


    private function estadistica_quienes_hablan_namuy_wam()
    {
        $estadistica = info_persona::groupBy('habla_namuy_wam')->select('habla_namuy_wam as label', DB::raw('count(*) as total'))->get();

        if($estadistica){
            $estadistica = $estadistica->toArray();
        }

        return $estadistica;
    }


    private function estaditica_categorias_personas()
    {
        $estadistica = Personas::select(
                                        DB::raw('CONCAT(info_persona.sexo, " ", FU_Clasificar_Persona(personas.fecha_nacimiento)) as label'),
                                        DB::raw('count(*) as total'))
        ->join('info_persona', 'info_persona.persona_id', '=', 'personas.id')
        ->where('personas.estado_persona', 1)
        ->groupBy('info_persona.sexo','label')->get();

        if($estadistica){
            $estadistica = $estadistica->toArray();
        }

        return $estadistica;
    }

    private function estadistica_sostenimiento_economico()
    {
        $estadistica = Hogar_Economia::select('economia_familia.nombre as label',
                                    DB::raw('count(*) as total'))
        ->join('economia_familia', 'economia_familia.id', '=', 'hoga_economia_familia.economia_familia_id')
        ->groupBy('hoga_economia_familia.economia_familia_id', 'economia_familia.nombre')->get();

        if($estadistica){
            $estadistica = $estadistica->toArray();
        }

        return $estadistica;
    }

    private function estadistica_plantas(){
        $plantas['condimentarias']=\App\Hogar_plantaCondimentaria::all()->count();
        $plantas['aromaticas']=\App\Hogar_plantasAromatica::all()->count();
        $plantas['medicinales']=\App\Hogar_plantasMedicinales::all()->count();
        $plantas['nutricionales']=\App\Hogar_plantasNutricional::all()->count();
        $plantas['espirituales']=\App\Hogar_plantasEspirituales::all()->count();
        return $plantas;
    }

    /*public function hablaNamuyWam(){
        $hablaNamuyWam['noHabla']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],'habla_namuy_wam','No habla')->count();
        $hablaNamuyWam['entiendeNoHabla']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],'habla_namuy_wam','Entiende, pero no habla')->count();
        $hablaNamuyWam['siHabla']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],'habla_namuy_wam','Si Habla')->count();
        return $hablaNamuyWam;
    }*/

    private function estadistica_escribeNamuyWam(){
        $escribeNamuyWam['no escribe']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['escritura_namuy_wam','No escribe']])->count();
        $escribeNamuyWam['escribe, No Habla']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['escritura_namuy_wam','Escribe, pero no habla']])->count();
        $escribeNamuyWam['escribe Habla']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['escritura_namuy_wam','Escribe y habla']])->count();
        return $escribeNamuyWam;
    }

    private function estadistica_medicoTradicional(){
        $medicoTradicional['ninguno']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['medico_tradicional','Ninguno']])->count();
        $medicoTradicional['partera']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['medico_tradicional','Partera']])->count();
        $medicoTradicional['sobandero']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['medico_tradicional','Sobandero']])->count();
        $medicoTradicional['pulsador']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['medico_tradicional','Pulsador']])->count();
        $medicoTradicional['medicoT']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['medico_tradicional','Medico T']])->count();
        return $medicoTradicional;
    }

    private function estadistica_comidasPropias(){
        $comidasPropias['kendu']=\App\Hogar_Comida::where('comidas_propias_id',1)->count();
        $comidasPropias['Mazamorra']=\App\Hogar_Comida::where('comidas_propias_id',2)->count();
        $comidasPropias['Sango']=\App\Hogar_Comida::where('comidas_propias_id',3)->count();
        $comidasPropias['Mote']=\App\Hogar_Comida::where('comidas_propias_id',4)->count();
        $comidasPropias['KelShula']=\App\Hogar_Comida::where('comidas_propias_id',5)->count();
        $comidasPropias['Caldoquinua']=\App\Hogar_Comida::where('comidas_propias_id',6)->count();
        $comidasPropias['SopaColes']=\App\Hogar_Comida::where('comidas_propias_id',7)->count();
        $comidasPropias['Pañi']=\App\Hogar_Comida::where('comidas_propias_id',10)->count();
         $comidasPropias['Mishi']=\App\Hogar_Comida::where('comidas_propias_id',11)->count();
         $comidasPropias['Batata']=\App\Hogar_Comida::where('comidas_propias_id',12)->count();
        return $comidasPropias;
    }

    private function estadistica_hablaEspanol(){
        $hablaEspanol['no Habla']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['habla_español','No habla']])->count();
        $hablaEspanol['entiende, No Habla']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['habla_español','Entiende, pero no habla']])->count();
        $hablaEspanol['si Habla']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['habla_español','Si Habla']])->count();
        return $hablaEspanol;
    }

    
    private function estadistica_escribeEspanol(){
        $escribeEspanol['No escribe']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['escribe_español','No escribe']])->count();
        $escribeEspanol['escribe, No Habla']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['escribe_español','Escribe,pero no habla']])->count();
        $escribeEspanol['escribe Habla']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['escribe_español','Escribe y habla']])->count();
        return $escribeEspanol;
    }

    private function estadistica_vestimenta(){
        $vestimenta['Se viste Misak']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['vestimenta_misak','Si se viste']])->count();
        $vestimenta['No se viste Misak']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['vestimenta_misak','No se viste']])->count();
        $vestimenta['Solo se viste en ocasiones especiales']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['vestimenta_misak','Se viste cada evento especial']])->count();
        return $vestimenta;
    }

    private function estadistica_educacion_misak(){
        $Nivel_educativo['Primaria']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['nivel_academico','PR']])->count();
        $Nivel_educativo['Secundarria']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['nivel_academico','SE']])->count();
        $Nivel_educativo['Educacion Superior']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['nivel_academico','UN']])->count();
        $Nivel_educativo['Sin Educacion']=info_persona::join('personas','personas.id','info_persona.persona_id')->where([['personas.estado_persona',1],['nivel_academico','NI']])->count();
       
        return $Nivel_educativo;
    }


    private function estadistica_educacion(){
        $superior=\App\educacion_superior::join('info_persona', 'info_persona.id','educacion_superior.persona_id')
        ->join('personas','personas.id','info_persona.persona_id')
        ->where('personas.estado_persona',1)
        ->groupBy('educacion_superior.persona_id')->count();
        $basica=\App\escuelacolegio::join('info_persona','info_persona.id','escuelacolegio.info_persona_id')
        ->join('personas','personas.id','info_persona.persona_id')
        ->where('personas.estado_persona',1)
        ->groupBy('escuelacolegio.info_persona_id')->count();
        $personas=\App\personas::where('estado_persona',1)->count();
        $educacion['superior']=$superior;
        $educacion['basica']=$basica-$superior;
        $educacion['sinEducacion']=$personas-$basica;
        return $educacion;
    }

}
