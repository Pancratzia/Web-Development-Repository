<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General del Evento / Workshop</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre del Evento</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre del Evento" value="<?php echo $evento->nombre ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción del Evento</label>
        <textarea class="formulario__input" id="descripcion" name="descripcion" placeholder="Descripción del Evento" rows="8"><?php echo $evento->descripcion ?? ''; ?></textarea>
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoría o Tipo de Evento</label>
        <select class="formulario__select" id="categoria" name="categoria">
            <option value="">-- Seleccione --</option>
            <?php foreach($categorias as $categoria): ?>     
                <option value="<?php echo $categoria->id; ?>">
                    <?php echo $categoria->nombre; ?>
                </option>

            <?php endforeach; ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="dia" class="formulario__label">Selecciona el día</label>

        <div class="formulario__radio">
            <?php foreach($dias as $dia): ?>
                <div>
                    <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>

                    <input type="radio" id="<?php echo strtolower($dia->nombre); ?>" name="dia" value="<?php echo $dia->id; ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="horas" class="formulario__campo">
        <label for="hora" class="formulario__label">Selecciona la hora</label>

        <ul class="horas">
            <?php foreach($horas as $hora): ?>
                <li class="horas__hora"><?php echo $hora->hora; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>


    
</fieldset>