document.querySelector("#agregar-tarea").addEventListener("click",(function(e){const a=document.createElement("DIV");a.classList.add("modal"),a.innerHTML='\n\n            <form class="formulario nueva-tarea">\n                <legend>Agrega una Nueva Tarea</legend>\n\n                <div class="campo">\n                    <label for="tarea">Nombre de la Tarea</label>\n                    <input type="text" id="tarea" name="tarea" placeholder="Nombre de la Tarea">\n                </div>\n\n                <div class="opciones">\n                    <input type="submit" class="submit-nueva-tarea" value="Agregar Tarea" />\n                    <button type="button" class="cerrar-modal">Cancelar</button>\n                </div>\n            </form>\n    ',setTimeout(()=>{document.querySelector(".formulario").classList.add("animar")},0),a.addEventListener("click",e=>{e.preventDefault(),e.target.classList.contains("cerrar-modal")&&(document.querySelector(".formulario").classList.add("cerrar"),setTimeout(()=>{a.remove()},500)),e.target.classList.contains("submit-nueva-tarea")&&document.querySelector("#tarea").value.trim()}),document.querySelector("body").appendChild(a)}));