import Swal from "sweetalert2";

(function () {
  let eventos = [];
  const resumen = document.querySelector("#registro-resumen");

  if (resumen) {
    const eventosBoton = document.querySelectorAll(".evento__agregar");

    eventosBoton.forEach((boton) => {
      boton.addEventListener("click", seleccionarEvento);
    });

    const formularioRegistro = document.querySelector("#registro");
    formularioRegistro.addEventListener("submit", submitFormulario);

    mostrarEventos();

    function seleccionarEvento({ target }) {
      if (eventos.length < 5) {
        target.disabled = true;

        eventos = [
          ...eventos,
          {
            id: target.dataset.id,
            titulo: target.parentElement
              .querySelector(".evento__nombre")
              .textContent.trim(),
          },
        ];

        mostrarEventos();
      } else {
        Swal.fire({
          title: "Error",
          text: "No puedes agregar más de 5 eventos",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    }

    function mostrarEventos() {
      limpiarEventos();

      if (eventos.length > 0) {
        eventos.forEach((evento) => {
          const eventoDOM = document.createElement("DIV");
          eventoDOM.classList.add("registro__evento");

          const titulo = document.createElement("H3");
          titulo.classList.add("registro__nombre");
          titulo.textContent = evento.titulo;

          const botonEliminar = document.createElement("BUTTON");
          botonEliminar.classList.add("registro__eliminar");
          botonEliminar.innerHTML = '<i class="fa-solid fa-trash"></i>';
          botonEliminar.onclick = () => {
            eliminarEvento(evento.id);
          };

          eventoDOM.appendChild(titulo);
          eventoDOM.appendChild(botonEliminar);
          resumen.appendChild(eventoDOM);
        });
      } else {
        const noRegistro = document.createElement("P");
        noRegistro.textContent =
          "No hay eventos registrados. Añade hasta 5 eventos del lado izquierdo";
        noRegistro.classList.add("registro__texto");
        resumen.appendChild(noRegistro);
      }
    }

    function eliminarEvento(id) {
      eventos = eventos.filter((event) => event.id !== id);
      const botonAgregar = document.querySelector(`[data-id="${id}"]`);
      botonAgregar.disabled = false;
      mostrarEventos();
    }

    function limpiarEventos() {
      while (resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
      }
    }

    async function submitFormulario(e) {
      e.preventDefault();

      const regaloId = document.querySelector("#regalo").value;

      const eventosId = eventos.map((evento) => evento.id);

      if (eventosId.length === 0 || regaloId === "") {
        Swal.fire({
          title: "Error",
          text: "Selecciona al menos un Evento y un Regalo",
          icon: "error",
          confirmButtonText: "Ok",
        });
        return;
      }

      const datos = new FormData();
      datos.append("regalo", regaloId);
      datos.append("eventos", eventosId);

      const url = "/finalizar-registro/conferencias";
      const respuesta = await fetch(url, {
        method: "POST",
        body: datos,
      });

      try {
        const resultado = await respuesta.json();

        if (resultado.resultado) {
          Swal.fire(
            {
              title: "Exito",
              text: "Tu selección ha sido almacenada correctamente... ¡Te esperamos en PankraCamp!",
              icon: "success",
              confirmButtonText: "Ok",
            }
          ).then(() => {
            location.href = `/boleto?id=${resultado.token}`;
          })
        }else{
          Swal.fire({
            title: "Error",
            text: "Hubo un error al registrar el evento",
            icon: "error",
            confirmButtonText: "Ok",
          }).then(() => {
            location.reload();
          })
        }
      } catch (error) {
        Swal.fire({
          title: "Error",
          text: "Hubo un error al registrar el evento",
          icon: "error",
          confirmButtonText: "Ok",
        }).then(() => {
          location.reload();
        })
      }
    }
  }
})();
