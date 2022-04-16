<div class="mb-3">

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
    <input required name="preco" value="{{ $produto ? $produto->preco : '' }}" type="text" class="form-control"
        id="exampleInputPassword1">
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Desconto</label>
    <input name="desconto" value="{{ $produto && $produto->desconto ? $produto->desconto : '' }}" type="number"
        class="form-control" id="exampleInputPassword1">
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Estoque</label>
    <input name="estoque" value="{{ $produto && $produto->estoque ? $produto->estoque : 0 }}" type="number"
        class="form-control" id="exampleInputPassword1">
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
