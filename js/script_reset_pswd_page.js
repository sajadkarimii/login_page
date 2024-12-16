const login = document.querySelector('.login');

login.addEventListener('click', function() {
    addclass.className = 'site login-show';
})

let eyeicon_reset_password = document.getElementById("eyeicon_reset_password");
let eyeicon_reset_password_confirm = document.getElementById("eyeicon_reset_password_confirm");

let reset_password = document.getElementById("reset_password");  
let reset_password_confirm = document.getElementById("reset_password_confirm");  

eyeicon_reset_password.onclick = function() {
    if(reset_password.type == 'password') { 
        reset_password.type = 'text';
        eyeicon_reset_password.src = "../image/eye-open.png";
    } else {
        reset_password.type = 'password';
        eyeicon_reset_password.src = "../image/eye-close.png";
    }

}

eyeicon_reset_password_confirm.onclick = function() {
    if(reset_password_confirm.type == 'password') { 
        reset_password_confirm.type = 'text';
        eyeicon_reset_password_confirm.src = "../image/eye-open.png";
    } else {
        reset_password_confirm.type = 'password';
        eyeicon_reset_password_confirm.src = "../image/eye-close.png";
    }

}