(function () {
  obtenerTareas();

  const nuevaTareaBtn = document.querySelector("#agregar-tarea");
  nuevaTareaBtn.addEventListener("click", mostrarFormulario);

  async function obtenerTareas() {
    try {
      const id = obtenerProyecto();
      const url = `http://localhost:3000/api/tareas?url=${id}`;
      const respuesta = await fetch(url);
      const resultado = await respuesta.json();
      const { tareas } = resultado;

      mostrarTareas(tareas);
    } catch (error) {
      console.log(error);
    }
  }

  function mostrarTareas(tareas) {
    const contenedorTareas = document.querySelector("#listado-tareas");

    if (tareas.length === 0) {
      const textoNodoTareas = document.createElement("LI");
      textoNodoTareas.classList.add("no-tareas");
      textoNodoTareas.textContent = "No hay tareas";

      contenedorTareas.appendChild(textoNodoTareas);
      return;
    }

    const estados = {
      0: "Pendiente",
      1: "Completa",
    }
    tareas.forEach((tarea) => {
      const contenedorTarea = document.createElement("LI");
      contenedorTarea.dataset.tareaId = tarea.id;
      contenedorTarea.classList.add("tarea");

      const nombreTarea = document.createElement("P");
      nombreTarea.textContent = tarea.nombre;
      
      const opcionesDiv = document.createElement("DIV");
      opcionesDiv.classList.add("opciones");

      const btnEstadoTarea = document.createElement("BUTTON");
      btnEstadoTarea.classList.add("estado-tarea");
      btnEstadoTarea.classList.add(`${estados[tarea.estado].toLowerCase()}`);
      btnEstadoTarea.textContent = estados[tarea.estado];
      btnEstadoTarea.dataset.estadoTarea = tarea.estado;

      const btnEliminarTarea = document.createElement("BUTTON");
      btnEliminarTarea.classList.add("eliminar-tarea");
      btnEliminarTarea.dataset.idTarea = tarea.id;
      btnEliminarTarea.textContent = "Eliminar";

      opcionesDiv.appendChild(btnEstadoTarea);
      opcionesDiv.appendChild(btnEliminarTarea);

      contenedorTarea.appendChild(nombreTarea);
      contenedorTarea.appendChild(opcionesDiv);

      contenedorTareas.appendChild(contenedorTarea);
    });
  }

  function mostrarFormulario(e) {
    const modal = document.createElement("DIV");
    modal.classList.add("modal");

    modal.innerHTML = `

            <form class="formulario nueva-tarea">
                <legend>Agrega una Nueva Tarea</legend>

                <div class="campo">
                    <label for="tarea">Nombre de la Tarea</label>
                    <input type="text" id="tarea" name="tarea" placeholder="Nombre de la Tarea">
                </div>

                <div class="opciones">
                    <input type="submit" class="submit-nueva-tarea" value="Agregar Tarea" />
                    <button type="button" class="cerrar-modal">Cancelar</button>
                </div>
            </form>
    `;

    setTimeout(() => {
      const formulario = document.querySelector(".formulario");
      formulario.classList.add("animar");
    }, 0);

    modal.addEventListener("click", (e) => {
      e.preventDefault();

      if (e.target.classList.contains("cerrar-modal")) {
        const formulario = document.querySelector(".formulario");
        formulario.classList.add("cerrar");

        setTimeout(() => {
          modal.remove();
        }, 500);
      }

      if (e.target.classList.contains("submit-nueva-tarea")) {
        submitFormularioNuevaTarea();
      }
    });

    document.querySelector(".dashboard").appendChild(modal);
  }

  function submitFormularioNuevaTarea() {
    const tarea = document.querySelector("#tarea").value.trim();

    if (tarea === "") {
      mostrarAlerta(
        "El nombre de la tarea es obligatorio",
        "error",
        document.querySelector(".formulario legend")
      );
      return;
    }

    agregarTarea(tarea);
  }

  function mostrarAlerta(mensaje, tipo, referencia) {
    const alertaPrevia = document.querySelector(".alerta");

    if (alertaPrevia) {
      alertaPrevia.remove();
    }

    const alerta = document.createElement("DIV");
    alerta.classList.add("alerta", tipo);
    alerta.textContent = mensaje;

    referencia.parentElement.insertBefore(
      alerta,
      referencia.nextElementSibling
    );

    setTimeout(() => {
      alerta.remove();
    }, 3000);
  }

  async function agregarTarea(tarea) {
    const datos = new FormData();
    datos.append("nombre", tarea);
    datos.append("proyectoid", obtenerProyecto());

    try {
      const url = "http://localhost:3000/api/tarea";
      const respuesta = await fetch(url, {
        method: "POST",
        body: datos,
      });

      const resultado = await respuesta.json();

      mostrarAlerta(
        resultado.mensaje,
        resultado.tipo,
        document.querySelector(".formulario legend")
      );

      if (resultado.tipo === "exito") {
        document.querySelector("#tarea").value = "";
      }
    } catch (error) {
      console.log(error);
    }
  }

  function obtenerProyecto() {
    const proyectoParams = new URLSearchParams(window.location.search);
    const proyecto = Object.fromEntries(proyectoParams.entries());
    return proyecto.url;
  }
})();
