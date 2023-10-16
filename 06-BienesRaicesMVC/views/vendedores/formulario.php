<fieldset>
    <legend>Informacion General</legend>

    <label for="nombre">Nombre</label>
    <input type="text" name="vendedor[nombre]" placeholder="Nombre del Vendedor(a)" id="nombre" id="nombre" maxlength="45" value="<?php echo s($vendedor->nombre); ?>" required>

    <label for="apellido">Apellido</label>
    <input type="text" name="vendedor[apellido]" placeholder="Apellido del Vendedor(a)" id="apellido" maxlength="45" value="<?php echo s($vendedor->apellido); ?>" required>
    
</fieldset>

<fieldset>
    <legend>Informacion Extra</legend>
    <label for="telefono">Teléfono</label>
    <input type="text" name="vendedor[telefono]" placeholder="Telefono del Vendedor(a)" id="telefono" maxlength="10" value="<?php echo s($vendedor->telefono); ?>" required>
</fieldset>