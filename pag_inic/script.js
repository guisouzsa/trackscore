const inputFile = document.getElementById('foto_input');
const fileNameSpan = document.getElementById('file-name');
const label = document.querySelector('.custom-file-label');

label.addEventListener('click', () => {
  inputFile.click();
});

inputFile.addEventListener('change', () => {
  if (inputFile.files.length > 0) {
    fileNameSpan.textContent = inputFile.files[0].name;
  } else {
    fileNameSpan.textContent = "Nenhum arquivo escolhido";
  }
});



document.getElementById('botao-voltar').addEventListener('click', function() {
  history.back();
});

