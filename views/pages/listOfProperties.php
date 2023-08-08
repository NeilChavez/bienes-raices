  <div class="contenedor-anuncios fluid-grid">
    <?php
    foreach($properties as $property ) : ?>
      <div class="anuncio">
        <picture>
          <img loading="lazy" src="images/<?php echo $property->imagen ?>" class="max-width-200" alt="anuncio">
        </picture>
        <div class="contenido-anuncio">
          <h3> <?php echo $property->titulo; ?> </h3>
          <p class="text-ellipsis-4"> <?php echo $property->descripcion; ?></p>

          <p class="precio"><?php echo $property->precio ?></p>

          <ul class="iconos-caracteriticas">
            <li>
              <img class="icono" loading="lazy" src="./build/img/icono_wc.svg" alt="icono wg">
              <p><?php echo $property->wc; ?></p>
            </li>
            <li>
              <img class="icono" loading="lazy" src="./build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
              <p><?php echo $property->estacionamiento; ?></p>
            </li>
            <li>
              <img class="icono" loading="lazy" src="./build/img/icono_dormitorio.svg" alt="icono dormitorio">
              <p><?php echo $property->habitaciones; ?></p>
            </li>
          </ul>
          <form method="GET" action="property" class="boton boton-amarillo-block">
            <input type="hidden" name="id" value="<?php echo $property->id ?>">
            <input type="submit" value="Ver Propriedad">
          </form>
        </div> <!-- .contenido-anuncio-->
      </div><!--anuncio-->
    <?php endforeach ?>
  </div> <!--.contenedor-anuncios-->