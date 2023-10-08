<?php

    require "includes/funciones.php";
    incluirTemplate("header");
?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente Al Bosque</h1>

        <picture>
            <source srcset="build/img/destacada.avif" type="image/avif">
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img width="200" height="300" loading="lazy" ,src="build/img/destacada.jpg" alt="Cada frente al bosque">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">150000$</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono"  width="20" height="20" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                    <p>3</p>
                </li>

                <li>
                    <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_estacionamiento.svg"
                        alt="Icono estacionamiento">
                    <p>2</p>
                </li>

                <li>
                    <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_dormitorio.svg"
                        alt="Icono Habitaciones">
                    <p>4</p>
                </li>
            </ul>

            <p>Maxime at dignissimos error nihil sunt, natus, illo, atque dolor sit ipsa accusamus. Porro perspiciatis esse repellendus, necessitatibus cum inventore eveniet vel consequatur accusantium dolores reprehenderit aliquid hic corporis corrupti sequi placeat doloribus consequuntur totam tempora! Repellat!</p>
            <p>Eligendi ex exercitationem inventore laboriosam reiciendis deleniti reprehenderit sit voluptatum impedit quibusdam repellat laborum ducimus quia, natus quos consequatur amet voluptas ullam.</p>
        </div>
    </main>

<?php
    incluirTemplate("footer");
?>