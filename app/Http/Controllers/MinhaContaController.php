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

        // dd(explode("public/imageAdmin/", str_replace(" ", "", $request->file('foto')->store('public/imageAdmin'))));
        //dd($imagem);
        //dd($img);
        $name = str_replace(" ", "", $request->file('foto')->getClientOriginalName());
       // dd($name);
       $path =  $request->file('foto')->storeAs('public/imageAdmin', $name);
       $path_bd = explode('public/', $path);
      //  dd($path_bd);
       // dd($imagem);
       $img = Image::make("storage/" . $path_bd[1])->resize(500, 500)->save();
    
        User::find(auth()->user()->id)->update(['foto' => "storage/" . $path_bd[1]]);

        return redirect(route('mihaConta.index'));
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
