<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plancondiaroma ;

class censosocioculturalcontroller extends Controller
{
    /*
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       //
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create(Request $request)
   {
       $permissions  = plancondiaroma  ::get();
       return view('interfaces.hogar', compact('permissions'));
       
   }




   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
            $role = hogar::create($request->all());

             $role->permissions()->sync($request->get('permissions'));

    return redirect()->route('roles.edit', $role->id)
        ->with('info', 'Rol guardado con éxito');

   }
}
