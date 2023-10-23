let paso = 1;
const pasoInicial = 1;
const pasoFinal = 3;

document.addEventListener("DOMContentLoaded", () => {
  iniciarApp();
});

function iniciarApp() {
  mostrarSeccion();
  tabs();
  botonesPaginador();
  paginaSiguiente();
  paginaAnterior();
}

function tabs() {
  const botones = document.querySelectorAll(".tabs button");

  botones.forEach((boton) => {
    boton.addEventListener("click", (e) => {
      paso = parseInt(e.target.dataset.paso);
      mostrarSeccion();
      botonesPaginador();
    });
  });
}

function mostrarSeccion() {
  const seccionAnterior = document.querySelector(`.mostrar`);
  if(seccionAnterior) {
    seccionAnterior.classList.remove("mostrar");
  }

  const seccion = document.querySelector(`#paso-${paso}`);
  seccion.classList.add("mostrar");

  const tabAnterior = document.querySelector(".actual");
  if(tabAnterior) {
    tabAnterior.classList.remove("actual");
  }

  const tab = document.querySelector(`[data-paso="${paso}"]`);
  tab.classList.add("actual");
}

function botonesPaginador() {
  const paginaSiguiente = document.querySelector("#siguiente");
  const paginaAnterior = document.querySelector("#anterior");

  if(paso === 1) {
    paginaAnterior.classList.add("ocultar");
    paginaSiguiente.classList.remove("ocultar");
  } else if(paso === 3) {
    paginaSiguiente.classList.add("ocultar");
    paginaAnterior.classList.remove("ocultar");
  } else {
    paginaSiguiente.classList.remove("ocultar");
    paginaAnterior.classList.remove("ocultar");
  }

}


function paginaAnterior(){
    const paginaAnterior = document.querySelector("#anterior");
    paginaAnterior.addEventListener("click", () => {
        if(paso <= pasoInicial) return;

        paso--;
        mostrarSeccion();
        botonesPaginador();


    });
}

function paginaSiguiente(){
    const paginaSiguiente = document.querySelector("#siguiente");
    paginaSiguiente.addEventListener("click", () => {
        if(paso >= pasoFinal) return;

        paso++;
        mostrarSeccion();
        botonesPaginador();
    });
}