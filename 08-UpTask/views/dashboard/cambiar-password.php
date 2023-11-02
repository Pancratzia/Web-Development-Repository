<?php include_once __DIR__ . '/header-dashboard.php'; ?>


<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <a href="/perfil" class="enlace">Volver a Perfil</a>

    <form action="/perfil" method="POST" class="formulario">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre">
        </div>

        <div class="campo">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Tu Email">
        </div>

        <input type="submit" value="Guardar cambios">
    </form>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php'; ?>