document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  darkMode();
});

function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");
  mobileMenu.addEventListener("click", navegacionResponsive);

  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );

  metodoContacto.forEach((input) => {
    input.addEventListener("click", mostrarMetodosContacto);
  });
}
function darkMode() {
  const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

  if (prefiereDarkMode.matches) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }

  prefiereDarkMode.addEventListener("change", function () {
    if (prefiereDarkMode.matches) {
      document.body.classList.add("dark");
    } else {
      document.body.classList.remove("dark");
    }
  });

  const botonDarkMode = document.querySelector(".dark-mode-boton");
  botonDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark");
  });
}

function navegacionResponsive() {
  const navegacion = document.querySelector(".navegacion");
  navegacion.classList.toggle("mostrar");
}

function mostrarMetodosContacto(e) {
  const contactoDiv = document.querySelector("#contacto");

  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = `
       <label for="telefono">Teléfono</label>
       <input type="tel" id="telefono" name="contacto[telefono]" placeholder="Tu Teléfono...">

       <p>Seleccione fecha y hora para la llamada:</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="contacto[fecha]">

                <label for="hora">Hora</label>
                <input type="time" id="hora" name="contacto[hora]" min="09:00" max="18:00">
       `;
  } else {
    contactoDiv.innerHTML = `
    <label for="email">Email</label>
                <input type="email" id="email" name="contacto[email]" placeholder="Tu Email..." required>
    `;
  }
}
