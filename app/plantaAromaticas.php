<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plantaAromaticas extends Model
{
    public $timestamps = false;	
        public $table = "plantasaromaticas"; 
         
    
        /**
         * controlador Plantas condimentarías y aromáticas 
         * The attributes that are mass assignable.
         * 
         *
         * @var array
         */
        
         protected $fillable = [
            'id', 'nombre_aromaticass', 
        ];
}

