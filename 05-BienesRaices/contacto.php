<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>

    <link rel="preload" href="build/css/app.css" as="style">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>

    <header class="header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img width="50" height="50" src="build/img/logo.svg" alt="Logo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="icono menu responsive">
                </div>

                  <div class="derecha">
                    <img class="dark-mode-boton" src="build/img/dark-mode.svg" alt="Dark mode icon">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    </nav>
                </div>
            </div><!-- barra -->

        </div>
    </header>


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

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los Derechos Reservados. <span class="annoGenerado" id="annoGenerado"></span> &copy;</p>
    </footer>
    
    <script src="build/js/bundle.min.js"></script>
</body>
</html>