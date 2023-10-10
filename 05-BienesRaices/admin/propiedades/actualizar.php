<?php

$id = $_GET['id'] ?? null;
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: ../../admin');
    exit;
}

//BD
require "../../includes/config/database.php";
$db = conectarDB();

$consulta = "SELECT * FROM propiedades WHERE id = $id";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);

if (!$propiedad) {
    header('Location: ../../admin');
    exit;
}

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedorId'];
$imagenPropiedad = $propiedad['imagen'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');
    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes añadir un Titulo";
    }

    if (!$precio || !is_numeric($precio) || $precio <= 0) {
        $errores[] = "Debes añadir un Precio Válido";
    }

    if (!$descripcion || strlen($descripcion) < 50) {
        $errores[] = "Debes añadir una Descripción Válida (mínimo 50 caracteres)";
    }

    $medida = 1000 * 1000;

    if ($imagen['name'] && !$imagen['error']) {
        if (!$imagen['type'] === 'image/jpeg' && !$imagen['type'] === 'image/png') {
            $errores[] = "La imagen debe ser JPG o PNG";
        }

        if ($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }
    }

    if (!$habitaciones || !is_numeric($habitaciones) || $habitaciones <= 0) {
        $errores[] = "Debes añadir una cantidad de Habitaciones Válida";
    }

    if (!$wc || !is_numeric($wc) || $wc <= 0) {
        $errores[] = "Debes añadir una cantidad de Baños Válida";
    }

    if ($estacionamiento === '') {
        $errores[] = "Debes añadir una cantidad de Estacionamiento Válida";
    } elseif (!is_numeric($estacionamiento) || $estacionamiento < 0) {
        $errores[] = "Debes ingresar un valor numérico no negativo para el Estacionamiento";
    }

    if (!$vendedorId || !is_numeric($vendedorId) || $vendedorId === '') {
        echo "Debes seleccionar un vendedor";
    }


    if (empty($errores)) {

        $carpetaImagenes = '../../imagenes';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        if ($imagen['name']) {

            unlink($carpetaImagenes . '/' . $propiedad['imagen']);

            $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);

            $nombreImagen = md5(uniqid(rand(), true)) . '.' . $extension;

            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . '/' . $nombreImagen);
        } else {
            $nombreImagen = $propiedad['imagen'];
        }

        $query = "UPDATE propiedades SET titulo= '$titulo', precio= $precio, descripcion= '$descripcion', imagen= '$nombreImagen', habitaciones= $habitaciones, wc= $wc, estacionamiento= $estacionamiento, vendedorId= $vendedorId WHERE id = $id";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: ../../admin?resultado=2');
        } else {
            echo "Error al crear la Propiedad";
        }
    }
}

require "../../includes/funciones.php";
incluirTemplate("header");
?>


<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <a href="../" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" placeholder="Nombre de la Propiedad" id="titulo" maxlength="45" value="<?php echo $titulo; ?>" required>

            <label for="precio">Precio</label>
            <input type="number" name="precio" placeholder="Precio de la Propiedad" min="1" id="precio" value="<?php echo $precio; ?>" required>

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <img class="imagen-small" src="../../imagenes/<?php echo $imagenPropiedad; ?>" alt="Imagen de la Propiedad" width="100">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripción de la Propiedad" required><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información del Inmueble</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" name="habitaciones" placeholder="Ej: 3" id="habitaciones" min="1" max="99" value="<?php echo $habitaciones; ?>" required>

            <label for="wc">Baños</label>
            <input type="number" name="wc" placeholder="Ej: 2" id="wc" min="1" max="99" value="<?php echo $wc; ?>" required>

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" name="estacionamiento" placeholder="Ej: 1" id="estacionamiento" min="0" max="99" value="<?php echo $estacionamiento; ?>" required>

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="vendedor" required>
                <option value="" <?php echo $vendedorId === '' ? 'selected' : ''; ?> disabled>--Seleccione Un Vendedor--</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>