@if (!$categorias->count())

    <div class="alert alert-warning" style="display: flex; flex-direction: column; align-items:center" role="alert">
        <h4 class="alert-heading"><i class="material-icons">feedback</i></h4>
        <h3>
            Nenhuma categoria cadastrada!
        </h3>
        <hr>
        <p class="mb-0">
            <a href="{{ route('categoria.create') }}" class="btn btn-primary">Cadastrar categoria</a>
        </p>
    </div>
@else
    <div style="display: flex; justify-content: center; width: 100%">
        <div style="background-color: #fff; border-radius: 7px; width: 100%">

            {{-- CAMPOS PARA CADASTRAR OS PRODUTOS --}}
            <div class="box-formCadastrarProdutos">

                <!-- ETAPA UM -->
                <div id="estapa_1_produto" class="etapa1">

                    {{-- NOME DO PRODUTO --}}
                    <div class="nome">
                        <label for="exampleInputEmail1" class="form-label">Produto</label>
                        <input required value="{{ $produto ? $produto->nome : '' }}" name="nome" type="text"
                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <!-- CUSTO -->
                    <div class="custo">
                        <label for="exampleInputPassword1" class="form-label">Custo</label>
                        <div>
                            <span class="input-group-text" id="basic-addon1">R$</span>
                            <input onblur="calcula_custo_lucro_preco()" required name="custo"
                                value="{{ $produto ? $produto->custo : '' }}" type="text" class="form-control"
                                id="custoProduto">
                        </div>
                    </div>

                    <!-- PRECO -->
                    <div class="preco">
                        <label for="exampleInputPassword1" class="form-label">Preço</label>
                        <div>
                            <span class="input-group-text" id="basic-addon1">R$</span>
                            <input onblur="calcula_custo_lucro_preco()" required name="preco"
                                value="{{ $produto ? $produto->preco : '' }}" type="text" class="form-control"
                                id="precoProduto">
                        </div>
                    </div>

                    <!-- LUCRO -->
                    <div class="lucro">
                        <label for="exampleInputPassword1" class="form-label">Lucro</label>
                        <div>
                            <span class="input-group-text" id="basic-addon1">%</span>
                            <input readonly required name="lucro" value="{{ $produto ? $produto->lucro : '' }}"
                                type="text" class="form-control" id="lucroProduto">
                        </div>
                    </div>

                    <!-- CATEGORIA -->
                    @if ($produto)
                        <div>
                            <label for="inputCategoria">Categoria</label>
                            <br>
                            <input id="inputCategoria" style="height: max-content" type="text"
                                value="{{ $produto->categoria->nome }}" disabled="disabled" /><br>
                        </div>
                    @else
                        <div class="categoria">
                            <label for="">Selecione a categoria do produto</label>
                            <select id="selectProdutoCreate" required name="categoria_id" class="form-select"
                                aria-label="Default select example">

                                @foreach ($categorias as $c)
                                    <option selected value="{{ $c->id }}">{{ $c->nome }}</option>
                                @endforeach

                            </select>
                        </div>

                    @endif
                </div>
                <a style="height: fit-content; width: 50%" id="botaoProsseguirEtapa1" class="btn btn-primary"
                    onclick="desabilitaInputsetapa1()">Prosseguir</a>

                <style>
                    .etapa2 {
                        visibility: hidden;
                        margin-left: 45px;
                        margin-bottom: 5px
                    }

                    #tabelaEtapa2Produto {
                        visibility: hidden;
                    }

                </style>

                <hr>
                <!-- ETAPA DOIS -->
                <div id="etapa_2_produto" class="row etapa2">

                    <!-- TAMANHO -->

                    <div class="col-md-3 tamanho">
                        <label for="">Tamanhos</label><br>
                        @if ($tamanhos->count())
                            <select class="form-select" id="selectTamanhoEtapa2Produto"
                                aria-label="Default select example">
                                @foreach ($tamanhos as $t)
                                    <option value="{{ $t->id }}">{{ $t->nome }}</option>
                                @endforeach
                            </select>
                        @else
                            <label for="">Nenhum tipo de tamanho registrado</label>
                        @endif
                    </div>

                    <!-- COR -->
                    <div class="col-md-3 cor">
                        <label for="">Cores</label><br>
                        @if ($cores->count())
                            <select class="form-select" id="selectCorEtapa2Produto"
                                aria-label="Default select example">
                                @foreach ($cores as $c)
                                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                                @endforeach
                            </select>
                        @else
                            <label for="">Nenhuma Cor Cadastrada</label>
                        @endif
                    </div>

                    <!-- ESTOQUE -->
                    <div class="col-md-3 estoque d-flex">
                        <div>
                            <label for="exampleInputPassword1" class="form-label">Estoque</label>
                            <input value="" type="number" class="form-control" id="estoqueEtapa2Produto">
                            <span id="inputEstoqueZero"></span>
                        </div>
                        <div style="margin-left: 20px; position: relative; top: 45%">
                            <a onclick="addInputsEtapa2()" class="btn"><i class="bi bi-plus-square"></i></a>
                        </div>
                    </div>

                    <div>
                        {{-- <a class="btn"><i class="bi bi-file-minus"></i></a> --}}
                    </div>
                </div>

            </div>

            @if ($produto)
                <table id="tabelaEtapa2Produto" class="table table-borderless">
                    <thead>
                        <tr style="background: black;">
                            <th scope="col">#</th>
                            <th scope="col">Tamanho</th>
                            <th scope="col">Cor</th>
                            <th scope="col">Estoque</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: black" id="tabelaTrEtapa2Produto">
                        {{-- entra os intens selecionados --}}
                        @foreach ($produto->prodTamCors as $item)
                            <tr>
                                <input type="hidden" name="" value="{{ $item->tamanho->id }}">
                                <input type="hidden" name="" value="{{ $item->cor->id }}">
                                <td><button type="button"
                                        onclick="deletaprodTamCorEstoque(<?php echo $item->id; ?>, this, '<?php echo $item->tamanho->nome; ?>', '<?php echo $item->cor->nome; ?>')">excluir</button>
                                </td>
                                <td>{{ $item->tamanho->nome }}</td>
                                <td>{{ $item->cor->nome }}</td>
                                <td>{{ $item->estoque->quantidade }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a style="position: relative; left: 25%; width: 50%" id="botaoProsseguirEtapa2" class="btn btn-primary" onclick="desabilitaInputsetapa2()">Prosseguir</a>

                <div id="inputshidden">

                </div>
            @else
                <table id="tabelaEtapa2Produto" class="table table-borderless">
                    <thead>
                        <tr style="background: black;">
                            <th scope="col">#</th>
                            <th scope="col">Tamanho</th>
                            <th scope="col">Cor</th>
                            <th scope="col">Estoque</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: black" id="tabelaTrEtapa2Produto">
                        {{-- entra os intens selecionados --}}
                    </tbody>
                </table>

                <a style="position: relative; left: 25%; width: 50%" id="botaoProsseguirEtapa2" class="btn btn-primary" onclick="desabilitaInputsetapa2()">Prosseguir</a>

                <div id="inputshidden">

                </div>
            @endif

        </div>
    </div>

@endif
