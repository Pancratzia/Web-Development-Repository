<div class="registro">
    <h2 class="registro__heading"><?php echo $titulo ?></h2>
    <p class="registro__descripcion">Únete a PankraCamp</p>

    <div class="paquetes__grid">

        <div class="paquete" <?php aos_animacion() ?>>
            <h3 class="paquete__nombre">Starter</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a las Conferencias de PankraCamp</li>
            </ul>

            <p class="paquete__precio">0$</p>

            <form action="/finalizar-registro/gratis" method="POST">
                <input type="submit" value="Inscripción Gratis" class="paquetes__submit">
            </form>
        </div>

        <div class="paquete" <?php aos_animacion() ?>>
            <h3 class="paquete__nombre">Platinum</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a PankraCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Acceso a Talleres y Conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
                <li class="paquete__elemento">Camisa del Evento</li>
                <li class="paquete__elemento">Comida y Bebida</li>
            </ul>

            <p class="paquete__precio">100$</p>
        </div>

        <div class="paquete" <?php aos_animacion() ?>>
            <h3 class="paquete__nombre">Gold</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a PankraCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Enlace a Talleres y Conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
            </ul>

            <p class="paquete__precio">50$</p>

        </div>

    </div>
</div>