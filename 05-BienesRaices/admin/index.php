<?php

    require_once "../includes/config/database.php";
    $db = contectarDB();

    $query = "SELECT * FROM propiedades";

    $propiedades = mysqli_query($db, $query);

    $resultado = $_GET['resultado'] ?? null;
    require "../includes/funciones.php";
    incluirTemplate("header");
?>


    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if (intval($resultado) === 1) {
            echo "<p class='alerta exito'>Propiedad Creada Correctamente</p>";
        }elseif (intval($resultado) === 2) {
            echo "<p class='alerta exito'>Propiedad Actualizada Correctamente</p>";
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
                <?php while ($propiedad = mysqli_fetch_assoc($propiedades)) : ?>
                    <tr>
                        <td><?php echo $propiedad['id']; ?></td>
                        <td><?php echo $propiedad['titulo']; ?></td>
                        <td><img src="../imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la Propiedad"  class="imagen-tabla"></td>
                        <td><?php echo $propiedad['precio']; ?>$</td>
                        <td>
                            <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                            <a href="#" class="boton-rojo-block">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </main>

<?php

    mysqli_close($db);
    incluirTemplate("footer");
?>