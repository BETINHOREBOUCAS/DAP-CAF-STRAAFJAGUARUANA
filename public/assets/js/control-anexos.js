var label = document.getElementsByClassName("label-anexo");
var button = document.getElementById('button-caf');
var button_not = document.getElementById('nao');
var button_yes = document.getElementById('sim');

for (let index = 0; index < label.length; index++) {
    label[index].addEventListener('click', (e) => {
        let att = e.target.getAttribute('access');
        let id_file = att.replace('check', 'file');

        document.getElementById(id_file).addEventListener('change', (r) => {
            if (r.target.files.length != 0) {
                document.getElementById(att).style.display = "block";
            } else {
                document.getElementById(att).style.display = "none";
            }
        })

    });
}

if (button) {
    button.addEventListener('click', () => {
        let modalBlack = document.getElementsByClassName('modal-black-delete')[0];
        let modalBody = document.getElementsByClassName('modal-content-delete')[0];

        modalBlack.style.display = 'block';
        modalBody.style.display = 'block';
    });
}

if (button_not) {
    button_not.addEventListener('click', () => {
        let modalBlack = document.getElementsByClassName('modal-black-delete')[0];
        let modalBody = document.getElementsByClassName('modal-content-delete')[0];
        modalBlack.style.display = 'none';
        modalBody.style.display = 'none';
    });
}

if (button_yes) {
    button_yes.addEventListener('click', async ()=> {
        let req = await fetch(window.location.href, {
            method: 'post'
        });

        req.text();
        window.location.href = window.location.href;
    });
}