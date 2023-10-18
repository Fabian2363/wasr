<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios_firma extends Model
{
    public $timestamps = false;	
        public $table = "usuarios_firma"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
            'id', 'nombre_secretaria', 'nombre_coordinador',
        ];
    
}
