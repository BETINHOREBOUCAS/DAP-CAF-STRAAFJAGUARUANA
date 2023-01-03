var label = document.getElementsByClassName("label-anexo");

for (let index = 0; index < label.length; index++) {
    label[index].addEventListener('click', (e)=> {
        let att = e.target.getAttribute('access');
        let id_file = att.replace('check', 'file');

        document.getElementById(id_file).addEventListener('change', (r)=> {
            if (r.target.files.length != 0) {
                document.getElementById(att).style.display = "block";
            } else {
                document.getElementById(att).style.display = "none";
            }
        })       
        
    });
}

