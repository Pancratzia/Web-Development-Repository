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
        <select class="formulario__select" id="categoria" name="categoria_id">
            <option value="">-- Seleccione --</option>
            <?php foreach($categorias as $categoria): ?>     
                <option <?php echo $evento->categoria_id === $categoria->id ? 'selected' : ''; ?> value="<?php echo $categoria->id; ?>">
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

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente</label>
        <input type="text" class="formulario__input" id="ponentes" placeholder="Buscar Ponente">
    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input type="number" class="formulario__input" id="disponibles" placeholder="Ej. 18" min="1" name="disponibles" value="<?php echo $evento->disponibles ?? ''; ?>">
    </div>
</fieldset>