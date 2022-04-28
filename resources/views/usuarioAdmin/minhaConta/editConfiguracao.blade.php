@extends('layouts.app')

@section('content')
    <div class="container-externo">
        @if (Session::has('config_user_true'))
            {{-- {{ dd('a') }} --}}
            <script>
                 Swal.fire({
                    icon: 'success',
                    title: 'Foto alterada com sucesso',
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif
        {{-- PARTE DO CONTEUDO --}}
        <div class="container-conteudo">

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
