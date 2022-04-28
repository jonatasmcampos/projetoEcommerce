<style>
    .incluir-categoria {
        visibility: hidden;
    }

    .novaCategoria{
        display: flex;
        align-items:center;
        cursor: pointer;

        border: 1px dashed #ccc;
        padding: 5px 20px;
        border-radius: 7px;
    }

    .novaCategoria:hover{
        border: 2px dashed orangered;
    }

    .novaCategoria:hover i{
        color: orangered;
        font-weight: bold;
    }

</style>

<div class="noCentro" style="flex-direction: column;">

    <h4 onclick="exibir()" class="my-3 novaCategoria">
        <i class="material-icons">add</i>
        <p style="margin: 0 0 0 5px">
            Nova categoria
        </p>
    </h4>

    <div id="campoInserir" class="incluir-categoria noCentro">
        <div>
            <input placeholder="Categoria" required name="nome" type="text" class="form-control"
                id="exampleInputEmail1">
        </div>
        <button type="submit" class="btn btn-primary mx-3">Incluir</button>
    </div>

</div>

<script>

    var campoInserir = document.getElementById('campoInserir')

    function exibir(){
        campoInserir.style.visibility != "visible" ? 
            campoInserir.style.visibility ="visible" : 
                    campoInserir.style.visibility ="hidden"
    }
    
</script>