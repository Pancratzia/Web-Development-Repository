!function(){!async function(){try{const e="http://localhost:3000/api/tareas?url="+t(),a=await fetch(e),r=await a.json(),{tareas:n}=r}catch(e){console.log(e)}}();function e(e,t,a){const r=document.querySelector(".alerta");r&&r.remove();const n=document.createElement("DIV");n.classList.add("alerta",t),n.textContent=e,a.parentElement.insertBefore(n,a.nextElementSibling),setTimeout(()=>{n.remove()},3e3)}function t(){const e=new URLSearchParams(window.location.search);return Object.fromEntries(e.entries()).url}document.querySelector("#agregar-tarea").addEventListener("click",(function(a){const r=document.createElement("DIV");r.classList.add("modal"),r.innerHTML='\n\n            <form class="formulario nueva-tarea">\n                <legend>Agrega una Nueva Tarea</legend>\n\n                <div class="campo">\n                    <label for="tarea">Nombre de la Tarea</label>\n                    <input type="text" id="tarea" name="tarea" placeholder="Nombre de la Tarea">\n                </div>\n\n                <div class="opciones">\n                    <input type="submit" class="submit-nueva-tarea" value="Agregar Tarea" />\n                    <button type="button" class="cerrar-modal">Cancelar</button>\n                </div>\n            </form>\n    ',setTimeout(()=>{document.querySelector(".formulario").classList.add("animar")},0),r.addEventListener("click",a=>{if(a.preventDefault(),a.target.classList.contains("cerrar-modal")){document.querySelector(".formulario").classList.add("cerrar"),setTimeout(()=>{r.remove()},500)}a.target.classList.contains("submit-nueva-tarea")&&function(){const a=document.querySelector("#tarea").value.trim();if(""===a)return void e("El nombre de la tarea es obligatorio","error",document.querySelector(".formulario legend"));!async function(a){const r=new FormData;r.append("nombre",a),r.append("proyectoid",t());try{const t="http://localhost:3000/api/tarea",a=await fetch(t,{method:"POST",body:r}),n=await a.json();e(n.mensaje,n.tipo,document.querySelector(".formulario legend")),"exito"===n.tipo&&(document.querySelector("#tarea").value="")}catch(e){console.log(e)}}(a)}()}),document.querySelector(".dashboard").appendChild(r)}))}();