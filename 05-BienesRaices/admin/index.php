<?php

    $resultado = $_GET['resultado'] ?? null;
    require "../includes/funciones.php";
    incluirTemplate("header");
?>


    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if ($resultado === "1") {
            echo "<p class='alerta exito'>Propiedad Creada Correctamente</p>";
        }
        ?>

        <a href="propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    </main>

<?php
    incluirTemplate("footer");
?>