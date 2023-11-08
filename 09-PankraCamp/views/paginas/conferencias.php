<main class="agenda">

    <h2 class="agenda__heading"><?php echo $titulo ?></h2>
    <p class="agenda__descripcion">Talleres y Conferencias Dictadas por Expertos de todo el mundo</p>

    <div class="eventos">

        <h3 class="eventos__heading">&lt; Conferencias /&gt;</h3>
        <p class="eventos__fecha">Martes 17 de Septiembre</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias_1'] as $evento) : ?>
                    <div class="evento swiper-slide">
                        <p class="evento__hora">
                            <?php echo $evento->hora->hora ?>
                        </p>

                        <div class="evento__informacion">
                            <h4 class="evento__nombre"> <?php echo $evento->nombre ?> </h4>

                            <p class="evento__introduccion""><?php echo $evento->descripcion ?></p>

                        <div class=" evento__autor-info">
                                <picture>
                                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen . '.avif'; ?>" type="image/avif">
                                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen . '.webp'; ?>" type="image/webp">
                                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen . '.jpg'; ?>" type="image/png">

                                    <img loading="lazy" width="200" height="300" class="evento__imagen-autor" src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen del Ponente <?php echo $evento->ponente->nombre; ?>">

                                </picture>

                            <p class="evento__autor-nombre">
                                <?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?>
                            </p>
                        </div>

                    </div>
            </div>
        <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <p class="eventos__fecha">Miércoles 18 de Septiembre</p>

    <div class="eventos__listado"></div>

    </div>

    <div class="eventos eventos--workshops">

        <h3 class="eventos__heading">&lt; Workshops /&gt;</h3>
        <p class="eventos__fecha">Martes 17 de Septiembre</p>

        <div class="eventos__listado"></div>

        <p class="eventos__fecha">Miércoles 18 de Septiembre</p>

        <div class="eventos__listado"></div>

    </div>

</main>