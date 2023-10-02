document.addEventListener("DOMContentLoaded", function() {
    fechas();
})

function fechas(){
    const annosGeneradosEL = document.querySelectorAll(".annoGenerado");
    annosGeneradosEL.forEach(annoGenerado => {
        annoGenerado.innerHTML = new Date().getFullYear()
    })

   
}