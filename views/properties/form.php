<fieldset>
  <legend>Informacion General</legend>

  <label for="titulo">Titulo</label>
  <input type="text" id="titulo" name="property[titulo]" placeholder="Apartamento a Paris" value="<?php echo sanitize($property->titulo); ?>">

  <br>
  <label for="precio">Precio</label>
  <input type="number" id="precio" name="property[precio]" min="0" max="99999" value="<?php echo sanitize($property->precio); ?>">
  <br>

  <label for="imagen">Imagen</label>
  <br>
  <input type="file" id="imagen" name="property[imagen]" accept=".png, .jpg, .jpeg">

  <?php if ($property->imagen) : ?>
    <img src="<?php echo "/images/". $property->imagen ?>" class="thumbnail-img" alt="<?php echo $property->titulo ?>">
  <?php endif ?>

  <label for="descripcion">Descripcion</label>
  <br>
  <textarea name="property[descripcion]" id="descripcion" cols="30" vendedors="10"><?php echo sanitize($property->descripcion) ?>
  </textarea>
</fieldset>

<fieldset>
  <legend>Informacion de la propriedad</legend>

  <label for="habitaciones">Numero habitacion</label>
  <input type="number" name="property[habitaciones]" id="habitaciones" min="0" max="20" value="<?php echo sanitize($property->habitaciones); ?>">

  <label for="wc">Numero WC</label>
  <input type="number" id="wc" name="property[wc]" min="0" max="5" value="<?php echo sanitize($property->wc); ?>">

  <label for="estacionamiento">Numero estacionamientos</label>
  <input type="number" id="estacionamiento" name="property[estacionamiento]" min="0" max="5" value="<?php echo sanitize($property->estacionamiento); ?>">
  <br>


  <select name="property[vendedores_id]">
    <option value="choose a seller" disabled default selected>Choose a seller</option>
    <?php foreach ($sellers as $seller) : ?>
      <option id="<?php echo $seller->id ?>" value="<?php echo $seller->id ?>" <?php echo $seller->id === $property->vendedores_id ? "selected" : "" ?>>
        <?php echo $seller->nombre . " " . $seller->apellido ?>
      </option>
    <?php endforeach; ?>
  </select>
</fieldset>