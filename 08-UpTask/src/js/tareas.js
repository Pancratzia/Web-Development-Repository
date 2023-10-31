(function () {
  const nuevaTareaBtn = document.querySelector("#agregar-tarea");
  nuevaTareaBtn.addEventListener("click", mostrarFormulario);

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
    }, 3000);

    document.querySelector("body").appendChild(modal);
  }
})();
