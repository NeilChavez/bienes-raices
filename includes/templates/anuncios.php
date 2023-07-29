  <?php

  include 'includes/templates/config/db.php';

  $db = connectDB();
  $query = "SELECT * FROM propiedades LIMIT $limit";

  $propiedades =  mysqli_query($db, $query);

  ?>
  <div class="contenedor-anuncios fluid-grid">
    <?php
    while ($row = mysqli_fetch_assoc($propiedades)) : ?>
      <div class="anuncio">
        <picture>
          <img loading="lazy" src="images/<?php echo $row['imagen'] ?>" class="max-width-200" alt="anuncio">
        </picture>
        <div class="contenido-anuncio">
          <h3> <?php echo $row['titulo']; ?> </h3>
          <p class="text-ellipsis-4"> <?php echo $row["descripcion"]; ?></p>

          <p class="precio"><?php echo $row["precio"] ?></p>

          <ul class="iconos-caracteriticas">
            <li>
              <img class="icono" loading="lazy" src="./build/img/icono_wc.svg" alt="icono wg">
              <p><?php echo $row["wc"]; ?></p>
            </li>
            <li>
              <img class="icono" loading="lazy" src="./build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
              <p><?php echo $row["estacionamiento"]; ?></p>
            </li>
            <li>
              <img class="icono" loading="lazy" src="./build/img/icono_dormitorio.svg" alt="icono dormitorio">
              <p><?php echo $row["habitaciones"]; ?></p>
            </li>
          </ul>
          <form method="GET" action="anuncio.php" class="boton boton-amarillo-block">
            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
            <input type="submit" value="Ver Propriedad">
          </form>
        </div> <!-- .contenido-anuncio-->
      </div><!--anuncio-->
    <?php endwhile ?>
  </div> <!--.contenedor-anuncios-->