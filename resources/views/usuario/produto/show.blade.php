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
                <img src="{{ asset('img/roupa1.png') }}" alt="Foto do produto">
                <img src="{{ asset('img/roupa1.png') }}" alt="Foto do produto">
                <img src="{{ asset('img/roupa1.png') }}" alt="Foto do produto">
                <img src="{{ asset('img/roupa1.png') }}" alt="Foto do produto">
                <img src="{{ asset('img/roupa1.png') }}" alt="Foto do produto">
            </div>
            <!-- FOTO GRANDE -->
            <div class="fotoGrande">
                <img src="{{ asset('img/roupa1.png') }}" alt="Foto do produto">
            </div>
        </div>

        <!-- INFO PARA COMPRA DO PRODUTO -->
        <div class="infoCompra">
            
            <h2>{{$produto->nome}}</h2>
            
            <!-- PREÇO DO PRODUTO -->
            <div class="precoProdutos">
                {{-- <h5 style="margin-right: 30px"><s>R$ 24,90</s></h5> --}}
                <h5>R$ {{$produto->preco}}</h5>
            </div>

            <!--ESCOLHER TAMANHO -->
            <div class="tamanhos">
                <h6>Tamanhos</h6>
                <div class="tamanhosProdutos">
                    @foreach ($tamCor['tamanhos'] as $t)
                        <span>{{$t->nome}}</span>
                    @endforeach
                </div>
            </div>

            <!--ESCOLHER CORES -->
            <div class="cores">
                <h6>Cores</h6>
                <div class="coresProdutos">
                    @foreach ($tamCor['cores'] as $t)
                        <span>{{$t->nome}}</span>
                    @endforeach
                </div>
            </div>

            <!-- QUANTIDADE -->
            <div>
                <h6>Quantidade</h6>
                <div class="input-group mb-3" style="width: 140px">
                    <span class="input-group-text">-</span>
                    <input type="text" class="form-control text-center" value="0" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">+</span>
                </div>
            </div>

            <!-- BOTAO DE COMPRA -->
            <div class="botoes">
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-money-bill-alt"></i>
                    Comprar
                </button>
                <button type="button" class="btn btn-primary">
                     <i class="fa fa-cart-plus"></i> 
                     Adicionar ao carrinho
                </button>
            </div>

        </div>
    </div>

</section>
