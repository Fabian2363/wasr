<?php

namespace App\Http\Controllers;
use App\plancondiaroma ;
use App\hogar;
use Illuminate\Http\Request;

class EducacionSaludPropiaController extends Controller
{
    /* Display a listing of the resource.
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
       return view('educacion_salud_propia.educacion_salud', compact('permissions'));
       
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
   

   /**
    * Display the specified resource.
    *
    * @param  \App\  $hogar
    * @return \Illuminate\Http\Response
    */
   public function show()
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\hogar  $hogar
    * @return \Illuminate\Http\Response
    */
   public function edit()
   {
       //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\hogar  $hogar
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, hogar $hogar)
   {
       //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\hogar  $hogar
    * @return \Illuminate\Http\Response
    */
   public function destroy(hogar $hogar)
   {
       //
   }
}
