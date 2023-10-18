<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hogar;
use App\Personas;
use DataTables;

class datatablecontroller extends Controller
{
    public function getdate()
    {
      $Personas = Personas::all();
      return Datatables::of($Personas)
      ->addColumn('action', function ($user) {
        $btnEstado = "";
        if($user->estado ==1){
          $btnEstado ='<a href="/listtar-persons/estado/'.$user->id.'/0" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Inactivar</a>';
    
        }else if($user->estado ==0){
          $btnEstado ='<a href="/listtar-persons/estado/'.$user->id.'/1" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-ok"></i> Activo</a>';
    
        }


        return $btnEstado.'<a href="/listtar-personas/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
       })
       ->editColumn('estado', function ($user) {
        return  $user->estado == 1?"Activo":"inactivo";
       })
      ->make(true);
      
      return view('Ingresar_Persona');
    }

    public function cambiar_estadoPersona($id,$estado){
      $Personas = Personas::find($id);
      if($Personas ==null){
        return redirect('Ingresar_Persona');
      }

      $Personas->update(["estado"=>$estado]);
      return redirect('Ingresar_Persona');
    }
}
