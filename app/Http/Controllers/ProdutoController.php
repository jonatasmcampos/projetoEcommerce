<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

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
        //dd($request->file('image')[0]->extension());
        
        for ($i = 0; $i < count($request->file('image')); $i++) {
           
            if ($request->hasFile('image') && $this->validaExtecaoImage($request->file('image')[$i]->extension())) {
               // dd($this->validaExtecaoImage($request->file('image')[2]->extension()));
                // if (!Storage::disk('local')->allDirectories('public/imageProduto/' . 1)) {
                //     Storage::disk('local')->makeDirectory('public/imageProduto/' . 1);
                // }
                //dd('a');
            }else {
                dd($request->file('image')[$i]->getClientOriginalName());
                Session::flash('config_user_true');
                return redirect(route(''));
            }
        }


        //já identifica chave estrangeira de categoria e produto para estoque    
        // $categoriaProduto = Categoria::find($request->categoria)->produtos()->create($request->all())
        //     ->estoque()->create(['quantidade' => $request->estoque]);

        return redirect(route('produto.index'));
    }

    public function validaExtecaoImage($extencao)
    {
        if ($extencao == 'png' or $extencao == 'jpeg' or $extencao == 'jpg' or $extencao == 'svg') {
            return true;
        }else{
            return false;
        }
    }

    public function redimensionarImagePerfilAdmin($pathPerfil, $pathPerfilEdit)
    {
        //imagem editar
        $img = Image::make('storage/imageAdmin/' . $pathPerfilEdit);
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save();
        //Storage::move('app/imageAdmin/' . $pathPerfil, 'public/img');
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('produto.destroy', $id));
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
    public function update(Request $request, $id)
    {
        Produto::find($id)->update($request->all());
        return redirect(route('produto.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::find($id)->delete();
        return redirect(route('produto.index'));
    }
}
