document.addEventListener("DOMContentLoaded", function() {
    fechas();
    eventListeners();
    darkMode();
})

function fechas(){
    const annosGeneradosEL = document.querySelectorAll(".annoGenerado");
    annosGeneradosEL.forEach(annoGenerado => {
        annoGenerado.innerHTML = new Date().getFullYear()
    });
}

function eventListeners(){
    const mobileMenu = document.querySelector(".mobile-menu");
    mobileMenu.addEventListener("click", navegacionResponsive);
}
function darkMode(){

    const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

    if(prefiereDarkMode.matches){
        document.body.classList.add("dark");
    }else{
        document.body.classList.remove("dark");
    }

    prefiereDarkMode.addEventListener("change", function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add("dark");
        }else{
            document.body.classList.remove("dark");
        }
    })

    const botonDarkMode = document.querySelector(".dark-mode-boton");
    botonDarkMode.addEventListener("click", function(){
        document.body.classList.toggle("dark");
    });
}

function navegacionResponsive(){
    const navegacion = document.querySelector(".navegacion");
    navegacion.classList.toggle("mostrar");
}
