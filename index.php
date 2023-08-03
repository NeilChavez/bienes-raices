<?php
require 'includes/app.php';
$inicio = true;
include './includes/templates/header.php';
?>

<main class="contenedor seccion">
  <h1>Mas sobre nosotros</h1>
  <div class="iconos-nosotros">
    <div class="icono">
      <img src="./build/img/icono1.svg" alt="Icono seguridad">
      <h3>Seguridad</h3>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis, non quo voluptas reprehenderit
        dolor tenetur iusto eveniet velit deleniti aspernatur possimus, cupiditate provident id explicabo
        inventore nemo a ut qui.</p>
    </div>
    <div class="icono">
      <img src="./build/img/icono2.svg" alt="Icono precio">
      <h3>Precio</h3>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis, non quo voluptas reprehenderit
        dolor tenetur iusto eveniet velit deleniti aspernatur possimus, cupiditate provident id explicabo
        inventore nemo a ut qui.</p>
    </div>
    <div class="icono">
      <img src="./build/img/icono3.svg" alt="Icono rapidez">
      <h3>A tiempo</h3>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis, non quo voluptas reprehenderit
        dolor tenetur iusto eveniet velit deleniti aspernatur possimus, cupiditate provident id explicabo
        inventore nemo a ut qui.</p>
    </div>
  </div>
</main>
<section class="seccion contenedor">
  <h2>casas y Depas enventas</h2>
  <?php 
  $limit = 3;
  include 'includes/templates/anuncios.php';
   ?>
  <div class="alinear-derecha">
    <a href="anuncios.php" class="btn-verde">Ver Todas</a>
  </div>
</section>
<section class="imagen-contacto">
  <h2>Encuentra la casa de tus suenos</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nam quis soluta, perspiciatis dicta
    temporibus repudiandae illum hic blanditiis pariatur! Quod incidunt repellendus iusto inventore tempora
    a minus qui? Quidem?</p>
  <a href="contact.php" class="boton-amarillo">
    Contactanos
  </a>
</section>

<div class="contenedor seccion seccion-inferior ">
  <section class="blog">
    <h3>Nuestro Blog</h3>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="/build/img/blog1.webp" type="image/webp">
          <source srcset="/build/img/blog1.jpg" type="image/jpeg">

          <img loading="lazy" src="/build/img/blog1.webp" alt="entrada blog">
        </picture>
      </div>
      <div class="text-entrada">
        <a href="entrada.php">
          <h4>
            Terraza en el techo de tu casa
          </h4>
          <p>Escrito el <span> 20/10/21 </span>por:<span> Admin</span>
          </p>
          <p>Consejos para construir en el techo de tu casa con los mejores materiales y ahorrando dinero
          </p>
        </a>
      </div>

    </article>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="/build/img/blog1.webp" type="image/webp">
          <source srcset="/build/img/blog1.jpg" type="image/jpeg">

          <img loading="lazy" src="/build/img/blog1.webp" alt="entrada blog">
        </picture>
      </div>
      <div class="text-entrada">
        <a href="entrada.php">
          <h4>
            Guia para la decoracion de tu casa
          </h4>
          <p>Escrito el <span> 20/10/21 </span>por: <span> Admin</span>
          </p>
          <p>
            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para
            darle vida a tua espacio
          </p>
        </a>
      </div>

    </article>
  </section>
  <section class="testimoniales">
    <h3>Testimoniales</h3>
    <blockquote>
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, id similique nisi velit, distinctio
      aspernatur voluptate illum iusto alias nemo tempore itaque? At, dolorem sint officia tempora architecto
      exercitationem omnis.
    </blockquote>
    <p>
      - Neil Chavez
    </p>
  </section>
</div>


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
<script src="/build/js/bundle.min.js"></script>
</body>

</html>