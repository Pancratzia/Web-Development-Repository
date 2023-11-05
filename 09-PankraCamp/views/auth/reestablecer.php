<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Recupera tu Acceso a PankraCamp Ingresando un Nuevo Password</p>

    <?php
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <?php if($token_valido) { ?>

    <form method="POST" class="formulario">
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input type="password" class="formulario__input" placeholder="Tu Nuevo Password..." name="password" id="password">
        </div>

        <input type="submit" value="Guardar Password" class="formulario__submit">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">Inicia Sesión en PankraCamp</a>
        <a href="/registro" class="acciones__enlace">Registra tu Cuenta en PankraCamp</a>
    </div>

    <?php } ?>
</main>