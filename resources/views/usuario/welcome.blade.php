@extends('estrutura')
@section('conteudo')
    @include('usuario.navbar.navbar')

    <!-- CONTEUDO PRINCIPAL DO SITE -->
    <main class="conteudoPrincipal">

        <!-- FILTROS -->
        <aside class="filtros">
            <h5 style="margin-left: 35%; margin-top: 10px; margin-bottom: 10px">Filtros</h5>
            <hr>
            <!-- CATEGORIAS -->
            <div style="width: 100%">
                
                <a style="width: 100%; margin-bottom: 7px" class="btn btn-primary filtrar-por" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="fa fa-chevron-down" aria-hidden="true"></i> &nbsp; Categorias
                </a>

                <div class="collapse show" id="collapseExample">
                    <div class="card card-body">
                        <ul class="list-group">
                            <a href="#" class="list-group-item">
                                <li>Camisas</li>
                            </a>
                            <a href="#" class="list-group-item">
                                <li>Calças</li>
                            </a>
                            <a href="#" class="list-group-item">
                                <li>Bermudas</li>
                            </a>
                            <a href="#" class="list-group-item">
                                <li>Sapatos</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- CORES -->
            <div style="width: 100%">
                <a style="width: 100%; margin-bottom: 7px" class="btn btn-primary filtrar-por" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="fa fa-chevron-down" aria-hidden="true"></i> &nbsp; Cores
                </a>

                <div class="collapse show" id="collapseExample1">
                    <div class="card card-body">
                        <ul class="list-group">
                            <a href="#" class="list-group-item">
                                <li>Cinza</li>
                            </a>
                            <a href="#" class="list-group-item">
                                <li>Branco</li>
                            </a>
                            <a href="#" class="list-group-item">
                                <li>Preta</li>
                            </a>
                            <a href="#" class="list-group-item">
                                <li>Amarelo</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- TAMANHOS -->
            <div style="width: 100%">
                <a style="width: 100%; margin-bottom: 7px" class="btn btn-primary filtrar-por" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="fa fa-chevron-down" aria-hidden="true"></i> &nbsp; Tamanhos
                </a>

                <div class="collapse show" id="collapseExample2">
                    <div class="card card-body">
                        <ul class="list-group">
                            <a href="#" class="list-group-item">
                                <li>PP</li>
                            </a>
                            <a href="#" class="list-group-item">
                                <li>P</li>
                            </a>
                            <a href="#" class="list-group-item">
                                <li>M</li>
                            </a>
                            <a href="#" class="list-group-item">
                                <li>G</li>
                            </a>
                            <a href="#" class="list-group-item">
                                <li>GG</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <!-- CONTEUDO FILTRADO -->
        <section class="conteudoFiltrado">
            
            <!-- BOTAO DO MODAL PRA EXIBIR FILTROS NO MOBILE -->
            <button type="button" class="btn btn-primary btn-filtrar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Filtros
            </button>
            <!-- FILTRO DE MAIOR PREÇO / MENOR PREÇO -->
            <div class="filtroMais">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Selecione</option>
                    <option value="1">Menor preço</option>
                    <option value="2">Maior preço</option>
                </select>
            </div>
            <!-- FIM FILTRO DE MAIOR PREÇO / MENOR PREÇO -->


            <!-- EXIBIÇÃO DOS PRODUTOS -->
            <div class="exibicaoProdutos">

                @foreach ($produtos as $prod)    
                    <div class="card cardProduto containerImagem">
                    
                        <img src="{{ asset( !count($prod->imagens) ? '' : $prod->imagens[0]->nome) }}" class="card-img-top imagemProduto" alt="Imagem do produto">
                        
                        <div class="middle">
                            <div class="btnVerProduto">
                                <a href="{{ route('produto.show', 1) }}">Ver detalhes</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{$prod->nome}}
                            </h5>
                            <div class="card-text precoProduto">
                                {{$prod->preco}}
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
                                                <a href="#" class="list-group-item">
                                                    <li>Camisas</li>
                                                </a>
                                                <a href="#" class="list-group-item">
                                                    <li>Calças</li>
                                                </a>
                                                <a href="#" class="list-group-item">
                                                    <li>Bermudas</li>
                                                </a>
                                                <a href="#" class="list-group-item">
                                                    <li>Sapatos</li>
                                                </a>
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
                                                <a href="#" class="list-group-item">
                                                    <li>Cinza</li>
                                                </a>
                                                <a href="#" class="list-group-item">
                                                    <li>Branco</li>
                                                </a>
                                                <a href="#" class="list-group-item">
                                                    <li>Preta</li>
                                                </a>
                                                <a href="#" class="list-group-item">
                                                    <li>Amarelo</li>
                                                </a>
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
                                                <a href="#" class="list-group-item">
                                                    <li>PP</li>
                                                </a>
                                                <a href="#" class="list-group-item">
                                                    <li>P</li>
                                                </a>
                                                <a href="#" class="list-group-item">
                                                    <li>M</li>
                                                </a>
                                                <a href="#" class="list-group-item">
                                                    <li>G</li>
                                                </a>
                                                <a href="#" class="list-group-item">
                                                    <li>GG</li>
                                                </a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary">Filtrar </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FIM CONTEUDO FILTRADO -->
    </main>
@endsection
