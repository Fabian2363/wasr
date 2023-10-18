<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class migrations extends Model
{
    ublic $timestamps = false;	
        public $table = "personas"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
            'documento_id', 'hogar_id','estado','fecha_nacimiento', 
     
}
