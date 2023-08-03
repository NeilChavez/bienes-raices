<fieldset>
  <legend>Informacion General</legend>

  <label for="nombre">Nombre</label>
  <input type="text" id="nombre" name="vendedores[nombre]" placeholder="Escribe el nombre del vendedor" value="<?php echo sanitize($vendedor->nombre); ?>">

  <br>

  <label for="apellido">Apellido</label>
  <input type="text" id="apellido" name="vendedores[apellido]" placeholder="Apellido" value="<?php echo sanitize($vendedor->apellido); ?>">

  <br>


  <label for="telefono">Numero de telefono</label>
  <input type="text" id="telefono" name="vendedores[telefono]" placeholder="N de telefono" value="<?php echo sanitize($vendedor->telefono); ?>">

  <br>