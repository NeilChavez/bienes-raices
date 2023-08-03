<?php
require 'includes/app.php';
include './includes/templates/header.php';

?>


<main class="contenedor seccion">

  <h1>Casas y departamentos en venta</h1>

  <?php 
    $limite = 10;
    include 'includes/templates/anuncios.php';
  ?>
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