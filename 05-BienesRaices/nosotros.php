<?php
    $inicio = false;
    include "includes/templates/header.php";
?>


    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.avif" type="image/avif">
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">

                    <img src="build/img/nosotros.jpg" loading="lazy" alt="Imagen Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>25 años de experiencia</blockquote>

                <p>Quam ab saepe voluptas temporibus perspiciatis maiores ipsam architecto, sed nesciunt reprehenderit deserunt accusamus, eveniet fugit blanditiis. Consequatur eius sit natus totam facere vel, reprehenderit assumenda incidunt maiores doloribus quas pariatur a?</p>
                <p>Ad praesentium, eos vitae excepturi quasi velit commodi saepe, libero numquam reprehenderit hic vel dolores quisquam quidem dolore perferendis molestiae quae necessitatibus!</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img height="20" width="20" src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Ipsum error beatae aut delectus nesciunt sed vero commodi voluptatem ex voluptatum? Perspiciatis, esse voluptatibus nostrum molestiae expedita maiores excepturi totam nulla itaque.</p>
            </div>

            <div class="icono">
                <img height="20" width="20" src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Culpa laboriosam nemo fugit, sit commodi quaerat nobis delectus, earum reprehenderit, aperiam corporis doloribus. Dolorum voluptatem consectetur libero repellat velit mollitia porro?</p>
            </div>

            <div class="icono">
                <img height="20" width="20" src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Dolor tempora delectus placeat iusto saepe ratione dolorum debitis libero illum facere voluptatum ipsa exercitationem amet impedit nesciunt ullam voluptas, maiores corrupti dicta.</p>
            </div>
        </div>
    </section>

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