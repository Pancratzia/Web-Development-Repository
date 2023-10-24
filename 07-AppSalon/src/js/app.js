let paso = 1;
const pasoInicial = 1;
const pasoFinal = 3;

const cita = {
  nombre: "",
  fecha: "",
  hora: "",
  servicios: [],
};

document.addEventListener("DOMContentLoaded", () => {
  iniciarApp();
});

function iniciarApp() {
  mostrarSeccion();
  tabs();
  botonesPaginador();
  paginaSiguiente();
  paginaAnterior();

  consultarAPI();

  nombreCliente();
  seleccionarFecha();
  seleccionarHora();

  mostrarResumen();
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
  if (seccionAnterior) {
    seccionAnterior.classList.remove("mostrar");
  }

  const seccion = document.querySelector(`#paso-${paso}`);
  seccion.classList.add("mostrar");

  const tabAnterior = document.querySelector(".actual");
  if (tabAnterior) {
    tabAnterior.classList.remove("actual");
  }

  const tab = document.querySelector(`[data-paso="${paso}"]`);
  tab.classList.add("actual");
}

function botonesPaginador() {
  const paginaSiguiente = document.querySelector("#siguiente");
  const paginaAnterior = document.querySelector("#anterior");

  if (paso === 1) {
    paginaAnterior.classList.add("ocultar");
    paginaSiguiente.classList.remove("ocultar");
  } else if (paso === 3) {
    paginaSiguiente.classList.add("ocultar");
    paginaAnterior.classList.remove("ocultar");
    mostrarResumen();
  } else {
    paginaSiguiente.classList.remove("ocultar");
    paginaAnterior.classList.remove("ocultar");
  }
}

function paginaAnterior() {
  const paginaAnterior = document.querySelector("#anterior");
  paginaAnterior.addEventListener("click", () => {
    if (paso <= pasoInicial) return;

    paso--;
    mostrarSeccion();
    botonesPaginador();
  });
}

function paginaSiguiente() {
  const paginaSiguiente = document.querySelector("#siguiente");
  paginaSiguiente.addEventListener("click", () => {
    if (paso >= pasoFinal) return;

    paso++;
    mostrarSeccion();
    botonesPaginador();
  });
}

async function consultarAPI() {
  try {
    const url = "http://localhost:3000/api/servicios";
    const resultado = await fetch(url);
    const servicios = await resultado.json();
    mostrarServicios(servicios);
  } catch (error) {
    console.log(error);
  }
}

function mostrarServicios(servicios) {
  servicios.forEach((servicio) => {
    const { id, nombre, precio } = servicio;

    const nombreServicio = document.createElement("P");
    nombreServicio.classList.add("nombre-servicio");
    nombreServicio.textContent = nombre;

    const precioServicio = document.createElement("P");
    precioServicio.classList.add("precio-servicio");
    precioServicio.textContent = `${precio}$`;

    const servicioDiv = document.createElement("DIV");
    servicioDiv.classList.add("servicio");
    servicioDiv.dataset.idServicio = id;
    servicioDiv.onclick = function () {
      seleccionarServicio(servicio);
    };

    servicioDiv.appendChild(nombreServicio);
    servicioDiv.appendChild(precioServicio);

    document.querySelector("#servicios").appendChild(servicioDiv);
  });
}

function seleccionarServicio(servicio) {
  const { id } = servicio;
  const { servicios } = cita;

  const divServicio = document.querySelector(`[data-id-servicio="${id}"]`);

  if (servicios.some((agregado) => agregado.id === id)) {
    cita.servicios = servicios.filter((servicio) => servicio.id !== id);
    divServicio.classList.remove("seleccionado");
  } else {
    cita.servicios = [...servicios, servicio];
    divServicio.classList.add("seleccionado");
  }
}

function nombreCliente() {
  cita.nombre = document.querySelector("#nombre").value;
}

function seleccionarFecha() {
  const inputFecha = document.querySelector("#fecha");
  inputFecha.addEventListener("input", (e) => {
    const dia = new Date(e.target.value).getUTCDay();


    if ([6, 0].includes(dia)) {
      e.target.value = "";
      mostrarAlerta("No trabajamos los días sábados y domingos", "error");
    } else {
      cita.fecha = e.target.value;
    }
  });
}

function seleccionarHora() {
  const inputHora = document.querySelector("#hora");
  inputHora.addEventListener("input", (e) => {
    const horaCita = e.target.value;

    const h = horaCita.split(":");
    const hora = Number(h[0]);
    const minutos = Number(h[1]);

    if (hora < 10 || hora > 18 || (hora === 18 && minutos > 0)) {
      e.target.value = "";
      mostrarAlerta("Hora no válida. Trabajamos de 10:00 am a 6:00 pm", "error");
    } else{
      cita.hora = e.target.value;
    }
  });
}

function mostrarAlerta(mensaje, tipo, elemento = ".formulario", desaparece = true) {

  const alertaPrevia = document.querySelector(".alerta");
  if (alertaPrevia) return;
  
  const alerta = document.createElement("DIV");
  alerta.textContent = mensaje;
  alerta.classList.add("alerta");
  alerta.classList.add(tipo);

  const referencia = document.querySelector(`${elemento}`);
  referencia.appendChild(alerta);

  if (desaparece) {
    setTimeout(() => {
      alerta.remove();
    }, 3000);
  }
}

function mostrarResumen(){
  const resumen = document.querySelector(".contenido-resumen");

  resumen.innerHTML = "";

  if(Object.values(cita).includes("") || cita.servicios.length === 0){
    mostrarAlerta("Necesitas incluir datos de Servicios, Fecha y Hora", "error", ".contenido-resumen", false);
  }else{

  }
}
