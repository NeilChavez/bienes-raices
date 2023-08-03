<?php
use App\Property;

include './includes/templates/header.php';
require 'includes/app.php';

if ($_SERVER['REQUEST_METHOD'] === "GET") {

  $idProperty =  filter_var(($_GET["id"]), FILTER_VALIDATE_INT);

  if (!$idProperty) exit;

  $property = Property::find($idProperty);
  if ($property === null) exit;
}
?>
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


<footer class="seccion">

  <div class="contenedor contenedor-footer">
    <nav class="navegacion">
      <a href="nosotros.php">Nosotros</a>
      <a href="anuncios.php">Anuncios</a>
      <a href="blog.php">Blog</a>
      <a href="contacto.php">Contacto</a>
    </nav>
  </div>
  <p class="copyright">
    Todos los derechos reservados 2023
  </p>
</footer>
<script src="./build/js/bundle.min.js"></script>
</body>

</html>