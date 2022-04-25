{{-- PARTE DA SIEDBAR COM ICONES --}}
<div class="container-siedbar-icons">
    <div id="siedbar-icones" class="box-menu">
        {{-- <div class="box-i"> --}}
        <i id="btn-menu" class="bi bi-list d-flex justify-content-center box-i"></i>
        {{-- </div> --}}
    </div>
    <div class="box-opcoes-icones">
        {{-- DROPDOWND DE CADASTROS --}}
        <div class="dropend">
            <button type="button" class="btn dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-file-earmark-plus box-i"></i>
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="{{ route('produto.index') }}">Produtos</a></li>
                {{-- <li class="dropdown-item"><a href="{{ route('produto.create') }}">Cadastrar produto</a></li> --}}
                <li class="dropdown-item"><a href="{{ route('estoque.index') }}">Estoque</a></li>
                <li class="dropdown-item"><a href="{{ route('categoria.create') }}">Categorias</a></li>
            </ul>
        </div>
    </div>
</div>

{{-- PARTE DA SIEDBAR --}}
<div id="siedbar-nomes" class="container-siedbar">
    {{-- NOME DA EMPRESA --}}
    <div class="box-empresa">
        <a href="#" class="d-flex justify-content-center" style="letter-spacing: 3px;">Empresa</a>
    </div>
    {{-- AS OPCOES DO ADMIN --}}
    <div class="box-opcoes">

        {{-- DROPDOWND DE CADASTROS --}}
        <div class="dropend box-individual">
            <a type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastro
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="{{ route('produto.index') }}">Produtos</a></li>
                {{-- <li class="dropdown-item"><a href="{{ route('produto.create') }}">Cadastrar produto</a></li> --}}
                <li class="dropdown-item"><a href="{{ route('estoque.index') }}">Estoque</a></li>
                <li class="dropdown-item"><a href="{{ route('categoria.create') }}">Categorias</a></li>
            </ul>
        </div>



    </div>
</div>
