<?php
    require "../../includes/funciones.php";
    incluirTemplate("header");
?>


    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="../" class="boton boton-verde">Volver</a>

        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" placeholder="Nombre de la Propiedad" id="titulo">

                <label for="precio">Precio</label>
                <input type="number" name="precio" placeholder="Precio de la Propiedad" id="precio">

                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripción de la Propiedad"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información del Inmueble</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" name="habitaciones" placeholder="Ej: 3" id="habitaciones" min="1" max="99">

                <label for="wc">Baños</label>
                <input type="number" name="wc" placeholder="Ej: 2" id="wc" min="1" max="99">

                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" name="estacionamiento" placeholder="Ej: 1" id="estacionamiento" min="1" max="99">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedores" id="vendedores">
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