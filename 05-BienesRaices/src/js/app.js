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
    const botonDarkMode = document.querySelector(".dark-mode-boton");
    botonDarkMode.addEventListener("click", function(){
        document.body.classList.toggle("dark");
    });
}

function navegacionResponsive(){
    const navegacion = document.querySelector(".navegacion");
    navegacion.classList.toggle("mostrar");
}
