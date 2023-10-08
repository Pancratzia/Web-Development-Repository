<?php
    $inicio = false;
    include "includes/templates/header.php";
?>


    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture class="picture-contacto">
            <source srcset="build/img/destacada3.avif" type="image/avif">
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img width="50" loading="lazy",src="build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture>

        <h2>Llene el Formulario de Contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre...">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Tu Email...">

                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Tu Teléfono...">
            
                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Tu Mensaje..."></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Sobre la Propiedad</legend>

                <label for="opciones">Vender o Comprar</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Venta">Venta</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" name="presupuesto" id="presupuesto" placeholder="Presupuesto..." />
            </fieldset>

            <fieldset>
                <legend>Información Sobre la Propiedad</legend>

                <p>Desea que nos contactemos con usted por medio de:</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" id="contactar-telefono" checked />
               
                    <label for="contactar-email">Email</label>
                    <input type="radio" name="contacto" id="contactar-email" />
                </div>

                <p>Si ha seleccionado teléfono, seleccione fecha y hora:</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" name="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php
include "includes/templates/footer.php";
?>