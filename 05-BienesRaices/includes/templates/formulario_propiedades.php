<fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" placeholder="Nombre de la Propiedad" id="titulo" maxlength="45" value="<?php echo s($propiedad->titulo); ?>" required>

            <label for="precio">Precio</label>
            <input type="number" name="precio" placeholder="Precio de la Propiedad" min="1" id="precio" value="<?php echo s($propiedad->precio); ?>" required>

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripción de la Propiedad" required><?php echo s($propiedad->descripcion); ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información del Inmueble</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" name="habitaciones" placeholder="Ej: 3" id="habitaciones" min="1" max="99" value="<?php echo s($propiedad->habitaciones); ?>" required>

            <label for="wc">Baños</label>
            <input type="number" name="wc" placeholder="Ej: 2" id="wc" min="1" max="99" value="<?php echo s($propiedad->wc); ?>" required>

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" name="estacionamiento" placeholder="Ej: 1" id="estacionamiento" min="0" max="99" value="<?php echo s($propiedad->estacionamiento); ?>" required>

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

        </fieldset>