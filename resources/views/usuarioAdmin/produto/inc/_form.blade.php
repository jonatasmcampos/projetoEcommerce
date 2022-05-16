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
                            <input required name="custo" value="{{ $produto ? $produto->custo : '' }}" type="text"
                                class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <!-- LUCRO -->
                    <div class="lucro">
                        <label for="exampleInputPassword1" class="form-label">Lucro</label>
                        <div>
                            <span class="input-group-text" id="basic-addon1">%</span>
                            <input required name="lucro" value="{{ $produto ? $produto->lucro : '0' }}" type="text"
                                class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <!-- PRECO -->
                    <div class="preco">
                        <label for="exampleInputPassword1" class="form-label">Preço</label>
                        <div>
                            <span class="input-group-text" id="basic-addon1">R$</span>
                            <input required name="preco" value="{{ $produto ? $produto->preco : '0' }}" type="text"
                                class="form-control" id="exampleInputPassword1">
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
                                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                                @endforeach

                            </select>
                        </div>

                    @endif
                    <a class="btn btn-primary" onclick="desabilitaInputsProduto()">prosseguir</a>
                </div>

                <style>
                    .etapa2 {
                        visibility: hidden;
                        margin-left: 45px;
                        margin-bottom: 5px
                    }
                    #tabelaEtapa2Produto{
                        visibility: hidden;
                    }

                </style>

                <hr>
                <!-- ETAPA DOIS -->
                <div id="estapa_2_produto" class="row etapa2">

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
                    <div class="col-md-3 tamanho">
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
                    <div class="col-md-3 estoque">
                        <label for="exampleInputPassword1" class="form-label">Estoque</label>
                        <input name="estoque[]" value="{{ $produto ? $produto->estoque : '' }}" type="number"
                            class="form-control" id="estoqueEtapa2Produto">
                        <span id="inputEstoqueZero"></span>
                    </div>

                    <div>
                        <a onclick="addInputsEtapa2()" class="btn"><i class="bi bi-plus-square"></i></a>

                        {{-- <a class="btn"><i class="bi bi-file-minus"></i></a> --}}
                    </div>
                </div>

            </div>
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
            {{-- BOTAO DE CADASTRAR O PRODUTO --}}
            
            <button style="float: right !important; margin: 0 20px 20px 0; height: max-content;" type="submit"
                class="btn btn-primary">
                {{ $produto ? 'Atualizar' : 'Cadastrar produto' }}
            </button>

        </div>
    </div>

@endif
