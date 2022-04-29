@if (!$categorias->count())
    <h1>Nenhuma Categoria cadastrada</h1>
    <a href="{{ route('categoria.create') }}" class="btn btn-primary">Cadastrar categoria</a>
@else
    @if ($produto && count($produto->imagens))
        <p class="mt-3">

            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Imagens
            </button>
        </p>

        <div class="collapse" id="collapseExample">

            <input id="imagesProdutoName" type='file' name='image[]' accept="image/*" multiple id='file-input'
                onchange="newInput(this)" class='file-input' />

            <ul id="dp-files"></ul>

            <div class="card card-body">
                <div class="row card-deck mt-3">
                    @foreach ($produto->imagens as $imagem)
                        <div class="card col-3 mx-2">
                            <img class="card-img-top" src="{{ asset($imagem->nome) }}" alt="Card image cap">
                            <div class="card-footer mt-3">
                                <button type="submit" class="btn btn-excluir" style="padding:0;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    @else
        <div class="mb-3">
            <label for="formFileSm" class="form-label">iamgens</label>
            <input id="imagesProdutoName" type='file' name='image[]' accept="image/*" multiple id='file-input'
                onchange="newInput(this)" class='file-input' />

            <ul id="dp-files"></ul>
        </div>

    @endif

    <div class="mb-3 mt-5">
        <label for="exampleInputEmail1" class="form-label">Produto</label>
        <input required value="{{ $produto ? $produto->nome : '' }}" name="nome" type="text" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Descrição</label>
        <input required name="descricao" value="{{ $produto ? $produto->descricao : '' }}" type="text"
            class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Preço</label>
        <input required name="preco" value="{{ $produto ? $produto->preco : '0' }}" type="text" class="form-control"
            id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Desconto</label>
        <input name="desconto" value="{{ $produto && $produto->desconto ? $produto->desconto : '0' }}" type="number"
            class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Estoque</label>
        <input name="estoque" value="{{ $produto && $produto->estoque ? $produto->estoque->quantidade : '0' }}"
            type="number" class="form-control" id="exampleInputPassword1">
    </div>
    @if ($produto)
        <label for="">Categoria</label>
        <input type="text" value="{{ $produto->categoria->nome }}" disabled="disabled" /><br>
    @else
        <div class="mb-3">
            <label for="">Selecione a categoria do produto</label>
            <select required name="categoria" class="form-select" aria-label="Default select example">

                @foreach ($categorias as $c)
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                @endforeach

            </select>
        </div>
    @endif
    <button type="submit" class="btn btn-primary">{{ $produto ? 'Atualizar' : 'Cadastrar' }}</button>



@endif
