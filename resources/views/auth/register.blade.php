@extends('layouts.app')

@section('content-login-register')
<div class="box-body">
    <div class="box-register">
        <div class="register-box">
            {{-- DIV DA IMAGEM, ELA ESTA COMO BACKGROUND --}}
            <div class="image-box-register"></div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- DIV DOS INPUTS E BOTOES DE LOGIN --}}
                <h2 style="align-self: flex-start; margin-left: 25px">Cadastrar</h2>

                <div class="inputs-box-register">
                    
                        {{-- INPUT NOME --}}
                        <input placeholder="Nome" id="name" name="name" type="text" class="form-control campo-nome @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            

                        {{-- INPUT EMAIL --}}
                        <input placeholder="Email" id="email" name="email" type="email" class="form-control campo-email @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">
    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                   
                        {{-- INPUT SENHA --}}
                        <input placeholder="Senha" id="password" name="password" type="password"
                            class="form-control campo-senha @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
                        {{-- INPUT CONFIRMAR SENHA --}}
                        <input placeholder="Confirmar senha" id="password-confirm" type="password" class="form-control campo-confirmar-senha" name="password_confirmation"
                            required autocomplete="new-password">
                   

                    {{-- BOTAO --}}
                    <button type="submit" class="btn btn-primary btn-register">
                        Cadastrar
                    </button>

                </div>

            </form>

            <div class="tem-conta">
                <p>
                    Já tem conta?
                    <a href="{{ route('login') }}"> Entrar</a>
                </p>
            </div>

        </div>
    </div>
</div>



    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <!-- input para o nome-->
                                    <input id="name" name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <!-- input para o email-->
                                    <input id="email" name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <!-- input para a senha-->
                                    <input id="password" name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <!-- input para confirmar a senha-->
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
