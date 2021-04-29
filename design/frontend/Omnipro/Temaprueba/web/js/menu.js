hideFormRegistro();
hideMenu();

function hideMenu() {
    var list = document.getElementById("menu-list");
    var icono = document.getElementById("boton-menu");
    var iconoBack = document.getElementById("botonatras-menu");
    
    if(list.style.display === "none"){
        list.style.display = "block";
    } else {
        list.style.display = "none";
        icono.style.display = "flex";
        iconoBack.style.display = "none";
    }

    if(list.style.display === "block") {
        icono.style.display = "none";
        iconoBack.style.display = "block";
    } else {
        iconoBack.style.display = "none";
    }
}

function hideFormRegistro() {
    var formRegister = document.getElementById("form-texto-register");
    var formLogin = document.getElementById("form-texto-login");
    var botonRegister = document.getElementById("head-register");
    var botonLogin = document.getElementById("head-login");
    
    formRegister.style.display = "none";
    formLogin.style.display = "flex";
    botonLogin.style.opacity = "0.9";
    botonRegister.style.opacity = "0.35";
    console.log("if 1");
}

function hideFormIngreso() {
    var formRegister = document.getElementById("form-register");
    var formLogin = document.getElementById("form-login");
    var botonRegister = document.getElementById("head-register");
    var botonLogin = document.getElementById("head-login");

    formRegister.style.display = "flex";
    formLogin.style.display = "none";
    botonLogin.style.opacity = "0.35";
    botonRegister.style.opacity = "0.9";
    console.log("if 2");
}