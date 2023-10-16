<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad->titulo; ?></h1>


    <img width="200" loading="lazy" src="./imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la Propiedad <?php echo $propiedad->titulo; ?>">


    <div class="resumen-propiedad">
        <p class="precio">$<?php echo $propiedad->precio; ?>$</p>

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

        <p><?php echo $propiedad->descripcion; ?></p>

        <div class="texto-vendedor">
            <p>Vendedor: <span><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></span> </p>
            <p>Teléfono: <span><?php echo $vendedor->telefono; ?></span> </p>
        </div>

    </div>
</main>