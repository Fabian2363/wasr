<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plantaMedicinal extends Model
{
    public $timestamps = false;	
        public $table = "planta_medicinales"; 
         
    
        /**
         * controlador Plantas condimentarías y aromáticas 
         * The attributes that are mass assignable.
         * 
         *
         * @var array
         */
        
         protected $fillable = [
            'id', 'nombre_medicinales', 
        ];
}