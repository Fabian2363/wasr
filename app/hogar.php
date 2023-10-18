<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hogar extends Model
{

        public $timestamps = false;	
        public $table = "hogar_p"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
             'codigo_sector','vivienda_id',
        ];
    
}
