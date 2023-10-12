<?php

require "../includes/app.php";

estaAutenticado();

use App\Propiedad;
use App\Vendedor;

$propiedades = Propiedad::all() ?? [];
$vendedores = Vendedor::all() ?? [];


$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {

        $tipo = $_POST['tipo'];

        
        if(validarTipoContenido($tipo)) {
            if ($_POST['tipo'] === 'propiedad') {
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
    
            }else if ($_POST['tipo'] === 'vendedor') {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            }
        }

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

    <h2>Propiedades</h2>

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
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la Propiedad" class="imagen-tabla"></td>
                    <td><?php echo $propiedad->precio; ?>$</td>
                    <td>
                        <a href="propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" value="Eliminar" class="boton-rojo-block" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <a href="vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" value="Eliminar" class="boton-rojo-block" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</main>

<?php
incluirTemplate("footer");
?>