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
            <div>
                <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="fa fa-chevron-down" aria-hidden="true"></i> Categorias
                </a>

                <div class="collapse show" id="collapseExample">
                    <div class="card card-body">
                        <ul>
                            <a href="#">
                                <li>Camisas</li>
                            </a>
                            <a href="#">
                                <li>Calças</li>
                            </a>
                            <a href="#">
                                <li>Bermudas</li>
                            </a>
                            <a href="#">
                                <li>Sapatos</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- CORES -->
            <div>
                <a data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="fa fa-chevron-down" aria-hidden="true"></i> Cores
                </a>

                <div class="collapse show" id="collapseExample1">
                    <div class="card card-body">
                        <ul>
                            <a href="#">
                                <li>Cinza</li>
                            </a>
                            <a href="#">
                                <li>Branco</li>
                            </a>
                            <a href="#">
                                <li>Preta</li>
                            </a>
                            <a href="#">
                                <li>Amarelo</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- TAMANHOS -->
            <div>
                <a data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="fa fa-chevron-down" aria-hidden="true"></i> Tamanhos
                </a>

                <div class="collapse show" id="collapseExample2">
                    <div class="card card-body">
                        <ul>
                            <a href="#">
                                <li>PP</li>
                            </a>
                            <a href="#">
                                <li>P</li>
                            </a>
                            <a href="#">
                                <li>M</li>
                            </a>
                            <a href="#">
                                <li>G</li>
                            </a>
                            <a href="#">
                                <li>GG</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <!-- CONTEUDO FILTRADO -->
        <section class="conteudoFiltrado">

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

                <div class="card cardProduto containerImagem">
                    <img src="{{ asset('img/roupa2.png') }}" class="card-img-top imagemProduto" alt="Imagem do produto">
                    <div class="middle">
                        <div class="btnVerProduto"> 
                           <a href="{{route('produto.show',1)}}">Ver detalhes</a> </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            Nome do produto
                        </h5>
                        <div class="card-text precoProduto">
                            <h6><s>R$ 15,90</s></h6>
                            <h6>R$ 15,90</h6>
                        </div>
                    </div>
                </div>



            </div>
            <!-- FIM EXIBIÇÃO DOS PRODUTOS -->

        </section>
        <!-- FIM CONTEUDO FILTRADO -->
    </main>
@endsection
