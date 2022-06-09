@extends('estrutura')

<section>
    @include('usuario.navbar.navbar')
    <br>

    <!-- PAGINA INDIVIDUAL DO PRODUTO -->
    <div class="produtoIndividual">

        <!-- FOTOS DOS PRODUTOS -->
        <div class="produtoFotos">
            <!-- LISTA DAS FOTOS -->
            <div class="listaFotos">
       
                @foreach ($produto->imagens as $img)
                    <img src="{{ asset($img->nome) }}" alt="Foto do produto">
                @endforeach
            </div>
            <!-- FOTO GRANDE -->
            <div class="fotoGrande">
                {{-- <img src="{{ asset('img/roupa1.png') }}" alt="Foto do produto"> --}}

                <div class="slide-foto-produto">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            {{-- @foreach ($produto->imagens as $img)
                                <div class="carousel-item">
                                    <img src="{{ asset($img->nome) }}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach --}}
                            <div class="carousel-item active">
                                <img src="{{ asset($produto->imagens[0]->nome) }}" class="d-block w-100" alt="...">
                            </div>
                            @foreach ($produto->imagens as $img)
                                @if ($produto->imagens[0]->nome == $img->nome)
                                @else
                                <div class="carousel-item">
                                    <img src="{{ asset($img->nome) }}" class="d-block w-100" alt="...">
                                </div>
                                @endif
                         
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- INFO PARA COMPRA DO PRODUTO -->
        <div class="infoCompra">

            <h2>{{ $produto->nome }}</h2>

            <!-- PREÇO DO PRODUTO -->
            <div class="precoProdutos">
                {{-- <h5 style="margin-right: 30px"><s>R$ 24,90</s></h5> --}}
                <h5>R$ {{ $produto->preco }}</h5>
            </div>

            <!--ESCOLHER TAMANHO -->
            <div class="flex-f">
                <h6>Tamanhos</h6>
                <div class="tamanhosProdutos">
                    @foreach ($tamCor['tamanhos'] as $t)
                        <span>{{ $t->nome }}</span>
                    @endforeach
                </div>
            </div>

            <!--ESCOLHER CORES -->
            <div class="flex-f">
                <h6>Cores</h6>
                <div class="coresProdutos">
                    @foreach ($tamCor['cores'] as $t)
                        <span>{{ $t->nome }}</span>
                    @endforeach
                </div>
            </div>

            <!-- QUANTIDADE -->
            <div class="flex-f">
                <h6>Quantidade</h6>
                <div class="input-group mx-2" style="width: 140px">
                    <span class="input-group-text">-</span>
                    <input type="text" class="form-control text-center" value="0"
                        aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">+</span>
                </div>
            </div>

            <!-- BOTAO DE COMPRA -->

            <button type="button" class="btn btn-primary btn-compra">
                <i class="fa fa-money-bill-alt"></i>
                Comprar
            </button>


        </div>
    </div>

</section>
