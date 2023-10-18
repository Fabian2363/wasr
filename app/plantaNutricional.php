<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plantaNutricional extends Model
{
    public $timestamps = false;	
        public $table = "planta_nutricionales"; 
         
    
        /**
         * controlador Plantas condimentarías y aromáticas 
         * The attributes that are mass assignable.
         * 
         *
         * @var array
         */
        
         protected $fillable = [
            'id', 'nombre_nutricionaless', 
        ];
}
