<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personas;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /*$people =DB:: table('personas')
        ->join('users', 'personas.users_id', '=', 'users.id')
        ->where([['personas.users_id', $id_usuario]])->get();
        return view('home', compact('people'));*/
        return view('home');        
    }

    

}
