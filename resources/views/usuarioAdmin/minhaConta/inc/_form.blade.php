
<div class="row-cols-md-4  mx-5">
    <div class="col">
      <div class="card h-50">
        <img src="{{ asset(auth()->user()->foto) }}" class="card-img-top" alt="...">
        <input name="foto" type="file" class="form-control">
        <div class="card-footer">
            <div class="input-group mb-3">
               
              </div>
        </div>
        </div>
      </div>
    </div>

<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Nome</span>
    <input name="name" value="{{auth()->user()->name}}" type="text" class="form-control" placeholder="Nome" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  
  <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon2">E-mail</span>
    <input name="email" value="{{auth()->user()->email}}" type="email" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  </div>

  {{-- <div class="input-group mb-3">
    <span class="input-group-text">CPF</span>
    <input value="{{auth()->user()->cpf}}" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">

  </div>
  
  <div class="input-group mb-3">
      <span class="input-group-text">Telefone</span>
    <input value="{{auth()->user()->telefone}}" type="text" class="form-control" placeholder="Username" aria-label="Username">

  </div> --}}
<button type="submit" class="btn btn-primary">Atualizar</button>
