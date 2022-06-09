@extends('estrutura')
@section('conteudo')
    @include('usuario.navbar.navbar')
    <!-- INCLUINDO A VIEW DE NAVBAR -->
    @include('usuario.carrinho.carrinho')
    <!-- INCLUINDO A VIEW DE CARRINHO -->
    <form action="{{ route('usuariohome') }}" method="GET">
        @csrf
    <!-- CONTEUDO PRINCIPAL DO SITE -->
    <main class="conteudoPrincipal" style="padding: 0 25px">

        <!-- FILTROS -->
        <aside class="filtros">
          
                <!-- CATEGORIAS -->
                <div style="width: 100%">

                    <a class="btn filtrar-por" data-bs-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        <p style="margin: 0 0 0 10px; padding: 0">
                            Categorias
                        </p>
                    </a>

                    <div class="collapse show" id="collapseExample">
                        <div class="card card-body">
                            <ul>
                                @foreach ($categorias as $cat)
                                    <li class="form-check">
                                        <input class="form-check-input" name="cat" type="checkbox"
                                            value="{{ $cat->id }}" id="flexCheckDefault" {{in_array($cat->id, $boxes['cat']) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $cat->nome }}
                                        </label>
                                    </li> 
                                    {{-- <a href="{{ route('usuariohome', $cat->id) }}">
                                    <li>{{ $cat->nome }}</li>
                                </a> --}}
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- CORES -->
                <div style="width: 100%">
                    <a class="btn filtrar-por" data-bs-toggle="collapse" href="#collapseExample1" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        <p style="margin: 0 0 0 10px; padding: 0">
                            Cores
                        </p>
                    </a>

                    <div class="collapse show" id="collapseExample1">
                        <div class="card card-body">
                            <ul>
                                @foreach ($cores as $cor)
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $cor->id }}"
                                            name="cor[]" id="flexCheckDefault" {{in_array($cor->id, $boxes['cor']) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $cor->nome }}
                                        </label>
                                    </li>
                        
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- TAMANHOS -->
                <div style="width: 100%">
                    <a class="btn filtrar-por" data-bs-toggle="collapse" href="#collapseExample2" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        <p style="margin: 0 0 0 10px; padding: 0">
                            Tamanhos
                        </p>
                    </a>

                    <div class="collapse show" id="collapseExample2">
                        <div class="card card-body">
                            <ul>
                                @foreach ($tamanhos as $t)
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $t->id }}"
                                            name="tam[]" id="flexCheckDefault" {{in_array($t->id, $boxes['tam']) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $t->nome }}
                                        </label>
                                    </li>
                                    {{-- <a href="#">
                                    <li>{{ $t->nome }}</li>
                                </a> --}}
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            
        </aside>

        <!-- CONTEUDO FILTRADO -->
        <section class="conteudoFiltrado">

            <!-- BOTAO DO MODAL PRA EXIBIR FILTROS NO MOBILE -->
            <button type="button" class="btn btn-primary btn-filtrar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Filtros
            </button>
            <!-- FILTRO DE MAIOR PREÇO / MENOR PREÇO -->
            <div class="filtroMais">
                <select class="form-select" name="orderSelected" aria-label="Default select example">
                    <option value="0">Relevância</option>
                    <option value="1">Menor preço</option>
                    <option value="2">Maior preço</option>
                </select>
            </div>
       
            <!-- FIM FILTRO DE MAIOR PREÇO / MENOR PREÇO -->


            <!-- EXIBIÇÃO DOS PRODUTOS -->
            <div class="exibicaoProdutos">

                @foreach ($produtos as $prod)
                    <div class="card cardProduto containerImagem">
                        <img src="{{ asset(!count($prod->imagens) ? '' : $prod->imagens[0]->nome) }}"
                            class="card-img-top imagemProduto" alt="Imagem do produto">

                        <div class="middle">
                            <div class="btnVerProduto">
                                <a href="{{ route('produto.show', $prod->id) }}">Ver detalhes</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $prod->nome }}
                            </h5>
                            <div class="card-text precoProduto">
                                {{ $prod->preco }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- FIM EXIBIÇÃO DOS PRODUTOS -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-titl text-center" id="exampleModalLabel">Filtros</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- FILTROS -->
                            <aside class="filtros" style="display: block; width: 100%">
                                <h5 style="margin-left: 35%; margin-top: 10px; margin-bottom: 10px">Filtros</h5>
                                <hr>
                                <!-- CATEGORIAS -->
                                <div style="width: 100%">

                                    <a style="width: 100%; margin-bottom: 7px" class="btn btn-primary filtrar-por"
                                        data-bs-toggle="collapse" href="#collapseExample" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i> &nbsp; Categorias
                                    </a>

                                    <div class="collapse show" id="collapseExample">
                                        <div class="card card-body">
                                            <ul class="list-group">
                                                
                                                @foreach ($categorias as $cat)
                                                    <a href="{{ route('usuariohome', $cat->id) }}"
                                                        class="list-group-item">
                                                        <li>{{ $cat->nome }}</li>
                                                    </a>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- CORES -->
                                <div style="width: 100%">
                                    <a style="width: 100%; margin-bottom: 7px" class="btn btn-primary filtrar-por"
                                        data-bs-toggle="collapse" href="#collapseExample1" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i> &nbsp; Cores
                                    </a>

                                    <div class="collapse show" id="collapseExample1">
                                        <div class="card card-body">
                                            <ul class="list-group">
                                                @foreach ($cores as $cor)
                                                    <a href="{{ route('usuariohome', $cat->id) }}"
                                                        class="list-group-item">
                                                        <li>{{ $cor->nome }}</li>
                                                    </a>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAMANHOS -->
                                <div style="width: 100%">
                                    <a style="width: 100%; margin-bottom: 7px" class="btn btn-primary filtrar-por"
                                        data-bs-toggle="collapse" href="#collapseExample2" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i> &nbsp; Tamanhos
                                    </a>

                                    <div class="collapse show" id="collapseExample2">
                                        <div class="card card-body">
                                            <ul class="list-group">
                                                @foreach ($tamanhos as $t)
                                                    <a href="{{ route('usuariohome', $cat->id) }}"
                                                        class="list-group-item">
                                                        <li>{{ $t->nome }}</li>
                                                    </a>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Filtrar </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
        <!-- FIM CONTEUDO FILTRADO -->
    </main>
@endsection
