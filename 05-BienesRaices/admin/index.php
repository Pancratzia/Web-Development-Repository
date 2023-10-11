<?php

require "../includes/app.php";

estaAutenticado();

use App\Propiedad;

$propiedades = Propiedad::all() ?? [];

$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {

        $query = "SELECT * FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink('../imagenes/' . $propiedad['imagen']);

        $query = "DELETE FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        header('Location: ../admin?resultado=3');
    } else {
        header('Location: ../admin');
    }
}


incluirTemplate("header");
?>


<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php if (intval($resultado) === 1) {
        echo "<p class='alerta exito'>Propiedad Creada Correctamente</p>";
    } elseif (intval($resultado) === 2) {
        echo "<p class='alerta exito'>Propiedad Actualizada Correctamente</p>";
    } elseif (intval($resultado) === 3) {
        echo "<p class='alerta exito'>Propiedad Eliminada Correctamente</p>";
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
            <?php foreach( $propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la Propiedad" class="imagen-tabla"></td>
                    <td><?php echo $propiedad->precio; ?>$</td>
                    <td>
                        <a href="propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="submit" value="Eliminar" class="boton-rojo-block" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

<?php

mysqli_close($db);
incluirTemplate("footer");
?>