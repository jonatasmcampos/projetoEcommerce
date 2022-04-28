{{-- SIEDABAR --}}
<aside class="container-siedbar">

    {{-- ICONE DE HOME --}}
    <div class="box-home noCentro">
        <a href="{{route('home')}}">
            <i class="material-icons mIconBranco">home</i>
        </a>
    </div>

    <br>

    {{-- DIV DOS ICONES --}}
    <div class="box-icones noCentro">

        {{-- ITENS / ICONES --}}

        {{-- CADASTRO --}}
        <div class="dropend">
            <button type="button" class="btn dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="Dica">
                    <i class="bi bi-clipboard2-plus" style="padding-top: 3px !important; padding-bottom: 3px !important;"></i>
                    <div class="DicaTexto">Cadastro</div>
                </div>
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="{{ route('produto.index') }}">Produtos</a></li>            
                <li class="dropdown-item"><a href="{{ route('estoque.index') }}">Estoque</a></li>
                <li class="dropdown-item"><a href="{{ route('categoria.create') }}">Categorias</a></li>
            </ul>
        </div>

        {{-- CONFIGURAÇÕES --}}
        <div class="dropend">
            <button type="button" class="btn dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="Dica">
                    <i class="material-icons mIconBranco">settings</i>
                    <div class="DicaTexto">Configurações</div>
                </div>
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="{{ route('edit_configuracao') }}">Configurações</a></li>            
                <li class="dropdown-item"><a href="{{ route('edit_senha') }}">Alterar senha</a></li>
            </ul>
        </div>
        
    </div>


</aside>