<?php
if (!isset($_SESSION)) {
  session_start();
}
$auth = $_SESSION["login"] ?? false;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes Raices</title>
  <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
  <header class="header <?php echo isset($indexPage) ? 'inicio' : ''; ?> ">
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="/">

          <img src="/build/img/logo.svg" alt="Logotipo de bienes raices">

        </a>
        <div class="mobile-menu">
          <img src="/build/img/barras.svg" alt="menu hamburger">
        </div>
        <div class="derecha">
          <img src="/build/img/dark-mode.svg" class="dark-mode-boton" alt="dark mode">
          <nav class="navegacion">
            <a href="aboutUs">Nosotrsos</a>
            <a href="properties">Anuncios</a>
            <a href="blog">Blog</a>
            <a href="contact">Contacto</a>
            <?php if ($auth) : ?>
              <a href="close-session.php">Logout</a>
            <?php endif; ?>
          </nav>
        </div>

      </div>
    </div>
  </header>