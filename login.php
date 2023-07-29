<?php
require 'includes/templates/config/db.php';
$db = connectDB();

$errors = [];
//autenticar el usuario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  $email = mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($db, $_POST["password"]);

  if (!$email) {
    $errors[] = "El email es obligatorio";
  }

  if (!$password) {
    $errors[] = "El password es obligatorio";
  }

  //si no hay errores
  if (empty($errors)) {
    //revisar si el usuario existe;

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    if ($result->num_rows) {
      // entonces el usuario  existe;
      // ahora revisa que la pass es correcta
      $user = mysqli_fetch_assoc($result);

      // verifica con la funcion de php si la password es igual o no

      $auth = password_verify($password, $user["password"]);

      var_dump($auth);
      if ($auth) {
        // el user esta autenticado
        session_start();
        // llena el arreglo de la session
        $_SESSION["user"] = $user["email"];
        $_SESSION["login"] = true;

        header('Location: /admin');
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
      } else {

        $errors[] = "El password es equivocado";
      }
    } else {
      $errors[] = "El usuario no existe";
    }
  }
}
//incluye el header
include './includes/templates/header.php'; ?>
<main class="contenedor seccion">
  <h1>Iniciar Sesion</h1>

  <?php foreach ($errors as $error) : ?>
    <p> <?php echo $error ?></p>
  <?php endforeach ?>
  <form method="POST">
    <fieldset>
      <legend>Informacion Personal</legend>


      <label for="email">Tu email</label>
      <input type="email" name="email" id="email" placeholder="Tu email">

      <br>


      <label for="password">Tu Password</label>
      <input type="password" name="password" id="password" placeholder="Tu password">

      <br>
      <input type="submit" value="Inicia Sesion" class="btn-verde">
    </fieldset>
  </form>
</main>


<footer class="seccion">

  <div class="contenedor contenedor-footer">
    <div class="mobile-menu">
      <img src="./build/img/barras.svg" alt="menu hamburger">
    </div>
    <div class="derecha">
      <img src="./build/img/dark-mode.svg" class="dark-mode-boton" alt="dark mode">
      <nav class="navegacion">
        <a href="nosotros.php">Nosotros</a>
        <a href="anuncios.php">Anuncios</a>
        <a href="blog.php">Blog</a>
        <a href="contacto.php">Contacto</a>
      </nav>
    </div>
  </div>
  <p class="copyright">
    Todos los derechos reservados 2023
  </p>
</footer>
<script src="./build/js/bundle.min.js"></script>
</body>

</html>