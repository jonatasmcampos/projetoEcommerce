@extends('layouts.app')

@section('content')

    <h6>Configurações</h6>
    <br>

    <div class="noCentro">
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
        
        <div class="box-EditConfigSenha noCentro box-elevado" 
                style="width: 350px !important; height: 380px">

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
