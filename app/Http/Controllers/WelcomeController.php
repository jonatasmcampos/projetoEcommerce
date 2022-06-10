<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cor;
use App\Models\ProdTamCor;
use App\Models\Produto;
use App\Models\Tamanho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id = null)
    {
        $boxes['cat'][] = '';
        $boxes['cor'][] = '';
        $boxes['tam'][] = '';

        if ($request->cat) {
            $idsProd = [];
            $checkboxes = [];
            $produtos = Produto::where('categoria_id', $request->cat)->get('id');

            foreach ($produtos as $p) {
                $prod[] = $p->id;
                foreach ($p->prodTamCors as $ptc) {
                    $tam[] = $ptc->tamanho_id;

                    $cor[] = $ptc->cor_id;
                }
            }

            $prodTamCor = ProdTamCor::with('produto')->whereIn('produto_id', $prod)->WhereIn('tamanho_id', is_array($request->tam) ? $request->tam : $tam)
                ->WhereIn('cor_id', is_array($request->cor) ? $request->cor : $cor)->get('produto_id');

            foreach ($prodTamCor as $key => $value) {
                $idsProd[] = $value->produto_id;
            }
            if ($request->orderSelected == 1) {
                $produtos =  Produto::whereIn('id', $idsProd)->orderBy('preco', 'asc')->get();
            } elseif ($request->orderSelected == 2) {
                $produtos =  Produto::whereIn('id', $idsProd)->orderBy('preco', 'desc')->get();
            } else {
                $produtos =  Produto::whereIn('id', $idsProd)->get();
            }
            $boxes = $this->sessionCheckBoxes($request->cat, $request->cor, $request->tam, $checkboxes);
        } else {
            $produtos = Produto::with('imagens')->get();
        }

        $categorias = Categoria::all();
        $cores = Cor::all();
        $tamanhos = Tamanho::all();

        return view('usuario.welcome', compact('produtos', 'categorias', 'cores', 'tamanhos', 'boxes'));
    }

    public function sessionCheckBoxes($categoria, $cor = null, $tam = null, $checkboxes)
    {

        if ($categoria) {
            $checkboxes['cat'][] = $categoria;
        } else {
            $checkboxes['cat'][] = '';
        }
        if ($cor) {

            foreach ($cor as $c) {
                $checkboxes['cor'][] = $c;
            }
        } else {
            $checkboxes['cor'][] = '';
        }
        if ($tam) {
            foreach ($tam as $t) {
                $checkboxes['tam'][] = $t;
            }
        } else {
            $checkboxes['tam'][] = '';
        }

        return $checkboxes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
