<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class educacion_superior extends Model
{

        public $timestamps = false;	
        public $table = "educacion_superior"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
             'tipo_educacion_superior','estado_actual', 'nombre_carrera'
        ];
    
}
