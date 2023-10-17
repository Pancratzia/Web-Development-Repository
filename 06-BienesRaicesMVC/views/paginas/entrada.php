<main class="contenedor seccion">
    <h1><?php echo $entrada->titulo ?></h1>



    <img width="200" height="300" loading="lazy" src="imagenes/<?php echo $entrada->imagen ?>" alt="<?php echo $entrada->titulo ?>">


    <div class="texto-entrada">
        <p>Escrito el: <span><?php echo $entrada->fecha ?></span> por: <span><?php echo $vendedor->nombre . ' ' . $vendedor->apellido ?></span></p>
        <p><?php echo $entrada->contenido ?></p>
    </div>
</main>