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

        <?php include 'articulos.php'; ?>

        
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