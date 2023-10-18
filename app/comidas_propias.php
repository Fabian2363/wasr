<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comidas_propias extends Model
{

        public $timestamps = false;	
        public $table = "comidas_propias"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
             'nombre',
        ];
    
}
