<a href="/admin">Torna alla Lista delle proprieta</a>

<br>
<br>
<?php foreach ($errors as $error) : ?>
  <p class="error"><?php echo $error ?> </p>
<?php endforeach ?>

<form class="base-form" method="POST" enctype="multipart/form-data">

  <?php include 'form.php' ?>

  <input type="submit" value="Enviar la información">
</form>