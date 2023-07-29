<?php
include './includes/templates/header.php';
include 'includes/templates/config/db.php';

$db = connectDB();
$query = "SELECT * FROM propiedades";

$propiedades =  mysqli_query($db, $query);

?>


<main class="contenedor seccion">

  <h1>Casas y departamentos en venta</h1>
  <div class="contenedor-anuncios">

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