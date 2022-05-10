@extends('layouts.app')

@section('content')

    <br>
    <h1 class="titulo">Configurações</h1>
    <br>

    <div style="display: flex; justify-content: center; width: 100%">
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
        
        <div class="box-form-config">
            <form action="{{ route('update_configuracao') }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @include(
                    'usuarioAdmin.minhaConta.inc._formConfiguracao'
                )
            </form>
        </div>
    </div>
@endsection
