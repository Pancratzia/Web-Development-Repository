<?php
    $inicio = false;
    include "includes/templates/header.php";
?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.avif" type="image/avif">
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img width="50" height="50" loading="lazy",src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Economica Terraza Casera</h4>
                    <p>Escrito el: <span>27/08/2022</span> por: <span>Pancratzia</span></p>

                    <p>Consejos para construir una terraza increíble con bajo presupuesto y en poco tiempo</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.avif" type="image/avif">
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img width="50" height="50" loading="lazy",src="build/img/blog3.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para Decorar tu Hogar</h4>
                    <p>Escrito el: <span>30/09/2022</span> por: <span>Pancratzia</span></p>

                    <p>Decora tu hogar de una forma interesante y sencilla con estos prácticos trucos</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.avif" type="image/avif">
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img width="50" height="50" loading="lazy",src="build/img/blog4.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Decora un Dormitorio Sin Espacio</h4>
                    <p>Escrito el: <span>27/08/2022</span> por: <span>Pancratzia</span></p>

                    <p>Consejos para decorar tu dormitorio de espacio reducido</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.avif" type="image/avif">
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img width="50" height="50" loading="lazy",src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para Limpiar tu Piscina</h4>
                    <p>Escrito el: <span>30/09/2022</span> por: <span>Pancratzia</span></p>

                    <p>Limpia tu piscina de manera eficaz y con rapidez</p>
                </a>
            </div>
        </article>
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