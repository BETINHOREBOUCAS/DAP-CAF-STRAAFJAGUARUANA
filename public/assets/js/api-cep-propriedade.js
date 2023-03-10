var inputUF = document.getElementById('uf_proprietario');
var inputMunicipio = document.getElementById('municipio_proprietario');
var inputCEP = document.getElementById("inputCEP2");

if (inputCEP) {
    inputCEP.addEventListener('keyup', () => {
        if (inputCEP.value.length == 8) {
            getCep(inputCEP.value);
        }
    });
}

async function getCep(cep) {
    let req = await fetch("https://viacep.com.br/ws/" + cep + "/json/");
    let json = await req.json();
    if (json.cep) {
        inputUF.value = json.uf;
        inputMunicipio.value = json.localidade.toUpperCase();
    }
}