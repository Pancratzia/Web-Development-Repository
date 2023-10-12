<fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" name="propiedad[titulo]" placeholder="Nombre de la Propiedad" id="titulo" maxlength="45" value="<?php echo s($propiedad->titulo); ?>" required>

            <label for="precio">Precio</label>
            <input type="number" name="propiedad[precio]" placeholder="Precio de la Propiedad" min="1" id="precio" step="any" value="<?php echo s($propiedad->precio); ?>" required>

            <label for="imagen">Imagen</label>
            <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, image/png">

            <?php if ($propiedad->imagen) : ?>
                <img src="../../imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la Propiedad" class="imagen-small">
            <?php endif; ?>

            <label for="descripcion">Descripción</label>
            <textarea name="propiedad[descripcion]" id="descripcion" cols="30" rows="10" placeholder="Descripción de la Propiedad" required><?php echo s($propiedad->descripcion); ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información del Inmueble</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" name="propiedad[habitaciones]" placeholder="Ej: 3" id="habitaciones" min="1" max="99" value="<?php echo s($propiedad->habitaciones); ?>" required>

            <label for="wc">Baños</label>
            <input type="number" name="propiedad[wc]" placeholder="Ej: 2" id="wc" min="1" max="99" value="<?php echo s($propiedad->wc); ?>" required>

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" name="propiedad[estacionamiento]" placeholder="Ej: 1" id="estacionamiento" min="0" max="99" value="<?php echo s($propiedad->estacionamiento); ?>" required>

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

        </fieldset>