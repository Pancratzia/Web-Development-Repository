let paso = 1;


document.addEventListener('DOMContentLoaded', () => {
    iniciarApp();
})

function iniciarApp(){


    tabs();
}


function tabs(){

    const botones = document.querySelectorAll('.tabs button');


    botones.forEach( boton => {
        boton.addEventListener('click', (e) => {
            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();
        });
    });
}

function mostrarSeccion(){
    
}