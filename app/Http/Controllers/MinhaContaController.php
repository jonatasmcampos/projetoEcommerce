<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;



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
        //  dd($user);
        return view('usuarioAdmin.minhaConta.index', compact('user'));
    }

    public function edit_configuracao()
    {
        $user = User::find(auth()->user()->id);
        //dd($user);
        return view('usuarioAdmin.minhaConta.editConfiguracao', compact('user'));
    }

    public function update_configuracao(Request $request)
    {
        //dd($request->all());
        User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        Session::flash('config_user_true');
        return redirect(route('edit_configuracao'));
    }

    public function edit_senha(Request $request)
    {
        $user = User::find(auth()->user()->id);

        return view('usuarioAdmin.minhaConta.editSenha', compact('user'));
    }

    public function update_senha(Request $request)
    {
        $user = User::find(auth()->user()->id);

        //descryptografa senha e verifica se é compatível com a atual
        if (Hash::check($_POST['senha_atual'], $user->password)) {

            if ($_POST['senha_nova'] === $_POST['senha_confirma_senha']) {
                //cryptografa senha
                $user->update(['password' => Hash::make($_POST['senha_nova'])]);
                echo json_encode(true);
                return;
            } else {
                echo json_encode('senhaConfirmFalse');
                return;
            }
        } else {
            echo json_encode('atualIvalida');
            return;
        }
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
        // dd($request->all());
        // dd($id);
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
