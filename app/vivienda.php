<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


    class usuarios extends Model{ 
    public $timestamps = false;	
    public $table = "users"; 
     

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     protected $fillable = [
        'name', 'id', 
    ];

    


}
