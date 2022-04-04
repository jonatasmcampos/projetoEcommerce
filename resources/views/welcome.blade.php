@extends('estrutura')
@section('conteudo')
    <h1>Funcionando</h1>
    <i class="bi bi-linkedin"></i>

    @if( Auth::user() ) 
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    @else
        <a class="btn btn-secondary" href="{{ route('home') }}" role="button" >
            Fazer login
        </a>
    @endif

@endsection
