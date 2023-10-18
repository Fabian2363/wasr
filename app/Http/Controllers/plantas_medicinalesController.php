<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plantas_medicinales;
class plantas_medicinalesController extends Controller
{
    public function Plantas_Medicinales(Request $request)
    {
       $permissions = plantas_medicinales :: get();
       return view('interfaces.hogar', compact('permissions'));
 
    }
}
