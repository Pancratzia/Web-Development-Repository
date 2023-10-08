<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>

    <link rel="preload" href="build/css/app.css" as="style">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>

    <header class="header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img width="50" height="50" src="build/img/logo.svg" alt="Logo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="icono menu responsive">
                </div>

                  <div class="derecha">
                    <img class="dark-mode-boton" src="build/img/dark-mode.svg" alt="Dark mode icon">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    </nav>
                </div>
            </div><!-- barra -->

        </div>
    </header>


    <main class="contenedor seccion">
        <h1>Consejos para Limpiar tu Piscina</h1>

        <picture>
            <source srcset="build/img/destacada2.avif" type="image/avif">
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img width="200" height="300" loading="lazy" ,src="build/img/destacada2.jpg" alt="Decora un Dormitorio sin Espacio">
        </picture>

        <div class="texto-entrada">
            <p>Escrito el: <span>27/08/2022</span> por: <span>Pancratzia</span></p>
            <p>Maxime at dignissimos error nihil sunt, natus, illo, atque dolor sit ipsa accusamus. Porro perspiciatis esse repellendus, necessitatibus cum inventore eveniet vel consequatur accusantium dolores reprehenderit aliquid hic corporis corrupti sequi placeat doloribus consequuntur totam tempora! Repellat!</p>
            <p>Eligendi ex exercitationem inventore laboriosam reiciendis deleniti reprehenderit sit voluptatum impedit quibusdam repellat laborum ducimus quia, natus quos consequatur amet voluptas ullam.</p>
            <p>Vitae ut incidunt voluptates, facilis beatae delectus eligendi et officia corporis, dolorum ab impedit quo ratione obcaecati fugiat ipsum similique! Voluptatibus tenetur aut odio ipsum vero nisi necessitatibus explicabo illo quisquam, reiciendis vitae hic molestiae, fugit quod, delectus quasi impedit consequatur reprehenderit placeat dolorem? Veritatis odio tempore ut obcaecati, eum nam quae.</p>
        </div>
    </main>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los Derechos Reservados. <span class="annoGenerado" id="annoGenerado"></span> &copy;</p>
    </footer>
    
    <script src="build/js/bundle.min.js"></script>
</body>
</html>