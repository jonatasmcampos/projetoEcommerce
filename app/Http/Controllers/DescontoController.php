<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Tamanho;
use Database\Seeders\UsuarioAdmin;
use Illuminate\Http\Request;

class DescontoController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        $tamanhos = Tamanho::all();
        return view('usuarioAdmin.desconto.index', compact('produtos', 'tamanhos'));
    }
}
