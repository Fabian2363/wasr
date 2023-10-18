<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
    public $timestamps = false;	
        public $table = "contrato"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
            'id', 'num_contrato','thesis_id', 
        
        ];

}
