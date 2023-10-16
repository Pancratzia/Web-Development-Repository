<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo</label>
    <input type="text" name="entrada[titulo]" placeholder="Título de la Entrada" id="titulo" maxlength="45" value="<?php echo s($entrada->titulo); ?>" required>

    <label for="subtitulo">Subtitulo</label>
    <input type="text" name="entrada[subtitulo]" placeholder="Subtitulo de la Entrada" id="subtitulo" maxlength="45 value="<?php echo s($entrada->subtitulo); ?>" required>

    <label for="imagen">Imagen</label>
    <input type="file" name="entrada[imagen]" id="imagen" accept="image/jpeg, image/png">

    <?php if ($entrada->imagen) : ?>
        <img src="../../imagenes/<?php echo $entrada->imagen; ?>" alt="Imagen de la Entrada" class="imagen-small">
    <?php endif; ?>

    <label for="contenido">Contenido de la Entrada</label>
    <textarea name="entrada[contenido]" id="contenido" cols="30" rows="10" placeholder="Contenido de la Entrada" required><?php echo s($entrada->contenido); ?></textarea>
</fieldset>

<fieldset>
    <legend>Autores</legend>

    <label for="autor">Autor</label>
    <select name="entrada[autores]" id="autor">
        <?php foreach ($autores as $autor) : ?>
            <option value="<?php echo $autor->id; ?>" <?php echo $entrada->vendedorId === $autor->id ? 'selected' : ''; ?>>
                <?php echo $autor->nombre . ' ' . $autor->apellido; ?>
            </option>
        <?php endforeach; ?>
    </select>

</fieldset>