const signup = document.querySelector('.signup');
const addclass = document.querySelector('.site');


signup.addEventListener('click', function()
 {
       addclass.className = 'site signup-show';
 })



let eyeicon2 = document.getElementById("eyeicon2");
let eyeicon3 = document.getElementById("eyeicon3"); 

let password2 = document.getElementById("password2");  
let password3 = document.getElementById("password3"); 



eyeicon2.onclick = function() {
    if(password2.type == 'password') { 
        password2.type = 'text';
        eyeicon2.src = "../image/eye-open.png";
    } else {
        password2.type = 'password';
        eyeicon2.src = "../image/eye-close.png";
    }

}

eyeicon3.onclick = function() {
    if(password3.type == 'password') { 
        password3.type = 'text';
        eyeicon3.src = "../image/eye-open.png";
    } else {
        password3.type = 'password';
        eyeicon3.src = "../image/eye-close.png";
    }

}
