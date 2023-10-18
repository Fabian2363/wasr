<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class economia_familia extends Model
{

        public $timestamps = false;	
        public $table = "economia_familia"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
             'nombre',
        ];
    
}
