<main class="contenedor seccion">
        <h1>Contacto</h1>

        <?php
            if($mensaje) {
                echo '<p class="alerta exito">' . $mensaje . '</p>';
            }
        ?>

        <picture class="picture-contacto">
            <source srcset="build/img/destacada3.avif" type="image/avif">
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img width="50" loading="lazy",src="build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture>

        <h2>Llene el Formulario de Contacto</h2>

        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="contacto[nombre]" placeholder="Tu Nombre..." required>
            
                <label for="mensaje">Mensaje</label>
                <textarea name="contacto[mensaje]" id="mensaje" cols="30" rows="10" placeholder="Tu Mensaje..." required></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Sobre la Propiedad</legend>

                <label for="tipo">Vender o Comprar</label>
                <select name="contacto[tipo]" id="tipo" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Venta">Venta</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" name="contacto[presupuesto]" id="presupuesto" placeholder="Presupuesto..." required />
            </fieldset>

            <fieldset>
                <legend>Información Sobre la Propiedad</legend>

                <p>Desea que nos contactemos con usted por medio de:</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto[contacto]" value="telefono" id="contactar-telefono" />
               
                    <label for="contactar-email">Email</label>
                    <input type="radio" name="contacto[contacto]" value="email" id="contactar-email" />
                </div>

                <hr>

                <div id="contacto">

                </div>

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>