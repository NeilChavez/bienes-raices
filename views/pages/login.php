<main class="contenedor seccion">
  <h1>Iniciar Sesion</h1>

  <?php foreach ($errors as $error) : ?>
    <p> <?php echo $error ?></p>
  <?php endforeach ?>
  <form method="POST" action="/login">
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