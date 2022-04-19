@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="login-box">
            {{-- DIV DA IMAGEM, ELA ESTA COMO BACKGROUND --}}
            <div class="image-box"></div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- DIV DOS INPUTS E BOTOES DE LOGIN --}}
                <div class="inputs-box">

                    <h2 style="align-self: flex-start; margin-left: 37px">Entrar</h2>

                    {{-- INPUT EMAIL --}}
                    <input placeholder="Email" id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    {{-- INPUT SENHA --}}
                    <input placeholder="Senha" id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    {{-- BOTOES --}}
                    <button type="submit" class="btn btn-primary btn-login">
                        Entrar
                    </button>

                    <div class="esqueceuSenha-LembrarDeMim">

                        {{-- LEMBRAR DE MIM --}}
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                Lembrar de mim
                            </label>
                        </div>

                        {{-- ESQUECEU A SENHA --}}
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Esqueceu a senha?
                            </a>
                        @endif

                    </div>

                </div>

            </form>

            <div class="sem-contaa">
                <p>
                    Não tem conta?
                    <a href="{{ route('register') }}"> Cadastrar</a>
                </p>
            </div>

        </div>
    </div>
@endsection
