<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Estoque;
use App\Models\Imagem;
use App\Models\Produto;
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
    public function index()
    {
        $produtos = Produto::all();
        $categorias =  Categoria::all();
        return view('usuarioAdmin.produto.index', compact('produtos', 'categorias'));
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
    public function store(Request $request)
    {
        // já identifica chave estrangeira de categoria e produto para estoque  e retorna o estoque
        $estoque = Categoria::find($request->categoria)->produtos()->create($request->all())
            ->estoque()->create(['quantidade' => $request->estoque]);

        $produto = $estoque->produto;

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
        // return redirect(route('produto.destroy', $id));
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
        return view('usuarioAdmin.produto.edit', compact('produto', 'categorias'));
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
        $imagens = Imagem::where('id_produto', $id)->get();

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
        //deleta arquivo 
        Storage::delete(str_replace('storage', 'public', $imagem->nome));

        if ($imagem->prioridade) {
            $imagem_star = Imagem::where('id_produto', $imagem->id_produto)->where('prioridade', null)->first();

            $imagem_star->update(['prioridade' => 1]);
            // dd($imagem);
        }
        //deleta caminho no banco
        $imagem->delete();

        Session::flash('true', 'Imagem deletada com sucesso');
        return redirect(route('produto.edit', $imagem->id_produto));
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
