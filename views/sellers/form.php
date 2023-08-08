<fieldset>
  <legend>Informacion General</legend>

  <label for="nombre">Nombre</label>
  <input type="text" id="nombre" name="seller[nombre]" placeholder="Escribe el nombre del vendedor" value="<?php echo sanitize($seller->nombre); ?>">

  <br>

  <label for="apellido">Apellido</label>
  <input type="text" id="apellido" name="seller[apellido]" placeholder="Apellido" value="<?php echo sanitize($seller->apellido); ?>">

  <br>


  <label for="telefono">Numero de telefono</label>
  <input type="text" id="telefono" name="seller[telefono]" placeholder="N de telefono" value="<?php echo sanitize($seller->telefono); ?>">

  <br>
</fieldset>