<h2 class="pagina__heading"><?php echo $titulo ?></h2>
<p class="pagina__descripcion">Elige hasta 5 Workshops o Conferencias para asistir de forma presencial</p>

<div class="eventos-registro">
    <main class="eventos-registro__listado">
        <h3 class="eventos-registro__heading--conferencias">&lt; Conferencias /&gt;</h3>
        <p class="eventos-registro__fecha">Martes 17 de Septiembre</p>

        <div class="eventos-registro__grid">
            <?php foreach ($eventos['conferencias_1'] as $evento) : ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php endforeach ?>
        </div>
    </main>

    <aside class="registro">
        <h2 class="registro__heading">
            Tu Registro
        </h2>
    </aside>
</div>