var inputUF = document.getElementById('uf_socio');
var inputMunicipio = document.getElementById('municipio_socio');
var uf_nascimento = document.getElementById('uf_nascimento_socio');
var municipio_nascimento = document.getElementById('municipio_nascimento_socio');
var inputCEP = document.getElementById("inputCEP2");

var cpf = document.querySelector('#inputCPF2');

getEstado();

if (inputCEP) {
    inputCEP.addEventListener('keyup', () => {
        if (inputCEP.value.length == 8) {
            getCep(inputCEP.value);
        }
    });
}

/********************************************************************************************************/
// verifica se o cpf já estar cadastrado
/********************************************************************************************************/
if (cpf) {
    let header = document.querySelector('h1').innerHTML;
    let value;
    if (header == 'Editar membro' || header == 'Editar sócio') {
        value = cpf.value;

        cpf.addEventListener('blur', async () => {
            let cpf_label = document.getElementById('label-cpf');
            let button = document.querySelector('.button-green');

            if (value != cpf.value) {
                if (cpf.value.length == 14) {
                    let info = new FormData();
                    info.append('cpf', cpf.value)
                    let req = await fetch('http://localhost/sistemadap/public/verify', {
                        method: 'POST',
                        body: info
                    });
                    let json = await req.json();
                    if (json.cpf_verify != 0) {
                        cpf_label.innerHTML = "CPF: Existe um cadastro com este CPF.";
                        cpf.style.border = '1px solid red';
                        cpf_label.style.color = "red";
                        button.style.display = 'none';
                    } else {
                        cpf_label.innerHTML = "CPF";
                        cpf.style.border = '1px solid #ccc';
                        cpf_label.style.color = "black";
                        button.style.display = 'block';
                    }
                }
            } else {
                cpf_label.innerHTML = "CPF";
                cpf.style.border = '1px solid #ccc';
                cpf_label.style.color = "black";
                button.style.display = 'block';
            }
        });
    } else {
        cpf.addEventListener('blur', async () => {
            let cpf_label = document.getElementById('label-cpf');
            let button = document.querySelector('.button-green');

            if (cpf.value.length == 14) {
                let info = new FormData();
                info.append('cpf', cpf.value)
                let req = await fetch('http://localhost/sistemadap/public/verify', {
                    method: 'POST',
                    body: info
                });
                let json = await req.json();
                if (json.cpf_verify != 0) {
                    cpf_label.innerHTML = "CPF: Existe um cadastro com este CPF.";
                    cpf.style.border = '1px solid red';
                    cpf_label.style.color = "red";
                    button.style.display = 'none';
                } else {
                    cpf_label.innerHTML = "CPF";
                    cpf.style.border = '1px solid #ccc';
                    cpf_label.style.color = "black";
                    button.style.display = 'block';
                }
            }

        });
    }

}

/********************************************************************************************************/
// Atualiza os municipios do cadastro de membros e responsavel
/********************************************************************************************************/
if (uf_nascimento) {
    uf_nascimento.addEventListener('change', async () => {
        let html = '<option></option>';
        let uf = uf_nascimento.value;
        // Criar função para pegar municipios
        let req = await fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados/" + uf + "/municipios");
        let json = await req.json();
        json.forEach((cidade) => {
            html += '<option>' + cidade.nome + '</option>';
        })
        municipio_nascimento.innerHTML = html;
    });
}

/********************************************************************************************************/
// Função obtem os estados do brasil
/********************************************************************************************************/
async function getEstado() {
    let html = "<option></option>";
    let html_mun = "<option></option>";
    let estados = [];
    let req = await fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados");
    let json = await req.json();

    if (uf_nascimento.value) {

        json.forEach(function (UFs) {
            estados.push(UFs.sigla);
        });
        estados.sort();
        estados.forEach((uf) => {
            if (uf_nascimento.value == uf) {
                html += '<option selected>' + uf + '</option>';
            } else {
                html += '<option>' + uf + '</option>';
            }
        });

        if (municipio_nascimento.value) {
            let req_mun = await fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados/" + uf_nascimento.value + "/municipios");
            let json_mun = await req_mun.json();
            json_mun.forEach((cidade) => {
                if (municipio_nascimento.value == cidade.nome) {
                    html_mun += '<option selected>' + cidade.nome + '</option>';
                } else {
                    html_mun += '<option>' + cidade.nome + '</option>';
                }
            });
            municipio_nascimento.innerHTML = html_mun;
        }

    } else {
        json.forEach(function (UFs) {
            estados.push(UFs.sigla);
        });
        estados.sort();
        estados.forEach((uf) => {
            html += '<option>' + uf + '</option>';
        });
    }
    uf_nascimento.innerHTML = html;
}

async function getCep(cep) {
    let req = await fetch("https://viacep.com.br/ws/" + cep + "/json/");
    let json = await req.json();
    if (json.cep) {
        inputUF.value = json.uf;
        inputMunicipio.value = json.localidade.toUpperCase();
    }
}