const fechaEL = document.querySelectorAll(".fechaGenerada");

fechaEL.forEach(fecha => {
    fecha.innerHTML = `Septiembre ${unAnnoMas()}, Barquisimeto - Venezuela`;
})

const diaEL = document.querySelectorAll(".diaGenerado");
diaEL[0].innerHTML = diaSemana(1, 9, new Date().getFullYear()) + " 1";
diaEL[1].innerHTML = diaSemana(2, 9, new Date().getFullYear()) + " 2";




function unAnnoMas(){
    return new Date().getFullYear() + 1;
}

function diaSemana(dia, mes, anno) {
    var dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    var fecha = new Date(anno, mes - 1, dia);
    return dias[fecha.getDay()];
}