{{-- SIEDABAR --}}
<aside class="container-siedbarr" style="width: 70px; height: 100vh; background-color: #232334">

    {{-- ICONE DE MENU --}}
    <div style="
    border: 1px solid red;
    display: flex;
    justify-content:center;
    height: 72px;
    align-items:center">
        <i class="bi bi-list"></i>
    </div>

    <br>

    {{-- DIV DOS ICONES --}}
    <div style="
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items:center
    ">


        <div class="Dica">
            <i class="bi-file-earmark-plus"></i>
            <div class="DicaTexto">Cadastro</div>
        </div>

        <div class="Dica">
            <i class="bi-file-earmark-plus"></i>
            <div class="DicaTexto">Cadastro</div>
        </div>

      
        


    </div>




</aside>

{{-- <div class="container-siedbar-icons">
    <div id="siedbar-icones" class="box-menu">
        
        <i id="btn-menu" class="bi bi-list d-flex justify-content-center box-i"></i>
        
    </div>
    <div class="box-opcoes-icones">
        
        <div class="dropend">
            <button type="button" class="btn dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-file-earmark-plus box-i"></i>
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="{{ route('produto.index') }}">Produtos</a></li>
            
                <li class="dropdown-item"><a href="{{ route('estoque.index') }}">Estoque</a></li>
                <li class="dropdown-item"><a href="{{ route('categoria.create') }}">Categorias</a></li>
            </ul>
        </div>
    </div>
</div>


<div id="siedbar-nomes" class="container-siedbar">
    
    <div class="box-empresa">
        <a href="#" class="d-flex justify-content-center" style="letter-spacing: 3px;">Empresa</a>
    </div>
    
    <div class="box-opcoes">

        
        <div class="dropend box-individual">
            <a type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastro
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="{{ route('produto.index') }}">Produtos</a></li>
                <li class="dropdown-item"><a href="{{ route('estoque.index') }}">Estoque</a></li>
                <li class="dropdown-item"><a href="{{ route('categoria.create') }}">Categorias</a></li>
            </ul>
        </div>



    </div>
</div> --}}
