<?php

namespace App\Http\Controllers;
use App\Models\Tamanho;
use Illuminate\Http\Request;

class TamanhoController extends Controller
{
    public function index(){

        $tamanhos= Tamanho::all();
        return view('usuarioAdmin.tamanho.index', compact('tamanhos'));
    }

    public function store(Request $request)
    {
        Tamanho::create($request->all());
        return redirect(route('tamanho.index'));
    }
}
