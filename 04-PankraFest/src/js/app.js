document.addEventListener("DOMContentLoaded", function () {
  iniciarFechas();
  iniciarApp();
});

function iniciarApp() {
  crearGaleria();
}

function iniciarFechas() {
  const fechaEL = document.querySelectorAll(".fechaGenerada");

  fechaEL.forEach((fecha) => {
    fecha.innerHTML = `Septiembre ${unAnnoMas()}, Barquisimeto - Venezuela`;
  });

  const diaEL = document.querySelectorAll(".diaGenerado");
  diaEL[0].innerHTML = diaSemana(1, 9, new Date().getFullYear()) + " 1";
  diaEL[1].innerHTML = diaSemana(2, 9, new Date().getFullYear()) + " 2";

  function unAnnoMas() {
    return new Date().getFullYear() + 1;
  }

  function diaSemana(dia, mes, anno) {
    var dias = [
      "Domingo",
      "Lunes",
      "Martes",
      "Miércoles",
      "Jueves",
      "Viernes",
      "Sábado",
    ];
    var fecha = new Date(anno, mes - 1, dia);
    return dias[fecha.getDay()];
  }
}

function crearGaleria() {
  const galeria = document.querySelector(".galeria-imagenes");

  for (let i = 1; i <= 12; i++) {
    const imagen = document.createElement("picture");
    imagen.innerHTML = `
            <source srcset="build/img/thumb/${i}.avif" type="image/avif">
            <source srcset="build/img/thumb/${i}.webp" type="image/webp">
            <img loading="lazy" width="25" height="25" src="build/img/thumb/${i}.jpg" alt="imagen galeria">
        `;

    imagen.onclick = () => {
      mostrarImagen(i);
    };
    galeria.appendChild(imagen);
  }
}

function mostrarImagen(id) {
  const imagen = document.createElement("picture");
  imagen.innerHTML = `
            <source srcset="build/img/grande/${id}.avif" type="image/avif">
            <source srcset="build/img/grande/${id}.webp" type="image/webp">
            <img loading="lazy" width="25" height="25" src="build/img/grande/${id}.jpg" alt="imagen galeria">
        `;

  //Se crea el Overlay

  const overlay = document.createElement("div");
  overlay.appendChild(imagen);
  overlay.classList.add("overlay");

  overlay.onclick = () => {
    const body = document.querySelector("body");
    body.classList.remove("fijar-body");
    overlay.remove();
  };

  //Cerrar el modal

  const cerrarModal = document.createElement("p");
  cerrarModal.textContent = "X";
  cerrarModal.classList.add("btn-cerrar");

  cerrarModal.onclick = () => {
    const body = document.querySelector("body");
    body.classList.remove("fijar-body");
    overlay.remove();
  };

  overlay.appendChild(cerrarModal);

  const body = document.querySelector("body");
  body.appendChild(overlay);
  body.classList.add("fijar-body");
}

