var password1 = document.getElementById('password');
var password2 = document.getElementById('password2');
var erro =  document.querySelector('.verifyPassaword');
password2.addEventListener('blur', () => {
    if (password1.value != password2.value) {
        erro.style.display = "block";
    } else {
        erro.style.display = "none";
    }   
});