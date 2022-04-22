<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        //baixa a imagem se caso atualizada o nome permanecera o mesmo
        $request->file('foto')->storeAs('public/imageAdmin', 'imagemPerfilAdminPerfil.jpg');
        $request->file('foto')->storeAs('public/imageAdmin', 'imagemPerfilAdminPerfilEdit.jpg');

        $this->redimensionarImagePerfiAdmin('imagemPerfilAdminPerfil.jpg', 'imagemPerfilAdminPerfilEdit.jpg');

        User::find(auth()->user()->id)->update(['foto' => "storage/imagemPerfilAdminPerfil.jpg"]);

        return redirect(route('mihaConta.index'));
    }

    public function redimensionarImagePerfiAdmin($pathPerfil, $pathPerfilEdit)
    {
        $img = Image::make('storage/imageAdmin/' . $pathPerfil);
        $img->resize(50, 50, function ($constraint) {
            $constraint->aspectRatio();
        })->save();

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
