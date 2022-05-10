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
    <div>

        {{-- CAMPOS PARA CADASTRAR OS PRODUTOS --}}
        <div class="box-formCadastrarProdutos">

            {{-- NOME DO PRODUTO --}}
            <div class="nome">
                <label for="exampleInputEmail1" class="form-label">Produto</label>
                <input required value="{{ $produto ? $produto->nome : '' }}" name="nome" type="text"
                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            {{-- PREÇO DO PRODUTO --}}
            <div class="preco">
                <label for="exampleInputPassword1" class="form-label">Custo</label>
                <div>
                    <span class="input-group-text" id="basic-addon1">R$</span>
                    <input required name="custo" value="{{ $produto ? $produto->custo : '0' }}" type="text"
                        class="form-control" id="exampleInputPassword1">
                </div>
            </div>
            <div class="preco">
                <label for="exampleInputPassword1" class="form-label">Lucro</label>
                <div>
                    <span class="input-group-text" id="basic-addon1">%</span>
                    <input required name="lucro" value="{{ $produto ? $produto->lucro : '0' }}" type="text"
                        class="form-control" id="exampleInputPassword1">
                </div>
            </div>
            <div class="preco">
                <label for="exampleInputPassword1" class="form-label">Preço</label>
                <div>
                    <span class="input-group-text" id="basic-addon1">R$</span>
                    <input required name="preco" value="{{ $produto ? $produto->preco : '0' }}" type="text"
                        class="form-control" id="exampleInputPassword1">
                </div>
            </div>

            {{-- DESCONTO DO PRODUTO --}}
            <div class="input-group desconto">
                <label for="cor" class="form-label">Cor</label>
                <div>
                    <input id="desconto" name="cor" value="{{ $produto && $produto->cor ? $produto->cor : '' }}"
                        type="text" class="form-control" placeholder="cor" aria-label="Cor"
                        aria-describedby="basic-addon1">
                </div>
            </div>

            {{-- ESTOQUE DO PRODUTO --}}
            <div class="estoque">
                <label for="exampleInputPassword1" class="form-label">Estoque</label>
                <input name="estoque" value="{{ $produto ? $produto->estoque : '0' }}" type="number"
                    class="form-control" id="exampleInputPassword1">
            </div>

            {{-- CATEGORIA DO PRODUTO --}}
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
                    <select required name="categoria" class="form-select" aria-label="Default select example">

                        @foreach ($categorias as $c)
                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="categoria">
                    <label for="">Tamanhos</label>
                    {{-- <select required name="tamanhos[]" multiple="multiple" class="form-select" aria-label="Default select example">
                       
                            <option value="pp">PP</option>
                            <option value="pp">M</option>
                            <option value="gg">GG</option>
                            <option value="pp">G3</option>
                     
    
                    </select> --}}
                    
                    
                   
                </div>
                <select class="js-example-basic-multiple" name="states[]" multiple="multiple" style="width: 100px !important;">
                    <option value="AL">pp</option>
                    <option value="WY">gg</option>
                    <option value="AL">m</option>            
                    <option value="WY">56</option>
                    <option value="AL">543</option>              
                    <option value="WY">435</option>
                  </select>
            @endif
    
        </div>


        {{-- BOTAO DE CADASTRAR O PRODUTO --}}
        <button style="float: right !important; margin: 0 20px 20px 0; height: max-content;" type="submit"
            class="btn btn-primary">
            {{ $produto ? 'Atualizar' : 'Cadastrar produto' }}
        </button>

    </div>

@endif
