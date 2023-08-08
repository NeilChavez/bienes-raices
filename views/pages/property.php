<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $property->titulo; ?></h1>
  <picture>
    <img loading="lazy" src="images/<?php echo $property->imagen; ?> " alt="imagen destacada">
  </picture>
  <div class="resumen-propiedad">
    <p class="precio">
      <?php echo $property->precio; ?>
    </p>
    <ul class="iconos-caracteriticas">
      <li>
        <img class="icono" loading="lazy" src="./build/img/icono_wc.svg" alt="icono wg">
        <p>
          <?php echo $property->wc; ?>
        </p>
      </li>
      <li>
        <img class="icono" loading="lazy" src="./build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
        <p>
          <?php echo $property->estacionamiento; ?>
        </p>
      </li>
      <li>
        <img class="icono" loading="lazy" src="./build/img/icono_dormitorio.svg" alt="icono dormitorio">
        <p>
          <?php echo $property->habitaciones; ?>

        </p>
      </li>
    </ul>
    <p>
      <?php echo $property->descripcion; ?>
    </p>

  </div>
</main>