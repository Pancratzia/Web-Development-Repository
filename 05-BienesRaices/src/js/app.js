document.addEventListener("DOMContentLoaded", function() {
    fechas();
    eventListeners();
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

function navegacionResponsive(){
    const navegacion = document.querySelector(".navegacion");
    navegacion.classList.toggle("mostrar");
}