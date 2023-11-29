
document.getElementById("btnInicioSesion").addEventListener("click", iniciarSesion);
document.getElementById("btnRegistrarse").addEventListener("click", register);
document.getElementById("olvidasteContra").addEventListener("click", reset);
window.addEventListener("resize", anchoPage);

/* me traigo cada elemento del HTML  */

var formularioLogin = document.querySelector(".formLogin");
var formularioRegistro = document.querySelector(".formRegistro");
var formularioReset = document.querySelector(".restablecerContra");
var contenedorLoginRegistro = document.querySelector(".contenedorLoginRegistro");
var contenedorFondo = document.querySelector(".contenedorFondo");
var contenedorLogin = document.querySelector(".contenedorLogin");
var contenedorRegistro = document.querySelector(".contenedorRegistrarse");
var resetContra = document.getElementById("olvidasteContra");




/*FUNCIONES */
/*cuando el ancho de la pagina combia se acomodan los elementos junto con el media quuery */
function anchoPage() {
    if (window.innerWidth > 850) {
        contenedorRegistro.style.display = "block";
        contenedorLogin.style.display = "block";
    } else {
        contenedorRegistro.style.display = "block";
        contenedorRegistro.style.opacity = "1";
        contenedorLogin.style.display = "none";
        formularioLogin.style.display = "block";
        contenedorLoginRegistro.style.left = "0px";
        formularioRegistro.style.display = "none";
    }
}

anchoPage();





function iniciarSesion() {
    if (window.innerWidth > 850) {
        formularioReset.style.display="none";
        formularioLogin.style.display = "block";
        contenedorLoginRegistro.style.left = "250px";
        formularioRegistro.style.display = "none";
        contenedorRegistro.style.opacity = "1";
        contenedorLogin.style.opacity = "0";
    } else {
        formularioReset.style.display="none";
        formularioLogin.style.display = "block";
        contenedorLoginRegistro.style.left = "0px";
        formularioRegistro.style.display = "none";
        contenedorRegistro.style.display = "block";
        contenedorLogin.style.display = "none";
    }
}

function register() {
    if (window.innerWidth > 850) {
        formularioRegistro.style.display = "block";
        contenedorLoginRegistro.style.left = "650px";
        formularioLogin.style.display = "none";
        contenedorRegistro.style.opacity = "0";
        contenedorLogin.style.opacity = "1";
    } else {
        formularioRegistro.style.display = "block";
        contenedorLoginRegistro.style.left = "0px";
        formularioLogin.style.display = "none";
        contenedorRegistro.style.display = "none";
        contenedorLogin.style.display = "block";
        contenedorLogin.style.opacity = "1";
    }
}

function reset() {

    if(window.innerWidth > 850){
        formularioReset.style.display="block";
        contenedorLoginRegistro.style.left="51%";
        formularioLogin.style.display="none";
        contenedorRegistro.style.opacity="0";
        contenedorLogin.style.opacity="1";
    }else{

        formularioReset.style.display="block";
        contenedorLoginRegistro.style.left = "0px";
        formularioLogin.style.display = "none";
        contenedorRegistro.style.display = "none";
        contenedorLogin.style.display = "block";
        contenedorLogin.style.opacity = "1";

    }

   


}

