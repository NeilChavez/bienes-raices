  <?php
  use App\Property;



  $propiedades = "";

  if($_SERVER['SCRIPT_NAME'] === "/anuncios.php"){
    $propiedades = Property::all();
  }else{
    $propiedades = Property::get(3);
  }
  ?>
  <div class="contenedor-anuncios fluid-grid">
    <?php
    foreach($propiedades as $propiedad) : ?>
      <div class="anuncio">
        <picture>
          <img loading="lazy" src="images/<?php echo $propiedad->imagen ?>" class="max-width-200" alt="anuncio">
        </picture>
        <div class="contenido-anuncio">
          <h3> <?php echo $propiedad->titulo; ?> </h3>
          <p class="text-ellipsis-4"> <?php echo $propiedad->descripcion; ?></p>

          <p class="precio"><?php echo $propiedad->precio ?></p>

          <ul class="iconos-caracteriticas">
            <li>
              <img class="icono" loading="lazy" src="./build/img/icono_wc.svg" alt="icono wg">
              <p><?php echo $propiedad->wc; ?></p>
            </li>
            <li>
              <img class="icono" loading="lazy" src="./build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
              <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
              <img class="icono" loading="lazy" src="./build/img/icono_dormitorio.svg" alt="icono dormitorio">
              <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
          </ul>
          <form method="GET" action="anuncio.php" class="boton boton-amarillo-block">
            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
            <input type="submit" value="Ver Propriedad">
          </form>
        </div> <!-- .contenido-anuncio-->
      </div><!--anuncio-->
    <?php endforeach ?>
  </div> <!--.contenedor-anuncios-->