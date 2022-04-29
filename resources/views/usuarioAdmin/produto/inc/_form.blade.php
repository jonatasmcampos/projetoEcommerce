@if (!$categorias->count())
    <h1>Nenhuma Categoria cadastrada</h1>
    <a href="{{ route('categoria.create') }}" class="btn btn-primary">Cadastrar categoria</a>
@else
    <div class="box-formCadastrarProdutos">
        <div class="nome-preco-desconto">
            {{-- NOME DO PRODUTO --}}
            <div class="nome">
                <label for="exampleInputEmail1" class="form-label">Produto</label>
                <input required value="{{ $produto ? $produto->nome : '' }}" name="nome" type="text"
                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            {{-- PREÇO DO PRODUTO --}}
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
                <label for="desconto" class="form-label">Desconto</label>
                <div>
                    <span class="input-group-text" id="basic-addon1">%</span>
                    <input id="desconto" name="desconto"
                        value="{{ $produto && $produto->desconto ? $produto->desconto : '0' }}" type="number"
                        class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="descricao">
            <label for="exampleInputPassword1" class="form-label">Descrição</label>
            <input required name="descricao" value="{{ $produto ? $produto->descricao : '' }}" type="text"
                class="form-control" id="exampleInputPassword1">
        </div>

        <div class="estoque-categoria-imagem">

            {{-- ESTOQUE DO PRODUTO --}}
            <div class="estoque">
                <label for="exampleInputPassword1" class="form-label">Estoque</label>
                <input name="estoque"
                    value="{{ $produto && $produto->estoque ? $produto->estoque->quantidade : '0' }}" type="number"
                    class="form-control" id="exampleInputPassword1">
            </div>

            {{-- CATEGORIA DO PRODUTO --}}
            @if ($produto)
                <label for="">Categoria</label>
                <input type="text" value="{{ $produto->categoria->nome }}" disabled="disabled" /><br>
            @else
                <div class="categoria my-1">
                    <label for="">Selecione a categoria do produto</label>
                    <select required name="categoria" class="form-select mt-2" aria-label="Default select example">

                        @foreach ($categorias as $c)
                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach

                    </select>
                </div>
            @endif

            <div class="imagem">
                @include('usuarioAdmin.produto.inc._formImagem', [
                    'produto' => '',
                ])
                <div>
                    <ul id="dp-files"></ul>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ $produto ? 'Atualizar' : 'Cadastrar' }}</button>
    </div>

@endif
