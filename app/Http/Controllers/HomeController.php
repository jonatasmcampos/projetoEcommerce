<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IntlCalendar;

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
        if( auth()->user()->perfil === 'administrador' ){
            return view('usuarioAdmin.home');
        }else{
            return view('usuario.welcome');
        }
    }
}
