let paso=1;const pasoInicial=1,pasoFinal=3,cita={nombre:"",fecha:"",hora:"",servicios:[]};function iniciarApp(){mostrarSeccion(),tabs(),botonesPaginador(),paginaSiguiente(),paginaAnterior(),consultarAPI(),nombreCliente()}function tabs(){document.querySelectorAll(".tabs button").forEach(e=>{e.addEventListener("click",e=>{paso=parseInt(e.target.dataset.paso),mostrarSeccion(),botonesPaginador()})})}function mostrarSeccion(){const e=document.querySelector(".mostrar");e&&e.classList.remove("mostrar");document.querySelector("#paso-"+paso).classList.add("mostrar");const o=document.querySelector(".actual");o&&o.classList.remove("actual");document.querySelector(`[data-paso="${paso}"]`).classList.add("actual")}function botonesPaginador(){const e=document.querySelector("#siguiente"),o=document.querySelector("#anterior");1===paso?(o.classList.add("ocultar"),e.classList.remove("ocultar")):3===paso?(e.classList.add("ocultar"),o.classList.remove("ocultar")):(e.classList.remove("ocultar"),o.classList.remove("ocultar"))}function paginaAnterior(){document.querySelector("#anterior").addEventListener("click",()=>{paso<=1||(paso--,mostrarSeccion(),botonesPaginador())})}function paginaSiguiente(){document.querySelector("#siguiente").addEventListener("click",()=>{paso>=3||(paso++,mostrarSeccion(),botonesPaginador())})}async function consultarAPI(){try{const e="http://localhost:3000/api/servicios",o=await fetch(e);mostrarServicios(await o.json())}catch(e){console.log(e)}}function mostrarServicios(e){e.forEach(e=>{const{id:o,nombre:t,precio:c}=e,a=document.createElement("P");a.classList.add("nombre-servicio"),a.textContent=t;const i=document.createElement("P");i.classList.add("precio-servicio"),i.textContent=c+"$";const s=document.createElement("DIV");s.classList.add("servicio"),s.dataset.idServicio=o,s.onclick=function(){seleccionarServicio(e)},s.appendChild(a),s.appendChild(i),document.querySelector("#servicios").appendChild(s)})}function seleccionarServicio(e){const{id:o}=e,{servicios:t}=cita,c=document.querySelector(`[data-id-servicio="${o}"]`);t.some(e=>e.id===o)?(cita.servicios=t.filter(e=>e.id!==o),c.classList.remove("seleccionado")):(cita.servicios=[...t,e],c.classList.add("seleccionado"))}function nombreCliente(){cita.nombre=document.querySelector("#nombre").value}document.addEventListener("DOMContentLoaded",()=>{iniciarApp()});