
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

  camposEstapa1Produto.forEach(element => {
    element.disabled = true;
  });

  var camposEstapa2Produto = document.getElementById('estapa_2_produto')

  //console.log(camposEstapa2Produto);
  camposEstapa2Produto.style.visibility != "visible" ?
    camposEstapa2Produto.style.visibility = "visible" :
    camposEstapa2Produto.style.visibility = "hidden"
}

count = 0
dados = [];

function addInputsEtapa2() {

  var tamanho = $("#selectTamanhoEtapa2Produto :selected");
  var cor = $("#selectCorEtapa2Produto :selected");
  var estoque = $("#estoqueEtapa2Produto").val();
  var msg = document.getElementById('inputEstoqueZero');

  if (!estoque.length) {

    msg.style.color = "red";
    msg.innerHTML = "Valor Inválido";

  } else {
    var verify = 1;

    if (!dados.length) {
      console.log(dados);
      dados[count] = [tamanho.val(), cor.val(), estoque];
      dados[count]['table'] = [tamanho.text(), cor.text(), estoque];

      $("#tabelaTrEtapa2Produto").append('<tr> <td><button type="button" onclick="removeTr(this,' + 0 + ')">Excluir</button></td><td>' + dados[0]['table'][0] + '</td><td>' + dados[0]['table'][1] + '</td><td>' + dados[0]['table'][2] + '</td></tr>');
      count++;
      var verify = 0;
    } else {

      // console.log(dados);
      for (let i = 0; i < dados.length; i++) {

        if (dados[i][0] == tamanho.val() && dados[i][1] == cor.val()) {

          Swal.fire({
            icon: 'error',
            title: 'Já existe esse produto deste tamanho e cor inserido',
            showConfirmButton: false,
            timer: 2000
          });

          verify = 0

        }
      }
      if (verify) {
        dados[count] = [tamanho.val(), cor.val(), estoque];
        dados[count]['table'] = [tamanho.text(), cor.text(), estoque];

        document.getElementById("tabelaTrEtapa2Produto").innerHTML = ""

        for (let i = 0; i < dados.length; i++) {

          montaHtml(i, dados[i]['table'][0], dados[i]['table'][1], dados[i]['table'][2])

        }
        count++;
      }
      // console.log(dados);
    }
    //console.log(dados);
  }
  if (dados.length >= 1) {
    var tabelaEtapa2Produto = document.getElementById('tabelaEtapa2Produto')

    tabelaEtapa2Produto.style.visibility = "visible"
  }
}


function removeTr(item, indice) {
  var tr = $(item).closest('tr');

  tr.fadeOut(500, function () {

    tr.remove();
  });

  dados.splice(indice, 1);
  document.getElementById("tabelaTrEtapa2Produto").innerHTML = ""

  for (let i = 0; i < dados.length; i++) {

    montaHtml(i, dados[i]['table'][0], dados[i]['table'][1], dados[i]['table'][2])

  }


  console.log(dados);

  //console.log(dados)
  if (dados.length == 0) {
    count = 0;
    var tabelaEtapa2Produto = document.getElementById('tabelaEtapa2Produto')

    tabelaEtapa2Produto.style.visibility = "hidden"
  }
}
function montaHtml(count, tamanho, cor, estoque) {

  $("#tabelaTrEtapa2Produto").append('<tr> <td><button type="button" onclick="removeTr(this,' + count + ')">Excluir</button></td><td>' + tamanho + '</td><td>' + cor + '</td><td>' + estoque + '</td></tr>');

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
