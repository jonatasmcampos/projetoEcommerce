<?php

namespace App\Http\Controllers;

use App\Models\Tamanho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TamanhoController extends Controller
{
    public function index(){

        $tamanhos= Tamanho::all();
      
        return view('usuarioAdmin.tamanho.index', compact('tamanhos'));
    }

    public function store(Request $request)
    {
        Tamanho::create(['nome' => strtoupper($request->tamanho)]);
        return redirect(route('tamanho.index'));
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tamanho::find($id)->delete();

        Session::flash('true', 'Tamanho Excluida Com Sucesso');
        
        return redirect(route('tamanho.index'));
    }
}
