<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria_item extends Model
{
    public $timestamps = false;	
    public $table = "categoria_item"; 
     

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     protected $fillable = [
         'id_categoria_canasta',
    ];
}
