<?php
    foreach ($entradas as $entrada) {
    ?>

        <?php
            foreach ($vendedores as $vendedor) {
                if ($entrada->vendedorId == $vendedor->id) {
                    $autor = $vendedor->nombre . " " . $vendedor->apellido;
                }
            }
        ?>

        <article class="entrada-blog">
            <div class="imagen">

                <img width="50" height="50" loading="lazy" src="imagenes/<?php echo $entrada->imagen; ?>" alt="Texto Entrada Blog <?php echo $entrada->titulo; ?>">

            </div>

            <div class="texto-entrada">
                <a href="/entrada?id=<?php echo $entrada->id; ?>">
                    <h4><?php echo $entrada->titulo; ?></h4>
                    <p>Escrito el: <span><?php echo $entrada->fecha; ?></span> por: <span><?php echo $autor; ?></span></p>

                    <p><?php echo $entrada->subtitulo; ?></p>
                </a>
            </div>
        </article>

    <?php } ?>