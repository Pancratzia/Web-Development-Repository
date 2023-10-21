<h1 class="nombre-pagina">Olvidé Mi Password</h1>
<p class="descripcion-pagina">Ingresa tu email y te enviaremos un enlace para crear una nueva contraseña</p>

<form action="/olvide" method="POST" class="formulario">

    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Tu Email">
    </div>

    <input type="submit" class="boton" value="Enviar instrucciones">

</form>

<div class="acciones">
    <a href="/">Iniciar Sesión</a>
    <a href="/crear-cuenta">Registrarse</a>
</div>