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

function crearGaleria(){
    const galeria = document.querySelector(".galeria-imagenes");

    for(let i = 1; i<=12; i++){
        const imagen = document.createElement("picture");
        imagen.innerHTML = `
            <source srcset="build/img/thumb/${i}.avif" type="image/avif">
            <source srcset="build/img/thumb/${i}.webp" type="image/webp">
            <img loading="lazy" width="50" height="50" src="build/img/thumb/${i}.jpg" alt="imagen galeria">
        `;
        galeria.appendChild(imagen);
    }
}