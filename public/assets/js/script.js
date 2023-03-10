var cpfInput = document.getElementById("inputCPF");

cpfInput.addEventListener("input", () => {
    let cpfValue = inputCPF.value;
    let numeric = cpfValue.replace(/[^0-9]+/g, '');
    let cpfLength = numeric.length;

    let partOne = numeric.slice(0, 3) + ".";
    let partTwo = numeric.slice(3, 6) + ".";
    let partThree = numeric.slice(6, 9) + "-";

    if (cpfLength < 4) { 
        cpfInput.value = numeric;
    } else if (cpfLength >= 4 && cpfLength < 7) {
        let formatCPF = partOne +
                       numeric.slice(3);
        cpfInput.value = formatCPF;
    } else if (cpfLength >= 7 && cpfLength < 10) {
        let formatCPF = partOne +
                       partTwo +
                       numeric.slice(6);
        cpfInput.value = formatCPF;
    } else if (cpfLength >= 10 && cpfLength < 12) {
        let formatCPF = partOne +
                       partTwo +
                       partThree +
                       numeric.slice(9);
        cpfInput.value = formatCPF;
    } else if (cpfLength >= 12) {
        let formatCPF = partOne +
                       partTwo +
                       partThree +
                       numeric.slice(9, 11);
        cpfInput.value = formatCPF;
    }
});

/********************************************************************************************************/
// Deixa preencher apenas o campo de socio ou membro
/********************************************************************************************************/

var nomeSocio = document.getElementById('nome');
var cpfSocio = document.getElementsByName('cpf')[0];
var nomeMembro = document.getElementById('nomeMembro');
var cpfMembro = document.getElementsByName('cpfMembro')[0];

if (cpfSocio) {
    nomeSocio.addEventListener('blur', ()=>{
        if (nomeSocio.value.length > 0) {
            nomeMembro.value = '';
            cpfMembro.value = '';
        }
    });
    
    cpfSocio.addEventListener('blur', ()=>{
        if (cpfSocio.value.length > 0) {
            nomeMembro.value = '';
            cpfMembro.value = '';
        }
    });

    nomeMembro.addEventListener('blur', ()=>{
        if (nomeMembro.value.length > 0) {
            nomeSocio.value = '';
            cpfSocio.value = '';
        }
    });

    cpfMembro.addEventListener('blur', ()=>{
        if (cpfMembro.value.length > 0) {
            nomeSocio.value = '';
            cpfSocio.value = '';
        }
    });
}