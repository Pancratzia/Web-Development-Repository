<div class="contenedor-anuncios">

<?php
    foreach($propiedades as $propiedad) {
?>
        <div class="anuncio">
                <img width="200" height="300" loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen Anuncio <?php echo $propiedad->titulo; ?>">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>

                <p class="precio"><?php echo $propiedad->precio; ?>$</p>

                <ul class="iconos-caracteristicas">

                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>

                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>

                    <li>
                        <img class="icono" width="20" height="20" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>

                </ul>

                <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div><!-- contenido-anuncio -->
        </div><!-- anuncio -->

        <?php } ?>
    </div><!-- contenedor-anuncios -->