<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cor;
use App\Models\Estoque;
use App\Models\Imagem;
use App\Models\ProdTamCor;
use App\Models\Produto;
use App\Models\Tamanho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast\String_;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::with('categoria')->whereRaw("nome like '%{$request->nome}%'")->get();
        $tamanhos = Tamanho::all();
        $categorias =  Categoria::all();
        $cores =  Cor::all();

        return view('usuarioAdmin.produto.index', compact('produtos', 'tamanhos', 'categorias', 'cores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias =  Categoria::all();
        return view('usuarioAdmin.produto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProdTamCor $prodTamCor)
    {
        $produtoTCE = $request->produtoTCE;
        $tamanhos = [];

        // já identifica chave estrangeira de categoria e produto
        $produto = Categoria::find($request->categoria_id)->produtos()->create([
            'nome'  =>  $request->nome,
            'custo' =>  $request->custo,
            'preco' =>  $request->preco,
            'lucro' =>  $request->lucro,
        ]);

        for ($i = 0; $i < count($produtoTCE); $i++) {
            //converte string para array para fazer a separação
            $dados =  explode(',', $produtoTCE[$i]);

            $tamanhos[] = $dados[0];
            $cores[] = $dados[1];

            $prodTamCor =  ProdTamCor::create([
                'produto_id' => $produto->id,
                'tamanho_id' => $dados[0],
                'cor_id' => $dados[1],
            ]);

            $estoque = $prodTamCor->estoque()->create(['quantidade' => $dados[2]]);
        }

        if ($request->hasFile('image')) {

            $this->upload_redimensiona_salva_image_produto($request, $produto);
        }

        Session::flash('true', 'Produto criado com sucesso');
        return redirect(route('produto.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usuario.produto.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $categorias =  Categoria::all();
        $tamanhos = Tamanho::all();
        $cores = Cor::all();

        // dd($produto->prodTamCors[0]->cor);
        // foreach ($produto->tamanhos as $key => $t) {
        //     $tamanho_produto['id'][] = $t->id;
        //     $tamanho_produto['tamanho'][] = $t->tamanho;
        // }

        return view('usuarioAdmin.produto.edit', compact('produto', 'categorias', 'tamanhos', 'cores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //metodo já identifica pelo parametro qual produto pegar no banco de acordo com id que passa pela rota 
        //atraves do baind no model de produto produto com o @param  int  $id

        if ($request->hasFile('image')) {

            $this->upload_redimensiona_salva_image_produto($request, $produto);
        }

        $produto->update($request->all());


        if ($request->tamanhos) {
            //mantem igual a tabela muito para muitos de produto e tamanho
            $produto->tamanhos()->sync($request->tamanhos);
        }

        Session::flash('true', 'Produto atualizado com sucesso');
        return redirect(route('produto.edit', $produto->id));
    }

    public function torna_imagem_padrao(Imagem $imagem)
    {
        $imagem_null = Imagem::where('id_produto', $imagem->id_produto)->where('prioridade', 1)->first();

        if ($imagem_null) {

            $imagem_null->update(['prioridade' => null]);

            $imagem->update(['prioridade' => 1]);
        } else {

            $imagem->update(['prioridade' => 1]);
        }
        Session::flash('true', 'Imagem padrao editada com sucesso');
        return redirect(route('produto.edit', $imagem->id_produto));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagens = Imagem::where('produto_id', $id)->get();


        if (count($imagens)) {
            Storage::deleteDirectory('public/imageProduto/' . $id);
        }

        Produto::find($id)->delete();

        Session::flash('true', 'Produto deletado com Sucesso');
        return redirect(route('produto.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleta_image(Imagem $imagem)
    {
        Storage::delete(str_replace('storage', 'public', $imagem->nome));

        if ($imagem->prioridade) {
            $imagem_star = Imagem::where('id_produto', $imagem->id_produto)->where('prioridade', null)->first();

            $imagem_star->update(['prioridade' => 1]);
        }
        //deleta caminho no banco
        $imagem->delete();

        Session::flash('true', 'Imagem deletada com sucesso');
        return redirect(route('produto.edit', $imagem->id_produto));
    }

    public function deleta_dado_produto($prodTamCor_id)
    {
        ProdTamCor::find($prodTamCor_id)->delete();
        echo json_encode(true);

        return;
    }

    public function upload_redimensiona_salva_image_produto($request, $produto)
    {
        for ($i = 0; $i < count($request->file('image')); $i++) {

            //retira os espaços do nome da imagem
            $nameImage = str_replace(' ', '', $request->file('image')[$i]->getClientOriginalName());

            //baixa para storage/public/imageProduto e cria diretorio e faz o upload de acordo com id do produto
            $dir = $request->file('image')[$i]->storeAs('public/imageProduto/' . $produto->id,  $nameImage);

            //cria caminho da imagem no banco de acordo com id de produto
            $produto->imagens()->create(['nome' => str_replace('public', 'storage', $dir)]);

            //recupera imagem para redimencionar
            $img = Image::make('storage/imageProduto/' . $produto->id . '/' . $nameImage);
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save();
        }

        return;
    }
}
