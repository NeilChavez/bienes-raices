<fieldset>
  <legend>Informacion General</legend>

  <label for="titulo">Titulo</label>
  <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Apartamento a Paris" value="<?php echo sanitize($propiedad->titulo); ?>">

  <br>
  <label for="precio">Precio</label>
  <input type="number" id="precio" name="propiedad[precio]" min="0" max="99999" value="<?php echo sanitize($propiedad->precio); ?>">
  <br>

  <label for="imagen">Imagen</label>
  <br>
  <input type="file" id="imagen" name="propiedad[imagen]" accept=".png, .jpg, .jpeg">

  <?php if ($propiedad->imagen) : ?>
    <img src="<?php echo CARPETA_IMAGES . $propiedad->imagen ?>" class="thumbnail-img" alt="<?php echo $propiedad->titulo ?>">
  <?php endif ?>

  <label for="descripcion">Descripcion</label>
  <br>
  <textarea name="propiedad[descripcion]" id="descripcion" cols="30" vendedors="10"><?php echo sanitize($propiedad->descripcion) ?>
  </textarea>
</fieldset>

<fieldset>
  <legend>Informacion de la propriedad</legend>

  <label for="habitaciones">Numero habitacion</label>
  <input type="number" name="propiedad[habitaciones]" id="habitaciones" min="0" max="20" value="<?php echo sanitize($propiedad->habitaciones); ?>">

  <label for="wc">Numero WC</label>
  <input type="number" id="wc" name="propiedad[wc]" min="0" max="5" value="<?php echo sanitize($propiedad->wc); ?>">

  <label for="estacionamiento">Numero estacionamientos</label>
  <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" min="0" max="5" value="<?php echo sanitize($propiedad->estacionamiento); ?>">
  <br>

  <select name="propiedad[vendedores_id]">
    <option value="choose a seller" disabled default selected>Choose a seller</option>
  <?php foreach ($vendedores as $vendedor) : ?>
   <?php var_dump($vendedor) ?>
    <?php echo var_dump($vendedor); ?> ;
      <option id="<?php echo $vendedor->id ?>" value="<?php echo $vendedor->id ?>" <?php echo $vendedor->id === sanitize($propiedad->vendedores_id) ? "selected" : "" ?>>
        <?php echo $vendedor->nombre . " " . $vendedor->apellido ?>
      </option>
      <?php endforeach; ?>
    </select>
</fieldset>