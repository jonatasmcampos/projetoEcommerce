{{-- SIEDABAR --}}
<aside class="container-siedbar">

    {{-- ICONE DE HOME --}}
    <div class="box-home noCentro">
        <a href="{{route('home')}}">
            <i class="bi bi-house-fill"></i>
        </a>
    </div>

    <br>

    {{-- DIV DOS ICONES --}}
    <div class="box-icones noCentro">

        {{-- ITEM/ICONE DE CADASTRO --}}

        <div class="dropend">
            <button type="button" class="btn dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="Dica">
                    <i class="bi bi-clipboard2-plus"></i>
                    <div class="DicaTexto">Cadastro</div>
                </div>
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="{{ route('produto.index') }}">Produtos</a></li>            
                <li class="dropdown-item"><a href="{{ route('estoque.index') }}">Estoque</a></li>
                <li class="dropdown-item"><a href="{{ route('categoria.create') }}">Categorias</a></li>
            </ul>
        </div>
        
    </div>


</aside>