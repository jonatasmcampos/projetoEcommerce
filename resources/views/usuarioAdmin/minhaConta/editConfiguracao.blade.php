@extends('layouts.app')

@section('content')
    <div class="container-externo">

        {{-- PARTE DO CONTEUDO --}}
        <div class="container-conteudo">

            @include('navbar.navbar')

            @include('usuarioAdmin.minhaConta.inc._menus')
            <div class="mx-5">
                <form action="{{ route('update_configuracao') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @include(
                        'usuarioAdmin.minhaConta.inc._formConfiguracao'
                    )
                </form>
            </div>

        </div>
    </div>
@endsection
