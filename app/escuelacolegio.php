<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class escuelacolegio extends Model
{

        public $timestamps = false;	
        public $table = "escuelacolegio"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
             'estado','info_persona_id  ',
        ];
    
}
