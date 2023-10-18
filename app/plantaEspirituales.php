<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plantaEspirituales extends Model
{
    public $timestamps = false;	
        public $table = "planta_espirituales"; 
         
    
        /**
         * controlador Plantas condimentarías y aromáticas 
         * The attributes that are mass assignable.
         * 
         *
         * @var array
         */
        
         protected $fillable = [
            'id', 'nombre_espirituales', 
        ];
}
