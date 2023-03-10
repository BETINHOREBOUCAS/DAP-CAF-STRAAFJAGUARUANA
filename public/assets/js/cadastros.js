var delRegistration = document.querySelectorAll('.del-registration');
var button_not = document.getElementById('nao');
var button_yes = document.getElementById('sim');
var modalBlack = document.getElementsByClassName('modal-black-delete')[0];
var modalBody = document.getElementsByClassName('modal-content-delete')[0];
var urlAction;
var parentesco_membro = document.getElementById('parentesco_membro');

if (delRegistration.length > 0) {
    delRegistration.forEach((del) => {
        del.addEventListener('click', (e) => {
            e.preventDefault();
            urlAction = del.getAttribute('href');

            modalBlack.style.display = 'block';
            modalBody.style.display = 'block';

            document.querySelector('.modal-header-delete h2').innerHTML = "Excluir membro";
            document.querySelector('.modal-body-delete').innerHTML = "Tem certeza que deseja excluir esse registro?";
        })
    });
}

if (button_not) {
    button_not.addEventListener('click', () => {
        let modalBlack = document.getElementsByClassName('modal-black-delete')[0];
        let modalBody = document.getElementsByClassName('modal-content-delete')[0];
        modalBlack.style.display = 'none';
        modalBody.style.display = 'none';
    })
}

if (button_yes) {
    button_yes.addEventListener('click', async () => {
        let req = await fetch(urlAction, {
            method: 'post'
        });
        await req.text();

        window.location.href = window.location.href;
    });
}

if (parentesco_membro) {
    parentesco_membro.addEventListener('change', () => {
        let nomeSocio = document.getElementById('nome_socio');
        let paiSocio = document.getElementById('nome_pai');
        let maeSocio = document.getElementById('nome_mae');
        let sexoSocio = document.getElementById('sexo_socio');

        let campoMae = document.getElementById('mae_membro');
        let campoPai = document.getElementById('pai_membro');

        switch (parentesco_membro.value) {
            case 'Filho':
                switch (sexoSocio.value) {
                    case 'feminino':
                        campoMae.value = nomeSocio.value;
                        campoPai.value = "";

                        campoMae.setAttribute('readonly', true);
                        campoPai.removeAttribute('readonly');
                        break;
                    case 'masculino':
                        campoMae.value = '';
                        campoPai.value = nomeSocio.value;

                        campoMae.removeAttribute('readonly');
                        campoPai.setAttribute('readonly', true);
                        break;
                }
                break;
            case 'Enteado(a)':
                switch (sexoSocio.value) {
                    case 'feminino':
                        campoMae.value = nomeSocio.value;
                        campoPai.value = "";

                        campoMae.setAttribute('readonly', true);
                        campoPai.removeAttribute('readonly');
                        break;
                    case 'masculino':
                        campoMae.value = '';
                        campoPai.value = nomeSocio.value;

                        campoMae.removeAttribute('readonly');
                        campoPai.setAttribute('readonly', true);
                        break;
                }
                break;
            case 'Irmão(a)':
                campoMae.value = maeSocio.value;
                campoPai.value = paiSocio.value;

                campoMae.setAttribute('readonly', true);
                campoPai.setAttribute('readonly', true);
                break;
            default:
                campoMae.value = '';
                campoPai.value = '';

                campoMae.removeAttribute('readonly');
                campoPai.removeAttribute('readonly');
                break;
        }
    });
}