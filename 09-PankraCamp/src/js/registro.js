(function(){
    let eventos = [];
    const resumen = document.querySelector("#registro-resumen");
    const eventosBoton = document.querySelectorAll(".evento__agregar");

    eventosBoton.forEach((boton) => {
        boton.addEventListener("click", seleccionarEvento);
    });

    function seleccionarEvento({ target }){

        target.disabled = true;

        eventos = [...eventos, {
            id: target.dataset.id,
            titulo: target.parentElement.querySelector(".evento__nombre").textContent.trim(),
        }];

        mostrarEventos();
    }

    function mostrarEventos(){

        limpiarEventos();

        if(eventos.length > 0){
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
               }

               eventoDOM.appendChild(titulo);
               eventoDOM.appendChild(botonEliminar);
               resumen.appendChild(eventoDOM);
            });
        }
    }

    function eliminarEvento(id){
        alert("Eliminando evento... " + id);
    }

    function limpiarEventos(){
        while(resumen.firstChild){
            resumen.removeChild(resumen.firstChild);
        }
    }
})();