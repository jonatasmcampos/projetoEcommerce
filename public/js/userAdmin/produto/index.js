function cadastraProdutoClick() {
  document.getElementById('nav-profile-tab').click();
}

//pega os 
var inputFiles = [];

function newInput(input) {
  var listaNomeImagens = "";
  var ul = document.getElementById('dp-files');
  inputFiles = input.files;
   console.log(inputFiles.value);
  for (i = 0; i < inputFiles.length; i++) {
    var ext = inputFiles[i].name.split('.').pop();

    if (validaExtencaoImage(ext, inputFiles[i].name)) {
      listaNomeImagens += '<li>' + inputFiles[i].name + '</li>'
    }else{
      input.value = "";
      listaNomeImagens = "";
    }
  }
  ul.innerHTML = listaNomeImagens;
}

function validaExtencaoImage(ext, nameImage) {
  console.log(ext);
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
        if (result.isConfirmed) {

          document.getElementById('formCadastroProduto').submit();

        }
      })
    } else {

      document.getElementById('formCadastroProduto').submit();

    }

  });
});
   // console.log(document.getElementById('cadastrarProdutoClick'));
 // console.log(document.getElementById('nav-profile-tab'));
