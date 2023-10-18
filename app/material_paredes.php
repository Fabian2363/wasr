<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class material_paredes extends Model
{
    public $timestamps = false;	
        public $table = "material_paredes"; 
         
    
        /**
         * controlador Plantas condimentarías y aromáticas 
         * The attributes that are mass assignable.
         * 
         *
         * @var array
         */
        
         protected $fillable = [
            'id', 'nombre_paredes', 
        ];
}
