<?php

//BD
require "../../includes/config/database.php";
$db = contectarDB();

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId = $_POST['vendedor'];

    if (!$titulo) {
        $errores[] = "Debes añadir un Titulo";
    }

    if (!$precio || !is_numeric($precio) || $precio <= 0) {
        $errores[] = "Debes añadir un Precio Válido";
    }

    if (!$descripcion) {
        $errores[] = "Debes añadir una Descripción";
    }

    if (!$habitaciones || !is_numeric($habitaciones) || $habitaciones <= 0) {
        $errores[] = "Debes añadir una cantidad de Habitaciones Válida";
    }

    if (!$wc || !is_numeric($wc) || $wc <= 0) {
        $errores[] = "Debes añadir una cantidad de Baños Válida";
    }

    if(!$estacionamiento || !is_numeric($estacionamiento) || $estacionamiento < 0) {
        $errores[] = "Debes añadir una cantidad de Estacionamiento Válida";
    }

    if (!$vendedorId || !is_numeric($vendedorId) || $vendedorId === '') {
        echo "Debes seleccionar un vendedor";
    }

    if (empty($errores)) {

        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId) VALUES ('$titulo', $precio, '$descripcion', $habitaciones, $wc, $estacionamiento, $vendedorId)";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            echo "Propiedad Creada Con Exito";
        } else {
            echo "Error al crear la Propiedad";
        }
    }
}

require "../../includes/funciones.php";
incluirTemplate("header");
?>


<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="../" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" action="/wdc/05-BienesRaices/admin/propiedades/crear.php" class="formulario">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" placeholder="Nombre de la Propiedad" id="titulo" required>

            <label for="precio">Precio</label>
            <input type="number" name="precio" placeholder="Precio de la Propiedad" id="precio" min="0" required>

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripción de la Propiedad" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información del Inmueble</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" name="habitaciones" placeholder="Ej: 3" id="habitaciones" min="1" max="99" required>

            <label for="wc">Baños</label>
            <input type="number" name="wc" placeholder="Ej: 2" id="wc" min="1" max="99" required>

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" name="estacionamiento" placeholder="Ej: 1" id="estacionamiento" min="0" max="99" required>

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="vendedor" required>
                <option value="" selected disabled>--Seleccione Un Vendedor--</option>
                <option value="1">Laura</option>
                <option value="2">Arthuro</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>