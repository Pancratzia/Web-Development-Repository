<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

require "../../includes/app.php";

estaAutenticado();

$id = $_GET['id'] ?? null;
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: ../../admin');
    exit;
}

$propiedad = Propiedad::find($id);

if (!$propiedad) {
    header('Location: ../../admin');
    exit;
}

$vendedores = Vendedor::all();

$errores = Propiedad::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);

    $errores = $propiedad->validar();

    $extension = pathinfo($_FILES['propiedad']['name']['imagen'], PATHINFO_EXTENSION);
    $nombreImagen = md5(uniqid(rand(), true)) . '.' . $extension;

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    if (empty($errores)) {

        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        }

        $propiedad->guardar();
    }
}

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

        <?php
        include '../../includes/templates/formulario_propiedades.php';
        ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>