<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>

    <link rel="preload" href="/wdc/05-BienesRaices/build/css/app.css" as="style">
    <link rel="stylesheet" href="/wdc/05-BienesRaices/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img loading="lazy" width="50" height="50" src="/wdc/05-BienesRaices/build/img/logo.svg" alt="Logo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/wdc/05-BienesRaices/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/wdc/05-BienesRaices/build/img/dark-mode.svg" alt="Dark mode icon">
                    <nav class="navegacion">
                        <a href="/wdc/05-BienesRaices/nosotros.php">Nosotros</a>
                        <a href="/wdc/05-BienesRaices/anuncios.php">Anuncios</a>
                        <a href="/wdc/05-BienesRaices/blog.php">Blog</a>
                        <a href="/wdc/05-BienesRaices/contacto.php">Contacto</a>
                    </nav>
                </div>
            </div><!-- barra -->

            <?php
            if ($inicio) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php
            }
            ?>
        </div>
    </header>