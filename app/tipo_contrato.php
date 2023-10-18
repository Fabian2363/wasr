<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_contrato extends Model
{
    public $timestamps = false;	
    public $table = "tipo_contrato"; 
     

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     protected $fillable = [
         'id_tipo_contrato','nombre_tipcontrato',
    ];

}
