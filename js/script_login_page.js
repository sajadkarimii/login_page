const login = document.querySelector('.login');

login.addEventListener('click', function() {
    addclass.className = 'site login-show';
})

let eyeicon1 = document.getElementById("eyeicon1");
let password = document.getElementById("password_login");  

eyeicon1.onclick = function() {
    if(password.type == 'password') { 
        password.type = 'text';
        eyeicon1.src = "../image/eye-open.png";
    } else {
        password.type = 'password';
        eyeicon1.src = "../image/eye-close.png";
    }

}
