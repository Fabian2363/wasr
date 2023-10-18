<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  info_persona extends Model
{
    public $timestamps = false;	
        public $table = "info_persona"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
            'religion', 'persona_id','estado','hoja_vida_pdf','id_desempeno','id_municipio_expedicion','email',
        ];
}
