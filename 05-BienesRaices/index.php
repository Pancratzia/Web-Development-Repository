<?php

    require "includes/funciones.php";
    incluirTemplate("header", $inicio = true);
?>

<main class="contenedor seccion">
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
</main>

<section class="seccion contenedor">
    <h2>Casas y Departamentos en Venta</h2>

    <div class="contenedor-anuncios">
        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio1.avif" type="image/avif">
                <source srcset="build/img/anuncio1.webp" type="image/webp">
                <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                <img width="200" height="300" loading="lazy" ,src="build/img/anuncio1.jpg" alt="Primer Anuncio">
            </picture>

            <div class="contenido-anuncio">
                <h3>Casa de Lujo en el Lago</h3>
                <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>

                <p class="precio">150.000$</p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p>3</p>
                    </li>

                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                        <p>2</p>
                    </li>

                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones">
                        <p>4</p>
                    </li>
                </ul>

                <a href="anuncio.php" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div><!-- contenido-anuncio -->
        </div><!-- anuncio -->

        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio2.avif" type="image/avif">
                <source srcset="build/img/anuncio2.webp" type="image/webp">
                <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                <img width="200" height="300" loading="lazy" ,src="build/img/anuncio2.jpg" alt="Segundo Anuncio">
            </picture>

            <div class="contenido-anuncio">
                <h3>Casa Moderna</h3>
                <p>Excelente Casa Moderna con Excelentes Acabados</p>

                <p class="precio">200.000$</p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p>4</p>
                    </li>

                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                        <p>3</p>
                    </li>

                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones">
                        <p>5</p>
                    </li>
                </ul>

                <a href="anuncio.php" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div><!-- contenido-anuncio -->
        </div><!-- anuncio -->

        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio3.avif" type="image/avif">
                <source srcset="build/img/anuncio3.webp" type="image/webp">
                <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
                <img width="200" height="300" loading="lazy" ,src="build/img/anuncio3.jpg" alt="Tercer Anuncio">
            </picture>

            <div class="contenido-anuncio">
                <h3>Casa con Piscina</h3>
                <p>Amplia Casa con Piscina Ideal para Relajarse</p>

                <p class="precio">175.000$</p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p>3</p>
                    </li>

                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                        <p>1</p>
                    </li>

                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones">
                        <p>3</p>
                    </li>
                </ul>

                <a href="anuncio.php" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div><!-- contenido-anuncio -->
        </div><!-- anuncio -->
    </div><!-- contenedor-anuncios -->

    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">
            Ver Todos los Anuncios
        </a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la Casa de tus Sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>

    <a href="contacto.php" class="boton-amarillo">Contactános</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.avif" type="image/avif">
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img width="50" height="50" loading="lazy" ,src="build/img/blog1.jpg" alt="Texto Entrada Blog">
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
                    <img width="50" height="50" loading="lazy" ,src="build/img/blog3.jpg" alt="Texto Entrada Blog">
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
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                Gracias a la empresa de Pancratzia logré hacer realidad el sueño de tener una casa propia.
            </blockquote>
            <p>- Pancratzio</p>
        </div>
    </section>
</div>

<?php
    incluirTemplate("footer");
?>