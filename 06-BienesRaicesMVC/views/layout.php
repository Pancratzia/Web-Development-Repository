<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? null;

if (!isset($inicio)) {
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>

    <link rel="preload" href="../build/css/app.css" as="style">
    <link rel="stylesheet" href="../build/css/app.css">

</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img loading="lazy" width="50" height="50" src="/build/img/logo.svg" alt="Logo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Dark mode icon">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth) : ?>
                            <a href="/admin">Admin</a>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
                        <?php if (!$auth) : ?>
                            <a href="/login">Login</a>
                        <?php endif; ?>
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


    <?php
    echo $contenido;
    ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
                <?php if ($auth) : ?>
                    <a href="/admin">Admin</a>
                    <a href="/logout">Cerrar Sesión</a>
                <?php endif; ?>
                <?php if (!$auth) : ?>
                    <a href="/login">Login</a>
                <?php endif; ?>
            </nav>
        </div>

        <p class="copyright">Todos los Derechos Reservados. <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>

</html>