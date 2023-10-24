let paso=1;const pasoInicial=1,pasoFinal=3,cita={id:"",nombre:"",fecha:"",hora:"",servicios:[]};function iniciarApp(){mostrarSeccion(),tabs(),botonesPaginador(),paginaSiguiente(),paginaAnterior(),consultarAPI(),idCliente(),nombreCliente(),seleccionarFecha(),seleccionarHora(),mostrarResumen()}function tabs(){document.querySelectorAll(".tabs button").forEach(e=>{e.addEventListener("click",e=>{paso=parseInt(e.target.dataset.paso),mostrarSeccion(),botonesPaginador()})})}function mostrarSeccion(){const e=document.querySelector(".mostrar");e&&e.classList.remove("mostrar");document.querySelector("#paso-"+paso).classList.add("mostrar");const t=document.querySelector(".actual");t&&t.classList.remove("actual");document.querySelector(`[data-paso="${paso}"]`).classList.add("actual")}function botonesPaginador(){const e=document.querySelector("#siguiente"),t=document.querySelector("#anterior");1===paso?(t.classList.add("ocultar"),e.classList.remove("ocultar")):3===paso?(e.classList.add("ocultar"),t.classList.remove("ocultar"),mostrarResumen()):(e.classList.remove("ocultar"),t.classList.remove("ocultar"))}function paginaAnterior(){document.querySelector("#anterior").addEventListener("click",()=>{paso<=1||(paso--,mostrarSeccion(),botonesPaginador())})}function paginaSiguiente(){document.querySelector("#siguiente").addEventListener("click",()=>{paso>=3||(paso++,mostrarSeccion(),botonesPaginador())})}async function consultarAPI(){try{const e="http://localhost:3000/api/servicios",t=await fetch(e);mostrarServicios(await t.json())}catch(e){console.log(e)}}function mostrarServicios(e){e.forEach(e=>{const{id:t,nombre:a,precio:o}=e,n=document.createElement("P");n.classList.add("nombre-servicio"),n.textContent=a;const c=document.createElement("P");c.classList.add("precio-servicio"),c.textContent=o+"$";const r=document.createElement("DIV");r.classList.add("servicio"),r.dataset.idServicio=t,r.onclick=function(){seleccionarServicio(e)},r.appendChild(n),r.appendChild(c),document.querySelector("#servicios").appendChild(r)})}function seleccionarServicio(e){const{id:t}=e,{servicios:a}=cita,o=document.querySelector(`[data-id-servicio="${t}"]`);a.some(e=>e.id===t)?(cita.servicios=a.filter(e=>e.id!==t),o.classList.remove("seleccionado")):(cita.servicios=[...a,e],o.classList.add("seleccionado"))}function idCliente(){cita.id=document.querySelector("#id").value}function nombreCliente(){cita.nombre=document.querySelector("#nombre").value}function seleccionarFecha(){document.querySelector("#fecha").addEventListener("input",e=>{const t=new Date(e.target.value).getUTCDay();[6,0].includes(t)?(e.target.value="",mostrarAlerta("No trabajamos los días sábados y domingos","error")):cita.fecha=e.target.value})}function seleccionarHora(){document.querySelector("#hora").addEventListener("input",e=>{const t=e.target.value.split(":"),a=Number(t[0]),o=Number(t[1]);a<10||a>18||18===a&&o>0?(e.target.value="",mostrarAlerta("Hora no válida. Trabajamos de 10:00 am a 6:00 pm","error")):cita.hora=e.target.value})}function mostrarAlerta(e,t,a=".formulario",o=!0){const n=document.querySelector(".alerta");n&&n.remove();const c=document.createElement("DIV");c.textContent=e,c.classList.add("alerta"),c.classList.add(t);document.querySelector(""+a).appendChild(c),o&&setTimeout(()=>{c.remove()},3e3)}function mostrarResumen(){const e=document.querySelector(".contenido-resumen");for(;e.firstChild;)e.removeChild(e.firstChild);if(Object.values(cita).includes("")||0===cita.servicios.length)return void mostrarAlerta("Necesitas incluir datos de Servicios, Fecha y Hora","error",".contenido-resumen",!1);const{nombre:t,fecha:a,hora:o,servicios:n}=cita,c=document.createElement("H3");c.textContent="Resumen de Servicios:",e.appendChild(c),n.forEach(t=>{const{id:a,nombre:o,precio:n}=t,c=document.createElement("DIV");c.classList.add("contenedor-servicio"),c.dataset.idServicio=a;const r=document.createElement("P");r.textContent=o;const i=document.createElement("P");i.innerHTML=`<span>Precio:</span> ${n}$`,c.appendChild(r),c.appendChild(i),e.appendChild(c)});const r=document.createElement("H3");r.textContent="Resumen de la Cita:",e.appendChild(r);const i=document.createElement("P");i.innerHTML="<span>Nombre:</span> "+t;const s=new Date(a),d=s.getMonth(),l=s.getDate()+2,u=s.getFullYear(),m=new Date(Date.UTC(u,d,l)).toLocaleDateString("es-MX",{weekday:"long",year:"numeric",month:"long",day:"numeric"}),p=document.createElement("P");p.innerHTML="<span>Fecha:</span> "+m;const v=document.createElement("P");v.innerHTML=`<span>Hora:</span> ${o} hrs.`;const h=document.createElement("BUTTON");h.classList.add("boton"),h.textContent="Reservar Cita",h.onclick=reservarCita,e.appendChild(i),e.appendChild(p),e.appendChild(v),e.appendChild(h)}async function reservarCita(){const{fecha:e,hora:t,servicios:a,id:o}=cita,n=a.map(e=>e.id),c=new FormData;c.append("usuarioId",o),c.append("hora",t),c.append("fecha",e),c.append("servicios",n);try{const e="http://localhost:3000/api/citas",t=await fetch(e,{method:"POST",body:c});(await t.json()).resultado&&Swal.fire({icon:"success",title:"Cita Creada",text:"La cita se ha creado correctamente",button:"OK"}).then(()=>{window.location.reload()})}catch(e){Swal.fire({icon:"error",title:"Error",text:"Hubo un error al crear la cita",button:"OK"})}}document.addEventListener("DOMContentLoaded",()=>{iniciarApp()});