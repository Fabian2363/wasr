<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class archivo_file extends Model
{
    public $timestamps = false;	
        public $table = "archivo_file"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
            'id', 'thesis_code','title','state',
        
        ];
}
