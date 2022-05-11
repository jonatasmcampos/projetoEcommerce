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
        <div style="background-color: #fff; border-radius: 7px;">
            {{-- CAMPOS PARA CADASTRAR OS PRODUTOS --}}
            <div class="box-formCadastrarProdutos">
    
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
    
                <!-- COR -->
                <div class="cor">
                    <label for="cor" class="form-label">Cor</label>
                    <div>
                        <input id="cor" name="cor" value="{{ $produto && $produto->cor ? $produto->cor : '' }}"
                            type="text" class="form-control" aria-label="Cor"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
    
                <!-- ESTOQUE -->
                <div class="estoque">
                    <label for="exampleInputPassword1" class="form-label">Estoque</label>
                    <input name="estoque" value="{{ $produto ? $produto->estoque : '0' }}" type="number"
                        class="form-control" id="exampleInputPassword1">
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
                        <select required name="categoria_id" class="form-select" aria-label="Default select example">
    
                            @foreach ($categorias as $c)
                                <option value="{{ $c->id }}">{{ $c->nome }}</option>
                            @endforeach
    
                        </select>
                    </div>
    
                    <div class="tamanho">
                        <label for="">Tamanhos</label><br>
                        @if ($tamanhos->count())
                        <select class="js-example-basic-multiple" name="tamanhos[]" multiple="multiple" style="width: 100px !important;">
                            @foreach ($tamanhos as $t)
                            <option value="{{$t->id}}">{{$t->tamanho}}</option>
                            @endforeach
                            
                             </select>
                        @else
                        <label for="">Nenhum tipo de tamanho registrado</label>
                        @endif      
                    </div>
                 
                @endif
        
            </div>
    
            {{-- BOTAO DE CADASTRAR O PRODUTO --}}
            <button style="float: right !important; margin: 0 20px 20px 0; height: max-content;" type="submit"
                class="btn btn-primary">
                {{ $produto ? 'Atualizar' : 'Cadastrar produto' }}
            </button>
    
        </div>
    </div>

@endif
