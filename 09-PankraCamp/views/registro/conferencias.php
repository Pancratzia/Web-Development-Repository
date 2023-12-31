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

        <p class="eventos-registro__fecha">Miercoles 18 de Septiembre</p>
        <div class="eventos-registro__grid">
            <?php foreach ($eventos['conferencias_2'] as $evento) : ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php endforeach ?>
        </div>

        <h3 class="eventos-registro__heading--workshops">&lt; Workshops /&gt;</h3>
        <p class="eventos-registro__fecha">Martes 17 de Septiembre</p>

        <div class="eventos-registro__grid  eventos--workshops">
            <?php foreach ($eventos['workshops_1'] as $evento) : ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php endforeach ?>
        </div>

        <p class="eventos-registro__fecha">Miercoles 18 de Septiembre</p>
        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach ($eventos['workshops_2'] as $evento) : ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php endforeach ?>
        </div>
    </main>

    <aside class="registro">
        <h2 class="registro__heading">
            Tu Registro
        </h2>

        <div id="registro-resumen" class="registro__resumen"></div>

        <div class="registro__regalo">
            <label for="regalo" class="registro__label">Elige un Regalo</label>
            <select id="regalo" class="registro__select">
                <option value="">-- Selecciona tu Regalo --</option>
                <?php foreach ($regalos as $regalo) : ?>
                    <option value="<?php echo $regalo->id; ?>"><?php echo $regalo->nombre; ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <form id="registro" class="formulario">
            <div class="formulario__campo">
                <input type="submit" value="Registrarme" class="formulario__submit formulario__submit--enviar-formulario">
            </div>
        </form>
    </aside>
</div>