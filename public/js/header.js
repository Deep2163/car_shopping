let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onClick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

document.querySelector('#login-btn').onClick = () =>{
    document.querySelector('.login-form-container').classList.toggle('active');
}

window.onscroll = () =>{

    if(window.scrollY > 0){
        document.querySelector('.header').classList.add('active');
    }else{
        document.querySelector('.header').classList.remove('active');
    }

    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

window.onload = () =>{

    if(window.scrollY > 0){
        document.querySelector('.header').classList.add('active');
    }else{
        document.querySelector('.header').classList.remove('active');
    }
}