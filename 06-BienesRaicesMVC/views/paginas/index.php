<main class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>

    <?php include 'iconos.php'; ?>
</main>

<section class="seccion contenedor">
    <h2>Casas y Departamentos en Venta</h2>

    <?php
        include "listado.php";
    ?>

    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde">
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