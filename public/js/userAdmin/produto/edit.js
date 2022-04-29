//pega os arquivos do input file
var inputFiles = [];

function newInput(input) {
  var listaNomeImagens = "";
  var ul = document.getElementById('dp-files');
  inputFiles = input.files;

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

function msgSuccess(msg, typ) {
  Swal.fire({
    icon: typ,
    title: msg,
    showConfirmButton: false,
    timer: 1500
  })
}