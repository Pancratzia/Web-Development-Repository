<?php

require "../../includes/app.php";

use App\Propiedad;

use Intervention\Image\ImageManagerStatic as Image;


estaAutenticado();

$db = conectarDB();

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

$errores = Propiedad::getErrores();

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propiedad = new Propiedad($_POST);

    $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);

    $nombreImagen = md5(uniqid(rand(), true)) . '.' . $extension;

    if ($_FILES['imagen']['tmp_name']) {
        $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    $errores = $propiedad->validar();


    if (empty($errores)) {

        if(!is_dir(CARPETA_IMAGENES)){
            mkdir(CARPETA_IMAGENES);
        }
        
        $image->save(CARPETA_IMAGENES . $nombreImagen);
        
        $resultado = $propiedad->guardar();

        if ($resultado) {
            header('Location: ../../admin?resultado=1');
        } else {
            echo "Error al crear la Propiedad";
        }
    }
}

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

    <form method="POST" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" placeholder="Nombre de la Propiedad" id="titulo" maxlength="45" value="<?php echo $titulo; ?>" required>

            <label for="precio">Precio</label>
            <input type="number" name="precio" placeholder="Precio de la Propiedad" min="1" id="precio" value="<?php echo $precio; ?>" required>

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

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

            <select name="vendedorId" id="vendedorId" required>
                <option value="" <?php echo $vendedorId === '' ? 'selected' : ''; ?> disabled>--Seleccione Un Vendedor--</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>