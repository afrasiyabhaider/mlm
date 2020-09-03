let showpass = document.getElementById('showpass');
let boxpass = document.getElementById('boxpass');
let ico = document.getElementsByClassName('')
showpass.addEventListener('click', showPassword);
function showPassword(){
    if(boxpass.type == "password"){
        boxpass.type = "text";
        showpass.classList.remove("fa-eye");
        showpass.classList.add("fa-eye-slash");
    }else{
        boxpass.type = "password";
        showpass.classList.remove("fa-eye-slash");
        showpass.classList.add("fa-eye");
    }
}