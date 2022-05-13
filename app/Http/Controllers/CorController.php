<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class CorController extends Controller
{
    public function index(){

        $cores = Cor::all();

        return view('usuarioAdmin.cor.index', compact('cores'));
    }

    public function store(Request $request)
    {
        
        Cor::create(['nome' => strtoupper($request->nome)]);
        return redirect(route('cores.index'));
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cor::find($id)->delete();

       Session::flash('true', 'Tamanho Excluida Com Sucesso');
        
        return redirect(route('cores.index'));
    }
}
