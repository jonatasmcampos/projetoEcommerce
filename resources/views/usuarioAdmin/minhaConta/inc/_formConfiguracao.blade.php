<div class="bg-table box-config">
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">Nome</span>
        <input name="name" value="{{ auth()->user()->name }}" type="text" class="input-config" placeholder="Nome"
            aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group">
        <span class="input-group-text" id="basic-addon2">E-mail</span>
        <input name="email" value="{{ auth()->user()->email }}" type="email" class="input-config"
            placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
    </div>

    {{-- <div class="input-group">
    <span class="input-group-text">CPF</span>
    <input value="{{auth()->user()->cpf}}" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">

  </div>
  
  <div class="input-group">
      <span class="input-group-text">Telefone</span>
    <input value="{{auth()->user()->telefone}}" type="text" class="form-control" placeholder="Username" aria-label="Username">

  </div> --}}
    <br>
    <button type="submit" class="btn btn-primary" style="float: right">Atualizar</button>
    <br>
</div>
