<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class idiomas extends Model
{

        public $timestamps = false;	
        public $table = "idiomas"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
             'nombre',
        ];
    
}
