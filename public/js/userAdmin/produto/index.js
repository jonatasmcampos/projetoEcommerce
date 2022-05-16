
function cadastraProdutoClick() {
  document.getElementById('tab2').click();
}
//selected2
$(document).ready(function () {
  $('.js-example-basic-multiple').select2();
});


function calcula_custo_lucro_preco() {
  var custo = $('#custoProduto').val();
  var preco = $('#precoProduto').val();

  if (custo && preco) {
   var valor = (parseFloat(preco) - parseFloat(custo)) * 100 / parseFloat(custo);
   $('#lucroProduto').val(valor.toFixed(2))
  }
}

function desabilitaInputsProduto() {
  var camposEstapa1Produto = document.querySelectorAll('#estapa_1_produto input')
document.getElementById('selectProdutoCreate').disabled = true
  //camposEstapa1Produto.forEach(console.log);
  camposEstapa1Produto.forEach(element => {
    console.log(element.disabled = true);
  });
 // console.log('');


 
  var camposEstapa2Produto = document.getElementById('estapa_2_produto')

  //console.log(camposEstapa2Produto);
  camposEstapa2Produto.style.visibility != "visible" ?
  camposEstapa2Produto.style.visibility = "visible" :
  camposEstapa2Produto.style.visibility = "hidden"
}






function produtodestroy(id) {

  Swal.fire({
    title: 'Excluir Produto',
    text: "Deseja Realmente Excluir Este Produto?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    calcelButtonText: 'Sair!',
    confirmButtonText: 'Sim, Excluir!'
  }).then((result) => {

    if (result.isConfirmed) {
      document.getElementById('produtodestroy' + id).submit();
    }

  })
}

//pega os arquivos do input file
var inputFiles = [];

function newInput(input) {
  var listaNomeImagens = "";
  var ul = document.getElementById('dp-files');
  inputFiles = input.files;
  console.log(inputFiles);
  if (inputFiles.length > 5) {

    Swal.fire({
      icon: 'warning',
      title: 'Limite de imagens Excedido',
      text: 'Para uma melhor experiência dos usuarios da sua platafomra E-commerce, você tem um limite de 5 imagens por produto!',
    })

    return;

  } else {

    for (i = 0; i < inputFiles.length; i++) {
      var ext = inputFiles[i].name.split('.').pop();

      if (validaExtencaoImage(ext, inputFiles[i].name)) {
        listaNomeImagens += '<li>' + inputFiles[i].name + '</li>'
      } else {
        input.value = "";
        listaNomeImagens = "";
      }

    }

    ul.innerHTML = listaNomeImagens;

  }


}

function validaExtencaoImage(ext, nameImage) {
  // console.log(ext);
  if (ext == 'png' || ext == 'jpeg' || ext == 'jpg' || ext == 'svg') {
    return true;
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Imagem ' + nameImage + ' Invalido',
      text: 'Formatos Permitidos : png, jpeg, jpg e svg',
    })
    return false;
  }

}

$(function () {
  $('form[id="formCadastroProduto"]').submit(function (event) {
    event.preventDefault();

    if (!inputFiles.length) {

      Swal.fire({
        title: 'Nenhuma Imagem Selecionada',
        text: "Ao continuar esse produto ficara sem imagem para exibir no Ecommerce",
        icon: 'warning',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, Manter Sem Imagem!'
      }).then((result) => {
        console.log(result);
        //caso queira cadastrar produto sem imagem
        if (result.isConfirmed) {

          document.getElementById('formCadastroProduto').submit();

        }
      })

    } else if (inputFiles.length > 5) {

      Swal.fire({
        icon: 'warning',
        title: 'Limite de imagens Excedido',
        text: 'Para uma melhor experiência dos usuarios da sua platafomra E-commerce, você tem um limite de 5 imagens por produto!',
      })

      return;
    } else {
      document.getElementById('formCadastroProduto').submit();
    }

  });
});

function msgSuccess(msg, typ) {
  Swal.fire({
    icon: typ,
    title: msg,
    showConfirmButton: false,
    timer: 1500
  })
}
   // console.log(document.getElementById('cadastrarProdutoClick'));
 // console.log(document.getElementById('nav-profile-tab'));
