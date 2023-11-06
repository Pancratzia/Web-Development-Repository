<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre del Ponente" value="<?php echo $ponente->nombre ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input type="text" class="formulario__input" id="apellido" name="apellido" placeholder="Apellido del Ponente" value="<?php echo $ponente->apellido ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input type="text" class="formulario__input" id="ciudad" name="ciudad" placeholder="Ciudad del Ponente" value="<?php echo $ponente->ciudad ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="pais" class="formulario__label">País</label>
        <input type="text" class="formulario__input" id="pais" name="pais" placeholder="País del Ponente" value="<?php echo $ponente->pais ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input type="file" class="formulario__input formulario__input--file" id="imagen" name="imagen">
    </div>

    <?php if(isset($ponente->imagen_actual)) { ?>

        <p class="formulario__texto">Imagen Actual: </p>

        <picture>
            <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen_actual . '.avif'; ?>" type="image/avif">
            <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen_actual . '.webp'; ?>" type="image/webp">
            <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen_actual . '.jpg'; ?>" type="image/png">

            <img class="formulario__imagen" src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen_actual; ?>.png" alt="Imagen del Ponente <?php echo $ponente->nombre; ?>">

        </picture>

    <?php } ?>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Áreas de Experiencia (Separadas por una coma)</label>
        <input type="text" class="formulario__input" id="tags_input" placeholder="Ej. PHP, CSS, HTML, Javascript, NodeJS">
    </div>

    <div id="tags" class="formulario__listado"></div>

    <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[facebook]" placeholder="Facebook" value="<?php echo $redes->facebook ?? ''; ?>">
        </div>
    </div>


    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[twitter]" placeholder="Twitter" value="<?php echo $redes->twitter ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[youtube]" placeholder="YouTube" value="<?php echo $redes->youtube ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[instagram]" placeholder="Instagram" value="<?php echo $redes->instagram ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[tiktok]" placeholder="TikTok" value="<?php echo $redes->tiktok ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-linkedin"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[linkedin]" placeholder="LinkedIn" value="<?php echo $redes->linkedin ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[github]" placeholder="GitHub" value="<?php echo $redes->github ?? ''; ?>">
        </div>
    </div>

</fieldset>