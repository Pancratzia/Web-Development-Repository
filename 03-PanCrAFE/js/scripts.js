const datos = {
    nombre: '',
    email: '',
    mensaje: ''
}

const formulario = document.querySelector('#formulario');
const nombre = document.querySelector('#nombre');
const email = document.querySelector('#email');
const mensaje = document.querySelector('#mensaje');

nombre.addEventListener('input', leerTexto);
email.addEventListener('input', leerTexto);
mensaje.addEventListener('input', leerTexto);

formulario.addEventListener('submit', function(event){
    event.preventDefault();

    const { nombre, email, mensaje } = datos;

    if(nombre === '' || email === '' || mensaje === '') {
        mostrarAlerta('Todos los campos son obligatorios', 'error');
        return;
    }

    mostrarAlerta('Mensaje enviado correctamente', 'exito');

    datos.nombre = '';
    datos.email = '';
    datos.mensaje = '';
    formulario.reset();

});

function leerTexto (e){
    datos[e.target.name] = e.target.value;
}

const mostrarAlerta = (mensaje, tipo) => {
    const alerta = document.createElement('p');
    alerta.textContent = mensaje;
    alerta.classList.add(tipo);
    formulario.appendChild(alerta);

    setTimeout(() => {
        alerta.remove();
    }, 3000);
}

