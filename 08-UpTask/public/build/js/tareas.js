!function(){!async function(){try{const a="http://localhost:3000/api/tareas?url="+o(),n=await fetch(a),r=await n.json();e=r.tareas,t()}catch(e){console.log(e)}}();let e=[];function t(){!function(){const e=document.querySelector("#listado-tareas");for(;e.firstChild;)e.removeChild(e.firstChild)}();const n=document.querySelector("#listado-tareas");if(0===e.length){const e=document.createElement("LI");return e.classList.add("no-tareas"),e.textContent="No hay tareas",void n.appendChild(e)}const r={0:"Pendiente",1:"Completa"};e.forEach(c=>{const s=document.createElement("LI");s.dataset.tareaId=c.id,s.classList.add("tarea");const d=document.createElement("P");d.textContent=c.nombre;const i=document.createElement("DIV");i.classList.add("opciones");const l=document.createElement("BUTTON");l.classList.add("estado-tarea"),l.classList.add(""+r[c.estado].toLowerCase()),l.textContent=r[c.estado],l.dataset.estadoTarea=c.estado,l.ondblclick=()=>{!function(n){const r="1"===n.estado?"0":"1";n.estado=r,async function(n){const{estado:r,id:c,nombre:s,proyectoid:d}=n,i=new FormData;i.append("id",c),i.append("nombre",s),i.append("estado",r),i.append("proyectoid",o());try{const o="http://localhost:3000/api/tarea/actualizar",n=await fetch(o,{method:"POST",body:i}),s=await n.json();"exito"===s.respuesta.tipo&&(a(s.respuesta.mensaje,s.respuesta.tipo,document.querySelector(".contenedor-nueva-tarea")),e=e.map(e=>(e.id===c&&(e.estado=r),e)),t())}catch(e){console.log(e)}}(n)}({...c})};const u=document.createElement("BUTTON");u.classList.add("eliminar-tarea"),u.dataset.idTarea=c.id,u.textContent="Eliminar",i.appendChild(l),i.appendChild(u),s.appendChild(d),s.appendChild(i),n.appendChild(s)})}function a(e,t,a){const o=document.querySelector(".alerta");o&&o.remove();const n=document.createElement("DIV");n.classList.add("alerta",t),n.textContent=e,a.parentElement.insertBefore(n,a.nextElementSibling),setTimeout(()=>{n.remove()},3e3)}function o(){const e=new URLSearchParams(window.location.search);return Object.fromEntries(e.entries()).url}document.querySelector("#agregar-tarea").addEventListener("click",(function(n){const r=document.createElement("DIV");r.classList.add("modal"),r.innerHTML='\n\n            <form class="formulario nueva-tarea">\n                <legend>Agrega una Nueva Tarea</legend>\n\n                <div class="campo">\n                    <label for="tarea">Nombre de la Tarea</label>\n                    <input type="text" id="tarea" name="tarea" placeholder="Nombre de la Tarea">\n                </div>\n\n                <div class="opciones">\n                    <input type="submit" class="submit-nueva-tarea" value="Agregar Tarea" />\n                    <button type="button" class="cerrar-modal">Cancelar</button>\n                </div>\n            </form>\n    ',setTimeout(()=>{document.querySelector(".formulario").classList.add("animar")},0),r.addEventListener("click",n=>{if(n.preventDefault(),n.target.classList.contains("cerrar-modal")){document.querySelector(".formulario").classList.add("cerrar"),setTimeout(()=>{r.remove()},500)}n.target.classList.contains("submit-nueva-tarea")&&function(){const n=document.querySelector("#tarea").value.trim();if(""===n)return void a("El nombre de la tarea es obligatorio","error",document.querySelector(".formulario legend"));!async function(n){const r=new FormData;r.append("nombre",n),r.append("proyectoid",o());try{const o="http://localhost:3000/api/tarea",c=await fetch(o,{method:"POST",body:r}),s=await c.json();if(a(s.mensaje,s.tipo,document.querySelector(".formulario legend")),"exito"===s.tipo){document.querySelector("#tarea").value="";const a={id:String(s.id),nombre:n,estado:0,proyectoid:s.proyectoid};e=[...e,a],t()}}catch(e){console.log(e)}}(n)}()}),document.querySelector(".dashboard").appendChild(r)}))}();