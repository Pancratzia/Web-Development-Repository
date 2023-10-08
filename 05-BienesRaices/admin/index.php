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

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa en la Playa</td>
                    <td><img src="../imagenes/412ca16791d6d005ba51a882e859d4e2.jpg" alt="Casa en la playa" class="imagen-tabla"></td>
                    <td>300000$</td>
                    <td>
                        <a href="#" class="boton-amarillo-block">Actualizar</a>
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </main>

<?php
    incluirTemplate("footer");
?>