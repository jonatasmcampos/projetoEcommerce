<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class MinhaContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        // dd($user);
        return view('usuarioAdmin.minhaConta.index', compact('user'));
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
        //baixa para storage
        $pathPerfil =  $request->file('foto')->storeAs('public/imageAdmin', 'imagemPerfilAdminPerfil.jpg');
        $pathPerfilEdit = $request->file('foto')->storeAs('public/imageAdmin', 'imagemPerfilAdminPerfilEdit.jpg');
        $pathPerfil = explode('public/', $pathPerfil);
        $pathPerfilEdit = explode('public/', $pathPerfilEdit);

        $this->redimensionarImagePerfiAdmin($pathPerfil, $pathPerfil);
        // $img = Image::make("storage/" . $path_bd[1])->resize(600, 600)->save();
        // Redimensiona a largura da imagem mantendo a proporção (altura automática)
        // $img = Image::make("storage/" . $pathPerfil[1]);
        // $img->resize(null, 320, function ($constraint) {
        //     $constraint->aspectRatio();
        // });
        User::find(auth()->user()->id)->update(['foto' => "storage/imagemPerfilAdminPerfil.jpg"]);

        return redirect(route('mihaConta.index'));
    }
    public function redimensionarImagePerfiAdmin($pathPerfil, $pathPerfilEdit)
    {
        $img = Image::make("storage/" . $pathPerfil[1]);
        $img->resize(null, 30, function ($constraint) {
            $constraint->aspectRatio();
        })->save();
        //dd($img);
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
        dd($request->all());
        dd($id);
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
