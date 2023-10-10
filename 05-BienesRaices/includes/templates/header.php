<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>

    <link rel="preload" href="/05-BienesRaices/build/css/app.css" as="style">
    <link rel="stylesheet" href="/05-BienesRaices/build/css/app.css">

</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/05-BienesRaices/">
                    <img loading="lazy" width="50" height="50" src="/05-BienesRaices/build/img/logo.svg" alt="Logo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/05-BienesRaices/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/05-BienesRaices/build/img/dark-mode.svg" alt="Dark mode icon">
                    <nav class="navegacion">
                        <a href="/05-BienesRaices/nosotros.php">Nosotros</a>
                        <a href="/05-BienesRaices/anuncios.php">Anuncios</a>
                        <a href="/05-BienesRaices/blog.php">Blog</a>
                        <a href="/05-BienesRaices/contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/05-BienesRaices/admin/">Admin</a>
                            <a href="/05-BienesRaices/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                        <?php if(!$auth): ?>
                            <a href="/05-BienesRaices/login.php">Login</a>
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